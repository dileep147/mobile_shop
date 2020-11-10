<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
  $data = new DeviceModel();
  $data->name = trim($_POST['name']);

  try {
    $data->save();
    Activity::log_action("DeviceModel saved - ");
    $_SESSION["message"] = "Successfully saved.";
    Functions::redirect_to("../device_model_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to save.";
    Functions::redirect_to("../device_model_management.php");
  }
}

if (isset($_POST['update'])) {
  $data = DeviceModel::find_by_id($_POST['id']);
  $data->name = trim($_POST['name']);

  try {
    $data->save();
    Activity::log_action("DeviceModel updated - ");
    $_SESSION["message"] = "Successfully updated.";
    Functions::redirect_to("../device_model_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to update.";
    Functions::redirect_to("../device_model_management.php");
  }

}


if (isset($_POST['delete'])) {
    $role = DeviceModel::find_by_id($_POST["id"]);
    
    try {
        $role->delete();
        Activity::log_action("DeviceModel - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../device_model_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../device_model_management.php");
    }
}

?>
