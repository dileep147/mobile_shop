<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $location = new Location();
    $location->name = trim($_POST['name']);

    try {
        $location->save();
        Activity::log_action("Location - saved : ".$location->name);
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../location_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../location_management.php");
    }
}

if (isset($_POST['update'])) {
    $location = Location::find_by_id($_POST['id']);
    $location->name = trim($_POST['name']);
   
    try {
        $location->save();
        Activity::log_action("Location - updated : ".$location->name);
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../location_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../location_management.php");
    }
}


if (isset($_POST['delete'])) {
    $location = Location::find_by_id($_POST["id"]);
    
    try {
        $location->delete();
        Activity::log_action("Location - deleted : ".$location->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../location_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../location_management.php");
    }
}
?>

