<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

if (!(isset($_POST["id"]))) {
  $supplier = new Supplier();
}else{
  $supplier = Supplier::find_by_id($_POST["id"]);
}
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
            <h2 id="title">PRINT BARCODE</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="barcode/barcode.php" method="post" class="form-horizontal form-label-left" target="_blank">
              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="form-group">
                  <label>Product Name:</label>
                  <select class="form-control" name="product_id" required>

                    <?php
                    foreach(Product::find_all() as $data){
                      echo "<option value='".$data->id."'>".$data->name."</option>";
                    }
                    ?>

                  </select>
                </div>

                <div class="form-group">
                  <label>Product Rate:</label>
                  <input type="text" class="form-control" placeholder="Product Rate" name="rate" required="">
                </div>

                <div class="form-group">
                  <label>Print Qty:</label>
                  <input type="text" class="form-control" placeholder="Qty" name="print_qty" required="">
                </div>

                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">

                  <div class=" col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                  </div>

                </div>

              </div>
            </form>
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

};

</script>
