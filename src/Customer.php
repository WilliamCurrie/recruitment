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

    public function setFirstName($firstName): void
    {
        $this->firstName = $this->db->escape($firstName);
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $this->db->escape($lastName);
    }

    public function setAddress($address): void
    {
        $this->address = $this->db->escape($address);
    }

    public function setTwitterAlias($twitterAlias): void
    {
        $this->twitterAlias = $this->db->escape($twitterAlias);
    }

    public function save(): bool
    {
        $sql = "INSERT INTO customers (first_name, last_name, address, twitter_alias) VALUES (
            '{$this->firstName}',
            '{$this->lastName}',
            '{$this->address}',
            '{$this->twitterAlias}'
        )";

        return $this->db->query($sql);
    }
}
