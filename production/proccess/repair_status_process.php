<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
  $repair_status = new RepairStatus();
  $repair_status->name = trim($_POST['name']);

  try {
    $repair_status->save();
    Activity::log_action("RepairStatus saved");
    $_SESSION["message"] = "Successfully saved.";
    Functions::redirect_to("../repair_status_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to save.";
    Functions::redirect_to("../repair_status_management.php");
  }

}

if (isset($_POST['update'])) {
    $repair_status = RepairStatus::find_by_id($_POST['id']);
    $repair_status->name = trim($_POST['name']);

    try {
        $repair_status->save();
        Activity::log_action("RepairStatus - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../repair_status_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../repair_status_management.php");
    }

}


if (isset($_POST['delete'])) {
    $role = RepairStatus::find_by_id($_POST["id"]);

    try {
        $role->delete();
        Activity::log_action("Role - deleted : ".$role->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../repair_status_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../repair_status_management.php");
    }

}

?>
