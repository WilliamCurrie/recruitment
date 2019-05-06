<?php
declare(strict_types=1);

define('DB_HOST', 'database');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_NAME', 'test');
define('DB_COLL', 'utf8mb4');

use PHPUnit\Framework\TestCase;
use Wranx\Customer;


class CustomerTest extends TestCase
{
    public function testFullName()
    {
        $expected = 'John Doe';
        $customer = new Customer();
        $return = $customer->fullName('John', 'Doe');
        $this->assertEquals($return, $expected);
    }

    public function testFullNameWithSpaces()
    {
        $expected = 'John Doe';
        $customer = new Customer();
        $return = $customer->fullName(' John ', '     Doe  ');
        $this->assertEquals($return, $expected);
    }

    public function testFullNameWithInteger()
    {
        $expected = 'John Doe';
        $customer = new Customer();
        $return = $customer->fullName(' John ', 1);
        $this->assertNotEquals($return, $expected);
    }

    public function testFirstNameWithValidString()
    {
        $expected = 'John';
        $customer = new Customer();
        $customer->setFirstName('John');

        $this->assertEquals($customer->getFirstName(), $expected);
    }

    public function testFirstNameWithInvalidString()
    {
        $expected = 'John';
        $customer = new Customer();
        $customer->setFirstName('<p>John</p>');

        $this->assertEquals($customer->getFirstName(), $expected);
    }

    public function testLastNameWithValidString()
    {
        $expected = 'Doe';
        $customer = new Customer();
        $customer->setLastNAme('Doe');

        $this->assertEquals($customer->getLastName(), $expected);
    }

    public function testLastNameWithInvalidString()
    {
        $expected = 'Doe';
        $customer = new Customer();
        $customer->setLastName('<p>Doe</p>');

        $this->assertEquals($customer->getLastName(), $expected);
    }

    public function testAddress()
    {
        $expected = 'My address string';
        $customer = new Customer();
        $customer->setAddress($expected);

        $this->assertEquals($customer->getAddress(), $expected);
    }

    public function testTwitterAlias()
    {
        $expected = 'My twitter alias string';
        $customer = new Customer();
        $customer->setTwitterAlias($expected);

        $this->assertEquals($customer->getTwitterAlias(), $expected);
    }


    // Integration tests

    public function testInsert()
    {
        $customer = new Customer();
        try {
            $ret = $customer->insert('fname', 'lname', 'ade', 'talias');
        } catch (ArgumentCountError $e){}

        $this->assertTrue(is_int($ret));
    }

    public function testExistsOne()
    {
        $customer = new Customer();
        try {
            $ret = $customer->insert('fname', 'lname', 'ade', 'talias');
        } catch (ArgumentCountError $e){}

        if (is_int($ret)){
            $exists = $customer->existsOne();
        }

        $this->assertTrue($exists);
    }

    public function testDeleteAll()
    {
        $customer = new Customer();
        $customer->deleteAll();
        $exists = $customer->existsOne();

        $this->assertFalse($exists);
    }

    public function testGetById()
    {
        $customer = new Customer();
        $customer->deleteAll();

        try {
            $ret = $customer->insert('fname', 'lname', 'ade', 'talias');
            $c = $customer->getById($ret);
        } catch (ArgumentCountError $e){}

        $this->assertTrue(!empty($c));
    }

    public function testGetAll(){
        $customer = new Customer();
        $customer->deleteAll();

        try {
            $ret = $customer->insert('fname', 'lname', 'ade', 'talias');
            $ret = $customer->insert('fname', 'lname', 'ade', 'talias');
            $result = $customer->getAll();
        } catch (ArgumentCountError $e){}

        $this->assertTrue(!empty($result));
    }

    public function testGetAllBySurname(){
        $customer = new Customer();
        $customer->deleteAll();

        try {
            $ret = $customer->insert('fname', 'xname', 'ade', 'talias');
            $ret = $customer->insert('fname', 'yname', 'ade', 'talias');
            $result = $customer->getAllBySurname();
        } catch (ArgumentCountError $e){}

        $this->assertTrue(!empty($result));
    }

    public function testGetAllByFullName(){
        $customer = new Customer();
        $customer->deleteAll();

        try {
            $ret = $customer->insert('fname', 'xname', 'ade', 'talias');
            $ret = $customer->insert('fname', 'yname', 'ade', 'talias');

            $tmp = [];
            foreach ($customer->streamAllByFullName() as $result){
                array_push($tmp, $result);
            }
        } catch (ArgumentCountError $e){}

        $this->assertTrue(!empty($tmp));
    }
}
