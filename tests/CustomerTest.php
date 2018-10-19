<?php
use PHPUnit\Framework\TestCase;
require_once 'vendor/fzaninotto/faker/src/autoload.php';

class CustomerTest extends TestCase
{
    public function testCustomerCreation(): void
    {
        $faker = Faker\Factory::create();
        $customerToCompare = new Customer(null);
        $customer = new Customer($db);
        $customer->first_name = $faker->firstName;
        $customer->second_name = $faker->lastName;
        
        // test that the NOT NULL values are set
        $this->assertNotEquals($customer->first_name, $customerToCompare->first_name);
        $this->assertNotEquals($customer->second_name, $customerToCompare->second_name);
        
    }
    
}