<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

?>

<!--page content--> 
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				

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
							<form id="form" action="invoice_search_area.php" method="post" class="form-horizontal form-label-left" target="_blank" >
								<div class="col-md-12 col-sm-12 col-xs-12">


									<div class="form-group">
										<select class="form-control selectpicker"  data-live-search="true" name="cusname" required="">
											<!-- <option selected="" disabled="" value="0">Select Deliverer</option> -->
											<?php
											foreach (Route::find_all() as $data) {
												?>
												<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
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

							?>

							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
								<thead>
									<tr>
										<!--<th>ID</th>-->
										<th style="text-align: left;">Invoice Number</th>
										<th style="text-align: left;">Customer Name</th>
										
										<th style="text-align:right;">Date</th>
										<th style="text-align:center;">Invoice Total</th>                                    
										<th style="text-align:right;">Balance</th>
										
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
										$customers[] = Customer::find_by_id($cusname);

									}else {
										$customers = Customer::find_by_route_id($cusname);
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
											$invoices = Invoice::customer_id_all($customer->id);
										}
										$inv_count = count($invoices);
										if ($inv_count != 0) {
											
											$one = 0;
											$two = 0;
											$three = 0;
											$three1 = 0;
											$four = 0;
											$line_total = 0;

											$steps = 1;
											$last = 0;
											
											foreach ($invoices as $invoice) {
												?>
											
												<tr>
													<td><?php echo $invoice->code; ?></td>													
													<td><?php echo $invoice->customer_id()->name; ?></td>													
													<td><?php echo $invoice->date_time; ?></td>													
													<td><?php echo $invoice->net_amount; ?></td>													
													<td><?php echo $invoice->balance; ?></td>													
												</tr>
											<?php
										}

									}
								}
								?>

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

	$('#datatable-responsive').dataTable( {
		"paging": false
	} );

	window.onload = function () {
//        $.alert({
//            type: 'red',
//            title: 'Welcome!',
//            content: 'Mahesh!',
//        });
};
</script>