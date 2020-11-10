<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>
<style>
    .rightalign{
        text-align:right;
    }

    form::after{
        display: inline;
    }
</style>

<!--page content-->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Outstanding Report - AREA WISE</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!--                    <div class="x_title">
                                            <a href="user.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                                            <div class="clearfix"></div>
                                        </div>-->
                    
					<form name="frm_cust" action="outstanding_invoice_customers.php" method="post" style="display: inline;">
                        
						<div class="form-group col-md-3 col-sm-3 col-xs-3">
							
							<select class="form-control" autofocus="" required="" name="slct_route">
								<option value="0"  <?php if (isset($_POST["slct_route"]) and $_POST["slct_route"] == 0) { ?> selected="" <?php } ?>>All Route</option>
								<?php
								$custs = Route::find_all();
								foreach ($custs as $cust) {
									?>
									<option value="<?php echo $cust->id; ?>" <?php if (isset($_POST["slct_route"]) and $_POST["slct_route"] == $cust->id) { ?> selected="" <?php } ?>><?php echo $cust->name; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						
						<div class="form-group col-md-2 col-sm-2 col-xs-2">
						
							<select class="form-control" autofocus="" required="" name="user">
								
								<?php
								$custs = User::find_all();
								foreach ($custs as $cust) {
									?>
									<option value="<?php echo $cust->id; ?>" <?php if (isset($_POST["user"]) and $_POST["user"] == $cust->id) { ?> selected="" <?php } ?>><?php echo $cust->name; ?></option>
									<?php
								}
								?>
							</select>
						
						</div>
						
						<div class="form-group col-md-2 col-sm-2 col-xs-2">
						  
						  
						  <input type="text" id="txtDateTime" name="from" placeholder="yyyy-mm-dd HH:mm:ss" class="form-control" value="" autocomplete="off" required/>
						</div>

						<div class="form-group col-md-2 col-sm-2 col-xs-2">
						 
						  <input type="text" id="txtDateTime2" name="to" placeholder="yyyy-mm-dd HH:mm:ss" class="form-control" value="" autocomplete="off" required/>
						</div>
						
						<div class="form-group col-md-2 col-sm-2 col-xs-2">
							<input class="btn btn-success" type="submit" value="View Report" style="display: inline;"/>
						</div>
						
                    </form>
					
                    <button class="btn btn-default pull-right" id="btn_print" style="display: inline;"><i class="fa fa-print"></i>Print</button>
					<br/>
					<?php if(isset($_POST["slct_route"]) && $_POST["slct_route"] != 0){ ?>
					
						<a class="btn btn-primary pull-left" href=' summary_report.php?slct_route=<?php echo $_POST['slct_route']; ?>&&user=<?php echo $_POST['user']; ?>&&from=<?php echo $_POST['from']; ?>&&to=<?php echo $_POST['to']; ?> ' target='_blank'>Summary Report</a>
					<?php } ?>
                    <div class="x_content" id="div_print">
						
						<?php if(isset($_POST["slct_route"]) && $_POST["slct_route"] != 0){ ?>
						
						<div class='col-sm-7'>
							<p style='font-size:20px;'><u><b>UNIVERSE LANKA MARKETING.</b></u></p>
							<?php if (isset($_POST["slct_route"]) && $_POST["slct_route"] != 0) { ?>
							<p><u>Outstang Sales Summary Report For: <?php echo $_POST['from']; ?> To <?php echo $_POST['to']; ?></u></p>
							<p>For Ref: - <?php $name = User::find_by_id($_POST['user']); echo $name->name; ?></p>
						</div>
						<div class='col-sm-5'>
							Date: <?php echo date("Y-m-d"); ?><br/>
							Time: <?php echo date("h:s:A"); ?>
						</div>
						
						<?php } ?>
						<hr/>
						
						
                        <table class="" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th style="text-align: left;">Invoice Number</th>
                                    <th style="text-align:right;">Date</th>
									<th style="text-align:right;">Invoice Total</th>									
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

                                $customers=array();
                                if (isset($_POST["slct_cust"]) && $_POST["slct_cust"] != 0) {
									$customers[] = Customer::find_by_id($_POST["slct_cust"]);
                                    
                                }else if (isset($_POST["slct_route"]) && $_POST["slct_route"] != 0) {
                                    $customers = Customer::find_by_route_id($_POST["slct_route"]);
                                }else{
                                    $customers = Customer::find_all();
                                }

								
										$tone = 0;
                                        $ttwo = 0;
                                        $tthree = 0;
										$tthree1 = 0;
                                        $tfour = 0;
                                        $tline_total = 0;
								
                                foreach ($customers as $customer) {
									if (isset($_POST["slct_route"]) && $_POST["slct_route"] != 0) {
										$invoices = Invoice::customer_id_pending_range($customer->id,$_POST["from"],$_POST["to"]);
									}else{
										$invoices = Invoice::customer_id_pending($customer->id);
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
											
												foreach(DelivererUser::find_all_by_deliverer_id($_POST['user']) as $data){
													$deliverer = $data->id;
												}
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

												<td style="text-align: right;"><?php echo $date; ?></td>
												
												<td style="text-align: right;"><?php echo number_format($invoice->net_amount,2); ?></td>												
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
                                                        if($invoice->balance-$cheque == 0  || $invoice->balance-$cheque < 0){
                                                        	// echo " need fix";
                                                        	$fix = Invoice::find_by_id($invoice->id);
                                                        	$fix->invoice_status_id = 2;
                                                        	$fix->save();
                                                        }
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
                                                        if($invoice->balance-$cheque == 0  || $invoice->balance-$cheque < 0){
                                                        	// echo " need fix";
                                                        	$fix = Invoice::find_by_id($invoice->id);
                                                        	$fix->invoice_status_id = 2;
                                                        	$fix->save();
                                                        }
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
                                                        if($invoice->balance-$cheque == 0  || $invoice->balance-$cheque < 0){
                                                        	// echo " need fix";
                                                        	$fix = Invoice::find_by_id($invoice->id);
                                                        	$fix->invoice_status_id = 2;
                                                        	$fix->save();
                                                        }
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
                                                        if($invoice->balance-$cheque == 0  || $invoice->balance-$cheque < 0){
                                                        	// echo " need fix";
                                                        	$fix = Invoice::find_by_id($invoice->id);
                                                        	$fix->invoice_status_id = 2;
                                                        	$fix->save();
                                                        }
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
                                                        if($invoice->balance-$cheque == 0  || $invoice->balance-$cheque < 0){
                                                        	// echo " need fix";
                                                        	$fix = Invoice::find_by_id($invoice->id);
                                                        	$fix->invoice_status_id = 2;
                                                        	$fix->save();
                                                        }
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
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/page content-->
<?php include 'common/bottom_content.php'; ?>

<script>

    $('#txtDateTime').datetimepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
    });
	
	$('#txtDateTime2').datetimepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
    });


    $('#btn_print').click(function () {
        //window.print("reservation.php");
        PrintDiv();
    });
    function PrintDiv() {
        var divToPrint = document.getElementById('div_print');
        var popupWin = window.open('', '_blank', 'width=800,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    window.onfocus = function () {
        //location.reload();
    };
</script>
