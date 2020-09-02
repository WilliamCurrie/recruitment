<?php

namespace Bff\Models;

use Bff\Helpers\DatabaseHelper;

class Customer
{

    public static $db;
    public $first_name;
    public $last_name;
    public $address;

    public function __construct()
    {
        self::$db = new DatabaseHelper();
    }

    public static function getOurCustomersBySurname()
    {

        //check to see if we have the singleton DB
        if (is_null(self::$db)) {
            self::$db = new DatabaseHelper();
        }

        $res = self::$db->get("customers", " ORDER BY second_name");

        $list = "";
        foreach ($res as $result) {
            $list .= self::formatNames($result['first_name'], $result['second_name']);
        }

        return $list;
    }

    public static function formatNames($first_name, $surname)
    {
        $full_name = "$first_name $surname";
        return $full_name;
    }

    public static function findById(string $id)
    {

        //check to see if we have the singleton DB
        if (is_null(self::$db)) {
            self::$db = new DatabaseHelper();
        }

        $result = self::$db->get("customers", "WHERE id = '$id' LIMIT 1");
        return isset($result[0]) ? $result[0] : null;
    }

    public static function getAllCustomers()
    {

        //check to see if we have the singleton DB
        if (is_null(self::$db)) {
            self::$db = new DatabaseHelper();
        }

        $res = self::$db->get("customers");
        $table = '<table>';
        foreach ($res as $result) {
            $table .= '<tr>';
            $table .= '<td>' . $result['first_name'] . '</ td>';
            $table .= '<td>' . $result['second_name'] . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';
        return $table;
    }

    //Get all the customers from the database and output them

    public function saveCustomer()
    {
        $data = [
            'first_name' => $this->first_name,
            'second_name' => $this->last_name,
            'address' => $this->address
        ];
        $result = self::$db->save('customers', $data);

        return $result;
    }


}

