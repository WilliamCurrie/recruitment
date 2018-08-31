<?php
class Config {
 public function __construct() {
   self::init();
 }

 public function init() {
   define('DB_PORT', 3306);
 }

 public static function autoload($class_name) {
   require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/app/' . $class_name . '.class.php';
 }

}
$config = new Config();
spl_autoload_register(array('Config','autoload'));
 ?>
