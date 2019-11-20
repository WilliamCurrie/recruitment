<?php

namespace WilliamCurrie\Tests\Models;

use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;
use WilliamCurrie\Recruitment\Models\Customers;
use WilliamCurrie\Recruitment\ValueObjects\Customer;

class CustomersTest extends TestCase
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
     * @var Customers
     */
    protected $customers;

    /**
     * @var Customer
     */
    protected $mockCustomer;

    public function setUp()
    {
        $this->mockPdo = $this->createMock(PDO::class);
        $this->mockStatement = $this->createMock(PDOStatement::class);
        $this->mockCustomer = $this->createMock(Customer::class);
        $this->customers = new Customers($this->mockPdo);
    }

    public function testGetAllCustomersReturnsArrayIndexedByCustomerId()
    {
        $query = 'SELECT `id`, `first_name`, `second_name`
                  FROM `customers`';

        $returnedRows = [
            ['id' => 3, 'first_name' => 'Jane', 'second_name' => 'Smith'],
            ['id' => 4, 'first_name' => 'Fred', 'second_name' => 'Jones'],
            ['id' => 7, 'first_name' => 'Terry', 'second_name' => 'Walker'],
        ];

        $expectedResults = [
            3 => ['id' => 3, 'first_name' => 'Jane', 'second_name' => 'Smith'],
            4 => ['id' => 4, 'first_name' => 'Fred', 'second_name' => 'Jones'],
            7 => ['id' => 7, 'first_name' => 'Terry', 'second_name' => 'Walker'],
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

        $this->assertEquals($expectedResults, $this->customers->getAllCustomers());
    }

    public function testGetAllCustomersReturnsResultsSortedBySecondName()
    {
        $query = 'SELECT `id`, `first_name`, `second_name`
                  FROM `customers` ORDER BY `second_name`, `first_name`, `id` ASC';

        $returnedRows = [
            ['id' => 4, 'first_name' => 'Fred', 'second_name' => 'Jones'],
            ['id' => 3, 'first_name' => 'Jane', 'second_name' => 'Smith'],
            ['id' => 7, 'first_name' => 'Terry', 'second_name' => 'Walker'],
        ];

        $expectedResults = [
            4 => ['id' => 4, 'first_name' => 'Fred', 'second_name' => 'Jones'],
            3 => ['id' => 3, 'first_name' => 'Jane', 'second_name' => 'Smith'],
            7 => ['id' => 7, 'first_name' => 'Terry', 'second_name' => 'Walker'],
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

        $this->assertEquals($expectedResults, $this->customers->getAllCustomers(true));
    }

    public function testSaveCustomerBindsParams()
    {
        $query = 'INSERT INTO `customers` (`first_name`, `second_name`)
                  VALUES (:first_name, :second_name)';

        $this->mockStatement
            ->expects($this->exactly(2))
            ->method('bindParam')
            ->willReturn(true);

        $this->mockPdo
            ->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($this->mockStatement);

        $this->mockStatement
            ->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $this->mockCustomer->firstName = 'Fred';
        $this->mockCustomer->secondName = 'Smith';

        $this->customers->saveCustomer($this->mockCustomer);
    }
}
