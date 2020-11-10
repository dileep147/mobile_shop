<?php
require_once  __DIR__.'/../util/initialize.php';

class DeviceFault extends DatabaseObject{
    protected static $table_name="device_fault";
    protected static $db_fields=array();
    protected static $db_fk=array();
}
