<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">

      <div class="title_left">
        <h3>Main Inventory Management</h3>
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
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>

                  <th>Date</th>
                  <th>Location</th>
                  <th>Comment</th>
                  <th>Issue</th>
                  <th>Quantity</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>
                <?php

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/page content-->
<?php include './common/bottom_content.php'; ?>

<script>

</script>
