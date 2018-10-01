<?php

class Customer {

    private $db;

    /**
     * Customer model constructor - connects to the database.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Returns all customers in the database as an array
     * @return array
     */
    public function getCustomers() {
        $this->db->query("SELECT * FROM customers
                          ORDER BY id ASC
                          ");

        return $this->db->getMultipleObjects();
    }

    /**
     * Adds Customer to the database.
     * @param $data - array (first_name, last_name, address,twitter_alias)
     * @return bool - returns true if the SQL statements is executed successfully, false if otherwise.
     */
    public function saveCustomer($data) {
        //Run SQL
        $this->db->query("INSERT INTO customers (first_name, last_name, address,twitter_alias) VALUES(:first_name, :last_name, :address, :twitter_alias)");

        //Bind values
        $this->db->bind(":first_name", $data["first_name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":address", $data["address"]);
        $this->db->bind(":twitter_alias", $data["twitter_alias"]);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * gets customer by ID
     * @param $id - integer.
     * @return bool|mixed - returns SQL row if it exists, else it returns false
     */
    public function getCustomerById($id) {
        //Run query
        $this->db->query("SELECT * FROM customers WHERE id = :id");

        //Bind values
        $this->db->bind(":id", $id);

        $row = $this->db->getSingleObj();

        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Gets Customer by Surname
     * @param $surname - string
     * @return bool|mixed - returns SQL row if it exists, else it returns false
     */
    public function getCustomerBySurname($surname) {
        //Run query
        $this->db->query("SELECT * FROM customers WHERE last_name = :last_name");

        //Bind values
        $this->db->bind(":last_name", $surname);

        $row = $this->db->getSingleObj();

        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

}
