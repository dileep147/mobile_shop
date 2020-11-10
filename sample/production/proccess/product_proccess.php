<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $product = new Product();
    $product->name = trim($_POST['name']);
    $product->code = trim($_POST['code']);
    $product->category_id = trim($_POST['category_id']);
    $product->roq = trim($_POST['roq']);
    $product->max_qty = trim($_POST['max_qty']);
    $product->min_qty = trim($_POST['min_qty']);
    $product->warrenty_period = trim($_POST['warrenty_period']);
    try {

      if (isset($_FILES["files_to_upload"]["name"]) && !empty($_FILES["files_to_upload"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/products/");
          $product->image = $image_name;
      } else {
           $product->image = NULL;
      }

        $product->save();
        Activity::log_action("Product - saved : ".$product->name);
        $_SESSION["message"] = "Successfully saved.";
        Functions::redirect_to("./../product_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("./../product_management.php");
    }
}

if (isset($_POST['update'])) {
    $product = Product::find_by_id($_POST['id']);
    $product->name = trim($_POST['name']);
    $product->code = trim($_POST['code']);
    $product->category_id = trim($_POST['category_id']);
    $product->roq = trim($_POST['roq']);
    $product->max_qty = trim($_POST['max_qty']);
    $product->min_qty = trim($_POST['min_qty']);
    $product->warrenty_period = trim($_POST['warrenty_period']);
    try {
      if (isset($_FILES["files_to_upload"]["name"]) && !empty($_FILES["files_to_upload"]["name"])) {
          $image_upload = new ImageUpload();
          $image_name = $image_upload->upload_image($_FILES["files_to_upload"], "./../uploads/products/");
          $product->image = $image_name;
      }
        $product->save();
        Activity::log_action("Product - updated : ".$product->name);
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("./../product_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../product_management.php");
    }
}


if (isset($_POST['delete'])) {
    $product = Product::find_by_id($_POST["id"]);

    try {
        $product->delete();
        Activity::log_action("Product - deleted : ".$product->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("./../product_management.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to delete.";
        Functions::redirect_to("./../product_management.php");
    }
}
?>
