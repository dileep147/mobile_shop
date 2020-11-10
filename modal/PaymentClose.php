<?php
require_once __DIR__.'/../util/initialize.php';

class PaymentClose extends DatabaseObject{
    protected static $table_name="payment_close";
    protected static $db_fields=array(); 
    protected static $db_fk=array("repair_id"=>"DeviceRepair");
    
//    public $id;
//    public $name;

     
    public function repair_id() {
        return parent::get_fk_object("repair_id");
    }

  
}

?>