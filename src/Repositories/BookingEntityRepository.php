<?php

namespace App\Repositories;

use App\Entities\Booking;
use Doctrine\ORM\EntityRepository;
use App\Repositories\Contracts\BookingRepositoryContract;

class BookingEntityRepository extends EntityRepository implements BookingRepositoryContract
{
    /**
     * @return Booking[]
     */
    public function getAllBookings(): array
    {
        return $this->findAll();
    }
}
