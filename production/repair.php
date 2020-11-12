<?php
require_once './../util/initialize.php';
include 'common/upper_content.php';

if (!(isset($_GET["id"]))) {
  $device_repair = new DeviceRepair();
}else{
  $device_repair = DeviceRepair::find_by_id($_GET["id"]);
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
        <div class="x_panel" style="background-color:#ecf0f1;">
          <div class="x_title">
            <h2 id="title" style="font-weight:700;"><?php echo (empty($device_repair->id)) ? 'Add' : 'Edit'; ?> Device Repair:</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="proccess/repair_proccess.php" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" class="form-control" id="txtId" name="id" value="<?php echo $device_repair->id; ?>" />

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Job No: (Last Job Number: <?php echo DeviceRepair::getAutoIncrement() - 1; ?>)</label>
                    <input type="text" class="form-control" placeholder="Job No" name="job_no" value="<?php echo DeviceRepair::getAutoIncrement(); ?>" required autofocus='on'>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Job Date:</label>
                     <input type="date" class="form-control"  id="txtName" name=" job_date" value="<?php echo $device_repair->job_date; ?>" >
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>System Date:</label>
                    <input type="text" class="form-control" placeholder="System Date" name="system_date" value="<?php echo date("Y-m-d H:i:s");   ?>" required disabled>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label>Customer Name:</label>
                    <input class="form-control" name="customer_name" placeholder="Customer Name" value="<?php echo $device_repair->customer_name; ?>" required >
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label>Customer Address:</label>
                    <input class="form-control" name="customer_address"  placeholder="Customer Address" value="<?php echo $device_repair->customer_address; ?>" >
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>ID Number:</label>
                    <input type="text" class="form-control" placeholder="ID Number" name="id_number" value="<?php echo $device_repair->id_number; ?>" >
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Contact Number:</label>
                    <input type="text" class="form-control" placeholder="Contact Number" name="contact_no" value="<?php echo $device_repair->contact_no; ?>" required>
                  </div>
                </div>


                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Delivery Date:</label>
                    <input type="text" id="txtDateTime2" class="form-control" placeholder="Delivery Date" name="delivery_date" value="<?php echo $device_repair->delivery_date; ?>"  autocomplete="off">
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Device Vendor:</label>
                    <!-- <input type="text" class="form-control" placeholder="Delivery Name & Model Number" name="name" value="" required=""> -->
                    <select class="form-control" name="brand_id">
                     
                    <?php
                    foreach(Brand::find_all() as $data){
                      if( $device_repair->brand_id == $data->id ){
                        echo "<option value='".$data->id."' selected>".$data->name."</option>";

                      }else{
                        echo "<option value='".$data->id."'>".$data->name."</option>";

                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Device Name & Model Number:</label>
                    <!-- <input type="text" class="form-control" placeholder="Delivery Name & Model Number" name="name" value="" required=""> -->
                    <select class="form-control" name="device_model_id">
                     
                    <?php
                    foreach(DeviceModel::find_all() as $data){
                      if( $device_repair->device_model_id == $data->id ){
                        echo "<option value='".$data->id."' selected>".$data->name."</option>";

                      }else{
                        echo "<option value='".$data->id."'>".$data->name."</option>";

                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6 ">
                  <div class="form-group">
                    <label>Imei Number & Serial Number:</label>
                    <input type="text" class="form-control" placeholder="Imei Number & Serial Number" name="imei_serial" value="<?php echo $device_repair->imei_serial; ?>" >
                  </div>
                </div>

                 

                <div class="col-md-12 col-sm-12 col-xs-12 ">
                  <div class="form-group">

<!-- update started-->
                    <label>Device Location & Number:</label>
                    <!-- <input type="text" class="form-control" placeholder="Delivery Name & Model Number" name="name" value="" required=""> -->
                    <select class="form-control" name="location_number">
                     
                    <?php
                    foreach(LocationNumber::find_all() as $data){
                      if( $device_repair->location_number == $data->id ){
                        echo "<option value='".$data->id."' selected>".$data->name."</option>";

                      }else{
                        echo "<option value='".$data->id."'>".$data->name."</option>";

                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

              
               
                <div class="form-group">
                <div class="col-md-2">
                    <label>Top view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload1" />
                </div>

                <div class="col-md-2">
                    <label>Bottom view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload2" />
                </div>

                <div class="col-md-2">
                    <label>Right view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload3" />
                </div>

                <div class="col-md-2">
                    <label>Left view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload4" />
                </div>
                <div class="col-md-2">
                    <label>Front view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload5" />
                </div>
                <div class="col-md-2">
                    <label>Back view Image</label>
                    <input id="inpFile" type="file" name="files_to_upload6" />
                </div>



                <!--                                    <div class="col-md-10">
                                                        <button id="btnClearImage" type="button" class="btn btn-block btn-default"><i class="fa fa-close"></i> Clear</button>
                                                    </div>-->
            </div>
<!-- update finished -->

             <div class="col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Repair Status:</label>
                    <!-- <input type="text" class="form-control" placeholder="Delivery Name & Model Number" name="name" value="" required=""> -->
                    <select class="form-control" name="repair_status">
                     
                    <?php
                    foreach(RepairStatus::find_all() as $data){
                      if( $device_repair->repair_status == $data->id ){
                        echo "<option value='".$data->id."' selected>".$data->name."</option>";

                      }else{
                        echo "<option value='".$data->id."'>".$data->name."</option>";

                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>

                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label>Other Comments:</label>
                    <textarea class="form-control" name="comment" ><?php echo $device_repair->comment; ?></textarea>
                  </div>
                </div>

                 <div class="col-md-12 col-sm-12 col-xs-12 ">
                  <div class="form-group">
                    <label>Allocated Device Products:</label>
                    <!-- <input type="text" class="form-control" placeholder="Delivery Name & Model Number" name="name" value="" required=""> -->
                    <select class="form-control" name="product">
                      
                    <?php
                    foreach(Product::find_all() as $data){
                      if( $device_repair->product == $data->id ){
                        echo "<option value='".$data->id."' selected>".$data->name."</option>";

                      }else{
                        echo "<option value='".$data->id."'>".$data->name."</option>";

                      }
                    }
                    ?>
                  </select>
                  </div>
                </div>


                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="form-group">
                    <label>Device Fault:</label>
                    <!-- <textarea class="form-control" name="" ></textarea> -->
                    <br/>
                    <?php
                    foreach(DeviceFault::find_all() as $data){
                      echo ' <label><input type="checkbox" name="device_fault'.$data->id.'"> '.$data->name.'</label>';
                    }
                    ?>
                  </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="form-group">
                    <label>Possible Solution:</label>
                    <!-- <textarea class="form-control" name="" ></textarea> -->
                    <br/>
                    <?php
                    foreach(PossibleSolution::find_all() as $data){
                      echo ' <label><input type="checkbox" name="possible_solution'.$data->id.'"> '.$data->name.'</label>';
                    }
                    ?>
                  </div>
                </div>


                <div class="col-md-4 col-sm-4 col-xs-6" style="min-height:100px;">
                  <div class="form-group">
                    <label>Collected Accessories:</label>
                    <!-- <textarea class="form-control" name=""  rows="7"></textarea> -->
                    <br/>
                    <?php
                    foreach(CollectedAccessories::find_all() as $data){
                      echo ' <label><input type="checkbox" name="collected_accessories'.$data->id.'"> '.$data->name.'</label>';
                    }
                    ?>
                  </div>
                </div>



                <div class="col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Job Cost (LKR):</label>
                    <input type="number" class="form-control" placeholder="JOB COST" name="job_cost" value="<?php echo $device_repair->job_cost; ?>" >
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Advanced Payment (LKR):</label>
                    <input type="number" class="form-control" placeholder="ADVANCED PAYMENT" name="advanced_payment" value="<?php echo $device_repair->advanced_payment; ?>" >
                  </div>
                </div>


                <div class="modal-footer col-md-12 col-sm-12 col-xs-12">

                  <?php if(isset($_GET['id'])){
                    ?>
                    <div class=" col-md-4 col-sm-4 col-xs-12">
                      <button type="submit" name="update" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Update</button>
                    </div>

                    <div class=" col-md-4 col-sm-4 col-xs-12">
                      <button type="submit" name="delete" class="btn btn-block btn-danger"><i class="fa fa-floppy-o"></i> Delete</button>
                    </div>

                    <div class=" col-md-4 col-sm-4 col-xs-12">
                      <a href="#"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
                    </div>

                    <?php
                  }else{
                    ?>
                    <div class=" col-md-6 col-sm-6 col-xs-12">
                      <button type="submit" name="save" class="btn btn-block btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>

                    <div class=" col-md-6 col-sm-6 col-xs-12">
                      <a href="#"><button type="button" name="reset" class="btn btn-block btn-primary"><i class="fa fa-history"></i> Reset</button></a>
                    </div>
                    <?php
                  } ?>





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
    $("#txtDateTime").datetimepicker('setDate', new Date());
    loadForm();
};

$('#txtDateTime').datetimepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
});

$('#txtDateTime2').datetimepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
});


function getErrors() {
    var errors = new Array();
    var element;
    var element_value;

    return errors;
}

function validateForm() {
    var errors = getErrors();
    if (errors === undefined || errors.length === 0) {
        return true;
    } else {
        $.alert({
            icon: 'fa fa-exclamation-circle',
            backgroundDismiss: true,
            type: 'red',
            title: 'Validation error!',
            content: errors.join("</br>")
        });
        return false;
    }
}

$("#btnSave").click(function () {
    var id = <?php echo ($user->id) ? 1 : 0; ?>;

    if (id) {
        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "User", "upd")) {
            FormOperations.confirmSave(validateForm(), "#form", id, null);
        }
    } else {
        if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "User", "ins")) {
            FormOperations.confirmSave(validateForm(), "#form", id, null);
        }
    }
});

$("#btnDelete").click(function () {
//        alert(UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "User", "del"));
    if (UserPrivileges.checkPrivilege("proccess/privileges_authenticate.php", "User", "del")) {
        FormOperations.confirmDelete("#form");
    }
});

</script>
