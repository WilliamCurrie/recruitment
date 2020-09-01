<?php

namespace Bff\Helpers;

use Exception;
use mysqli;

define('DB_PORT', 3306);

class DatabaseHelper
{
    private static $db = null;
    private static $host = '127.0.0.1';
    private static $user = 'root'; //testuser
    private static $password = 'root'; //'password'
    private static $dbname = 'wranx'; // test

    public function __construct()
    {

    }

    public function save($table, array $data)
    {
        $db = self::connection();

        $fields = "";
        $values = "";
        foreach ($data as $field => $value) {
            $fields .= "$field,";
            $values .= "'$value',";
        }
        $fields = trim($fields, ",");
        $values = trim($values, ",");
        $query = "INSERT INTO $table ($fields) VALUES ($values)";

        $result = $db->query($query);
        if ($result === false) {
            throw new Exception(mysqli_error($db));
        }

        return mysqli_insert_id($db);
    }

    private static function connection()
    {
        if (is_null(self::$db)) {
            self::$db = new mysqli(self::$host, self::$user, self::$password, self::$dbname, DB_PORT);
        }
        return self::$db;
    }

    public function get($table, $query = "")
    {
        $db = self::connection();
        $sql = "SELECT * FROM $table $query";

        $res = $db->query($sql);

        if ($res === false) {
            throw new Exception(mysqli_error($db));
        }

        $results = $res->fetch_all(MYSQLI_ASSOC);
        return $results;
    }

    public function __destruct()
    {
        if (!is_null(self::$db)) {
            mysqli_close(self::$db);
            self::$db = null;
        }
    }

}
