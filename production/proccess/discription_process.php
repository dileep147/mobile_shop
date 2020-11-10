<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
  $discription = new Discription();
  $discription->discription = trim($_POST['discription']);
  $discription->price_discription = trim($_POST['price_discription']);
  //print_r($discription);
  try {
    $discription->save();
    Activity::log_action("Discription - saved : ");
    $_SESSION["message"] = "Successfully saved.";
    Functions::redirect_to("../discription_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to save.";
    Functions::redirect_to("../discription_management.php");
  }
  
}

if (isset($_POST['update'])) {
    $discription = Discription::find_by_id($_POST['id']);
    $discription->discription = trim($_POST['discription']);
    $discription->price_discription = trim($_POST['price_discription']);

    try {
        $discription->save();
        Activity::log_action("Discription - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../discription_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../discription_management.php");
    }

}


if (isset($_POST['delete'])) {
    $discription = Discription::find_by_id($_POST["id"]);

    try {
        $discription->delete();
        Activity::log_action("Discription - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../discription_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../discription_management.php");
    }

}

?>
