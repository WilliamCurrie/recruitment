<?php

namespace Mfisher\Tests\Services;

use Mfisher\Entities\Booking;
use Mfisher\Services\BookingService;

/**
 * BookingService tests
 */
class BookingServiceTest extends AbstractCoreTest
{
    /**
     * Test BookingService::getBookingsByCustomerId
     */
    public function testGetBookingsByCustomerId()
    {
        $customerSqlPath = __DIR__ . '/fixtures/' . static::CUSTOMER_SQL_FIXTURE;
        $bookingSqlPath = __DIR__ . '/fixtures/' . static::BOOKING_SQL_FIXTURE;

        $customerQuery = file_get_contents($customerSqlPath);
        $bookingQuery = file_get_contents($bookingSqlPath);
        $this->entityManager->getConnection()->executeQuery($customerQuery);
        $this->entityManager->getConnection()->executeQuery($bookingQuery);

        $bookingService = new BookingService($this->entityManager->getRepository(Booking::REPOSITORY_NAME));

        $this->assertSame(2, count($bookingService->getBookingsByCustomerId(1)));
        $this->assertSame(2, count($bookingService->getBookingsByCustomerId(4)));
        $this->assertSame(0, count($bookingService->getBookingsByCustomerId(2)));
        $this->assertSame(0, count($bookingService->getBookingsByCustomerId(3)));
    }
}