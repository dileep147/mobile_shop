<?php

require_once __DIR__ . '/../util/initialize.php';

class Allocation extends DatabaseObject {

    protected static $table_name = "allocation";
    protected static $db_fields = array();
    protected static $db_fk = array("repair_id"=>"DeviceRepair","batch_id"=>"Batch");


    
    
    public function repair_id() {
      return parent::get_fk_object("repair_id");
    }
    public function batch_id() {
      return parent::get_fk_object("batch_id");
    }
}

?>
