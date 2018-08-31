<?php
class Config {
 public function __construct() {
   self::init();
 }

 public function init() {
   //Database
   define('DB_HOST', 'database');
   define('DB_USER', 'testuser');
   define('DB_PASS', 'password');
   define('DB_NAME', 'test');
   define('DB_PORT', 3306);

   //Paths
   define('CONFIG_PATH', dirname($_SERVER["DOCUMENT_ROOT"]) . '/config');
   define('RESOUCES_PATH', dirname($_SERVER["DOCUMENT_ROOT"]) . '/resources');
   define('CSS_PATH', '/css');
   define('JS_PATH', '/js');
 }

}
 ?>
