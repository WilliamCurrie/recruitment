<?php

use PHPUnit\Framework\TestCase;
use WrRecruitment\Model\Customer;

class CustomerModelTest extends TestCase {

	/**
	 * Create new class
	 * @test
	 * @covers \WrRecruitment\Model\Customer
	 */
	public function ClassCanBeInstantiated(){
		$app = new Customer();
		$this->assertInstanceOf(Customer::class, $app);
	}
}
