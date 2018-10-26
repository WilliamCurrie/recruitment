<?php

namespace App\Controllers;

class BaseController
{
    private $database;

    public function __construct()
    {
        $database = new \mysqli(
            getenv("DB_HOST"),
            getenv("DB_USERNAME"),
            getenv("DB_PASSWORD"),
            getenv("DB_NAME"),
            getenv("DB_PORT")
        );

        if ($database->connect_error) {
            die('Connection error:' . $database->connect_error);
        }

        $this->database = $database;
    }

    public function database()
    {
        return $this->database;
    }
}