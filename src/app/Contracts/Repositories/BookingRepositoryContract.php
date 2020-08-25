<?php

namespace Wranx\Contracts\Repositories;

interface BookingRepositoryContract
{
    public function find($bookingId = false);
    public function get($userId = false);
}