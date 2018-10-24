<?php


namespace Model\Gateway\Bookings;


use DateTime;
use Model\Entity\Booking;
use Model\Entity\Customer;
use PHPUnit\Framework\TestCase;

class BookingFormatterApiTest extends TestCase
{
    /**
     * @var BookingFormatterApi
     */
    private $sut;
    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @throws \Doctrine\ORM\ORMException
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new BookingFormatterApi();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testItFormatsCorrectly(){
        $fixtureBooking = new Booking();
        $fixtureCustomer = new Customer();
        $fixtureCustomer
            ->setFirstName("Customer's First Name")
            ->setSecondName("Customer Customer's Second Name")
        ;
        $fixtureBooking
            ->setReference('123 BLAH')
            ->setDate(new DateTime('2018-01-01'))
            ->setCustomer($fixtureCustomer)
        ;

        $actual = $this->sut->formatBookingForGetResponse($fixtureBooking);

        $expected = "123 BLAH - Customer's First Name Customer Customer's Second Name Mon 01st Jan 2018";

        $this->assertEquals($expected, $actual['booking_details']);
    }
}
