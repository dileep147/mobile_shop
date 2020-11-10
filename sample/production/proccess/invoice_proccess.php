<?php

require_once './../../util/initialize.php';

if(isset($_POST['invoice_finalize'])){
  $invoice_code = $_POST['grn_code'];
  $date_time = $_POST['date_time'];
  $customer_id = $_POST['supplier_id'];
  $payment = $_POST['payment'];

  $invoice_total = 0;
  foreach($_SESSION["invoice_item_grid"] as $index => $invoice_item){
    $item_data = Inventory::find_all_by_barcode_last($invoice_item['barcode']);
    $item_unit = $item_data->batch_id()->retail_price;
    $discounted =  $item_unit - $invoice_item['discount'];
    $line_total = ($discounted * $invoice_item['qty']);
    $invoice_total = $invoice_total + $line_total;

  }
  $next_invoice_id = Invoice::getAutoIncrement();
  $invoice = new Invoice();
  $invoice->code = $invoice_code;
  $invoice->date_time = $date_time;
  $invoice->invoice_status_id = 1;
  $invoice->gross_amount = $invoice_total;
  $invoice->net_amount = $invoice_total;
  $invoice->balance = ($invoice_total-$payment);
  $invoice->customer_id = $customer_id;
  $invoice->invoice_type_id = 1;
  $invoice->user_id = $_SESSION["user"]["id"];
  $invoice->invoice_condition_id = 1;
  $invoice->payment = $payment;
  $invoice->save();

  foreach($_SESSION["invoice_item_grid"] as $index => $invoice_item){
    $item_data = Inventory::find_all_by_barcode_last($invoice_item['barcode']);

    $invoice_inventory = new InvoiceInventory();
    $invoice_inventory->invoice_id = $next_invoice_id;
    $invoice_inventory->inventory_id  = $item_data->id;
    $invoice_inventory->qty  = $invoice_item['qty'];
    $item_unit = $item_data->batch_id()->retail_price;
    $invoice_inventory->price  = $item_unit;
    $invoice_inventory->unit_discount  = $invoice_item['discount'];
    $discounted =  $item_unit - $invoice_item['discount'];
    $total = $discounted * $invoice_item['qty'];
    $invoice_inventory->net_amount  = $total;
    $invoice_inventory->sales_person  = $invoice_item['sales_person'];
    $invoice_inventory->save();

  }


  Activity::log_action("Invoice saved successfully (Code:" . $invoice_code . ") - saved ");
  $_SESSION["message"] = "Successfully saved (Invoice: ".$invoice_code.") ";
  Functions::redirect_to("./../invoice_print.php?inv_id=".$next_invoice_id);


}

if(isset($_REQUEST['itemgridremove'])){
  $position = $_REQUEST['itemgridremove'];
  unset($_SESSION["invoice_item_grid"][$position]);
  $_SESSION["invoice_item_grid"] = array_values($_SESSION["invoice_item_grid"]);

  if(isset($_SESSION["invoice_item_grid"])){
    $invoice_total = 0;
    $array_index = 0;
    foreach($_SESSION["invoice_item_grid"] as $index => $invoice_item){
      echo "<tr>";
      $item_data = Inventory::find_all_by_barcode_last($invoice_item['barcode']);
      echo "<td>".$item_data->batch_id()->product_id()->name."</td>";
      echo "<td style='text-align:center;'>".$item_data->batch_id()->code."</td>";
      echo "<td style='text-align:right;'>".number_format($item_data->batch_id()->retail_price,2)."</td>";
      $item_unit = $item_data->batch_id()->retail_price;
      $discounted =  $item_unit - $invoice_item['discount'];

      echo "<td style='text-align:right;'>".$invoice_item['discount']."</td>";
      echo "<td style='text-align:right;'>".$invoice_item['qty']."</td>";
      $line_total = ($discounted * $invoice_item['qty']);
      $invoice_total = $invoice_total + $line_total;
      echo "<td style='text-align:right;'>".number_format($line_total,2)."</td>";
      echo "<td><input class='btn btn-warning btn-block btn-sm' value='REMOVE' onclick='itemgridRemove(".$array_index.")'></td>";
      echo "</tr>";
      ++$array_index;
    }
    echo "<tr><td colspan='5' style='text-align:right;'>TOTAL</td><td style='text-align:right;'>".number_format($invoice_total,2)."</td></tr>";
  }

}

if(isset($_REQUEST['barcodecheck'])){
  $data = Inventory::find_all_by_barcode($_REQUEST['barcodecheck']);
  if(count($data) > 0){
    echo "<p style='color:green;'> ITEM IS IN THE DATABASE </p>";
  }else{
    echo "<p style='color:RED;'> ITEM IS NOT IN THE DATABASE </p>";
  }
}

if(isset($_REQUEST['invoice_grid'])){
  $invoice_item_grid = array();
  $invoice_item_grid["barcode"] = $_REQUEST['barcode'];
  $invoice_item_grid["qty"] = $_REQUEST['qty'];
  $invoice_item_grid["sales_person"] = $_REQUEST['sales_person'];
  $invoice_item_grid["discount"] = $_REQUEST['discount'];

  if (isset($_SESSION["invoice_item_grid"])) {
    $_SESSION["invoice_item_grid"][] = $invoice_item_grid;
  } else {
    $_SESSION["invoice_item_grid"] = array();
    $_SESSION["invoice_item_grid"][] = $invoice_item_grid;
  }

  if(isset($_SESSION["invoice_item_grid"])){
    $invoice_total = 0;
    $array_index = 0;
    foreach($_SESSION["invoice_item_grid"] as $index => $invoice_item){
      echo "<tr>";
      $item_data = Inventory::find_all_by_barcode_last($invoice_item['barcode']);
      echo "<td>".$item_data->batch_id()->product_id()->name."</td>";
      echo "<td style='text-align:center;'>".$item_data->batch_id()->code."</td>";
      echo "<td style='text-align:right;'>".number_format($item_data->batch_id()->retail_price,2)."</td>";
      $item_unit = $item_data->batch_id()->retail_price;
      $discounted =  $item_unit - $invoice_item['discount'];

      echo "<td style='text-align:right;'>".$invoice_item['discount']."</td>";
      echo "<td style='text-align:right;'>".$invoice_item['qty']."</td>";
      $line_total = ($discounted * $invoice_item['qty']);
      $invoice_total = $invoice_total + $line_total;
      echo "<td style='text-align:right;'>".number_format($line_total,2)."</td>";
      echo "<td><input class='btn btn-warning btn-block btn-sm' value='REMOVE' onclick='itemgridRemove(".$array_index.")'></td>";
      echo "</tr>";
      ++$array_index;
    }
    echo "<tr><td colspan='5' style='text-align:right;'>TOTAL</td><td style='text-align:right;'>".number_format($invoice_total,2)."</td></tr>";
  }

}
