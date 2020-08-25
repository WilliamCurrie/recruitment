<?php

namespace Wranx\Contracts\Repositories;

interface BookingRepositoryContract
{
    /**
     * Finds a single booking.
     *
     * @param false $bookingId
     * @return mixed
     */
    public function find($bookingId = false);

    /**
     * Gets all bookings for the $userId.
     *
     * @param int $userId
     * @return mixed
     */
    public function get($userId);
}
