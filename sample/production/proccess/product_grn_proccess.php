<?php

require_once './../../util/initialize.php';

// function finalize bill
if(isset($_POST['finalize'])){
  echo "ok";
  unset($_REQUEST['batch_id']);
  unset($_REQUEST['barcode']);

  $grn_code = $_POST['grn_code'];
  $date_time = $_POST['date_time'];
  $supplier_id = $_POST['supplier_id'];

  $next_grn_id = GRN::getAutoIncrement();
  $grn = new GRN();
  $grn->code = $grn_code;
  $grn->date_time = $date_time;
  $grn->user_id = $_SESSION["user"]["id"];
  $grn->grn_type_id = 1;
  $grn->supplier_id = $supplier_id;

  try {
    $grn->save();

    if (isset($_SESSION["item_grid"])) {
      foreach ($_SESSION["item_grid"] as $index => $ses_item_grid) {

        if($ses_item_grid['batch_id'] == 0){
          $next_batch_id = Batch::getAutoIncrement();

          // save the batch
          $new_batch = new Batch();
          $new_batch->code = $next_batch_id;
          $new_batch->product_id = $ses_item_grid['item_id'];
          $new_batch->cost = $ses_item_grid['cost_price'];
          $new_batch->retail_price = $ses_item_grid['retail_price'];
          $new_batch->wholesale_price = $ses_item_grid['wholesale_price'];
          $new_batch->supplier_invoice_price = $ses_item_grid['supplier_invoice_price'];
          $new_batch->minimum_selling_price = $ses_item_grid['minimum_selling_price'];
          $new_batch->save();

          // Store in the inventory for non existing batches
          foreach($ses_item_grid["barcode"] as $index => $ses_barcode){
            if($ses_barcode['barcode'] != NULL){
              $inventory = new Inventory();
              $inventory->qty = $ses_item_grid['qty'];
              $inventory->product_id = $ses_item_grid['item_id'];
              $inventory->batch_id = $next_batch_id;
              $inventory->barcode = $ses_barcode['barcode'];
              $inventory->type = "GRN";
              $inventory->reference_id = $next_grn_id;
              $inventory->save();

              // adding to the grn_product table
              $grn_product = new GRNProduct();
              $grn_product->grn_id = $next_grn_id;
              $grn_product->qty = $ses_item_grid['qty'];
              $grn_product->user_id =  $_SESSION["user"]["id"];
              $grn_product->batch_id = $next_batch_id;
              $grn_product->barcode = $ses_barcode['barcode'];
              $grn_product->save();

            }
          }
        }else{

          $product_count = count($ses_item_grid["barcode"]);
          echo $product_count;

          // Store in the inventory for existing batches
          foreach($ses_item_grid["barcode"] as $index => $ses_barcode){
            if($ses_barcode['barcode'] != NULL){
              $inventory = new Inventory();
              if($product_count == 1){
                $inventory->qty = $ses_item_grid['qty'];
              }else{

                $inventory->qty = 1;
              }
              $inventory->product_id = $ses_item_grid['item_id'];
              $inventory->batch_id = $ses_item_grid['batch_id'];
              $inventory->barcode = $ses_barcode['barcode'];
              $inventory->type = "GRN";
              $inventory->reference_id = $next_grn_id;
              $inventory->save();

              // adding to the grn_product table
              $grn_product = new GRNProduct();
              $grn_product->grn_id = $next_grn_id;
                if($product_count == 1){
                  $grn_product->qty = $ses_item_grid['qty'];

                }else{
                  $grn_product->qty = 1;

                }
              $grn_product->user_id =  $_SESSION["user"]["id"];
              $grn_product->batch_id = $ses_item_grid['batch_id'];
              $grn_product->barcode = $ses_barcode['barcode'];
              $grn_product->save();

            }
          }
        }
      }
    }

    Activity::log_action("GRN - saved:" . $grn->code);
    $_SESSION["message"] = "Successfully saved";
    Functions::redirect_to('./../grn_management.php');

  } catch (Exception $exc) {

    $database->rollback();
    $_SESSION["error"] = "Failed to save GRN";
    $_SESSION["error"] = $exc;

    echo $exc;
    Functions::redirect_to('./../grn_management.php');

  }

}

