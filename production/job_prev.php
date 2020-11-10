<?php
require_once './../util/initialize.php';

$job_id = $_REQUEST['job_id'];

$job_data = DeviceRepair::find_by_id($job_id);
$job_payment=PaymentClose::find_by_id($job_id);

?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Contact No</th>
        <th>Imei Number & Serial Number:</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $job_data->id ?></td>
        <td><?php echo  $job_data->customer_name ?></td>
        <td><?php echo $job_data->contact_no ?></td>
        <td><?php echo $job_data->imei_serial ?></td>
       
      </tr>
     
    </tbody>
  </table> 
