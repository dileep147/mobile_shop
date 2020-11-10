<?php
require_once __DIR__.'/../util/initialize.php';

class RepairPossibleSolution extends DatabaseObject{
    protected static $table_name="repair_possible_solution";
    protected static $db_fields=array();
    protected static $db_fk=array("repair_id"=>"DeviceRepair","possible_solution_id"=>"PossibleSolution");

    public function repair_id(){
        return parent::get_fk_object("repair_id");
    }

    public function possible_solution_id(){
        return parent::get_fk_object("possible_solution_id");
    }
  

    public static function find_all_by_possible_solution($value){
        global $database;
        $value=$database->escape_value($value);
        $object_array=self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE repair_id='$value' ");
        return $object_array;
    }
}

?>
