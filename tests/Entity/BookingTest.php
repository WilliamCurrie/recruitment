<?php

namespace App\Tests\Entity;

use App\Entity\Booking;
use App\Entity\Customer;
use App\Utils\BookingReferenceGenerator;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class BookingTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProviderForEnsureDefaultsAreSetOnObjectInstantiation
     */
    public function ensureDefaultsAreSetOnObjectInstantiation(Customer $customer, string $reference)
    {
        $booking = new Booking($customer, $reference);

        $this->assertTrue(Uuid::isValid($booking->getId()));
        $this->assertEquals($reference, $booking->getReference());
        $this->assertEquals($customer, $booking->getCustomer());
        $this->assertEquals(\DateTime::class, get_class($booking->getDate()));
    }

    public function dataProviderForEnsureDefaultsAreSetOnObjectInstantiation()
    {
        return [
            [
                new Customer('Josh', 'Freeman'),
                BookingReferenceGenerator::generate()
            ],
            [
                new Customer('Fred', 'Flimpstone'),
                BookingReferenceGenerator::generate()
            ],
        ];
    }

    /**
     * @test
     * @expectedException \TypeError
     */
    public function nullDataShouldThrowException()
    {
        new Booking(null, null);
    }
}
