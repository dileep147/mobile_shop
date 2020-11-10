<?php
require_once './../util/initialize.php';

//if (isset($_POST["invoice_id"]) && $invoice = Invoice::find_by_id($_POST["invoice_id"])) {
//    $invoice_inventorys = InvoiceInventory::find_all_by_invoice_id($invoice->id);
//    if ($invoice->customer_id) {
//        $Customer = $invoice->customer_id();
//    } else {
//        $Customer = new Customer();
//    }
//} else {
//    Functions::redirect_to("./invoice_management.php");
//}
if (isset($_SESSION["invoice"]) && isset($_POST["new_invoice"])) {
//    $ses_invoice = $_SESSION["invoice"];
//
//    $customer = new Customer();
//    if ($ses_invoice["customer_id"]) {
//        $customer = Customer::find_by_id($ses_invoice["customer_id"]);
//    }
//    $order = new CustomerOrder();
//    if (isset($ses_invoice["customer_order_id"])) {
//        $order = CustomerOrder::find_by_id($ses_invoice["customer_order_id"]);
//        $customer = $order->customer_id();
//    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ses_invoice = $_SESSION["invoice"];
    $invoice = new Invoice();
    $invoice->code = $ses_invoice["code"];
    $invoice->date_time = $ses_invoice["date_time"];
    $invoice->invoice_status_id = 1;
    $invoice->gross_amount = $ses_invoice["gross_amount"];
    $invoice->net_amount = $ses_invoice["net_amount"];
    $invoice->balance = $ses_invoice["balance"];
    $invoice->invoice_type_id = $ses_invoice["invType"];
    $invoice->user_id = $ses_invoice["code"];

    $customer = new Customer();
    if ($ses_invoice["customer_id"]) {
        $customer = Customer::find_by_id($ses_invoice["customer_id"]);
        $invoice->customer_id = $customer->id;
    }
    $order = new CustomerOrder();
    if ($ses_invoice["order_customer_id"]) {
        $order = CustomerOrder::find_by_id($ses_invoice["order_id"]);
        $customer = $order->customer_id();
        $invoice->customer_order_id = $order->id;
        $invoice->customer_id = $order->customer_id;
    }

    $invoice_inventorys = array();
    foreach ($ses_invoice["invoice_inventories"] as $sess_invoice_inventory) {
        $invoice_inventory = new InvoiceInventory();
        $invoice_inventory->inventory_id = $sess_invoice_inventory["inventory_id"];
        $invoice_inventory->qty = $sess_invoice_inventory["qty"];
        $invoice_inventory->price = $sess_invoice_inventory["price"];
        $invoice_inventory->unit_discount = ($sess_invoice_inventory["unit_discount"]) ? $sess_invoice_inventory["unit_discount"] : 0;
        $invoice_inventory->gross_amount = ($invoice_inventory->qty) * ($invoice_inventory->price);
        $invoice_inventory->net_amount = ($invoice_inventory->qty) * (($invoice_inventory->price) - ($invoice_inventory->unit_discount));
        $invoice_inventorys[] = $invoice_inventory;
    }
} else if (isset($_POST["invoice_id"])) {
    if ($invoice = Invoice::find_by_id($_POST["invoice_id"])) {
        $customer = new Customer();
        if ($invoice->customer_id) {
            $customer = Customer::find_by_id($invoice->customer_id);
        }
        $order = new CustomerOrder();
        if (isset($invoice->customer_order_id)) {
            $order = CustomerOrder::find_by_id($invoice->customer_order_id);
            $customer = $order->customer_id();
        }

        $invoice_inventorys = InvoiceInventory::find_all_by_invoice_id($invoice->id);
    } else {
        Session::set_error("Entry not available...");
        Functions::redirect_to("./invoice_management.php");
    }
}else if (isset($_GET["invoice_id"])) {
    if ($invoice = Invoice::find_by_id($_GET["invoice_id"])) {
        $customer = new Customer();
        if ($invoice->customer_id) {
            $customer = Customer::find_by_id($invoice->customer_id);
        }
        $order = new CustomerOrder();
        if (isset($invoice->customer_order_id)) {
            $order = CustomerOrder::find_by_id($invoice->customer_order_id);
            $customer = $order->customer_id();
        }

        $invoice_inventorys = InvoiceInventory::find_all_by_invoice_id($invoice->id);
    } else {
        Session::set_error("Entry not available...");
        Functions::redirect_to("./invoice_management.php");
    }
} else {
    Functions::redirect_to("./invoice_management.php");
}

