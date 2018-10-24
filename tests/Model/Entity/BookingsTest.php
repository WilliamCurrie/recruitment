<?php


namespace Tests\Model\Entity;


use DateTime;
use Model\Entity\Booking;
use Model\Entity\Customer;
use PHPUnit\Framework\TestCase;

class BookingsTest extends TestCase
{
    /**
     * @var Booking
     */
    private $sut;
    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new Booking();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testGettersAndSetters()
    {
        $customerFixture = new Customer();
        $this->sut
            ->setCustomer($customerFixture)
            ->setReference('abc')
            ->setDate(new DateTime('2018-01-01'))
            ->setCustomerId(123)
        ;



        $this->assertEquals($customerFixture, $this->sut->getCustomer());
        $this->assertEquals('abc', $this->sut->getReference());
        $this->assertEquals('2018-01-01', $this->sut->getDate()->format('Y-m-d'));
        $this->assertEquals(123, $this->sut->getCustomerId());
    }
}
