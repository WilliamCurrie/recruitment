<?php

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Src\config\Database;
use Src\Models\Customer;
use Src\Repos\CustomerRepo;

final class CustomerTest extends TestCase
{
    private $customerRepo;

    public function setUp(): void
    {
        $this->customerRepo = new CustomerRepo();
    }

    /**
     * @dataProvider customerData
     */
    public function testCustomerInstanceCanBeCreatedFromData($data): void
    {
        $this->assertInstanceOf(
            Customer::class,
            new Customer($data)
        );
    }

    /**
     * @dataProvider customerData
     */
    public function testCanCreateAndDeleteCustomers($data, $shouldBeCreated): void
    {
        $customer = new Customer($data);
        $id = $this->customerRepo->save($customer);
        $created = (bool) $id;
        $this->assertEquals($shouldBeCreated, $created);
        if ($created) {
            $this->assertTrue($this->customerRepo->delete($id));
        }
    }

    public function customerData()
    {
        $factory = Factory::create();

        return [
            'without twitter alias' => [[
                'first_name' => $factory->firstName,
                'last_name' => $factory->firstName,
                'address' => $factory->address,
            ], true],
            'with twitter alias' => [[
                'first_name' => $factory->firstName,
                'last_name' => $factory->firstName,
                'address' => $factory->address,
                'twitter_alias' => $factory->address,
            ], true],
            'with incorrect variable' => [[
                'first_name' => $factory->firstName,
                'second_name' => $factory->firstName,
                'address' => $factory->address,
            ], false],
        ];
    }
}
