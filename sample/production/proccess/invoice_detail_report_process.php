<?php
require_once './../../util/initialize.php';

if(isset($_POST['invoice_report'])){
    $from_date = trim($_POST['from']);
    $to_date   = trim($_POST['to']);

    $total_amount = 0;
    $total_cost = 0;
    $output =array();
    $invoices =array();

    $raw_invoices = Invoice::find_by_sql("SELECT * FROM invoice WHERE date_time BETWEEN '$from_date' AND '$to_date'");
    foreach ($raw_invoices as $invoice) {

        if($invoice->customer_id){ 
            $invoice->customer_name = Customer::find_by_id($invoice->customer_id)->name;
        }else{
            $invoice->customer_name =  "Retail Customer"; 
        } 
        
        $invoice_cost=getTotalCost($invoice->id);
        $invoice->invoice_cost  = number_format($invoice_cost,2);
        $total_cost += $invoice_cost;
        $total_amount += $invoice->net_amount;

        $invoices[]=$invoice;
    }

    $output["invoices"] = $invoices;
    $output["total_amount"] = number_format($total_amount,2);
    $output["total_cost"] = number_format($total_cost,2);
    $output["profit"] = number_format(($total_amount-$total_cost),2);

    echo json_encode($output);
}

function getTotalCost($invoice_id) {
    $total_cost = 0;

    foreach (InvoiceInventory::find_all_by_invoice_id($invoice_id) as $invoice_inventory) {
        $batch = $invoice_inventory->inventory_id()->batch_id();
        $sub_total_cost = ($invoice_inventory->qty) * ($batch->cost);
        $total_cost += $sub_total_cost;
    }

    return $total_cost;
}




