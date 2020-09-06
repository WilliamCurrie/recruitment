<?php

namespace App\Entity;

class Customer
{
    public $title;
    public $firstName;
    public $secondName;
    public $address;

    public function toString(): string
    {
        return "{$this->firstName} {$this->secondName}";
    }

    function get_our_customers_by_surname() {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers ORDER BY second_name');

        while ($result=$res->fetch_assoc()) {
            echo($this->formatNames($result['first_name'], $result['second_name']));
        }
    }

    public function formatNames($firstName, $surname) {
        $full_name = $firstName .= ' ';
        $full_name .= $surname;
        return $full_name;
    }

    function findById(string $id)
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
        mysqli_close ($db);
        return $res;
    }
}
