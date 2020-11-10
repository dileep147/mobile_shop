<?php
require_once  __DIR__.'/../util/initialize.php';

class DeviceModel extends DatabaseObject{
    protected static $table_name="device_model";
    protected static $db_fields=array();
    protected static $db_fk=array();
}
