<?php

declare(strict_types=1);

namespace WilliamCurrie\Tests\Models;

use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;
use WilliamCurrie\Recruitment\Models\Bookings;

class BookingsTest extends TestCase
{
    /**
     * @var PDO
     */
    protected $mockPdo;

    /**
     * @var PDOStatement
     */
    protected $mockStatement;

    /**
     * @var Bookings
     */
    protected $bookings;

    public function setUp()
    {
        $this->mockPdo = $this->createMock(PDO::class);
        $this->mockStatement = $this->createMock(PDOStatement::class);
        $this->bookings = new Bookings($this->mockPdo);
    }

    public function testGetAllBookingsReturnsArrayIndexedByBookingReference()
    {
        $query = 'SELECT b.`id`, b.`customerID`, b.`booking_reference`, b.`booking_date`, c.`first_name`,
                  c.`second_name`
                  FROM `bookings` b
                  LEFT JOIN `customers` c
                  ON `b`.`customerID` = `c`.`id`';

        $returnedRows = [
            [
                'id' => 3,
                'customerID' => 23,
                'booking_reference' => 'JE122',
                'booking_date' => '2017-01-01',
                'first_name' => 'Jane',
                'second_name' => 'Smith'
            ],
        ];

        $expectedResults = [
            'JE122' => [
                'id' => 3,
                'customerID' => 23,
                'booking_reference' => 'JE122',
                'booking_date' => '2017-01-01',
                'first_name' => 'Jane',
                'second_name' => 'Smith'
            ],
        ];

        $this->mockPdo
            ->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($this->mockStatement);

        $this->mockStatement
            ->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $this->mockStatement
            ->expects($this->once())
            ->method('fetchAll')
            ->willReturn($returnedRows);

        $this->assertEquals($expectedResults, $this->bookings->getBookings());
    }


    public function testGetBookingsReturnsFiltersByCustomerId()
    {
        $query = 'SELECT b.`id`, b.`customerID`, b.`booking_reference`, b.`booking_date`, c.`first_name`,
                  c.`second_name`
                  FROM `bookings` b
                  LEFT JOIN `customers` c
                  ON `b`.`customerID` = `c`.`id` WHERE `customerID` = :id';

        $returnedRows = [
            [
                'id' => 3,
                'customerID' => 1,
                'booking_reference' => 'JE122',
                'booking_date' => '2017-01-01',
                'first_name' => 'Jane',
                'second_name' => 'Smith'
            ],
        ];

        $expectedResults = [
            'JE122' => [
                'id' => 3,
                'customerID' => 1,
                'booking_reference' => 'JE122',
                'booking_date' => '2017-01-01',
                'first_name' => 'Jane',
                'second_name' => 'Smith'
            ],
        ];

        $this->mockPdo
            ->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($this->mockStatement);

        $this->mockStatement
            ->expects($this->once())
            ->method('bindParam')
            ->willReturn(true);

        $this->mockStatement
            ->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $this->mockStatement
            ->expects($this->once())
            ->method('fetchAll')
            ->willReturn($returnedRows);

        $this->assertEquals($expectedResults, $this->bookings->getBookings(1));
    }
}
