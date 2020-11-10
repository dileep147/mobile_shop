<?php

require_once './../util/initialize.php';

function updatestock($rowid,$qty){

	$data = DelivererInventory::find_by_id($rowid);
	$difference = $qty - $data->qty;	
	$data->qty = $qty;
	$inventoryid = $data->inventory_id;
	$data->save();
	echo $difference;

	$data2 = Inventory::find_by_id($inventoryid);
	$oldqty = $data2->qty;
	$data2->qty = $oldqty + $difference;
	$data2->save();
	
}

$objects = DelivererInventory::find_all_by_deliverer_id($_POST['deliverer']);

//echo $_POST['deliverer'];
foreach ($objects as $delivererinventory) {
	$postdata = "row".$delivererinventory->id;
	if(isset($_POST[$postdata])){
		if($_POST[$postdata] != NULL){
			// echo $_POST[$postdata];
			
			updatestock($delivererinventory->id,$_POST[$postdata]);
			
		}
	}
		
}

header('location:stock_adjustment.php');

?>