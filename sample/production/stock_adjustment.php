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
				<div class="x_title">
				  <h2 id="title">Select Location</h2>
				  <button type="button" id="btn_print" class="btn btn-default" style="float: right;"><i class="glyphicon glyphicon-print"></i>  Print</button>

				  <div class="clearfix"></div>
				</div>
				<div class="x_content">
				  <form method="post" action="stock_adjustment.php">

				  <div class="container-fluid divBackTopTable ">

					<div class="form-group col-md-5 col-sm-5 col-xs-5">
					  <label>Location Name :</label>

					  <select class="form-control" name="deliverer_id" >
						<?php
							$deliverer_data = Deliverer::find_all();
							foreach($deliverer_data as $data){

								echo "<option value='".$data->id."'>".$data->name."</option>";

							}
						?>
					  </select>

					</div>



					<div class="form-group col-md-2 col-sm-2 col-xs-2 ">
					  <label>&nbsp;</label>
					  <div class="ui-widget">
						<button type="submit" class="btn btn-default">Show <i class="glyphicon glyphicon-arrow-down"></i></button>
					  </div>
					</div>

				  </form>

				  </div>
				  <br/>

				</div>
			  </div>
			</div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content" id="print_div">

						<?php if(isset($_POST['deliverer_id'])){ ?>
						<form method="post" action="stock_adjustment_process.php">

						<input type="hidden" class="form-control" name="deliverer" value="<?php echo $_POST['deliverer_id']  ?>" />

                        <table id="tblMain" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Deliverer</th>
                                    <th>Product</th>
                                    <th>Batch</th>
                                    <th>Quantity</th>
									 <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $objects = DelivererInventory::find_all_by_deliverer_id($_POST['deliverer_id']);

                                foreach ($objects as $delivererinventory) {
                                    $inventory=$delivererinventory->inventory_id();
                                    ?>
                                    <tr>
                                        <td><?php echo $delivererinventory->deliverer_id()->name ?></td>
                                        <td><?php echo $inventory->product_id()->name ?></td>
                                        <td>
                                            <?php $batch = $inventory->batch_id(); ?>
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="<?php echo "#" . $inventory->batch_id; ?>"><?php echo $batch->code; ?></button>
                                        </td>
                                        <td><?php echo $delivererinventory->qty ?></td>
                                        <td>
                                            <input type="number" class="form-control" name="row<?php echo $delivererinventory->id;  ?>" value="" />
                                        </td>
                                    </tr>
                                    <?php
                                }

                                ?>
                            </tbody>
                        </table>

						<button type="submit" class="btn btn-primary btn-block">UPDATE <i class="glyphicon glyphicon-arrow-down"></i></button>
						</form>
						<?php } ?>
                    </div>
                </div>
                <div class="x_panel">
                    <div onclick="window.location.href:''" class="x_content">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>
    window.onfocus = function () {
//        location.reload();
    };

    $(document).ready(function () {
        $('#tblMain').DataTable({
            "paging": false,
//            "ordering": false,
            "info": false
        });
    });


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
