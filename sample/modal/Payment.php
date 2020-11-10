<?php

require_once __DIR__ . '/../util/initialize.php';

class Payment extends DatabaseObject {

    protected static $table_name = "payment";
    protected static $db_fields = array();
    protected static $db_fk = array("invoice_id" => "Invoice", "payment_method_id" => "PaymentMethod", "payment_status_id" => "PaymentStatus", "user_id" => "User", "payment_type_id"=>"PaymentType");

//    public $id; 
//    public $amount;
//    public $date_time;
//    public $invoice_id;
//    public $payment_method_id;
//    public $invoice_payment_status_id;


    public function payment_method_id() {
        return parent::get_fk_object("payment_method_id");
    }
    
    public function payment_type_id() {
        return parent::get_fk_object("payment_type_id");
    }

    public function payment_status_id() {
        return parent::get_fk_object("payment_status_id");
    }

    public function user_id() {
        return parent::get_fk_object("user_id");
    }

    public static function getNextCode() {
        $auto_increment = parent::getAutoIncrement();
        return $auto_increment;
    }

    public static function find_completed_total_by_invoice_id($value) {
//        global $database;
//        $value = $database->escape_value($value);
        $payments = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE payment_status_id=2");
//        return $object_array;
        
        $total = 0;
        foreach ($payments as $payment) {
            foreach (PaymentInvoice::find_all_by_payment_id($payment->id) as $payment_invoice) {
                if ($payment_invoice->invoice_id == $value) {
                    $total += $payment_invoice->amount;
                }
            }
        }
        return $total;
    }
    
//    public static function find_all_by_customer_id($value){
//        global $database;
//        $value=$database->escape_value(trim($value));
//        $result_array = parent::doQuery("SELECT * from " . self::$table_name . " WHERE invoice.id=payment.invoice_id AND invoice.customer_id='$value' order by invoice.date_time DESC LIMIT 1;");
//        return $result_array[0];
//    }
    
    public static function find_all_by_payment_type_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT payment.* FROM " . self::$table_name . " WHERE payment_type_id='$value'");
        return $object_array;
    }
    
    public static function find_all_by_customer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT payment.* FROM " . self::$table_name . " INNER JOIN payment_invoice ON payment_invoice.payment_id=payment.id INNER JOIN invoice ON payment_invoice.invoice_id=invoice.id WHERE customer_id='$value'");
        return $object_array;
    }
    
    public static function find_all_by_month($value){
        global $database;
        $value=$database->escape_value($value);
        $year=date("Y");
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE YEAR(date_time) = '$year' AND MONTH(date_time) = '$value' ;");
        return $object_array;
    }

}

?>