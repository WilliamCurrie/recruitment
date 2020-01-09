<?php

namespace Src\Repos;

use Src\config\Database;
use Src\Models\Customer;

class CustomerRepo
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->db;
    }

    /**
     * Save a customer into the database
     *
     * @param Customer $customer the instantiated Customer class you want to save
     * @return Customer|bool
     */
    public function save(Customer $customer)
    {
        $query = $this->db->prepare('INSERT INTO customers (first_name, second_name, `address`, twitter_alias) VALUES (?, ?, ?, ?)');
        $query->bind_param(
            'ssss',
            $customer->first_name,
            $customer->second_name,
            $customer->address,
            $customer->twitter_alias
        );
        $result = $query->execute();
        $query->close();
        return $result;
    }


    /**
     * Return a list of users. Can be sorted
     *
     * @param string $order_by the column you want to sort by
     * @param string $order the sort direction
     * @return Customer|bool
     */
    public function list($order_by = 'last_name', $order = 'asc')
    {
        $results = $this->db->query("SELECT * FROM customers order by $order_by $order");
        $customers = [];
        foreach ($results as $customer) {
            $customers[] = new Customer($customer);
        }

        return $customers;
    }
    
    /**
     * Find a customer record by id
     *
     * @param int $id the id of the customer youre attempting to find
     * @return Customer|bool
     */
    public function find(int $id)
    {
         // if customer isn't found this'll return false
        $customer = $this->db->query("SELECT * FROM customers WHERE id = $id")->fetch_assoc();

        if ($customer) {
            $customer = new Customer($customer);
        }
        return $customer;
    }
}
