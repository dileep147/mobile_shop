<?php
require_once __DIR__.'/../util/initialize.php';

class Deliverer extends DatabaseObject{
    protected static $table_name="deliverer";
    protected static $db_fields=array(); 
    protected static $db_fk=array("route_id"=>"Route");
            
    public function route_id(){
        return parent::get_fk_object("route_id");
    }        
    
    public static function getNextCode() {
        $auto_increment=parent::getAutoIncrement();
        return $auto_increment;
    }  
}

?>