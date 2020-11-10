<?php
require_once __DIR__.'/../util/initialize.php';

class RepairCollectedAccessories extends DatabaseObject{
    protected static $table_name="repair_collected_accessories";
    protected static $db_fields=array();
    protected static $db_fk=array("repair_id"=>"DeviceRepair","collected_accessories"=>"CollectedAccessories");

    public function repair_id(){
        return parent::get_fk_object("repair_id");
    }

    public function collected_accessories(){
        return parent::get_fk_object("collected_accessories");
    }

//    public $id;
//    public $name;

public static function find_all_by_collected_accessories($value){
    global $database;
    $value=$database->escape_value($value);
    $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE repair_id='$value' ");
    return $object_array;
}
}

?>
