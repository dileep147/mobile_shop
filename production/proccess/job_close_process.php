<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $job_close = new JobClose();
    $job_close->status = trim($_POST['status']);
    $job_close->repair_id = trim($_POST['repair_id']);
    $job_close->comment = trim($_POST['comment']);
   
   


    if(trim($_POST['type'])=="0"){
         $job_close->amount = trim($_POST['amount']);
    }
    else{
         $job_close->amount = trim($_POST['amount']*-1);
    }

    try {
        $job_close->save();
        Activity::log_action("JobClose - saved : ");
        $_SESSION["message"] = "Successfully saved.";
         Functions::redirect_to("../job_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
         Functions::redirect_to("../job_close_management.php");
    }
}

if (isset($_POST['update'])) {
    $job_close = JobClose::find_by_id($_POST['id']);
    $job_close->status = trim($_POST['status']);
    $job_close->repair_id = trim($_POST['repair_id']);
    $job_close->comment = trim($_POST['comment']);
    
    
    if(trim($_POST['type'])=="0"){
         $job_close->amount = trim($_POST['amount']);
    }
    else{
         $job_close->amount = trim($_POST['amount']*-1);
    }
   
    try {
        $job_close->save();
        Activity::log_action("JobClose - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../job_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../job_close_management.php");
    }
}


if (isset($_POST['delete'])) {
    $job_close = JobClose::find_by_id($_POST["id"]);
    
    try {
        $job_close->delete();
        Activity::log_action("JobClose - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../job_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../job_close_management.php");
    }
}
?>

