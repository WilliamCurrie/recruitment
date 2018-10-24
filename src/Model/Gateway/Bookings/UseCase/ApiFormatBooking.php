<?php


namespace Model\Gateway\Bookings\UseCase;


use Model\Entity\Booking;

interface ApiFormatBooking
{
    /**
     * Will format a booking entity into an array that would be later converted to a JSON object as in a GET request
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param Booking $booking
     * @return array
     */
    public function formatBookingForGetResponse(Booking $booking): array;
}
