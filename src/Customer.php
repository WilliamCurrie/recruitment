<?php

class Customer
{
    public $id;
    public $first_name;
    public $second_name;
    public $address;
    public $twitter_alias;
    private $db;

    public function __construct($db)
    {
        $this->id = null;
        $this->first_name = null;
        $this->second_name = null;
        $this->address = null;
        $this->twitter_alias = null;
        $this->db = $db;
    }

    public function saveCustomer()
    {
        // if both the first_name and second_name attributes are set, proceed to save customer in db
        if (($this->first_name !== null) && ($this->second_name !== null)) {
            $stmt = $this->db->dbc->prepare("INSERT INTO customers (first_name, second_name, address, twitter_alias) VALUES (?, ?, ?, ?)");
            $stmt->execute(array($this->first_name, $this->second_name, $this->address,  $this->twitter_alias));
            $this->id = $this->db->dbc->lastInsertId();
        }
        return $this;
    }

    public function getCustomer(int $id, $db)
    {
        // get specific customer based on customer id, integer value passed as an argument and return array of customer details
        if ($id > 0) {
            $sqlSelect = "SELECT * FROM customers WHERE id = $id";
            $rows = $db->getQuery($sqlSelect);
            $customer = array();
            foreach($rows as $row) {
                $customer[$row['id']]['first_name'] = $row['first_name'];
                $customer[$row['id']]['second_name'] = $row['second_name'];
                $customer[$row['id']]['address'] = $row['address'];
            }
        }
        return (array)$customer;
    }
    
    public function getAllCustomers($db)
    {
        // get all customers and return array of all customer details
        $sqlSelect = "SELECT * FROM customers";
        $rows = $db->getQuery($sqlSelect);
        $customers = array();
        foreach($rows as $row) {
            $customers[$row['id']]['first_name'] = $row['first_name'];
            $customers[$row['id']]['second_name'] = $row['second_name'];
            $customers[$row['id']]['address'] = $row['address'];
        }
        return (array)$customers;
    }

}

?>