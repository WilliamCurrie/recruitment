<?php

namespace App\Entities;

use Doctrine\Common\Collections\Collection;
use App\Entities\Contracts\CustomerContract;
use Doctrine\Common\Collections\ArrayCollection;

class Customer implements CustomerContract
{
    private $id;

    private $firstName;

    private $surname;

    private $address;

    private $twitterAlias;

    private $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . ' ' . $this->getSurname();
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getTwitterAlias(): ?string
    {
        return $this->twitterAlias;
    }

    public function setTwitterAlias(string $twitterAlias): self
    {
        $this->twitterAlias = $twitterAlias;
        return $this;
    }

    public function getBookings(): Collection
    {
        return $this->bookings;
    }
}
