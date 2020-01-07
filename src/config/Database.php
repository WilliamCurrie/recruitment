<?php

namespace Src\config;

class Database
{
    public $db;

    public function __construct()
    {
        $this->db = new \mysqli(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASS'),
            getenv('DB_NAME'),
            getenv('DB_PORT')
        );
    }
}