// add to batch
if( isset($_REQUEST['batch_id']) && isset($_REQUEST['barcode']) ){
  // echo $_REQUEST['qty'];
  $duplicate = 0;
  if(isset($_SESSION['item_batch_barcode'])){
    if($_REQUEST['qty'] > count($_SESSION['item_batch_barcode'])){
      $message = " YOU CAN ENTER ".($_REQUEST['qty'] - count($_SESSION['item_batch_barcode']))." MORE BARCODES";
    }else if($_REQUEST['qty'] == count($_SESSION['item_batch_barcode'])){
      $message = " ALL THE BARCODES HAVE BEEN ENTERED! ";
    }else if($_REQUEST['qty'] < count($_SESSION['item_batch_barcode'])){
      $message = "SORRY!! YOU CAN'T ENTER MORE BAROCES! ";
      $duplicate == 1;
    }
  }

  if( $duplicate == 0 ){
    $item_batch_barcode = array();
    $item_batch_barcode["batch_id"] = $_REQUEST['batch_id'];
    $item_batch_barcode["barcode"] = $_REQUEST['barcode'];

    if (isset($_SESSION["item_batch_barcode"])) {
      $_SESSION["item_batch_barcode"][] = $item_batch_barcode;
    } else {
      $_SESSION["item_batch_barcode"] = array();
      $_SESSION["item_batch_barcode"][] = $item_batch_barcode;
    }
  }

  $array_index = 0;
  foreach ($_SESSION["item_batch_barcode"] as $index => $invoice_payment) {
    if($duplicate == 1){
      echo "<tr><td colspan='3' style='text-align:center;background-color:orange;'> CARCODE ALREADY IN THE GRID </td></tr>";
    }
    echo "<tr>";
    if($invoice_payment["batch_id"] == 0){
      echo "<td> - NEW BATCH - </td>";
    }else{
      $batch_data = Batch::find_by_id($invoice_payment["batch_id"]);
      echo "<td>".$batch_data->product_id()->name."</td>";
    }
    echo "<td>".$invoice_payment["barcode"]."</td>";
    echo "<td><input class='btn btn-primary btn-block btn-sm' value='REMOVE' onclick='barcodeRemove(".$array_index.")'></td>";
    echo "<tr>";
    $array_index++;
  }


}

// show table
if( isset($_REQUEST['show_table']) ){

  $position = $_REQUEST['show_table'];
  echo $position;
  unset($_SESSION["item_batch_barcode"][$position]);
  $_SESSION["item_batch_barcode"] = array_values($_SESSION["item_batch_barcode"]);


  $array_index = 0;
  foreach ($_SESSION["item_batch_barcode"] as $index => $invoice_payment) {
    echo "<tr>";
    if($invoice_payment["batch_id"] == 0){
      echo "<td> - NEWs BATCH - </td>";
    }else{
      $batch_data = Batch::find_by_id($invoice_payment["batch_id"]);
      echo "<td>".$batch_data->product_id()->name."</td>";
    }
    echo "<td>".$invoice_payment["barcode"]."</td>";
    echo "<td><input class='btn btn-primary btn-block btn-sm' value='REMOVE' onclick='barcodeRemove(".$array_index.")'></td>";
    echo "<tr>";
    $array_index++;
  }

}


// add to grid product

