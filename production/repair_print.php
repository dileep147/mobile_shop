<?php
require_once './../util/initialize.php';
  
  if(isset($_GET['id'])){
    $repair_data = DeviceRepair::find_by_id($_GET['id']);
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ISARA COMPUTERS & DJ CLUB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="col-xs-12" style="text-align:center;">
  <h2 style="font-weight:700;">ISHARA COMPUTERS & DJ CLUB - MINUWANGODA</h2>
   <h4 style="font-weight:500;">No. 03 Freedom Park, Sanasa Building, Minuwangoda.</h4>
   <h4 style="font-weight:500;">Tel: 0112-2283525/077-3574425/0766581760</h4>
   <h5 style="font-weight:500;">Email: inthe_dj@yahoo.com,inthe_dj@gmail.com  Web:isharacomputers.blogspot.com</h5>
 </div>

 

 <div class="col-xs-12">

 <table style="width:100%;">
   <?php 
    $s = $repair_data->job_date;
    $dt = new DateTime($s);
    $job_date = $dt->format('Y-m-d');

    $s = $repair_data->delivery_date;
    $dt = new DateTime($s);
    $delivery_date = $dt->format('Y-m-d');


   ?>
   <tr>
     <td style="width:50px;">Job Date.</td>
     <td style="border:1px solid;padding:5px;width:100px;"><?php echo $job_date; ?></td>
     <td style="width:50px;">Job No.</td>
     <td style="border:1px solid;padding:5px;width:100px;"><?php echo $repair_data->job_no; ?></td>
     <td style="width:50px;">Device Details</td>
     <td style="border:1px solid;padding:5px;width:100px;"><?php echo $repair_data->device_model_id()->name; ?></td>
     <td style="width:50px;">Delivery Date</td>
     <td style="border:1px solid;padding-left:5px;width:100px;"><?php echo $delivery_date; ?></td>
   </tr>

   <tr>
     <td>M/S</td>
     <td colspan="5" style="border:1px solid;padding:5px;" ><?php echo $repair_data->customer_name; ?></td>
     <td>Contact No:</td>
     <td style="border:1px solid;padding:5px;"><?php echo $repair_data->contact_no; ?></td>
   </tr>

 </table>
</div>

 




 <div class="col-xs-6">
  <?php  
   echo "Device Faults :";
   echo "<br>";
   
    foreach (RepairDeviceFault::find_all_by_device_repair_id($repair_data->id) as $device_fault_data ) {
        echo $device_fault_data->device_fault_id()->name." <br/> ";
    }
  ?>  
</div>

<br>
    
<div class="col-xs-6">
  <?php  
    echo "Collected Accwssories :";
    echo "<br>";
    
      foreach (RepairCollectedAccessories::find_all_by_collected_accessories($repair_data->id) as $collected_accessories_data ) {
          echo $collected_accessories_data->collected_accessories()->name." <br/> ";
        }
    
        echo "<br>";
    ?>
</div> 

<br>

<div class="col-xs-6" style="font-size:10px;">
  <p>අලුත් වැඩියාව  අවසන් වූ  ජංගම දුරකථන සදහා ඔබට දැනුම්දීමෙන් පසු ඔබ විසින් එය මාස 02ක් ඇතුළත රැගෙන යාමට අපොහොසත් වුවහොත් ඒ සදහා අප ආයතනය විසින් වගකියනු නොලැබේ .</p>

  <p>අලුත් වැඩියාව සදහා දෙනුම්දෙන    අලුත්වැඩියා ගාස්තුව හා ඔබට ජංගම දුරකථනය ආපසු ලබාදෙන දිනය වෙනස්විය හැක .</p> 

  <p>Display හා  Touchpadවලට හැර අප විසින් අලුත් වැඩිය කරන කොටස් සදහා පමණක් දින 7ක් වගකිමක් ඇත.  අලුත් වැඩියාවෙන් පසුව දෝෂ ඇතිනම් දින 2ක් ඇතුලත දන්වන්න පසුව පැමිණිලි බාරගනු නොලැබේ. </p>
</div>

 <div class="col-xs-3" align="center">
    <p>...............................</p>
    <p>Customer Signature</p>
    
    
    <p>...............................</p>
    <p>Authorized Signature</p>
    
 </div>

<div class="col-xs-3" >

    <table style="width:100%;"> 
        <tr style="border:1px solid;">  
            <td style="width:80px;">Job Cost</td>
            <td>: <?php echo number_format($repair_data->job_cost,2); ?></td>
        </tr>

        <tr  style="border:1px solid;">  
            <td>Advanced</td>
            <td>: <?php echo number_format($repair_data->advanced_payment,2); ?></td>
        </tr>

        <tr  style="border:1px solid;">  
            <td>Balance</td>
            <td>: <?php echo number_format(($repair_data->advanced_payment)-($repair_data->job_cost),2); ?></td>
        </tr>
    </table>  

</div>

<br>
<br>





</div>

  

<script type="text/javascript">
  window.print();
</script>
</body>
</html>
