<?php
require_once './../util/initialize.php';

include 'common/upper_content.php';

// if(isset($_GET['id'])){
//     $remainder = Remainder::find_by_id($_GET['id']);
//   } 
?>
<!-- page content -->
<div class="right_col" role="main" style="background-color:white;">
  <div class="">
    <div class="row">

      <div class="row tile_count">

        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count" style="text-align:center;">
          <img src="uploads/png/grn.png" style="width:100px;">
          <span class="count_top"><i class="fa fa-user"></i> PLACE A GRN</span>
          <div class="count"><a href="product_grn.php" style="padding:20px;" class="btn btn-primary btn-block" role="button">ADD PPRODUCT GRN</a></div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count" style="text-align:center;">
          <img src="uploads/png/invoice.png" style="width:100px;">
          <span class="count_top"><i class="fa fa-user"></i> Place A Invoice</span>
          <div class="count"><a href="" style="padding:20px;" class="btn btn-primary btn-block" role="button">ADD INVOICE</a></div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count" style="text-align:center;">
          <img src="uploads/png/payment.png" style="width:100px;">
          <span class="count_top"><i class="fa fa-user"></i> Make A Payment</span>
          <div class="count green"><a href="" style="padding:20px;" class="btn btn-primary btn-block" role="button">ADD PAYMENT</a></div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count" style="text-align:center;">
          <img src="uploads/png/return.png" style="width:100px;">
          <span class="count_top"><i class="fa fa-user"></i> Place A Return</span>
          <div class="count"><a href="" style="padding:20px;" class="btn btn-primary btn-block" role="button">PRODUCT RETURN</a></div>
        </div>


        <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count" style="text-align:center;">
          <img src="uploads/png/login.png" style="width:100px;">
          <span class="count_top"><i class="fa fa-user"></i> Place A Repair</span>
          <div class="count"><a href="repair.php" style="padding:20px;" class="btn btn-primary btn-block" role="button">ADD PRODUCT REPAIR</a></div>
        </div>

         <!-- <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count" style="text-align:center;">
              <p>Delivery Date: <?php echo $remainder->delivery_date; ?></p> 
         </div> -->

         <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 10px;background-color: 199, 90%, 100%" >
          <label style="font-size: 25px;">Remainders For Today</label>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>                                    
                                    <th>Job No</th>
                                    <th>Remainder Date</th>
                                    <th>Comment</th>
                                    

                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $today=date('Y-m-d');
                                $objects = Remainder::find_all_by_date($today);

                                foreach ($objects as $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id ?></td>
                                        <td><?php echo $data->repair_id()->job_no ?></td>
                                        <td><?php echo $data->delivery_date ?></td>
                                         <td><?php echo $data->comment ?></td>

                                       
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

        </div>

      </div>
 
      <div class="page-title">


        <div class="title_right">

        </div>
      </div>


      <div class="clearfix"></div>
      <?php Functions::output_result(); ?>
      <div class="row">




      </div>

    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'common/bottom_content.php'; ?>
