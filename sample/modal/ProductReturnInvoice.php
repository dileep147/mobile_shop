<?php
require_once  __DIR__."/../util/initialize.php";

class ProductReturnInvoice extends DatabaseObject{
    protected static $table_name="product_return_invoice";
    protected static $db_fields=array(); 
    protected static $db_fk = array("product_return_id" => "ProductReturn", "invoice_id" => "Invoice");

    public function product_return_id() {
        return parent::get_fk_object("product_return_id");
    }
    
    public function invoice_id() {
        return parent::get_fk_object("invoice_id");
    }
    
    public static function find_all_notzero() {
        global $database;
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE return_amount > 0 ");
        return $object_array;
    }

    public static function find_by_product_return_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE product_return_id='$value'");
        return array_shift($object_array);
    }


    public static function find_total_by_invoice_id($value) {

        $payments = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_id='$value' ");

        
        $total = 0;
        foreach ($payments as $payment) {
           $total = $total + $payment->return_amount; 
        }
        
        return $total;
    }
    
    public static function find_all_by_product_return_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE product_return_id='$value'");
        return $object_array;
    }
    
    public static function find_by_invoice_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_id='$value'");
        return array_shift($object_array);
    }
    
    public static function find_all_by_invoice_id($value) {
        global $database;
        $value = $database->escape_value($value);
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE invoice_id='$value'");
        return $object_array;
    }

}

?>