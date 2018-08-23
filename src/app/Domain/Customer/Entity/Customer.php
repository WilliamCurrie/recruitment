<?php

namespace Wranx\Domain\Customer\Entity;

class Customer
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $address;

    public function __construct(string $title, string $firstName, string $lastName, string $address)
    {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
