<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $payment_close = new PaymentClose();
    $payment_close->repair_id = trim($_POST['repair_id']);
    $payment_close->comment = trim($_POST['comment']);
   
    $payment_close->system_date = date("Y-m-d h:i:s");

     if(trim($_POST['type'])=="0"){
         $payment_close->value = trim($_POST['value']);
    }
    else{
         $payment_close->value = trim($_POST['value']*-1);
    }
    
    try {
        $payment_close->save();
        Activity::log_action("PaymentClose - saved : ");
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../payment_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../payment_close_management.php");
    }
}

if (isset($_POST['update'])) {
    $payment_close = PaymentClose::find_by_id($_POST['id']);
    $payment_close->repair_id = trim($_POST['repair_id']);
    
    $payment_close->comment = trim($_POST['comment']);
    $payment_close->system_date = date("Y-m-d H:i:s");

    if(trim($_POST['type'])=="0"){
         $payment_close->value = trim($_POST['value']);
    }
    else{
         $payment_close->value = trim($_POST['value']*-1);
    }
   
    try {
        $payment_close->save();
        Activity::log_action("PaymentClose - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../payment_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../payment_close_management.php");
    }
}


if (isset($_POST['delete'])) {
    $payment_close = PaymentClose::find_by_id($_POST["id"]);
    
    try {
        $payment_close->delete();
        Activity::log_action("PaymentClose - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../payment_close_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../payment_close_management.php");
    }
}
?>

