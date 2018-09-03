<?php
require_once __DIR__ . '/../config/Config.class.php';

class Base {

  protected $_db;

  public function __construct($isTest = false) {
    new Config();
    if(!$isTest) {
      $this->connectToDB();
    }
  }

  public function connectToDB() {
    $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        error_log('Error connecting to database');
        exit();
    }
  }

  public function sanitise($input)
  {
    if(get_magic_quotes_gpc())
    {
      //Remove slashes that were used to escape characters in post.
      $input = stripslashes($input);
    }
    //Remove ALL HTML tags to prevent XSS and abuse of the system.
    $input = strip_tags($input);
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
    return str_replace($search, $replace, $input);
  }

}

?>
