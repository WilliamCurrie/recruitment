<?php

namespace Wranx;

use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $database = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $charset = DB_COLL;
    private $dsn = null;
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    protected $dbh = null;

    public function __construct()
    {
        try {
            $this->dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->dbh = new PDO($this->dsn, $this->user, $this->password, $this->options);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function __destruct() {
        if($this->dbh) {
            // Close the database handle
            $this->dbh = null;
        }
    }
}