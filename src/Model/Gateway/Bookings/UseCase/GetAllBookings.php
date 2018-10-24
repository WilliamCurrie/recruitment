<?php


namespace Model\Gateway\Bookings\UseCase;


interface GetAllBookings
{
    /**
     * Gets All bookings from database
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return Booking[]
     */
    public function getAllBookings(): array;
}