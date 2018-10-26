<?php

namespace Test\Unit;

use App\Controllers\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{

    public function testFieldsIsValidReturnsExceptionOnFailure()
    {
        $this->assertEquals(
            400,
            (new Customer())
                ->fieldsAreValid()
                ->getCode()
        );
    }

    public function testSaveCustomerReturnsFalseOnFailure()
    {
        $this->assertNotTrue(
            (new Customer())
                ->saveCustomer()
        );
    }

    public function testSaveCustomerReturnsTrueOnSuccess()
    {
        $customer = new Customer();

        $customer->first_name = "Jon";
        $customer->last_name = "Doe";

        $this->assertTrue(
            $customer->saveCustomer()
        );
    }

    public function testFindByIdReturnsArrayResult()
    {
        $this->assertTrue(
            is_array((new Customer())->findById(1))
        );
    }

    public function testGetCustomerBySecondName()
    {
        $this->assertTrue(
            is_array(
                (new Customer())->getCustomers()
            )
        );
    }

    public function testFormatNamesReturnsConcatenatedStringParams()
    {
        $this->assertEquals(
            "John Doe",
            (new Customer())->formatNames("John", "Doe")
        );
    }

}