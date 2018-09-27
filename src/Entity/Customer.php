<?php

namespace RecruitJordi\Entity;

use RecruitJordi\AbstractEntity;

class Customer extends AbstractEntity
{
    private $firstName;

    private $lastName;

    private $address;

    private $twitterAlias;

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $this->db->escape($firstName);
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $this->db->escape($lastName);
    }

    public function setAddress(string $address): void
    {
        $this->address = $this->db->escape($address);
    }

    public function setTwitterAlias(string $twitterAlias): void
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
