<?php
require "vendor/autoload.php";

use App\App;
use App\Models\Customer;
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $app = (new App)->boot();
    }

    /**
     * @test
     */
    public function test_can_a_customer_be_created()
    {
        $customer = Customer::create([
            'first_name' => 'Josh',
            'second_name' => 'Parker'
        ]);

        $this->assertInstanceOf(
            Customer::class,
            $customer
        );
    }

    /**
     * @test
     */
    public function test_can_a_user_be_found()
    {
         Customer::create([
            'first_name' => 'Josh',
            'second_name' => 'Parker'
        ]);

        $this->assertTrue(
            Customer::whereFirstName('Josh')->whereSecondName('Parker')->exists()
        );
    }


    /**
     * @test
     */
    public function test_can_a_user_be_deleted()
    {
        $customer = Customer::create([
            'first_name' => 'JoshDeleted',
            'second_name' => 'ParkerDeleted'
        ]);

        $customer->delete();

        $this->assertFalse(
            Customer::whereFirstName('JoshDeleted')->whereSecondName('ParkerDeleted')->exists()
        );
    }
}



