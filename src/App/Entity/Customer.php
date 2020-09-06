<?php

namespace App\Entity;

class Customer
{
    public $id;
    public $firstName;
    public $secondName;
    public $address;

    function findById(string $id)
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
        mysqli_close ($db);
        return $res;
    }

    public function getFullName(): string
    {
        return "{$this->firstName} {$this->secondName}";
    }

}
