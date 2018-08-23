<?php

namespace Wranx\Domain\Booking\Persistence;

use Wranx\Domain\Booking\Entity\Booking;
use Wranx\Framework\Exception\NotFoundException;

interface Repository
{
    public function insert(Booking $booking): void;

    /**
     * @param int $customerId
     * @throws NotFoundException
     * @return Booking
     */
    public function getByCustomerId(int $customerId): Booking;
}
