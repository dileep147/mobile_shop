<?php
require_once './../util/initialize.php';

include 'common/upper_content.php';

$_SESSION['branch_id'] = 1;

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="page-title">

        <div class="title_left">
          <h3>Hi <?php echo User::find_by_id($_SESSION["user"]["id"])->name; ?></h3>
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
              <h2>Location Operations</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-sm-12 col-xs-12" style="padding-top:50px;">
                <a href="customer.php" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#34495e;"> ADD CUSTOMER </a>
              </div>

              <div class="col-sm-6 col-xs-6" style="padding-top:50px;">
                <a href="product_invoice.php" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#34495e;"> ADD INVOICE </a>
              </div>

              <div class="col-sm-6 col-xs-6" style="padding-top:50px;">
                <a href="product_grn.php" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#34495e;"> ADD GRN </a>
              </div>

              <!-- <div class="col-sm-4 col-xs-6" style="padding-top:50px;">
                <a href="" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#34495e;"> ADD PAYMENT </a>
              </div> -->

              <div class="col-sm-6 col-xs-6" style="padding-top:50px;">
                <a href="" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#f39c12;"> ADD REPAIR </a>
              </div>

              <div class="col-sm-6 col-xs-6" style="padding-top:50px;">
                <a href="" class="btn btn-primary btn-block" style="padding-top:30px;padding-bottom:20px;font-weight:900;background-color:#16a085;"> WARRENTY CHECKER </a>
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





</script>
