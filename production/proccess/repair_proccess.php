<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {

    $device_repair = new DeviceRepair();
    $device_repair->job_no = trim($_POST['job_no']);
    $device_repair->job_date = trim($_POST['job_date']);
    $device_repair->system_date = date("Y-m-d H:i:s");
    $device_repair->customer_name = trim($_POST['customer_name']);
    $device_repair->customer_address = trim($_POST['customer_address']);
    $device_repair->id_number = trim($_POST['id_number']);
    $device_repair->contact_no = trim($_POST['contact_no']);
    $device_repair->delivery_date = trim($_POST['delivery_date']);
    $device_repair->device_model_id = trim($_POST['device_model_id']);
    $device_repair->imei_serial = trim($_POST['imei_serial']);
    $device_repair->location_number = trim($_POST['location_number']);
    $device_repair->brand_id = trim($_POST['brand_id']);
    $device_repair->repair_status = trim($_POST['repair_status']);
    $device_repair->job_cost = trim($_POST['job_cost']);
    $device_repair->advanced_payment = trim($_POST['advanced_payment']);
    $device_repair->comment = trim($_POST['comment']);
    $device_repair->product = trim($_POST['product']);

    if(!empty(DeviceRepair::find_name_by_job_no($device_repair->job_no)->job_no)){
        $_SESSION["error"] = "Oops! Job No. Already In The Database";
        Functions::redirect_to("../repair.php");
        // echo "done";
    } 
    try {
      if (isset($_FILES["files_to_upload1"]["name"]) && !empty($_FILES["files_to_upload1"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name1 = $image_upload->upload_image($_FILES["files_to_upload1"], "./../uploads/users/");
          $device_repair->image_top = $image_name1;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload2"]["name"]) && !empty($_FILES["files_to_upload2"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name2 = $image_upload->upload_image($_FILES["files_to_upload2"], "./../uploads/users/");
          $device_repair->image_bottom = $image_name2;
      } else {
//            $user->image = NULL;3
      }

      if (isset($_FILES["files_to_upload3"]["name"]) && !empty($_FILES["files_to_upload3"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name3 = $image_upload->upload_image($_FILES["files_to_upload3"], "./../uploads/users/");
          $device_repair->image_right = $image_name3;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload4"]["name"]) && !empty($_FILES["files_to_upload4"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name4 = $image_upload->upload_image($_FILES["files_to_upload4"], "./../uploads/users/");
          $device_repair->image_left = $image_name4;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload5"]["name"]) && !empty($_FILES["files_to_upload5"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name5 = $image_upload->upload_image($_FILES["files_to_upload5"], "./../uploads/users/");
          $device_repair->image_front = $image_name5;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload6"]["name"]) && !empty($_FILES["files_to_upload6"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name6 = $image_upload->upload_image($_FILES["files_to_upload6"], "./../uploads/users/");
          $device_repair->image_back = $image_name6;
      } else {
//            $user->image = NULL;
      }


        $device_repair->save();

        $repair_id = DeviceRepair::last_insert_id();

        foreach( DeviceFault::find_all() as $device_fault ){
          $checkid = "device_fault".$device_fault->id;
          if(isset($_POST[$checkid])){

            $new_repair_device_fault =  new RepairDeviceFault();
            $new_repair_device_fault->repair_id = $repair_id;
            $new_repair_device_fault->device_fault_id  = $device_fault->id;
            $new_repair_device_fault->save();

          }
        }

        foreach( PossibleSolution::find_all() as $possile_solution ){
          $checkid = "possible_solution".$possile_solution->id;
          if(isset($_POST[$checkid])){

            $new_repair_possible_solution =  new RepairPossibleSolution();
            $new_repair_possible_solution->repair_id = $repair_id;
            $new_repair_possible_solution->possible_solution_id   = $possile_solution->id;
            $new_repair_possible_solution->save();

          }
        }

        foreach( CollectedAccessories::find_all() as $collected_acc ){
          $checkid = "collected_accessories".$collected_acc->id;
          if(isset($_POST[$checkid])){

            $new_repair_collected_acc =  new RepairCollectedAccessories();
            $new_repair_collected_acc->repair_id = $repair_id;
            $new_repair_collected_acc->collected_accessories   = $collected_acc->id;
            $new_repair_collected_acc->save();

          }
        }


        Activity::log_action("Device Repair - saved");
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../repair_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../repair_management.php");
    }
}

if (isset($_POST['update'])) {
    $device_repair = DeviceRepair::find_by_id($_POST['id']);
    $device_repair->job_no = trim($_POST['job_no']);
    $device_repair->job_date = trim($_POST['job_date']);
    // $device_repair->system_date = trim($_POST['system_date']);
    $device_repair->customer_name = trim($_POST['customer_name']);
    $device_repair->customer_address = trim($_POST['customer_address']);
    $device_repair->id_number = trim($_POST['id_number']);
    $device_repair->contact_no = trim($_POST['contact_no']);
    $device_repair->delivery_date = trim($_POST['delivery_date']);
    $device_repair->device_model_id = trim($_POST['device_model_id']);
    $device_repair->imei_serial = trim($_POST['imei_serial']);
    $device_repair->location_number = trim($_POST['location_number']);
    $device_repair->job_cost = trim($_POST['job_cost']);
    $device_repair->advanced_payment = trim($_POST['advanced_payment']);
    $device_repair->comment = trim($_POST['comment']);
    $device_repair->brand_id = trim($_POST['brand_id']);
    $device_repair->repair_status = trim($_POST['repair_status']);
    $device_repair->product = trim($_POST['product']);

    try {
      if (isset($_FILES["files_to_upload1"]["name"]) && !empty($_FILES["files_to_upload1"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name1 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_top = $image_name1;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload2"]["name"]) && !empty($_FILES["files_to_upload2"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name2 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_bottom = $image_name2;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload3"]["name"]) && !empty($_FILES["files_to_upload3"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name3 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_right = $image_name3;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload4"]["name"]) && !empty($_FILES["files_to_upload4"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name4 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_left = $image_name4;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload5"]["name"]) && !empty($_FILES["files_to_upload5"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name5 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_front = $image_name5;
      } else {
//            $user->image = NULL;
      }

      if (isset($_FILES["files_to_upload6"]["name"]) && !empty($_FILES["files_to_upload6"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name6 = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/users/");
          $device_repair->image_back = $image_name6;
      } else {
//            $user->image = NULL;
      }
        $device_repair->save();

         $repair_id = DeviceRepair::last_insert_id();

        foreach( DeviceFault::find_all() as $device_fault ){
          $checkid = "device_fault".$device_fault->id;
          if(isset($_POST[$checkid])){

            $new_repair_device_fault =  new RepairDeviceFault();
            $new_repair_device_fault->repair_id = $repair_id;
            $new_repair_device_fault->device_fault_id  = $device_fault->id;
            $new_repair_device_fault->save();

          }
        }

        foreach( PossibleSolution::find_all() as $possile_solution ){
          $checkid = "possible_solution".$possile_solution->id;
          if(isset($_POST[$checkid])){

            $new_repair_possible_solution =  new RepairPossibleSolution();
            $new_repair_possible_solution->repair_id = $repair_id;
            $new_repair_possible_solution->possible_solution_id   = $possile_solution->id;
            $new_repair_possible_solution->save();

          }
        }

        foreach( CollectedAccessories::find_all() as $collected_acc ){
          $checkid = "collected_accessories".$collected_acc->id;
          if(isset($_POST[$checkid])){

            $new_repair_collected_acc =  new RepairCollectedAccessories();
            $new_repair_collected_acc->repair_id = $repair_id;
            $new_repair_collected_acc->collected_accessories   = $collected_acc->id;
            $new_repair_collected_acc->save();

          }
        }

        Activity::log_action("Device Repair - updated:");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../repair_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../repair_management.php");
    }
}


if (isset($_POST['delete'])) {
    $device_repair = DeviceRepair::find_by_id($_POST["id"]);

    try {
        $device_repair->delete();
        Activity::log_action("Repair - deleted:");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../repair_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to delete.";
        Functions::redirect_to("../repair_management.php");
    }
}

?>
