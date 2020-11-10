<?php

require_once './../../util/initialize.php';


if (isset($_POST["add_invoice_payment"])) {
	$invoice_payment = array();

	$invoice_payment["batch_id"] = $_POST['batch_id'];
	$invoice_payment["qty"] = $_POST['qty'];	

	if (isset($_SESSION["transfer_return_item"])) {
		$_SESSION["transfer_return_item"][] = $invoice_payment;
	} else {
		$_SESSION["transfer_return_item"] = array();
		$_SESSION["transfer_return_item"][] = $invoice_payment;
	}

}


if (isset($_POST["invoice_request"])) {
	header('Content-Type: application/json');

	$filter_id = $_POST["filter_id"];
	$batches;   
	$batches = Batch::find_all_by_product_id($filter_id); 

	echo json_encode($batches);
}


if (isset($_POST["remove_reload"])) {
	header('Content-Type: application/json');
	$index = $_POST["index"];
	$product_return_batch = $_SESSION["transfer_return_item"][$index];
	unset($_SESSION["transfer_return_item"][$index]);
	echo json_encode($product_return_batch);
}


if(isset($_POST['transfer_from']) && isset($_POST['transfer_to'])){
	$from = $_POST['transfer_from'];
	$to = $_POST['transfer_to'];	

	try{

		foreach($_SESSION['transfer_return_item'] as $index => $data){

			$inventory = Inventory::find_by_batch_id($data['batch_id']);

			$from_deliverer = DelivererInventory::find_by_deliverer_id_inventory_id($from,$inventory->id);
			$from_deliverer->qty = $from_deliverer->qty - $data['qty'];
			$from_deliverer->save();

			$to_deliverer = DelivererInventory::find_by_deliverer_id_inventory_id($to,$inventory->id);
			if($to_deliverer){
				$to_deliverer->qty = $to_deliverer->qty + $data['qty'];
				echo "done";
				try{
					$to_deliverer->save();
				}catch (Exception $exc) {
					echo $exc->getMessage();
				}

			}else{
				echo $data['qty']."<br/>";
				$DelivererInventory = new DelivererInventory();
				$DelivererInventory->inventory_id = $inventory->id;
				$DelivererInventory->qty = $data['qty'];
				$DelivererInventory->deliverer_id = $to;
				try{
					$DelivererInventory->save();
				}catch (Exception $exc) {
					echo $exc->getMessage();
				}
			}
		}


		Activity::log_action("Product Return " . $inventory->product_id()->name . " Qty: ".$data['qty']."- Returned ");

		$_SESSION["message"] = "Successfully Transfered.";
		unset($_SESSION["transfer_return_item"]);
		Functions::redirect_to("./../deliverer_inventory_management.php");


	} catch (Exception $exc) {

		$_SESSION["error"] = "Error..! Failed to Transfer.";
		unset($_SESSION["transfer_return_item"]);
		Functions::redirect_to("./../deliverer_inventory_management.php");

	}



}