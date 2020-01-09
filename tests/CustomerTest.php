<?php

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Src\Models\Customer;
use Src\Repos\CustomerRepo;

final class EmailTest extends TestCase
{
    private $db;

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
    public function testCannotBeCreatedWithIncorrectVariables($data, $shouldBeCreated): void
    {
        $this->markTestSkipped('Adds data to our `live` data. Skipped until fixed');
        $customerRepo =  new CustomerRepo();
        $customer = new Customer($data);
        $this->assertEquals($shouldBeCreated, $customerRepo->save($customer));
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