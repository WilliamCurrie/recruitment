<?php

namespace Src\Models;

use Src\config\Database;

class Customer {
    private $db;
    public $title;
    public $first_name;
    public $last_name;
    public $address;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;
    }

    function saveCustomer()
    {
        $this->db->query('INSERT INTO customers (first_name, second_name) VALUES (\''.$this->first_name.'\', \''.$this->last_name.'\', \''.$this->address.'\')');
    }

    function get_our_customers_by_surname()
    {
        $res = $this->db->query('SELECT * FROM customers ORDER BY second_name');
        while($result = $res->fetch_assoc()){
            echo($this->formatNames($result['first_name'], $result['second_name']));
        }
    }

    public static function formatName($first_name, $last_name) {
        return $first_name . ' ' . $last_name;
    }

    function findById(string $id)
    {
        return $this->db->query("SELECT * FROM customers WHERE id = $id")->fetch_object();
    }

    //Get all the customers from the database and output them
    function getAllCustomers()
    {
        return $this->db->query('SELECT * FROM customers');
    }
}
