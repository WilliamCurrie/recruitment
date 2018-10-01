<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/libraries/Controller.php';
require_once __DIR__ . '/../app/libraries/Database.php';
require_once __DIR__ . '/../app/controllers/Customers.php';
require_once __DIR__ . '/../app/models/Customer.php';
//require_once __DIR__ . '/../app/bootstrap.php';

class CustomerTest extends TestCase {

    protected function setUp() {
        parent::setUp();
        $this->controller = new Customers(true);
        $this->customer_model = new Customer(true);
    }

    public function testIndex() {
        $expected = $this->customer_model->getCustomers();
         $result = $this->controller->index();
         foreach ($result as $k => $value) {
             $expected_record = $expected[$k];
            $this->assertRecordSet($expected_record, $value);
        }
    }

}
