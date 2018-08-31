<?php

class Base {

  protected $_db;

  public function __construct() {
    $this->_db = new mysqli('database', 'testuser', 'password', 'test', DB_PORT);
  }

}

 ?>
