<?php
require_once './../util/initialize.php';

$object = ProductReturnInvoice::find_all_notzero();

foreach($object as $object_data){

	if( $object_data->invoice_id()->balance > 0 ){

		$total_payment = 0;
		$paymentObject = PaymentInvoice::find_all_by_invoice_id($object_data->invoice_id);
		foreach( $paymentObject as $paymentData ){
			$payment = Payment::find_by_id($paymentData->payment_id);
			if($payment->payment_method_id == 1){
				$total_payment = $total_payment +  $paymentData->amount;
			}
		}
		$calculatedd = (($object_data->invoice_id()->net_amount) - ($total_payment + $object_data->return_amount));

		if($calculatedd >= 0){
			echo "Invoice ID:".$object_data->invoice_id()->code."<br/>";
			echo "Invoice Total:".$object_data->invoice_id()->net_amount."<br/>";
			
			echo "Paymnets: ".$total_payment."<br/>";
			echo "Returns: ".$object_data->return_amount."<br/>";
			echo "Balance: ".$object_data->invoice_id()->balance."<br/>";


			echo "Paymnets and Returns: ".($total_payment + $object_data->return_amount )."<br/>";

			echo "Calculated Balance: ".$calculatedd."<br/>";

			echo "<br/><br/>";

			$settlement = Invoice::find_by_id($object_data->invoice_id);
			$settlement->balance = $calculatedd;
			if($calculatedd == 0){
				$settlement->invoice_status_id = 2;

			}else if($calculatedd > 0){
				$settlement->invoice_status_id = 1;
			}
			$settlement->save();
		}


	}

}