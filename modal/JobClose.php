<?php
require_once __DIR__.'/../util/initialize.php';

class JobClose extends DatabaseObject{
    protected static $table_name="job_close";
    protected static $db_fields=array(); 
    protected static $db_fk=array("status" => "JobCloseStatus","repair_id"=>"DeviceRepair");
    
//    public $id;
//    public $name;

    public function status() {
        return parent::get_fk_object("status");
    }
    
    public function repair_id() {
        return parent::get_fk_object("repair_id");
    }
}

?>