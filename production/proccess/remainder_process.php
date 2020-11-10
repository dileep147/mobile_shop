<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $remainder = new Remainder();
    $remainder->delivery_date = trim($_POST['delivery_date']);
    $remainder->repair_id = trim($_POST['repair_id']);
    $remainder->comment = trim($_POST['comment']);
    $remainder->repair_status = trim($_POST['repair_status']);
    // $remainder->customer = trim($_POST['customer']);
    try {
        $remainder->save();
        Activity::log_action("Remainder - saved : ");
        $_SESSION["message"] = "Successfully saved.";
       Functions::redirect_to("../remainder_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
       Functions::redirect_to("../remainder_management.php");
    }
}

if (isset($_POST['update'])) {
    $remainder = Remainder::find_by_id($_POST['id']);
    $remainder->delivery_date = trim($_POST['delivery_date']);
    $remainder->repair_id = trim($_POST['repair_id']);
    $remainder->comment = trim($_POST['comment']);
    $remainder->repair_status = trim($_POST['repair_status']);
    // $remainder->customer = trim($_POST['customer']);
   
    try {
        $remainder->save();
        Activity::log_action("Remainder - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../remainder_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../remainder_management.php");
    }
}


if (isset($_POST['delete'])) {
    $remainder = Remainder::find_by_id($_POST["id"]);
    
    try {
        $remainder->delete();
        Activity::log_action("Remainder - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../remainder_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../remainder_management.php");
    }
}
?>

