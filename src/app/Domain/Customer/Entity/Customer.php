<?php

namespace Wranx\Domain\Customer\Entity;

class Customer
{
    /**
     * @var int
     */
    private $id;
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
    /**
     * @var string
     */
    private $twitter;

    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        string $address = null,
        string $twitter = null
    ) {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->twitter = $twitter;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getTwitterHandle(): ?string
    {
        return $this->twitter;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
