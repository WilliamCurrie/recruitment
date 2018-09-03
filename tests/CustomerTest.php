<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/Base.class.php';
require_once __DIR__ . '/../app/Customer.class.php';
require_once __DIR__ . '/../vendor/autoload.php';

final class CustomerTest extends TestCase
{
    public function testFormatNames(): void
    {
      $customer = new Customer(true);
      $formatedName = $customer->formatNames('Test', 'User');
      $this->assertEquals('Test User', $formatedName);
    }
}
