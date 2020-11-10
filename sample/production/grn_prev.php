<?php
require_once './../util/initialize.php';

if (isset($_GET["id"])) {
  $id= Functions::custom_crypt($_GET["id"], 'd');
  if($grn = GRN::find_by_id($id)){

  }else{
    Session::set_error("Entry not available...");
    Functions::redirect_to("./grn_management.php");
  }
}else{
  Functions::redirect_to("./grn_management.php");
}


include 'common/upper_content.php';
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>GRN</h3>
      </div>

      <div class="title_right">
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" id="div_to_print">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>GRN<small><?php echo ProjectConfig::$project_name ?></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <section class="content grn">

              <!-- info row -->
              <div class="row grn-info">

                <div class="col-sm-4 grn-col">
                  <b style="font-size:15px;">GRN No : <?php echo $grn->code; ?> </b> <br>
                  <b style="font-size:15px;">User(GRN): <?php echo $grn->user_id()->name; ?></b>

                  <br>

                  <hr/>

                  <?php
                  if ($grn->purchase_order_id) {
                    ?>
                    <b>Purchase Order ID: </b> <?php echo $grn->purchase_order_id()->code; ?> <br>
                    <b>User(Purchase Order): </b> <?php echo $grn->purchase_order_id()->user_id()->name; ?>
                    <br>
                    <?php
                  }
                  ?>

                </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table">


                  <?php

                  if($grn->grn_type_id()->name == "Product"){?>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Barcodes</th>
                          <th>Batch</th>
                          <th>Qty</th>
                          <th>Unit Cost</th>
                          <th>Wholesale</th>
                          <th>Retail</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $cost_total =0;
                        $wholesale_total = 0;
                        $retail_total = 0;
                        foreach ( GRNProduct::find_all_by_grn_id($grn->id) as $product) {
                          $batch = $product->batch_id();

                          $cost_total +=$batch->cost;
                          $wholesale_total +=$batch->wholesale_price;
                          $retail_total += $batch->retail_price;
                          ?>
                          <tr>
                            <td><?= $product->batch_id()->product_id()->name ?></td>
                            <td>
                              <?= $product->barcode; ?>
                            </td>
                            <td><?= $product->batch_id()->code ?></td>
                            <td><?= $product->qty ?></td>
                            <td><?= number_format($batch->cost,2) ?></td>
                            <td><?= number_format($batch->wholesale_price,2) ?></td>
                            <td><?= number_format($batch->retail_price,2) ?></td>

                          </tr>


                        <?php }?>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><h5><b>Total</b></h5></td>
                          <td style="font-weight: bolder;border-bottom: 1px double gray;border-top:1px double gray;"><h5><?=number_format($cost_total,2)?></h5></td>
                          <td style="font-weight: bolder;border-bottom: 1px double gray;border-top:1px double gray;"><h5><?=number_format($wholesale_total,2)?></h5></td>
                          <td style="font-weight: bolder;border-bottom: 1px double gray;border-top: 1px double gray;"><h5><?=number_format($retail_total,2)?></h5></td>
                        </tr>
                      </tbody>
                    </table>
                  <?php }
                  ?>


                  <?php

                  if($grn->grn_type_id()->name == "Material"){?>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Material</th>
                          <th>Volume/Qty</th>
                          <th>Unit Price</th>
                          <th>Line Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $total = 0;
                        $line_total=0;
                        foreach ( GRNMaterial::find_all_by_grn_id($grn->id) as $material) {
                          $line_total += ($material->volume)*($material->unit_price);
                          $total += $line_total;
                          ?>
                          <tr>
                            <td><?= $material->material_id()->name ?></td>
                            <td><?= $material->volume ?></td>
                            <td><?= number_format($material->unit_price,2) ?></td>
                            <td><?= number_format($line_total,2) ?></td>

                          </tr>



                        <?php } ?>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td style="font-weight: bolder;border-bottom: 1px double gray;border-top:1px double gray;"><h4>Total</h4></td>
                          <td style="font-weight: bolder;border-bottom: 1px double gray;border-top: 1px double gray;"><h4><?=number_format($total,2)?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                  <?php }
                  ?>



                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- this row will not appear when printing -->

            </section>
          </div>
        </div>
      </div>
    </div>
    <div class="x_panel">
      <div class="row no-print">
        <div class="col-xs-12">
          <button class="btn btn-default" id="btn_grn_print"><i class="fa fa-print"></i> Print</button>
          <!--                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
          <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'common/bottom_content.php'; ?>

<script>
$('#btn_grn_print').click(function () {
  //            window.print("reservation.php");
  PrintDiv();
});

function PrintDiv() {
  var divToPrint = document.getElementById('div_to_print');
  var popupWin = window.open('', '_blank', 'width=800,height=500');
  popupWin.document.open();
  popupWin.document.write('<html><head><link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
  popupWin.document.close();
}
</script>
