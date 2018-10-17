<?php
define("DB_DATABASE", "test");
define("DB_HOST", "database");
define("DB_USER", "testuser");
define("DB_PASSWORD", "password");
define('DB_PORT', 3306);

require_once($root.'/models/helper.php');
require_once($root.'/models/bookingsModel.php');
require_once($root.'/models/customersModel.php');

class DB{
    var $db = '';
    function init()
    {
      $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
      if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
      }
      return $db;
    }
}

class parentModel{
    public function __construct()
    {
        //Init db
        $init = new DB();
        $this->db = $init->init();

        //Add Helper Funcs
        $this->helper = new helper();
    }
}
