<?php

namespace RecruitJordi;

class BookingRepository extends AbstractRepository
{
    public function __construct($db)
    {
        parent::__construct($db);

        $this->table = 'bookings';
    }
}
