<?php


namespace Model\Gateway\Bookings;


use Model\Entity\Booking;
use Model\Gateway\Bookings\UseCase\ApiFormatBooking;

class BookingFormatterApi implements ApiFormatBooking
{
    /**
     * @inheritDoc
     */
    public function formatBookingForGetResponse(Booking $booking): array
    {
        $result = [];

        // Thanks Doctrine for this
        $customer = $booking->getCustomer();

        $customerName = $customer->getFirstName() . ' ' . $customer->getSecondName();
        $bookingReference = $booking->getReference();
        $bookingDate = $booking->getDate()->format('D dS M Y');

        $result['booking_details'] = $bookingReference . ' - ' . $customerName . ' ' . $bookingDate;

        return $result;
    }
}