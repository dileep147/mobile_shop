<?php
require_once __DIR__.'/../util/initialize.php';

class InvoiceInventory extends DatabaseObject{
    protected static $table_name="invoice_inventory";
    protected static $db_fields=array(); 
    protected static $db_fk=array("invoice_id"=>"Invoice", "inventory_id"=>"Inventory");
    
//    id, invoice_id, inventory_id, qty, price, unit_discount, net_amount, gross_amount
    
    public function invoice_id(){
        return parent::get_fk_object("invoice_id");
    }
    
    public function inventory_id(){
        return parent::get_fk_object("inventory_id");
    }
    
    public static function find_all_by_invoice_id($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE invoice_id='$value'");
        return $object_array;
    }
    
    public static function find_all_by_inventory_id($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE inventory_id='$value'");
        return $object_array;
    }
    
    public static function find_by_invoice_id_inventory_id($value,$value1){
        global $database;
        $value=$database->escape_value($value);
        $value1=$database->escape_value($value1);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE invoice_id='$value' AND inventory_id='$value1'");
        return array_shift($object_array);
    }
    
    public static function find_all_by_invoice_id_inventory_id($value,$value1){
        global $database;
        $value=$database->escape_value($value);
        $value1=$database->escape_value($value1);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE invoice_id='$value' AND inventory_id='$value1'");
        return array_shift($object_array);
    }
    
}

?>