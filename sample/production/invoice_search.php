<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

?>

<!--page content--> 
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <?php if(!isset($_POST['cusname'] )){ ?>
                    <h3>Customer Search <a href="invoice_search.php" class="btn btn-primary btn-xs">Clear Section</a></h3>
                <?php }if(isset($_POST['cusname'] )){ ?>
                    <h3>Invoice Search <a href="invoice_search.php" class="btn btn-primary btn-xs">Clear Section</a></h3>
                <?php } ?>

            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <?php Functions::output_result(); ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <?php if(!isset($_POST['cusname'] )){ ?>
                            <form id="form" action="invoice_search.php" method="post" class="form-horizontal form-label-left" target="_blank" >
                                <div class="col-md-12 col-sm-12 col-xs-12">


                                    <div class="form-group">
                                        <select class="form-control selectpicker"  data-live-search="true" name="cusname" required="">
                                            <!-- <option selected="" disabled="" value="0">Select Deliverer</option> -->
                                            <?php
                                            foreach (Customer::find_all() as $data) {
                                                ?>
                                                <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?> || <?php echo $data->address; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer col-md-12 col-sm-12 col-xs-12">
                                        <div class=" col-md-4 col-sm-4 col-xs-12">
                                        </div>
                                        <div class=" col-md-4 col-sm-4 col-xs-12">
                                        </div>
                                        <div class=" col-md-4 col-sm-4 col-xs-12">
                                            <button type="submit" name="reset" class="btn btn-block btn-primary"> Search <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <?php 
                        }
                        if(isset($_POST['cusname'])){
                            $cusname = $_POST['cusname'];
                            $customer = Customer::find_by_id($cusname);
                            ?>

                            <table class="" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th style="text-align: left;">Invoice Number</th>
                                        <th style="text-align:right;">Date</th>
                                        <th style="text-align:center;">Invoice Total</th>                                    
                                        <th style="text-align:right;">Paid</th>
                                        <th style="text-align:right;">Less 45</th>
                                        <th style="text-align:right;">Over 45</th>
                                        <th style="text-align:right;">Over 60</th>
                                        <th style="text-align:right;">Over 75</th>
                                        <th style="text-align:right;">Over 90</th>
                                        <th style="text-align:right;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    function chq($inv){
                                        $total = 0;
                                        foreach(PaymentInvoice::find_all_by_invoice_id($inv) as $data){
                                            if($data->payment_id()->payment_method_id == 2){
                                                $data2 = PaymentCheque::find_by_payment_id($data->payment_id);
                                                if($data2->cheque_id()->cheque_status_id ==  1 ){
                                                    $total = $total + $data->amount;        
                                                }                                           
                                            }
                                        }                                   
                                        return $total;
                                    }

                                    function ret($inv){
                                        $total = 0;
                                        foreach( ProductReturnInvoice::find_all_by_invoice_id($inv) as $data ){
                                            foreach(ProductReturnBatch::find_all_by_product_return_id($data->product_return_id) as $data1){
                                                $total = $total + ($data1->unit_price * $data1->qty);
                                            }
                                        }
                                        return $total;
                                    }

                                    $total = 0;




                                    $tone = 0;
                                    $ttwo = 0;
                                    $tthree = 0;
                                    $tthree1 = 0;
                                    $tfour = 0;
                                    $tline_total = 0;

                                    
                                        if (isset($_POST["slct_route"]) && $_POST["slct_route"] != 0) {
                                            $invoices = Invoice::customer_id_pending_range($customer->id,$_POST["from"],$_POST["to"]);
                                        }else{
                                            $invoices = Invoice::customer_id_all($customer->id);
                                        }
                                        $inv_count = count($invoices);
                                        if ($inv_count != 0) {
                                            ?>



                                            <?php
                                            $one = 0;
                                            $two = 0;
                                            $three = 0;
                                            $three1 = 0;
                                            $four = 0;
                                            $line_total = 0;





                                            $steps = 1;
                                            $last = 0;
                                            foreach ($invoices as $invoice) {
                                                $cheque = chq($invoice->id);
                                                if((($invoice->balance)-$cheque)){
                                                    $last = $last + 1;
                                                }
                                            }

                                            foreach ($invoices as $invoice) {



                                            //$ret = ret($invoice->id);
                                                $ret = 0;
                                                $cheque = chq($invoice->id);
                                                $deliverer = NULL;

                                                // foreach(DelivererUser::find_all_by_deliverer_id($_POST['user']) as $data){
                                                //     $deliverer = $data->id;
                                                // }
                                                if((($invoice->balance)-$cheque)){



                                                    if($steps == 1){
                                                        ?>
                                                        <tr style='border-top:1px solid;'>
                                                            <td colspan="10" style="text-align: left; padding-top: 5px;">

                                                                <?php                                                       
                                                                echo $customer->name . " | " . $customer->address . " | " . $customer->phone ;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }


                                                    ?>
                                                    <tr>
                                                        <td style="text-align:left;"><?php echo $invoice->code; ?></td>
                                                        <td style="text-align: right;"><?php echo $invoice->date_time; ?></td>
                                                        <?php
                                                        $date_time = strtotime($invoice->date_time);
                                                        $date = date("Y-m-d", $date_time);
                                                        $today = date("Y-m-d");
                                                        $date1 = date_create($date);
                                                        $date2 = date_create($today);
                                                        $diff = date_diff($date1, $date2);
                                                        $diff = $diff->format("%a");
                                                        $diff = intval($diff);
                                                        ?>

                                                        <td style="text-align: center;background-color:black;color:white;"><?php echo number_format($invoice->net_amount,2); ?></td>                                                
                                                        <td style="text-align: right;"><?php echo number_format(($invoice->net_amount)-($invoice->balance - $cheque),2); ?></td>

                                                        <?php
                                                        if ($diff <= 45) {
                                                            ?>


                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $one += $invoice->balance-$cheque;
                                                                ?>
                                                            </td>
                                                            <!--<td>0.00</td>-->
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $line_total += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <?php
                                                        } if (45 < $diff && $diff <= 60) {
                                                            ?>
                                                            <!--<td>more 30</td>-->

                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $two += $invoice->balance-$cheque;
                                                                ?>
                                                            </td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $line_total += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <?php
                                                        } if (60 < $diff && $diff <= 75) {
                                                            ?>
                                                            <!--<td>more 60</td>-->

                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>

                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $three += $invoice->balance-$cheque;
                                                                ?>
                                                            </td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $line_total += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <?php
                                                        } if (75 < $diff && $diff <= 90) {
                                                            ?>
                                                            <!--<td>more 60</td>-->

                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>                                                    
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $three1 += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $line_total += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <?php
                                                        } if (90 < $diff) {
                                                            ?>
                                                            <!--<td>more 90</td>-->

                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>
                                                            <td style="text-align: right;">0.00</td>

                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $four += $invoice->balance-$cheque;
                                                                ?>
                                                            </td>
                                                            <td style="text-align: right;">
                                                                <?php
                                                                echo $invoice->balance-$cheque;
                                                                $line_total += ($invoice->balance-$cheque);
                                                                ?>
                                                            </td>
                                                            <?php
                                                        }
                                                        if($steps == $last){
                                                            ?>
                                                            <tr style="color:black;font-weight: 900;">
                                                                <td colspan="4" style="text-align: left;"></td>
                                                                <td style="text-align: right;"><?php echo number_format($one, '2'); ?></td>
                                                                <td style="text-align: right;"><?php echo number_format($two, '2'); ?></td>
                                                                <td style="text-align: right;"><?php echo number_format($three, '2'); ?></td>
                                                                <td style="text-align: right;"><?php echo number_format($three1, '2'); ?></td>
                                                                <td style="text-align: right;"><?php echo number_format($four, '2'); ?></td>
                                                                <td style="text-align: right;"><?php echo number_format($line_total, '2'); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"><hr style="margin: 5px 0px 0px;"/></td>
                                                            </tr>
                                                            <?php
                                                            $tone = $tone + $one;
                                                            $ttwo = $ttwo + $two;
                                                            $tthree = $tthree + $three;
                                                            $tthree1 = $tthree1 + $three1;
                                                            $tfour = $tfour + $four;
                                                            $tline_total = $tline_total + $line_total;

                                                        }

                                                        ++$steps;
                                                    }
                                                    ?>
                                                </tr>

                                                <?php
//                                            $total += $line_total;
                                            // $line_total += $balance;
                                            // $total += $line_total;


                                            }

                                        }
                                    
                                    ?>
                                    <tr style="color:black;font-weight: 900;border:1px solid;">
                                        <td colspan="4" style="text-align: center;">TOTAL</td>
                                        <td style="text-align: right;"><?php echo number_format($tone, '2'); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($ttwo, '2'); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($tthree, '2'); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($tthree1, '2'); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($tfour, '2'); ?></td>
                                        <td style="text-align: right;"><?php echo number_format($tline_total, '2'); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/page content--> 
<?php include 'common/bottom_content.php'; ?>

<script>
    window.onload = function () {
//        $.alert({
//            type: 'red',
//            title: 'Welcome!',
//            content: 'Mahesh!',
//        });
};
</script>