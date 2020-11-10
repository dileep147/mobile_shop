<?php

require_once __DIR__ . '/../util/initialize.php';

class DeviceRepair extends DatabaseObject {

    protected static $table_name = "device_repair";
    protected static $db_fields = array();
    protected static $db_fk = array("device_model_id" => "DeviceModel","location_number" => "LocationNumber","brand_id" => "Brand","repair_status" => "RepairStatus","product"=>"Product");


    public function device_model_id() {
        return parent::get_fk_object("device_model_id");
    }


    public function location_number() {
      return parent::get_fk_object("location_number");
    }

    public function brand_id() {
      return parent::get_fk_object("brand_id");
    }

    public function repair_status() {
      return parent::get_fk_object("repair_status");
    }
     public function product() {
      return parent::get_fk_object("product");
    }

    public static function find_name_by_job_no($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE job_no='$value'");
        return array_shift($object_array);
    }

   

   public static function find_last_job_no(){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT job_no FROM ".self::$table_name." ORDER BY id DESC LIMIT 1");
        return array_shift($object_array);
    }
    
}

?>
