<?php
require_once __DIR__.'/../util/initialize.php';

class RepairDeviceFault extends DatabaseObject{
    protected static $table_name="repaire_device_fault";
    protected static $db_fields=array();
    protected static $db_fk=array("repair_id"=>"DeviceRepair","device_fault_id"=>"DeviceFault");


    public function repair_id(){
        return parent::get_fk_object("repair_id");
    }

    public function device_fault_id(){
        return parent::get_fk_object("device_fault_id");
    }
//    public $id;
//    public $name;

public static function find_all_by_device_repair_id($value){
    global $database;
    $value=$database->escape_value($value);
    $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE repair_id='$value' ");
    return $object_array;
}

}

?>
