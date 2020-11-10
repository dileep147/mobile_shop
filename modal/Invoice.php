<?php

require_once __DIR__ . '/../util/initialize.php';

class Invoice extends DatabaseObject {

    protected static $table_name = "invoice";
    protected static $db_fields = array();
    protected static $db_fk = array("customer_id" => "Customer", "customer_order_id" => "CustomerOrder", "invoice_id" => "Invoice", "invoice_status_id" => "InvoiceStatus", "invoice_type_id" => "InvoiceType", "user_id" => "User", "invoice_condition_id" => "InvoiceCondition", "deliverer_id" => "Deliverer");

//    public $id; 
//    public $code;
//    public $date_time;
//    public $discount;
//    public $amount;
//    public $balance;
//    public $customer_id;
//    public $customer_order_id;
//    public $invoice_id;
//    public $invoice_status_id;


    public function customer_id() {
        return parent::get_fk_object("customer_id");
    }

    public function customer_order_id() {
        return parent::get_fk_object("customer_order_id");
    }

    public function invoice_id() {
        return parent::get_fk_object("invoice_id");
    }

    public function invoice_status_id() {
        return parent::get_fk_object("invoice_status_id");
    }

    public function invoice_condition_id() {
        return parent::get_fk_object("invoice_condition_id");
    }

    public function invoice_type_id() {
        return parent::get_fk_object("invoice_type_id");
    }

    public function user_id() {
        return parent::get_fk_object("user_id");
    }

    public function deliverer_id() {
        return parent::get_fk_object("deliverer_id");
    }

    public static function getNextCode() {
        $auto_increment = parent::getAutoIncrement();
        return $auto_increment;
    }

    public static function find_by_code($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE code='$value' AND balance>0");
        return array_shift($object_array);
    }

    public static function find_all_desc() {
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " ORDER BY id DESC");
        return $object_array;
    }

    public static function find_all_has_balance() {
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE balance>0");
        return $object_array;
    }

    public static function find_all_by_customer_id_has_balance($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE customer_id='$value' AND balance>0");
        return $object_array;
    }

    public static function find_all_by_customer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE customer_id='$value'");
        return $object_array;
    }

    public static function find_all_by_invoice_type_id_has_balance($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_type_id='$value' AND balance>0");
        return $object_array;
    }

    public static function find_all_by_invoice_type_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_type_id='$value'");
        return $object_array;
    }

    public static function get_recalculated_invoice_by_id($value) {
        $invoice = Invoice::find_by_id($value);
        $invoice_total_payment = Payment::find_completed_total_by_invoice_id($invoice->id);
        $invoice_total_return = ProductReturnInvoice::find_total_by_invoice_id($invoice->id);
        $invoice->balance = ($invoice->net_amount) - ($invoice_total_payment) - ($invoice_total_return);

        if (($invoice->balance) > 0) {
            $invoice->invoice_status_id = 1;
        } else {
            $invoice->invoice_status_id = 2;
        }

        return $invoice;
    }

    public static function customer_id_pending($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_status_id=1 AND customer_id=" . $value);
        return $object_array;
    }

    public static function customer_id_all($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE customer_id=" . $value);
        return $object_array;
    }
	
	public static function customer_id_pending_range($value,$value2,$value3) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_status_id=1 AND customer_id=". $value." AND date_time BETWEEN '".$value2."' AND '".$value3."'");
        return $object_array;
    }

    public static function user_invoices_pending($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_status_id=1 AND user_id=" . $value);
        return $object_array;
    }

    public static function invoices_pending_by_cust_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_status_id=1 AND customer_id=" . $value);
        return $object_array;
    }

    ///////////////////////////////////////////////////////////////////////////
    public static function find_all_by_user_id($value1, $value2, $value3) {
        global $database;
        $value1 = $database->escape_value($value1);
        $value2 = $database->escape_value($value2);
        $value3 = $database->escape_value($value3);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE user_id='$value1' AND date_time BETWEEN '$value2' AND '$value3'");
        return $object_array;
    }

    public static function find_all_outstandings_by_customer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE balance>0 AND customer_id='$value'");
        return $object_array;
    }

    public static function find_outstanding_sum_by_customer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $result = $database->doQuery("SELECT SUM(balance) FROM " . self::$table_name . " WHERE balance>0 AND customer_id='$value'");
//        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE balance>0 AND customer_id='$value'");
        return $result;
    }

    public static function find_amount_sum_by_customer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $result = $database->doQuery("SELECT SUM(net_amount) FROM " . self::$table_name . " WHERE customer_id='$value'", "fetch_array");
//        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE balance>0 AND customer_id='$value'");
        return $result;
    }

//    public static function find_last_recode_by_customer_id($value){
//        global $database;
//        $value=$database->escape_value(trim($value));
//        $result_array = parent::doQuery("SELECT invoice.date_time, payment.date_time FROM invoice JOIN invoice_payment WHERE invoice.id= payment.invoice_id AND invoice.customer_id='$value' order by invoice.date_time DESC LIMIT 1;");
//        return $result_array[0];
//    }
//    
//    public static function find_last_invoice_by_customer_id($value){
//        global $database;
//        $value=$database->escape_value(trim($value));
//        $result_array = parent::doQuery("SELECT * from invoice WHERE invoice.id=payment.invoice_id AND invoice.customer_id='$value' order by invoice.date_time DESC LIMIT 1;");
//        return $result_array[0];
//    }

    public static function find_all_by_date_range($value, $value1) {
        global $database;
        $value = $database->escape_value($value);
        $value1 = $database->escape_value($value1);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE date_time BETWEEN '$value' AND '$value1'");
        return $object_array;
    }

    public static function find_all_by_product_id_date_range($product_id, $from, $to) {
        global $database;
        $product_id = $database->escape_value($product_id);
        $from = $database->escape_value($from);
        $to = $database->escape_value($to);
        $object_array = self::find_by_sql("SELECT invoice.* FROM " . self::$table_name . " INNER JOIN invoice_inventory ON invoice_inventory.invoice_id=invoice.id INNER JOIN inventory ON invoice_inventory.inventory_id=inventory.id INNER JOIN batch ON inventory.batch_id=batch.id WHERE batch.product_id='$product_id' AND invoice.date_time  BETWEEN '$from' AND '$to' ORDER BY invoice.date_time ASC");
        return $object_array;
    }

    public static function find_all_by_month($value) {
        global $database;
        $value = $database->escape_value($value);
        $year = date("Y");
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE YEAR(date_time) = '$year' AND MONTH(date_time) = '$value' ;");
        return $object_array;
    }
    
    public static function find_all_by_deliverer_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE deliverer_id='$value'");
        return $object_array;
    }

}