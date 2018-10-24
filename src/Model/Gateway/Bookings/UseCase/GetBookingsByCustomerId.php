<?php


namespace Model\Gateway\Bookings\UseCase;

use Model\Entity\Booking;

interface GetBookingsByCustomerId
{
    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param int $customerId
     * @return Booking[]
     */
    public function getBookingsByCustomerId(int $customerId): array;
}