<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require_once('./src/controllers/mainController.php');

/*
* Run tests vendor/bin/phpunit within docker container bash.
* On Production switch use database copy. Set in phpunit.xml
*/
class getBookingsTest extends TestCase
{
  /**
  * Test Database Return Types
  * Test One: Expect Array if id known to exist
  */
  public function test_getBookings()
  {
    $bookings = new bookings();
    $result = $bookings->getBookings(4);

    $this->assertArrayHasKey('bookingRef', $result[0]);
  }
  /**
  * Test Database Return Types
  * Test Two: Expect -2 no id sent
  */
  public function test_getBookingsTwo()
  {
    $bookings = new bookings();
    $result = $bookings->getBookings();

    $this->assertEquals(-2, $result);
  }
  /**
  * Test Database Return Types
  * Test Three: ID may or may not exist
  */
  public function test_getBookingsThree()
  {
    $bookings = new bookings();
    $result = $bookings->getBookings(900); //4); //Should would with random id like 9999 or 4 where result expected
    if(is_array($result)){
      $this->assertArrayHasKey('bookingRef', $result[0]);
    }else{
      $this->assertEquals(-1, $result);
    }
  }
}
