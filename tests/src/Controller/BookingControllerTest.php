<?php

use PHPUnit\Framework\TestCase;
use WrRecruitment\Controller\BookingController;

class BookingControllerTest extends TestCase {


	/**
	 * Create new class
	 * @test
	 * @covers \WrRecruitment\Controller\BookingController
	 */
	public function ClassCanBeInstantiated(){
		$app = new BookingController();
		$this->assertInstanceOf(BookingController::class, $app);
	}


}
