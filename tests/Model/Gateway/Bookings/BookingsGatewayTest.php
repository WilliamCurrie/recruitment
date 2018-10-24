<?php

namespace Tests\Model\Gateway\Bookings;

use DateTime;
use Doctrine\ORM\ORMException;
use Model\Entity\Booking;
use Model\Entity\Customer;
use Model\Gateway\Bookings\BookingsGateway;
use Tests\TestCaseDB;

class BookingsGatewayTest extends TestCaseDB
{
    /**
     * @var BookingsGateway
     */
    private $sut;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();

        $this->sut = new BookingsGateway($this->em);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     */
    public function testGetsCorrectBookings()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customerFixture1 = new Customer();
        $customerFixture2 = new Customer();
        $bookingFixture1 = new Booking();
        $bookingFixture2 = new Booking();

        $customerFixture1
            ->setFirstName('First Name 1')
            ->setSecondName('Second Name 1')
            ->setTwitterAlias('Twitter Alias 1')
            ->setAddress('Address 1');

        $customerFixture2
            ->setFirstName('First Name 2')
            ->setSecondName('Second Name 2')
            ->setTwitterAlias('Twitter Alias 2')
            ->setAddress('Address 2');

        $bookingFixture1
            ->setDate(new DateTime('2018-01-01'))
            ->setReference('1')
            ->setCustomer($customerFixture1);
        $bookingFixture2
            ->setDate(new DateTime('2019-01-01'))
            ->setReference('2')
            ->setCustomer($customerFixture2);

        $this->em->persist($customerFixture1);
        $this->em->persist($customerFixture2);

        $this->em->persist($bookingFixture1);
        $this->em->persist($bookingFixture2);

        $this->em->flush();

        // After flushing, the new record has an ID
        $customerId = $customerFixture1->getId();

        $actual = $this->sut->getBookingsByCustomerId($customerId);

        $this->assertCount(1, $actual);

        /** @var Booking $actual */
        $actual = $actual[0];
        $this->assertEquals($bookingFixture1->getId(), $actual->getId());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     */
    public function testReturnsEmptyArrayIfNoBookingsFound()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $actual = $this->sut->getBookingsByCustomerId(123);

        $this->assertCount(0, $actual);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     */
    public function testGetsEmptyArrayIfNoBookingsFound()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $actual = $this->sut->getAllBookings();
        $this->assertCount(0, $actual);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     * @throws ORMException
     */
    public function testGetsAllBookings()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customerFixture1 = new Customer();
        $customerFixture2 = new Customer();
        $bookingFixture1 = new Booking();
        $bookingFixture2 = new Booking();

        $customerFixture1
            ->setFirstName('First Name 1')
            ->setSecondName('Second Name 1')
            ->setTwitterAlias('Twitter Alias 1')
            ->setAddress('Address 1');

        $customerFixture2
            ->setFirstName('First Name 2')
            ->setSecondName('Second Name 2')
            ->setTwitterAlias('Twitter Alias 2')
            ->setAddress('Address 2');

        $bookingFixture1
            ->setDate(new DateTime('2018-01-01'))
            ->setReference('1')
            ->setCustomer($customerFixture1);
        $bookingFixture2
            ->setDate(new DateTime('2019-01-01'))
            ->setReference('2')
            ->setCustomer($customerFixture2);

        $this->em->persist($customerFixture1);
        $this->em->persist($customerFixture2);

        $this->em->persist($bookingFixture1);
        $this->em->persist($bookingFixture2);

        $this->em->flush();

        $actual = $this->sut->getAllBookings();

        $this->assertCount(2, $actual);
    }
}
