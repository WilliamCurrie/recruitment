<?php

namespace App\Models;

/**
 * Class Customer
 * @package App\Models
 */
class Customer extends Model
{
    private $tableName = "customers";

    /**
     * Get Full Name
     * @todo We should modify one of the results if its required
     * @param $firstName
     * @param $surname
     * @return string
     */
    private function getCustomerFullname($firstName, $surname)
    {
        return "${firstName} ${surname}";
    }


    /**
     * Create new Customer
     * @param $customerData
     * @return bool
     */
    public function createCustomer(string $firstName, string $lastName, string $address) :bool
    {
        return $this->db->create($this->tableName, ['', $firstName, $lastName, $address], 'isss', 'id,first_name, second_name, address');
    }

    /**
     * Get all customers
     * @return array
     */
    public function getCustomers() :array
    {
        return $this->db->getAll($this->tableName);
    }

    /**
     * Get customer by Surname
     * @param string $surname
     * @return array
     */
    public function getCustomerBySurname(string $surname) :array
    {
        return $this->db->get($this->tableName, 'second_name', $surname);
    }

    /**
     * Get customer by ID
     * @param string $id
     * @return array
     */
    public function getCustomerByID(string $id) :array
    {
        return $this->db->get($this->tableName, "id", $id);
    }
}
