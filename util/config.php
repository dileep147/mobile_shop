<?php

date_default_timezone_set('Asia/Colombo');

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
//    defined("SITE_ROOT")?null:define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'].DS."workspace".DS."leeshya");
//    defined("UTIL_PATH")? null : define("UTIL_PATH", SITE_ROOT.DS."util");
//    defined("MODAL_PATH")? null : define("MODAL_PATH", SITE_ROOT.DS."modal");
//    defined("PRODUCTION_PATH")? null : define("PRODUCTION_PATH", SITE_ROOT.DS."backend".DS."production");

defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "mobile_shop");

// defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
// defined("DB_USER") ? null : define("DB_USER", "root");
// defined("DB_PASS") ? null : define("DB_PASS", "");
// defined("DB_NAME") ? null : define("DB_NAME", "inventory");

//defined("PROJECT_NAME") ? null : define("PROJECT_NAME", "Leeshya Distributors");

?>
