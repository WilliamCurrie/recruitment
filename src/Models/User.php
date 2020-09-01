<?php


namespace Bff\Models;

use Bff\Helpers\DatabaseHelper;


class User
{

    public static $db;

    public function __construct()
    {
        self::$db = new DatabaseHelper();
    }

    public function findById(int $id)
    {

        $result = self::$db->get("users", " WHERE id = '$id' LIMIT 1");

        if (isset($result[0])) {
            $this->first_name = $result[0]['first_name'];
            $this->last_name = $result[0]['second_name'];
            return $result[0];
        }

        return null;
    }
}
