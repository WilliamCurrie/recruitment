<?php

namespace RecruitJordi;

class Customer
{
    private $firstName;

    private $lastName;

    private $address;

    private $twitterAlias;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $this->db->escape($firstName);
    }

    public function setLastName($lastName)
    {
        $this->lastName = $this->db->escape($lastName);
    }

    public function setAddress($address)
    {
        $this->address = $this->db->escape($address);
    }

    public function setTwitterAlias($twitterAlias)
    {
        $this->twitterAlias = $this->db->escape($twitterAlias);
    }

    public function save()
    {
        $sql = "INSERT INTO customers (first_name, last_name, address, twitter_alias) VALUES (
            '{$this->firstName}',
            '{$this->lastName}',
            '{$this->address}',
            '{$this->twitterAlias}'
        )";

        $this->db->query($sql);
    }
}
