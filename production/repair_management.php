<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';
?>

<!--page content-->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 style="font-weight:800;">Device Repair Management</h3>
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
            <a href="repair.php"><button id="btnNew" type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus"></i> Add New</button></a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Job No</th>
                  <th>Job Date</th>
                  <th>Customer Name</th>
                  <th>Contact Number</th>
                  <th>Device Vendor</th>
                  <th>Device Name & Model</th>
                 <th>Job Cost</th>
                  <th>Repair Status</th>
                  <th>System Date</th>                  
                  <th>Customer Address</th>
                  <th>ID Number</th>              
                  <th>Imei Number & Serial Number</th>
                  <th>Device Location & Number</th>
                  <th>Top View Image</th>
                  <th>Bottom View Image</th>
                  <th>Right View Image</th>
                  <th>Left View Image</th>
                  <th>Front View Image</th>
                  <th>Back view Image</th> 
                  <th>Device Fault</th>               
                  <th>Possible Solution</th>
                  <th>Collected Accessories</th>
                  <th>Comments</th>
                  <th>Products</th>
                   <th>Delivery Date</th>
                  
                  <th>Advanced Payment</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <?php

                foreach(DeviceRepair::find_all() as $data){
                  echo "<tr>";
                  echo "<td>".$data->job_no."</td>";
                  echo "<td>".$data->job_date."</td>";
                  echo "<td>".$data->customer_name."</td>";
                  echo "<td>".$data->contact_no."</td>";
                  echo "<td>".$data->brand_id()->name."</td>";
                  echo "<td>".$data->device_model_id()->name."</td>";
                  echo "<td>".number_format($data->job_cost,2)."</td>";
                 
                  echo "<td>".$data->repair_status()->name."</td>";
                  echo "<td>".$data->system_date."</td>";                  
                  echo "<td>".$data->customer_address."</td>";
                  echo "<td>".$data->id_number."</td>";                
                  echo "<td>".$data->imei_serial."</td>";
                  echo "<td>".$data->location_number()->name."</td>";                  
                  echo "<td><img src='uploads/users/".$data->image_top."' style='width:50px;'></td>";
                  echo "<td><img src='uploads/users/".$data->image_bottom."' style='width:50px;'></td>";
                  echo "<td><img src='uploads/users/".$data->image_right."' style='width:50px;'></td>";
                  echo "<td><img src='uploads/users/".$data->image_left."' style='width:50px;'></td>";
                  echo "<td><img src='uploads/users/".$data->image_front."' style='width:50px;'></td>";
                  echo "<td><img src='uploads/users/".$data->image_back."' style='width:50px;'></td>";

                  
                  echo "<td>";
                  foreach (RepairDeviceFault::find_all_by_device_repair_id($data->id) as $device_fault_data ) {
                    echo $device_fault_data->device_fault_id()->name." <br/> ";
                  }
                  echo "</td>";

                  echo "<td>";
                  foreach (RepairPossibleSolution::find_all_by_possible_solution($data->id) as $possible_solution_data ) {
                    echo $possible_solution_data->possible_solution_id()->name." <br/> ";
                  }
                  echo "</td>";

                   echo "<td>";
                  foreach (RepairCollectedAccessories::find_all_by_collected_accessories($data->id) as $collected_accessories_data ) {
                    echo $collected_accessories_data->collected_accessories()->name." <br/> ";
                  }
                  echo "</td>";

                  echo "<td>".$data->comment."</td>";             

                  echo "<td>".$data->product()->name."</td>";
                   echo "<td>".$data->delivery_date."</td>";
                  
                  echo "<td>".number_format($data->advanced_payment,2)."</td>";
                  
                  echo "<td><a href='repair.php?id=".$data->id."' class='btn btn-primary btn-xs'>Edit</a></td>";
                  echo "<td><a href='repair_print.php?id=".$data->id."' class='btn btn-success btn-xs' target='_blank'>Print</a></td>";
                  echo "</tr>";
                }


                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="x_panel">
          

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'common/bottom_content.php'; ?>

<script>

$('#datatable-responsive').dataTable( {
  "paging": false
} );

</script>
