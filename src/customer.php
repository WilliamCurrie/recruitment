<?php
class Customer
{
    private $db;
    private $firstName;
    private $lastName;

    public function __construct(&$db)
    {
        $this->db = $db; // it's not ideal
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function saveCustomer()
    {
        $sql = "INSERT INTO customers (first_name, second_name) VALUES(:first_name,:last_name)";
        $this->db->prepare($sql)->execute(['first_name' => $this->getFirstName(), 'last_name' => $this->getLastName()]);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM customers WHERE id = :id');
        $stmt->execute(['id' => $id]);
        if($user = $stmt->fetch()) {
            $this->setFirstName($user['first_name']);
            $this->setLastName($user['second_name']);
        }
    }

    public function getAllCustomers($sort = null)
    {
        $order = '';
        if($sort) {
            $order = ' ORDER BY ' . $sort;
        }

        $res = $this->db->query('SELECT * FROM customers' . $order);
        $ret = array();

        while ($row = $res->fetch()) {
            $ret[] = array('firstName' => $row['first_name'], 'lastName' => $row['second_name']);
        }

        return $ret;
    }

    public function getOurCustomersBySurname()
    {
        return $this->getAllCustomers('second_name');
    }
}