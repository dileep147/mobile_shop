<?php
require_once './../util/initialize.php';

//if (isset($_POST["invoice_id"]) && $invoice = Invoice::find_by_id($_POST["invoice_id"])) {
//    $invoice_inventorys = InvoiceInventory::find_all_by_invoice_id($invoice->id);
//    if ($invoice->customer_id) {
//        $customer = $invoice->customer_id();
//    } else {
//        $customer = new Customer();
//    }
//} else {
//    Functions::redirect_to("./invoice_management.php");
//}

if (isset($_SESSION["product_return"])) {
    $ses_product_return = $_SESSION["product_return"];
    
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
                <h3>Return & Invoice View</h3>
            </div>

            <div class="title_right">
            </div>
        </div>

        <div class="clearfix"></div>
        <div id="div_to_print">
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Return Details</h2> 
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <section class="content invoice">
                                <div class="row">
                                    <div class="col-xs-12 invoice-header">
										<!-- <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:center;">
											<h1 style="font-size: 21px;"><i class="fa fa-file"></i> 
												<b>NAWA LANKA ENTERPRISES</b>
											</h1>
											<p>
												<b>33A, Colombo Rd, Negombo. ( Tel: 031 2281 441 )</b>
											</p>
										</div> -->

										<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:left;font-size:15px;background-color: teal;color:white;padding:10px;">
											<p>CUSTOMER: 
												<?php 
												$cus_id = $ses_product_return['customer_id'];
												$cus_data = Customer::find_by_id($cus_id);
												?>
												<b><?php echo $cus_data->name; ?> , </b>
												<b><?php echo $cus_data->address; ?></b>
											</p>

										</div>
										<!-- <div class="col-md-6 col-sm-6 col-xs-6" style="text-align: right">
											<h1 style="font-size: 15px;"><b><small>Invoice No#: </small> <?php echo $invoice->code; ?></b></h1>
										</div> -->

									</div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Batch</th>
                                                    <th>Product</th>
                                                    <th>Return Reason</th>
                                                    <th>Returning Unit Price</th>
                                                    <th>Qty</th>
                                                    <th>Line Total(Rs.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($ses_product_return["product_return_batches"] as $product_return_batch) {
                                                    if (!empty($product_return_batch)) {
                                                        $batch = Batch::find_by_id($product_return_batch["batch_id"]);
                                                        $return_reason = ReturnReason::find_by_id($product_return_batch["return_reason_id"]);
                                                        $qty = $product_return_batch["qty"];
                                                        $return_unit_price = $product_return_batch["unit_price"];
                                                        $sub_total = $qty * $return_unit_price;
                                                        $total += $sub_total;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $batch->code; ?></td>
                                                            <td><?php echo $batch->product_id()->name; ?></td>
                                                            <td><?php echo $return_reason->name; ?></td>
                                                            <td><?php echo $return_unit_price; ?></td>
                                                            <td><?php echo $qty; ?></td>
                                                            <td><?php echo $sub_total; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-6" style="text-align: right;">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Total (Rs.) :</th>
                                                        <td><?php echo number_format($total, 2); 
                                                            $_SESSION['return_invoice_total'] = $total;
                                                            
                                                            
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Note :</th>
                                                        <td><?php echo $ses_product_return["note"]; ?></td>
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
        <div class="clearfix"></div>
        <div id="div_to_print">
            
        </div>
        <div class="x_panel"> 
            <div class="row no-print">
                <div class="col-xs-12">
                    <!--<button class="btn btn-default"  id="btn_invoice_print" ><i class="fa fa-print"></i> Print</button>-->
                    <!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> target="_blank" -->
                    <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->

                    <?php
//                    if ($invoice->id && ($invoice->balance > 0)) {
//                        $display = 'initial';
//                    } else {
//                        $display = 'none';
//                    }
                    ?>
<!--                    <form action="invoice_payment.php" method="post" style="display: <?php // echo $display; ?>">
    <input type="hidden" name="invoice_id" value="<?php // echo $invoice->id ?>"/>
    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Add Payment</button>
</form>-->
<!--                    <form action="proccess/invoice_return_final_prev_proccess.php" method="post" style="display: <?php // echo $display; ?>">
    <button type="submit" name="finalize" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Finalize</button>
</form>-->          
                    <a href="invoice_by_deliverer.php" class="pull-right" style="float: left">
                        <button class="btn btn-primary" ><i class="glyphicon glyphicon-edit"></i> New invoice</button>
                    </a>
                    <button id="btnCheckout" type="button" name="finalize" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include './common/bottom_content.php'; ?>
<script>

//    $('#btn_invoice_print').click(function () {
//        PrintDiv();
//    });

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
//        PrintDiv();
//        FormOperations.postForm('proccess/invoice_return_final_prev_proccess.php',{"finalize":true});
        $.ajax({
            type: 'POST',
            url: "proccess/invoice_return_final_prev_proccess1.php",
            data: {finalize: true},
            dataType: 'json',
            async: false,
            success: function (data) {
//                alert(JSON.stringify(data));
                if (data) {
                    PrintDiv();
                }
//                FormOperations.postForm('invoice_return_management.php');
                $(location).attr('href', 'product_return_management.php');
            },
            error:function (xhr){
                alert(xhr.responseText);
            }
        });
    }

</script>