if(isset($_REQUEST['batch_id']) && isset($_REQUEST['qty']) && isset($_REQUEST['item_id']) && isset($_REQUEST['minimum_selling_price']) && isset($_REQUEST['supplier_invoice_price']) && isset($_REQUEST['cost_price']) && isset($_REQUEST['wholesale_price']) && isset($_REQUEST['retail_price'])  ){

  $item_grid = array();
  $item_grid["batch_id"] = $_REQUEST['batch_id'];
  $item_grid["qty"] = $_REQUEST['qty'];
  $item_grid["item_id"] = $_REQUEST['item_id'];
  $item_grid["minimum_selling_price"] = $_REQUEST['minimum_selling_price'];
  $item_grid["supplier_invoice_price"] = $_REQUEST['supplier_invoice_price'];
  $item_grid["cost_price"] = $_REQUEST['cost_price'];
  $item_grid["wholesale_price"] = $_REQUEST['wholesale_price'];
  $item_grid["retail_price"] = $_REQUEST['retail_price'];
  $item_grid["barcode"] = $_SESSION["item_batch_barcode"];



  if (isset($_SESSION["item_grid"])) {
    $_SESSION["item_grid"][] = $item_grid;
  } else {
    $_SESSION["item_grid"] = array();
    $_SESSION["item_grid"][] = $item_grid;
  }


  $array_index = 0;
  foreach ($_SESSION["item_grid"] as $index => $invoice_payment) {
    echo "<tr>";

    if( $_REQUEST['batch_id'] == 0 ){
      $product = Product::find_by_id($_REQUEST['item_id']);
      $cost_price = $_REQUEST['cost_price'];
      echo "<td>".$product->name."</td>";
      echo "<td> - NEW BATCH - </td>";
      echo "<td> ".$cost_price." </td>";
    }else{
      $batch = Batch::find_by_id($_REQUEST['batch_id']);
      $cost_price = $batch->cost;
      echo "<td>".$batch->product_id()->name."s</td>";
      echo "<td>".$batch->code."</td>";
      echo "<td>".$batch->cost."</td>";
    }
    if($_REQUEST['qty'] == 1){
      $qty = count($_SESSION["item_batch_barcode"]);
      echo "<td>".$qty."</td>";
    }else{
      $qty = $_REQUEST['qty'];
      echo "<td>".$qty."</td>";
    }

    echo "<td>".$cost_price * $qty."</td>";

    echo "<td><input class='btn btn-danger btn-block btn-sm' value='REMOVE' onclick='itemgridRemove(".$array_index.")'></td>";
    echo "<tr>";
    $array_index++;
  }

  unset($_SESSION["item_batch_barcode"]);
}

// show table
if( isset($_REQUEST['show_table_grid']) ){

  $position = $_REQUEST['show_table_grid'];
  unset($_SESSION["item_grid"][$position]);
  $_SESSION["item_grid"] = array_values($_SESSION["item_grid"]);


  $array_index = 0;
  if(!empty($_SESSION["item_grid"])){


    foreach ($_SESSION["item_grid"] as $index => $invoice_payment) {
      echo "<tr>";

      if( $_REQUEST['batch_id'] == 0 ){
        $product = Product::find_by_id($_REQUEST['item_id']);
        $cost_price = $_REQUEST['cost_price'];
        echo "<td>".$product->name."</td>";
        echo "<td> - NEW BATCH - </td>";
        echo "<td> ".$cost_price." </td>";
      }else{
        $batch = Batch::find_by_id($_REQUEST['batch_id']);
        $cost_price = $batch->cost;
        echo "<td>".$batch->product_id()->name."</td>";
        echo "<td>".$batch->code."</td>";
        echo "<td>".$batch->cost."</td>";
      }
      if($_REQUEST['qty'] == 1){
        $qty = count($_SESSION["item_batch_barcode"]);
        echo "<td>".$qty."</td>";
      }else{
        $qty = $_REQUEST['qty'];
        echo "<td>".$qty."</td>";
      }

      echo "<td>".$cost_price * $qty."</td>";

      echo "<td><input class='btn btn-danger btn-block btn-sm' value='REMOVE' onclick='itemgridRemove(".$array_index.")'></td>";
      echo "<tr>";
      $array_index++;
    }

  }

}





?>
