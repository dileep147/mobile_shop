<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $batch_data = Batch::find_by_id($_POST['batch_id']);
    $allocation = new Allocation();
    $allocation->repair_id = trim($_POST['repair_id']);    
    $allocation->quantity = trim($_POST['quantity']);
    $allocation->price = trim($_POST['price']);
    $allocation->batch_id = trim($_POST['batch_id']);
    
    try {

        $inv_data = Inventory::find_by_batch_id($_POST['batch_id']);
       

        if($inv_data->qty > 0){
            $new_inv_data = $inv_data->qty - $allocation->quantity;
            $inv_data->qty =  $new_inv_data;
            $inv_data->save();
            $allocation->save();
            
        }
        else{
            $_SESSION["error"] = "Error..! You Can't Allocate The Quantity.";
            Functions::redirect_to("../allocation.php");
        }       


        
        Activity::log_action("Allocation - saved : ");
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("../allocation.php");
       
    } catch (Exception $exc) {
        echo "$exc";
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../allocation.php");
    }
}

if (isset($_POST['update'])) {
    $allocation = Allocation::find_by_id($_POST['id']);
    $allocation->repair_id = trim($_POST['repair_id']);
    
    $allocation->quantity = trim($_POST['quantity']);
    $allocation->price = trim($_POST['price']);
    $allocation->batch_id = trim($_POST['batch_id']);
   
    try {
        $allocation->save();
        Activity::log_action("Allocation - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../allocation.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../allocation.php");
    }
}


if (isset($_POST['delete'])) {
    $allocation = Allocation::find_by_id($_POST["id"]);
    
    try {
        $allocation->delete();
        Activity::log_action("Allocation - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../allocation.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../allocation.php");
    }
}
?>

