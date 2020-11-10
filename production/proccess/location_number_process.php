<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
  $location_number = new LocationNumber();
  $location_number->name= trim($_POST['name']);

  try {
    $location_number->save();
    Activity::log_action("Batch saved - ");
    $_SESSION["message"] = "Successfully saved.";
    Functions::redirect_to("../location_number_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to save.";
    Functions::redirect_to("../location_number_management.php");
  }
}

if (isset($_POST['update'])) {
    $location_number = LocationNumber::find_by_id($_POST['id']);
    $location_number->name = trim($_POST['name']);

    try {
        $location_number->save();
        Activity::log_action("Location Number - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../location_number_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../location_number_management.php");
    }
}


if (isset($_POST['delete'])) {
    $role = LocationNumber::find_by_id($_POST["id"]);
    
    try {
        $role->delete();
        Activity::log_action("LocationNumber - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../location_number_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../location_number_management.php");
    }
}
?>
