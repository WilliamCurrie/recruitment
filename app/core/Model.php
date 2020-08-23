<?php

namespace App\Models;

use App\Connection\Database;
use App\Connection\MySQLDriver;

/**
 * The base Model upon which all the other models are extended on
 */
class Model
{
    /**
     * The database connection
     * @var Mysql or PostgreSQL
     */
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        switch ($_ENV['DB_TYPE']) {
            case 'mysql': $this->db = new MySQLDriver(); break;
            case 'postgreSQL': break;
            default: $this->db = new MySQLDriver();
        }
    }
}
