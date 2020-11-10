<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content--> 

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Re-Order Details</h3>
            </div>

            <div class="title_right">
                <button type="button" id="btn_print" class="btn btn-default" style="float: right;"><i class="glyphicon glyphicon-print"></i>  Print</button>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="row" id="divInvoice">
                
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive" id="print_div">
                    <div class="x_panel">
                        <div class="x_title" style="background-color: #424242;color:white;border-radius: 5px 5px 0px 0px;"><h3><center>Re-Order Report</center></h3></div>
                        <div class="x_content">
                            <div class="table-responsive">
                               
                                <table id="sata_table" class="table table-striped " cellspacing="0" width="100%">
                                    <thead>
                                        
                                        
                                    </thead>
                                    <tbody id="table_body">
                                        <?php 
                                        foreach (Category::find_all() as $category) {
                                            $inventory_details = Inventory::find_all_by_category_id($category->id);
                                            $category_name     = $category->name;
                                            $sub_total = 0;?>
                                        <tr style="background-color: gray;color:black;"><td colspan="10" ><b><?=$category_name?></b></td></tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>Batch Code</th>
                                            <th>Product</th>
                                            <th>ROQ</th>
                                            <th>Max Qty</th>
                                            <th>Min Qty</th>
                                            <th>Stock Qty</th>
                                            <th>Wholesale</th>
                                            <th>Line Total</th>
                                            
                                        </tr>
                                            <?php foreach ($inventory_details as $inventory_detail) {
                                                $batch_details   = Batch::find_by_id($inventory_detail['batch_id']);
                                                $product_details = Product::find_by_id($inventory_detail['product_id']);
                                                $product_name    = Product::find_by_id($inventory_detail['product_id'])->name;
                                                $line_total      = ($inventory_detail['qty']) * ($batch_details->wholesale_price);
                                                $sub_total      +=$line_total;  
                                                
                                         ?>
                                        
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><?=$batch_details->code?></td>
                                            <td><?=$product_name?></td>
                                            <td><?=$product_details->roq?></td>
                                            <td><?=$product_details->max_qty?></td>
                                            <td><?=$product_details->min_qty?></td>
                                            <td><?=$inventory_detail['qty']?></td>
                                            <td><?= $batch_details->wholesale_price." LKR" ?></td>
                                            <td><?= $line_total." LKR" ?></td>
                                            
                                        </tr>
                                        
                                       <?php
                                       
                                            }
                                            ?>
                                        <tr style="background-color: lightgray;color: black;" >
                                                <td colspan="5"><b>&nbsp;</b></td>
                                                <td colspan="3"><b>&nbsp;</b></td>
                                                <td colspan="1"><b>Category Sub Total</b></td>
                                                <td colspan="1"><b><?=$sub_total." LKR"?></b></td>
                                            </tr>
                                            <?php
                                       }
                                       ?>
                                    </tbody>
                                    <tfoot style="margin-top: 10px;">
<!--                                        <tr><td colspan="9">&nbsp;</td></tr>-->
                                        
                                        <tr style="background-color: #424242;color: white;">
                                            <td colspan="10" style="text-align: center;">Report Generated by <?=$_SESSION['user']['name']." on ".date("Y/m/d")." at ".date("h:i:sa");?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>
 
    //print_div
    
     $('#btn_print').click(function (){
              PrintDiv();
        });
     
        function PrintDiv() {    
            var divToPrint = document.getElementById('print_div');
            var popupWin = window.open('', '_blank', 'width=800,height=500');
            popupWin.document.open();
            popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
</script>








