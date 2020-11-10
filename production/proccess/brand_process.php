<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
  $brand = new Brand();
  $brand->name = trim($_POST['name']);

  try {
    $brand->save();
    Activity::log_action("Brand _ saved : ");
    $_SESSION["message"] = "Successfully saved.";
    Functions::redirect_to("../brand_management.php");
  } catch (Exception $exc) {
    $_SESSION["error"] = "Error..! Failed to save.";
    Functions::redirect_to("../brand_management.php");
  }
  
}

if (isset($_POST['update'])) {
    $brand = Brand::find_by_id($_POST['id']);
    $brand->name = trim($_POST['name']);

    try {
        $brand->save();
        Activity::log_action("Brand - updated : ");
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../brand_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../brand_management.php");
    }

}


if (isset($_POST['delete'])) {
    $brand = Brand::find_by_id($_POST["id"]);

    try {
        $brand->delete();
        Activity::log_action("Brand - deleted : ");
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../brand_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../brand_management.php");
    }

}

?>
