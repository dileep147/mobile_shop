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
                <h3>Summary Report</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="font-size:10px;">
                <div class="x_panel">
                    <!--                    <div class="x_title">
                                            <a href="user.php" target="_blank"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
                                            <div class="clearfix"></div>
                                        </div>-->
                    
					
					
                    <button class="btn btn-default pull-right" id="btn_print" style="display: inline;"><i class="fa fa-print"></i>Print</button>
					
					
                    <div class="x_content" id="div_print">
						
						<?php if(isset($_GET["slct_route"]) && $_GET["slct_route"] != 0){ ?>
						
						<div class='col-sm-7'>
							<p style='font-size:20px;'><u><b>UNIVERSE LANKA MARKETING.</b></u></p>
							<?php if (isset($_GET["slct_route"]) && $_GET["slct_route"] != 0) { ?>
							<p><u>Outstang Sales Summary Report For: <?php echo $_GET['from']; ?> To <?php echo $_GET['to']; ?></u></p>
							<p>For Ref: - <?php $name = User::find_by_id($_GET['user']); echo $name->name; ?></p>
						</div>
						<div class='col-sm-5'>
							Date: <?php echo date("Y-m-d"); ?><br/>
							Time: <?php echo date("h:s:A"); ?>
						</div>
						
						<?php } ?>
						<hr/>
						
						
                        
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
								
								
								$lessforty = [];
								$forty = [];
								$sixty = [];
								$seventy = [];
								$ninty = [];

								$cuscount = [];


                                $customers=array();
                                if (isset($_GET["slct_cust"]) && $_GET["slct_cust"] != 0) {
									$customers[] = Customer::find_by_id($_GET["slct_cust"]);
                                    
                                }else if (isset($_GET["slct_route"]) && $_GET["slct_route"] != 0) {
                                    $customers = Customer::find_by_route_id($_GET["slct_route"]);
                                }else{
                                    $customers = Customer::find_all();
                                }


                                foreach ($customers as $customer) {
									if (isset($_GET["slct_route"]) && $_GET["slct_route"] != 0) {
										$invoices = Invoice::customer_id_pending_range($customer->id,$_GET["from"],$_GET["to"]);
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
										$steps = 0;
										
										
										
										
                                        foreach ($invoices as $invoice) {
											//$ret = ret($invoice->id);
											$ret = 0;
											$cheque = chq($invoice->id);
											$deliverer = NULL;
											
											foreach(DelivererUser::find_all_by_deliverer_id($_GET['user']) as $data){
												$deliverer = $data->id;
											}
											if((($invoice->balance)-$cheque)){
												$date_time = strtotime($invoice->date_time);
												$date = date("Y-m-d", $date_time);
												$today = date("Y-m-d");
												$date1 = date_create($date);
												$date2 = date_create($today);
												$diff = date_diff($date1, $date2);
												$diff = $diff->format("%a");
												$diff = intval($diff);
												$bal = $invoice->balance-$cheque;

												

												if ($diff <= 45) {
													$lessforty[] = ['name' => $customer->name, 'amount' => $bal ];	
													$cuscount[] = ['id'=>$customer->id];

												} if (45 < $diff && $diff <= 60) {
													$forty[] = ['name' => $customer->name, 'amount' => $bal ];	
													$cuscount[] = ['id'=>$customer->id];
																											
												} if (60 < $diff && $diff <= 75) {
													$sixty[] = ['name' => $customer->name, 'amount' => $bal ];	
													$cuscount[] = ['id'=>$customer->id];
																										
												} if (75 < $diff && $diff <= 90) {
													$seventy[] = ['name' => $customer->name, 'amount' => $bal ];
													$cuscount[] = ['id'=>$customer->id];
														
												} if (90 < $diff) {
													$ninty[] = ['name' => $customer->name, 'amount' => $bal ];
													$cuscount[] = ['id'=>$customer->id];
												}											
											
											++$steps;
											}
										
                                        }
                                        
                                    }
                                }
								if(count($ninty)>0){
									?>
									<div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Over 90 days Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											$total = 0;
												foreach($ninty as $data){
													echo "<div class='col-xs-7' style='font-size:10px;'>".$data['name']."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".number_format($data['amount'],2)."</div>";
													$total = $total + $data['amount'];
												}
											?>
											<div class='col-xs-6' style='font-weight:900;'>TOTAL: </div>
											<div class='col-xs-6' style='font-weight:900;'><?php echo number_format($total,2); ?></div>
										</div>
									</div>
									<?php
								}
								if(count($seventy)>0){
									?>
									<div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Over 75 days Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											$total = 0;
												foreach($seventy as $data){
													echo "<div class='col-xs-7' style='font-size:10px;'>".$data['name']."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".number_format($data['amount'],2)."</div>";
													$total = $total + $data['amount'];
												}
											?>
											<div class='col-xs-6' style='font-weight:900;'>TOTAL: </div>
											<div class='col-xs-6' style='font-weight:900;'><?php echo number_format($total,2); ?></div>
										</div>
									</div>
									<?php
								}
								if(count($sixty)>0){
									?>
									<div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Over 60 days Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											$total = 0;
												foreach($sixty as $data){
													echo "<div class='col-xs-7' style='font-size:10px;'>".$data['name']."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".number_format($data['amount'],2)."</div>";
													$total = $total + $data['amount'];
												}
											?>
											<div class='col-xs-6' style='font-weight:900;'>TOTAL: </div>
											<div class='col-xs-6' style='font-weight:900;'><?php echo number_format($total,2); ?></div>
										</div>
									</div>
									<?php
								}
								if(count($forty)>0){
									?>
									<div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Over 45 days Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											$total = 0;
												foreach($forty as $data){
													echo "<div class='col-xs-7' style='font-size:10px;'>".$data['name']."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".number_format($data['amount'],2)."</div>";
													$total = $total + $data['amount'];
												}
											?>
											<div class='col-xs-6' style='font-weight:900;'>TOTAL: </div>
											<div class='col-xs-6' style='font-weight:900;'><?php echo number_format($total,2); ?></div>
										</div>
									</div>
									<?php
								}
								if(count($lessforty)>0){
									?>
									<div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Less Than 45 days Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											$total = 0;
												foreach($lessforty as $data){
													echo "<div class='col-xs-7' style='font-size:10px;'>".$data['name']."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".number_format($data['amount'],2)."</div>";
													$total = $total + $data['amount'];
												}
											?>
											<div class='col-xs-6' style='font-weight:900;'>TOTAL: </div>
											<div class='col-xs-6' style='font-weight:900;'><?php echo number_format($total,2); ?></div>
										</div>
									</div>
									<?php
								}
								
                                ?>

                                <div class='col-xs-6' style="border:1px solid; padding: 5px;">
										<div class='col-xs-12' style='background-color:black;color:white;font-size:15px;'>Over 02 Time Outstanding</div>
										<div class='col-xs-12'>
											<?php 
											foreach(Customer::find_all() as $data){

												// print_r($cuscount);

												$cusc = 0;
												foreach($cuscount as $data1){
													if($data1['id'] == $data->id){
														$cusc = $cusc +1;
													}
												}


												if( $cusc > 2 ){
													// echo "Cus ID: ".$data->id."Count: ".$cusc."<br>";

													echo "<div class='col-xs-7' style='font-size:10px;'>".$data->name."</div>";
													echo "<div class='col-xs-5' style='font-size:10px;'>".$cusc."</div>";
												}
											}
											?>
											
										</div>
									</div>

                                <tr style='font-size:20px;'>
                                    <!-- <td style="text-align: left;">Total</td> -->
                                    <!-- <td colspan="6" style="text-align: right;"><?php echo number_format($total, '2'); ?> LKR</td> -->
                                </tr>
                           
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
        popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    window.onfocus = function () {
        //location.reload();
    };
</script>
