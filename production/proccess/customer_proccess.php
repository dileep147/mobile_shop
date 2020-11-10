<?php

require_once './../../util/initialize.php';

//function getValidation($dataArray) {
//    $result = array();
//    foreach ($dataArray as $key => $value) {
//        if ($key == "txtName" && ( $value == "" || !Validate::valName($value) )) {
//            $error= "Name invalid";
//            $result['validations'][$key] = $error;
//            $result['errors'][$key] = $error;
//        } else if ($key == "txtPhone" && ( $value == "" || !Validate::valName($value) )) {
//            $error = "Phone invalid";
//            $result['validations'][$key] = $error;
//            $result['errors'][$key] = $error;
//        } else {
//            $result['validations'][$key] = "";
//        }
//    }
//    return $result;
//}

function getValidation($dataArray) {
    $errors = array();
    foreach ($dataArray as $key => $value) {
        if ($key == "txtName" && ( $value == "" || !Validate::valName($value) )) {
            $errors[$key] = "Name invalid";
        } else if ($key == "txtPhone" && ( $value == "" || !Validate::valName($value) )) {
            $errors[$key] = "Phone invalid";
        } else if ($key == "txtEmail" && ( $value == "" || !Validate::valName($value) )) {
            $errors[$key] = "Email";
        } else {
            $errors[$key] = "";
        }
    }
    return $errors;
}

function getErrors($dataArray) {
    $validations = getValidation($dataArray);
    $errors = array();
    foreach ($validations as $key => $value) {
        if ($value != "") {
            $errors[$key] = $value;
        }
    }
    return $errors;
}

if (isset($_POST['defaultElement']) && $_POST['defaultElement'] == "validateSave") {
    $dataArray = $_POST['dataArray'];

    $final_result = array();
    $final_result["validations"] = getValidation($dataArray);
    $final_result["errors"] = getErrors($dataArray);

//    $final_result=getValidation($dataArray);
    if (empty($final_result["errors"])) {
        $customer = new Customer();
        $customer->name = trim($dataArray['txtName']);
        $customer->code = trim($dataArray['txtCode']);
        $customer->phone = trim($dataArray['txtPhone']);
        $customer->email = trim($dataArray['txtEmail']);
        $customer->address = trim($dataArray['txaAddress']);
        $customer->route_id = trim($dataArray['cmbRoute']);

        try {
            $customer->save();
            Activity::log_action("Customer - saved:" . $customer->name);
            $final_result["message"] = "sucsess";
        } catch (Exception $exc) {
//            $final_result["message"] = "Error..! Failed to save.";
            $final_result["message"] = "error";
            $final_result["message"] = $exc;
        }
    } else {
        $final_result["message"] = "val_error";
    }
    echo json_encode($final_result);
}
//////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['save'])) {
    if (Functions::check_privilege_redirect("Customer", "ins", "./../index.php")) {
        $customer = new Customer();
        $customer->name = trim($_POST['name']);
        $customer->code = trim($_POST['code']);
        $customer->phone = trim($_POST['phone']);
        $customer->email = trim($_POST['email']);
        $customer->address = trim($_POST['address']);
        $customer->route_id = trim($_POST['route_id']);
        $customer->balance = trim($_POST['balance']);

        try {
            $customer->save();
            $_SESSION["message"] = "Successfully saved.";
            Activity::log_action("Customer - saved:" . $customer->name);
            Functions::redirect_to("./../customer_management.php");
        } catch (Exception $exc) {
            $_SESSION["error"] = "Error..! Failed to save.";
            Functions::redirect_to("./../customer_management.php");
        }
    }
}

if (isset($_POST['update'])) {
    if (Functions::check_privilege_redirect("Customer", "upd", "./../index.php")) {
        $customer = Customer::find_by_id($_POST['id']);
        $customer->name = trim($_POST['name']);
        $customer->phone = trim($_POST['phone']);
        $customer->email = trim($_POST['email']);
        $customer->address = trim($_POST['address']);
        $customer->route_id = trim($_POST['route_id']);
        $customer->balance = trim($_POST['balance']);

        $customer_payments = CustomerPayment::find_all_by_customer_id($customer->id);
        if (empty($customer_payments)) {
            try {
                $customer->save();
                $_SESSION["message"] = "Successfully updated.";
                Activity::log_action("Customer - updated:" . $customer->name);
                Functions::redirect_to("./../customer_management.php");
            } catch (Exception $exc) {
                $_SESSION["error"] = "Error..! Failed to update.";
                Functions::redirect_to("./../customer_management.php");
            }
        } else {
            $_SESSION["error"] = "Error..! Failed to update - Outstanding can not be update after customer payments done.";
            Functions::redirect_to("./../customer_management.php");
        }
    }
}


if (isset($_POST['delete'])) {
    if (Functions::check_privilege_redirect("Customer", "del", "./../index.php")) {
        $customer = Customer::find_by_id($_POST["id"]);

        try {
            $customer->delete();
            $_SESSION["message"] = "Successfully deleted.";
            Activity::log_action("Customer - deleted:" . $customer->name);
            Functions::redirect_to("./../customer_management.php");
        } catch (Exception $exc) {
            $_SESSION["error"] = "Error..! Failed to deleted.";
            Functions::redirect_to("./../customer_management.php");
        }
    }
}
?>
