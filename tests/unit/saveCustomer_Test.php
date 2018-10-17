<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require_once('./src/controllers/mainController.php');

/*
* Run tests vendor/bin/phpunit within docker container bash.
* On Production switch use database copy. Set in phpunit.xml
*/
class saveCustomerTest extends TestCase
{
  /**
  * Test Database Return Types
  * Test One: Expect -2 missing data
  */
  public function test_saveCustomerOne()
  {
    $customer = new customers();
    $customer->firstName = "Jim";
    $customer->lastName = "Johnson";
    $result = $customer->saveCustomer();

    $this->assertEquals(-2, $result);
  }
  /**
  * Test Database Return Types
  * Test Two: Expect 0 Successful save
  */
  public function test_saveCustomerTwo()
  {
    $customer = new customers();
    $customer->firstName = "Jim";
    $customer->lastName = "Johnson";
    $customer->address = "Edinburgh";
    $result = $customer->saveCustomer();

    $this->assertEquals(1, $result);
  }
}
