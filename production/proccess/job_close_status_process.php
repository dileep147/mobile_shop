<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $job_close_status = new JobCloseStatus();
    $job_close_status->name = trim($_POST['name']);

    try {
        $job_close_status->save();
        Activity::log_action("JobCloseStatus - saved : ");
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../job_close_status_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../job_close_status_management.php");
    }
}

if (isset($_POST['update'])) {
    $job_close_status = JobCloseStatus::find_by_id($_POST['id']);
    $job_close_status->name = trim($_POST['name']);
   
    try {
        $job_close_status->save();
        Activity::log_action("JobCloseStatus - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../job_close_status_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../job_close_status_management.php");
    }
}


if (isset($_POST['delete'])) {
    $job_close_status = JobCloseStatus::find_by_id($_POST["id"]);
    
    try {
        $job_close_status->delete();
        Activity::log_action("JobCloseStatus - deleted : ".$job_close_status->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../job_close_status_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../job_close_status_management.php");
    }
}
?>

s