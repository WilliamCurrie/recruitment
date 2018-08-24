<?php

namespace Wranx\Domain\Booking\Persistence;

use Wranx\Domain\Booking\Entity\Booking;

interface Repository
{
    public function insert(Booking $booking): void;

    /**
     * @param int $customerId
     * @return array|Booking[]
     */
    public function getByCustomerId(int $customerId): array;
}
