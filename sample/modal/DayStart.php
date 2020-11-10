<?php
require_once __DIR__.'/../util/initialize.php';

class DayStart extends DatabaseObject{
    protected static $table_name="day_start";
    protected static $db_fields=array();
    protected static $db_fk = array("location_id" => "Deliverer", "user_id" => "User");

    public function location_id() {
        return parent::get_fk_object("location_id");
    }

    public function user_id() {
        return parent::get_fk_object("user_id");

      }
    public static function find_today() {
        global $database;
        $value = date("Y:m:d");
        $object_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE start_date='$value' ");
        return array_shift($object_array);
    }

}

?>
