<?php

namespace Wranx\Domain\Customer\Entity;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function test_can_construct_customer_object()
    {
        $customer = new Customer(
            'Mr',
            'Joe',
            'Sweeny',
            '1 Upton Park, East London, E6'
        );

        $this->assertEquals('Mr', $customer->getTitle());
        $this->assertEquals('Joe', $customer->getFirstName());
        $this->assertEquals('Sweeny', $customer->getLastName());
        $this->assertEquals('1 Upton Park, East London, E6', $customer->getAddress());
    }
}
