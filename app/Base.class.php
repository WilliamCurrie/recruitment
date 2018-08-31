<?php
require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';

class Base {

  protected $_db;

  public function __construct() {
    $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
  }

}

 ?>
