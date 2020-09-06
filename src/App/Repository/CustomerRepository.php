<?php

namespace App\Repository;

use App\Entity\Customer;

class CustomerRepository
{
    public function __construct()
    {
        // @todo use a DB layer/ORM etc
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if (!$this->db) {
            throw new \RuntimeException("Couldn't connect to DB");
        }
    }

    /**
     * @throws \RuntimeException on DB error
     */
    public function save(Customer $customer): void
    {
        $res = $this->db->query("
            INSERT INTO customers (first_name, second_name, address)
            VALUES ('{$customer->firstName}', '{$customer->secondName}', '{$customer->address}')
        ");

        if (!$res) {
            throw new \RuntimeException("Failed to save customer: " . $customer->toString());
        }
    }

    /**
     * @returns array of Customer entities
     * @throws \RuntimeException on DB error
     */
    public function getAllCustomers(): array
    {
        $result = $this->db->query('SELECT * FROM customers ORDER BY first_name, second_name');
        $customers = [];
        while ($row = $result->fetch_assoc()) {
            $customer = new Customer();
            $customer->firstName = $row['first_name'];
            $customer->secondName = $row['second_name'];
            $customers[] = $customer;
        }
        return $customers;
    }
}
