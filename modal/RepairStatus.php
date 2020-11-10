<?php
require_once  __DIR__.'/../util/initialize.php';

class RepairStatus extends DatabaseObject{
    protected static $table_name="repair_status";
    protected static $db_fields=array();
    protected static $db_fk=array();
}