include './common/upper_content.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Invoice View</h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="div_to_print">
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">

                            <section class="content invoice">
                                <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h1><i class="fa fa-file"></i> <?php echo ProjectConfig::$project_name; ?></h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6" style="text-align: right">
                                            <h2><small>Date: </small> <?php echo $invoice->date_time; ?></h2>
                                            <h2><small>Invoice No#: </small> <?php echo $invoice->code; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <small>From</small>
                                        <address>
                                            <?php echo ProjectConfig::$address_html; ?>
                                            <br/>
                                            <?php echo ProjectConfig::$tel_html; ?>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <small>To</small>
                                        <address>
                                            <strong><?php echo $customer->name; ?></strong>
                                            <br><?php echo $customer->address; ?>                                        
                                            <br><?php echo $customer->phone; ?>
                                            <br><?php echo $customer->email; ?>
                                        </address>
                                    </div>         
                                    <div class="col-sm-4 invoice-col">                                                                      
                                        <b>Ammount:</b> <?php echo number_format($invoice->net_amount, 2); ?> LKR
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table class="table table-striped table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Inventory ID</th>
                                                    <th>Item</th>
                                                    <th style='text-align:center;'>QTY</th>
                                                    <th style='text-align:right;'>Unit Price (Rs.)</th>
                                                    <th style='text-align:right;'>Unit Discount (Rs.)</th>
                                                    <th style='text-align:right;'>Gross Ammount (Rs.)</th>
                                                    <th style='text-align:right;'>Net Ammount (Rs.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    foreach ($invoice_inventorys as $invoice_inventory) {
                                                        echo "<tr>";
                                                        echo "<td>" . $invoice_inventory->inventory_id . "</td>";
                                                        echo "<td>" . $invoice_inventory->inventory_id()->product_id()->name . " (Batch:" . $invoice_inventory->inventory_id()->batch_id()->code . ")</td>";
                                                        echo "<td style='text-align:center;'>" . $invoice_inventory->qty . "</td>";
                                                        echo "<td style='text-align:right;'>" . $invoice_inventory->price . "</td>";

                                                        $unit_discount_str = $invoice_inventory->unit_discount;
                                                        if ((int) $invoice_inventory->unit_discount < 0) {
                                                            $unit_discount_str = "";
                                                        }
                                                        echo "<td style='text-align:right;'>" . $unit_discount_str . "</td>";

                                                        echo "<td style='text-align:right;'>" . $invoice_inventory->gross_amount . "</td>";
                                                        echo "<td style='text-align:right;'>" . $invoice_inventory->net_amount . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ccontainer">
                                    <!--<div class="col-xs-6 col-xs-offset-6" style="text-align: right;">-->
                                    <div class="col-xs-6" style="text-align: right;">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Gross Total (Rs.) :</th>
                                                        <td><?php echo number_format($invoice->gross_amount, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Discount (Rs.) :</th>
                                                        <td><?php echo number_format(($invoice->gross_amount) - ($invoice->net_amount), 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Net Total (Rs.) :</th>
                                                        <td><?php echo number_format($invoice->net_amount, 2); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-6" style="text-align: right;">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Cash (Rs.) :</th>
                                                        <td><strong><?php echo number_format(($invoice->net_amount) - ($invoice->balance), 2); ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Balance/Credit (Rs.) :</th>
                                                        <td><strong><?php echo number_format($invoice->balance, 2); ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="x_panel"> 
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="invoice_by_deliverer.php" class="pull-right" style="float: left">
                        <button class="btn btn-primary" ><i class="glyphicon glyphicon-edit"></i> New invoice</button>
                    </a>
                    <?php
                    if (isset($invoice->id) && !empty($invoice->id)) {
                        ?>
                        <button class="btn btn-default"  id="btn_invoice_print" ><i class="fa fa-print"></i> Print</button>
                        <button onclick="confirmDelete(this);" data-invoice_id="<?php echo Functions::custom_crypt($invoice->id); ?>" class="btn btn-danger" ><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        <?php
                    } else {
                        ?>
                        <button id="btnCheckout" type="button" name="finalize" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Checkout</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include './common/bottom_content.php'; ?>
<script>

   $('#btn_invoice_print').click(function () {
       PrintDiv();
   });

    function PrintDiv() {
        var divToPrint = document.getElementById('div_to_print');
        var popupWin = window.open('', '_blank', 'width=800,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    $("#btnCheckout").click(function () {
        confirmSave();
    });

    function confirmSave() {
        $.confirm({
            icon: 'fa fa-question-circle',
            type: 'green',
            title: 'Checkout',
            content: 'Are you sure you want to Checkout ?',
            buttons: {
                yes: {
                    text: 'Yes',
                    btnClass: 'btn-green',
                    keys: ['enter'],
                    action: function () {
                        submitData();
                    }
                },
                cancel: function () {
                }
            }
        });
    }

    function submitData() {
        $.ajax({
            type: 'POST',
            url: "proccess/invoice_prev_proccess.php",
            data: {finalize: true},
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data) {
                    PrintDiv();
                }
//                FormOperations.postForm('invoice_management.php');
                $(location).attr('href', 'invoice_management.php');
            },
            error: function (xhr) {
//                alert("An error occured: " + xhr.status + " " + xhr.statusText);
                alert(xhr.responseText);
            }
        });
    }

    function confirmDelete(element) {
        var invoice_id = $(element).data("invoice_id");
        $.confirm({
            icon: 'fa fa-warning',
            type: 'red',
            title: 'Delete',
            content: 'Are you sure you want to delete this invoice?',
            buttons: {
                yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
//                    keys: ['enter'],
                    action: function () {
                        window.location = "proccess/invoice_delete_proccess.php?id=" + invoice_id;
                    }
                },
                cancel: function () {
                }
            }
        });
    }

</script>
