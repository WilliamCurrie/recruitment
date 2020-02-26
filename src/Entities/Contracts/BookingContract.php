<?php

namespace App\Entities\Contracts;

interface BookingContract
{
    public function getId(): ?int;

    public function getReference(): ?string;

    public function getBookingDate(): ?\DateTime;
}