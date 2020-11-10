<?php

    require_once './../../util/initialize.php';


    if(isset($_GET['save_return'])){

        $return_deliverer = $_SESSION["return_deliverer"];
        $return_date_time = $_SESSION["return_date_time"];
        $return_reason = $_SESSION["return_return_note"];

        $product_return = new ProductReturn();

        $product_return->date_time = $return_date_time;
        $product_return->note = $return_reason;
        $product_return->user_id = $_SESSION["user"]["id"];
        $product_return->deliverer_id = $return_deliverer;
        $product_return->save();
        $product_return_id = ProductReturn::last_insert_id();

        try {

            foreach($_SESSION['product_return_item'] as $index => $data){

                $item_id = $data['customer_id'];
                $batch_id = $data['batch_id'];
                $qty = $data['qty'];
                $return_reason = $data['return_reason'];
                $item_discount = $data['discount'];

                $batch_data = Batch::find_by_id($batch_id);

                $ProductReturnBatch = new ProductReturnBatch();

                if($data['price']){
                    $wholesale_price = $data['price'];
                }else{
                    $wholesale_price = $batch_data->wholesale_price;
                }

                $ProductReturnBatch->product_return_id = $product_return_id;
                $ProductReturnBatch->batch_id = $batch_id;
                $ProductReturnBatch->return_reason_id = $return_reason;
                $ProductReturnBatch->qty = $qty;
                $ProductReturnBatch->unit_price = $wholesale_price;
                $ProductReturnBatch->discount = $item_discount;


                try {
                    $ProductReturnBatch->save();

                    if ($return_reason == 1 || $return_reason == 2) {

                        $return_batch = Batch::find_by_id($batch_id); 

                        $inventory = Inventory::find_by_batch_id($return_batch->id);
                        $inventory_id;
                        if ($inventory) {
                            $inventory_id = $inventory->id;
                        $inventory->qty = (int) $inventory->qty + (int) $qty;
                        $inventory->save();
                        } else {
                            $inventory = new Inventory();
                            $inventory->qty = $qty;
                            $inventory->product_id = $return_batch->product_id;
                            $inventory->batch_id = $return_batch->id;
                            $inventory->save();
                            $inventory_id = Inventory::last_insert_id();
                        }               

                        $deliverer = Deliverer::find_by_id($return_deliverer);
                        $deliverer_inventory = DelivererInventory::find_by_deliverer_id_inventory_id($deliverer->id, $inventory_id);
                        if ($deliverer_inventory) {
                            $deliverer_inventory->qty = (int) $deliverer_inventory->qty + (int) $qty;
                            $deliverer_inventory->save();
                        } else {
                            $deliverer_inventory = new DelivererInventory();
                            $deliverer_inventory->deliverer_id = $deliverer->id;
                            $deliverer_inventory->inventory_id = $inventory_id;
                            $deliverer_inventory->qty = $qty;
                            $deliverer_inventory->save();
                        }

                    }

                    Activity::log_action("Product Return " . $batch_data->product_id()->name . " Qty: ".$qty."- Returned ");

                } catch (Exception $exc) {
                    throw new Exception($exc->getMessage());
                }

            }


            foreach($_SESSION['product_return_invoice'] as $index => $data){

                $invoice_id = $data['invoice_id'];
                $amount = $data['amount'];
                $invoice_data = Invoice::find_by_id($invoice_id);

                $ProductReturnInvoice = new ProductReturnInvoice();

                $ProductReturnInvoice->product_return_id = $product_return_id;
                $ProductReturnInvoice->invoice_id = $invoice_id;
                $ProductReturnInvoice->return_amount = $amount;

                try{
                    $ProductReturnInvoice->save();

                    $invoice_data = Invoice::find_by_id($invoice_id);
                    $invoice_data->balance = $invoice_data->balance - $amount;

                    if($invoice_data->balance == 0 || $invoice_data->balance < 0){
                        $invoice_data->invoice_status_id = 2;
                    }

                    $invoice_data->save();

                    Activity::log_action("Invoice Return " . $invoice_data->id . " Amount: ".$amount."- Returned ");

                } catch (Exception $exc) {
                    throw new Exception($exc->getMessage());
                }

            }
            $_SESSION["message"] = "Successfully saved.";

            unset($_SESSION["product_return_invoice"]);
            unset($_SESSION["product_return_item"]);
            unset($_SESSION["return_deliverer"]);
            unset($_SESSION["return_date_time"]);
            unset($_SESSION["return_return_note"]);

            Functions::redirect_to("./../product_return_management.php");
        } catch (Exception $exc) {
            $_SESSION["error"] = "Error..! Failed to save.";

            unset($_SESSION["product_return_invoice"]);
            unset($_SESSION["product_return_item"]);
            unset($_SESSION["return_deliverer"]);
            unset($_SESSION["return_date_time"]);
            unset($_SESSION["return_return_note"]);

            Functions::redirect_to("./../product_return_management.php");
        }


    }

    if (isset($_POST["invoice_request"])) {
        header('Content-Type: application/json');

        $filter_id = $_POST["filter_id"];
        $batches;   
        $batches = Batch::find_all_by_product_id($filter_id); 

        echo json_encode($batches);
    }

    if (isset($_POST["customer_request"])) {
        header('Content-Type: application/json');

        $filter_id = $_POST["filter_id"];
        $batches;   
        $batches = Invoice::customer_id_pending($filter_id); 

        echo json_encode($batches);
    }

    if (isset($_POST["add_invoice_payment"])) {
        $invoice_payment = array();
        $invoice_payment["customer_id"] = $_POST['customer_id'];
        $invoice_payment["batch_id"] = $_POST['batch_id'];
        $invoice_payment["price"] = $_POST['price'];
        $invoice_payment["qty"] = $_POST['qty'];
        $invoice_payment["return_reason"] = $_POST['return_reason'];
        $invoice_payment["discount"] = $_POST['discount'];

        if (isset($_SESSION["product_return_item"])) {
            $_SESSION["product_return_item"][] = $invoice_payment;
        } else {
            $_SESSION["product_return_item"] = array();
            $_SESSION["product_return_item"][] = $invoice_payment;
        }
    }

    if (isset($_POST["add_invoice_payment_invoice"])) {
        $invoice_payment = array();
        $invoice_payment["invoice_id"] = $_POST['invoice_id'];
        $invoice_payment["amount"] = $_POST['amount'];
        $invoice_payment["linetotal"] = $_POST['linetotal'];

        if (isset($_SESSION["product_return_invoice"])) {
            $_SESSION["product_return_invoice"][] = $invoice_payment;
        } else {
            $_SESSION["product_return_invoice"] = array();
            $_SESSION["product_return_invoice"][] = $invoice_payment;
        }
    }


    if (isset($_POST["invoice_payments_request"])) {
        $result = array();
        if (isset($_SESSION["product_return"])) {
            header('Content-Type: application/json');        

            
            $invoice_payments = array();
            $total = 0;
            foreach ($_SESSION["invoice_payments"] as $index => $data) {
                $result['customer_id'] = Customer::find_by_id($data['customer_id']);
                $result['batch_id'] = Batch::find_by_id($data['batch_id']);
                $result['qty'] = $data['qty'];            
            }        
        }

        print_r($result);

        echo json_encode($result);
    }


    if (isset($_POST["remove_reload"])) {
        header('Content-Type: application/json');
        $index = $_POST["index"];
        $product_return_batch = $_SESSION["product_return_item"][$index];
        unset($_SESSION["product_return_item"][$index]);
        echo json_encode($product_return_batch);
    }

    if (isset($_POST["remove_reload_invoice"])) {
        header('Content-Type: application/json');
        $index = $_POST["index"];
        $product_return_batch = $_SESSION["product_return_invoice"][$index];
        unset($_SESSION["product_return_invoice"][$index]);
        echo json_encode($product_return_batch);
    }

