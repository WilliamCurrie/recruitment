<?php

namespace Mfisher\Tests\Entities;

use DateTime;
use Mfisher\Entities\Customer;
use PHPUnit\Framework\TestCase;

/**
 * Customer tests
 */
class CustomerTest extends TestCase
{
    /**
     * Test Customer::getId()
     */
    public function testGetId()
    {
        $customer = new Customer();
        $customer->setId(1);

        $this->assertSame(1, $customer->getId());
    }

    /**
     * Test Customer::getFirstName()
     */
    public function testGetFirstName()
    {
        $customer = new Customer();
        $customer->setFirstName('bob');

        $this->assertSame('bob', $customer->getFirstName());
    }

    /**
     * Test Customer::getSecondName()
     */
    public function testGetSecondName()
    {
        $customer = new Customer();
        $customer->setSecondName('Mc bob');

        $this->assertSame('Mc bob', $customer->getSecondName());
    }

    /**
     * Test Customer::getAddress()
     */
    public function testGetAddress()
    {
        $customer = new Customer();
        $customer->setAddrress('123 foo');

        $this->assertSame('123 foo', $customer->getAddress());
    }

    /**
     * Test Customer::getTwitterAlias()
     */
    public function testGetTwitterAlias()
    {
        $customer = new Customer();
        $customer->setTwitterAlias('@swiftonsecurity');

        $this->assertSame('@swiftonsecurity', $customer->getTwitterAlias());
    }
}