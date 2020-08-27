<?php

namespace App\Models;

use App\Database;

class Customer extends Model
{
    public function getCustomerIds($args = array())
    {
        // args
        $defaultArgs = array(
            'customerId' => NULL
        );
        $args = array_merge($defaultArgs, $args);
        foreach($args as $k=>$v) $$k = $v;

        // sql
        $sql = "SELECT customer_id FROM customers ";
        if (is_numeric($customerId)) $sql .= "WHERE customer_id = :id LIMIT 1";

        // query
        $this->db->query($sql);
        if (is_numeric($customerId)) $this->db->bind(':id', $customerId);
        return $this->db->fetchAllIds();
    }

    public function getCustomerData()
    {
        $sql = "SELECT
                    customer_id AS customerId,
                    first_name AS firstName,
                    second_name AS lastName,
                    _address AS fullAddress,
                    twitter_alias AS twitterAlias
                FROM customers
                WHERE customer_id = :customer_id LIMIT 1";
        $this->db->query($sql);
        $this->db->bind(':customer_id', $this->objectId);
        return $this->db->fetchSingle();
    }

    public function setCustomerData($data)
    {
        $sql = "INSERT INTO customers (customer_id, first_name, second_name, _address, twitter_alias)
                VALUES (:customer_id, :first_name, :second_name, :_address, :twitter_alias)
                ON DUPLICATE KEY UPDATE 
                    first_name = VALUES(first_name),
                    second_name = VALUES(second_name),
                    _address = VALUES(_address),
                    twitter_alias = VALUES(twitter_alias)";
        
        $this->db->query($sql);
        $this->db->bind(':customer_id', ($data['customerId'] ? $data['customerId'] : NULL));
        $this->db->bind(':first_name', $data['firstName']); 
        $this->db->bind(':second_name', $data['lastName']);
        $this->db->bind(':_address', $data['fullAddress']);
        $this->db->bind(':twitter_alias', $data['twitterAlias']);

        return $this->db->execute() ? TRUE : FALSE; 
    }
}
