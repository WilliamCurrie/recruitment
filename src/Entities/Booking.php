<?php

namespace App\Entities;

use App\Entities\Contracts\BookingContract;
use App\Entities\Contracts\CustomerContract;

class Booking implements BookingContract
{
    private $id;

    private $reference;

    private $bookingDate;

    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }

    public function getBookingDate(): ?\DateTime
    {
        return $this->bookingDate;
    }

    public function setBookingDate(\DateTime $bookingDate): self
    {
        $this->bookingDate = $bookingDate;
        return $this;
    }

    public function getCustomer(): ?CustomerContract
    {
        return $this->customer;
    }

    public function setCustomer(CustomerContract $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
}
