<?php


use Bff\Models\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{

    public function testFindById()
    {
        $result = Customer::findById(1);

        $this->assertEquals(true, is_array($result), "result isn't an array");
        $this->assertEquals(true, isset($result['id']), "result id isn't set");
        $this->assertEquals(1, $result['id'], "result id isn't 1");

        $result = Customer::findById('rubbish');

        $this->assertEquals(false, is_array($result), "result is an array");
    }

    public function testSaveCustomer()
    {
        $date = date("Y-m-d_H:m:s");
        $customer = new Customer();
        $customer->first_name = "Jim$date";
        $customer->last_name = "Johnson$date";
        $result = $customer->saveCustomer();

        $this->assertEquals(true, is_int($result), "Result isn't an id");
    }

    public function testFormatNames()
    {
        $result = Customer::formatNames("Jim", "Bowen");
        $this->assertEquals("Jim Bowen", $result, "name format not as expected");
    }

    public function testGetOurCustomersBySurname()
    {
        $result = Customer::getOurCustomersBySurname();
        $this->assertEquals(true, is_string($result), "List of customers not returned");
    }

    public function testGetAllCustomers()
    {
        $result = Customer::getAllCustomers();
        $this->assertEquals(true, is_string($result), "Table of customers not returned");
    }
}
