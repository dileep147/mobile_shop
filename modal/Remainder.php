<?php
require_once  __DIR__.'/../util/initialize.php';

class Remainder extends DatabaseObject{
    protected static $table_name="remainder";
    protected static $db_fields=array();
    protected static $db_fk=array("repair_id"=>"DeviceRepair","repair_status"=>"RepairStatus");

    public function repair_id(){
        return parent::get_fk_object("repair_id");
    }

    public function repair_status(){
        return parent::get_fk_object("repair_status");
    }

    public static function find_all_by_date($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE delivery_date='$value' ");
        return $object_array;
    }
}
