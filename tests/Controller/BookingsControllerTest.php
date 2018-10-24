<?php

namespace Tests\Controller;

use Controller\BookingsController;
use DateTime;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Exception;
use Model\Entity\Booking;
use Model\Entity\Customer;
use Model\Gateway\Bookings\UseCase\ApiFormatBooking;
use Model\Gateway\Bookings\UseCase\GetAllBookings;
use Model\Gateway\Bookings\UseCase\GetBookingsByCustomerId;
use Model\Gateway\Customers\UseCase\GetCustomerById;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Klein\Request as KRequest;

class BookingsControllerTest extends TestCase
{
    /**
     * @var BookingsController
     */
    private $sut;
    /**
     * @var GetCustomerById|MockObject
     */
    private $getCustomerById;
    /**
     * @var GetBookingsByCustomerId|MockObject
     */
    private $getBookingsByCustomerId;
    /**
     * @var ApiFormatBooking
     */
    private $apiFormatBooking;
    /**
     * @var GetAllBookings|MockObject
     */
    private $getAllBookings;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function setUp()
    {
        parent::setUp();

        /** @var Container $container */
        $container = $GLOBALS['container'];

        $this->getCustomerById = $this->createMock(GetCustomerById::class);
        $this->getBookingsByCustomerId = $this->createMock(GetBookingsByCustomerId::class);
        $this->getAllBookings = $this->createMock(GetAllBookings::class);

        $this->apiFormatBooking = $container->get(ApiFormatBooking::class);

        $this->sut = new BookingsController(
            $this->getCustomerById,
            $this->getBookingsByCustomerId,
            $this->apiFormatBooking,
            $this->getAllBookings

        );
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsInternalServerErrorIfSomethingUnexpectedHappens()
    {
        $this->getAllBookings
            ->expects($this->once())
            ->method('getAllBookings')
            ->willThrowException(new Exception('Hey ya'))
        ;

        $requestFixture = new KRequest();
        $actual = $this->sut->getAllBookingsAction($requestFixture);

        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $actual->status()->getCode());
    }

    public function testGetAllBookingsActionReturnsCorrectResponse()
    {
        $c1 = new Customer();
        $c2 = new Customer();
        $b1 = new Booking();
        $b2 = new Booking();

        $c1
            ->setFirstName('c1 first name')
            ->setSecondName('c1 second name')
            ->setTwitterAlias('c1 twitter alias')
            ->setAddress('c1 address');

        $c2
            ->setFirstName('c2 first name')
            ->setSecondName('c2 second name')
            ->setTwitterAlias('c2 twitter alias')
            ->setAddress('c2 address');

        $b1
            ->setReference('b1')
            ->setDate(new DateTime('2018-01-01'))
            ->setCustomer($c1);

        $b2
            ->setReference('b2')
            ->setDate(new DateTime('2019-01-01'))
            ->setCustomer($c2);

        $this->getAllBookings
            ->expects($this->once())
            ->method('getAllBookings')
            ->willReturn([$b1, $b2])
        ;

        $requestFixture = new KRequest();
        $actual = $this->sut->getAllBookingsAction($requestFixture);

        $this->assertEquals(Response::HTTP_OK, $actual->status()->getCode());

        $expectedBody = '[{"booking_details":"b1 - c1 first name c1 second name Mon 01st Jan 2018"},{"booking_details":"b2 - c2 first name c2 second name Tue 01st Jan 2019"}]';
        $this->assertEquals($expectedBody, $actual->body());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsNotFoundIfNoBookingsInTheDatabase()
    {
        $this->getAllBookings->method('getAllBookings')->willReturn([]);
        $requestFixture = new KRequest();
        $actual = $this->sut->getAllBookingsAction($requestFixture);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsInternalServerIfSomethingHappened()
    {
        $this->getCustomerById
            ->expects($this->once())
            ->method('findById')
            ->willThrowException(new Exception('hey ya'))
        ;

        $requestFixture = new KRequest();

        $requestFixture->paramsNamed()->set('customerId', 123);

        $actual = $this->sut->getBookingsByCustomerIdAction($requestFixture);

        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsNotFoundIfCustomerNotFound()
    {
        $this->getCustomerById
            ->expects($this->once())
            ->method('findById')
            ->willReturn(null)
        ;

        $requestFixture = new KRequest();

        $requestFixture->paramsNamed()->set('customerId', 123);

        $actual = $this->sut->getBookingsByCustomerIdAction($requestFixture);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsNotFoundIfCustomerExistsButHasNoBookings()
    {
        $c1 = new Customer();
        $c1
            ->setFirstName('c1 first name')
            ->setSecondName('c1 second name')
            ->setTwitterAlias('c1 twitter alias')
            ->setAddress('c1 address');

        $this->getCustomerById
            ->expects($this->once())
            ->method('findById')
            ->willReturn($c1)
        ;

        $requestFixture = new KRequest();

        $requestFixture->paramsNamed()->set('customerId', 123);

        $actual = $this->sut->getBookingsByCustomerIdAction($requestFixture);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $actual->status()->getCode());
    }

    public function testReturnsCorrectResultIfSomethingFound()
    {
        $c1 = new Customer();
        $b1 = new Booking();
        $c1
            ->setFirstName('c1 first name')
            ->setSecondName('c1 second name')
            ->setTwitterAlias('c1 twitter alias')
            ->setAddress('c1 address');
        $b1
            ->setReference('b1')
            ->setDate(new DateTime('2018-01-01'))
            ->setCustomer($c1);

        $this->getCustomerById
            ->expects($this->once())
            ->method('findById')
            ->willReturn($c1)
        ;

        $this->getBookingsByCustomerId
            ->expects($this->once())
            ->method('getBookingsByCustomerId')
            ->willReturn([$b1])
        ;

        $requestFixture = new KRequest();

        $requestFixture->paramsNamed()->set('customerId', 123);

        $actual = $this->sut->getBookingsByCustomerIdAction($requestFixture);

        $this->assertEquals(Response::HTTP_OK, $actual->status()->getCode());
        $expectedBody = '[{"booking_details":"b1 - c1 first name c1 second name Mon 01st Jan 2018"}]';
        $this->assertEquals($expectedBody, $actual->body());
    }
}