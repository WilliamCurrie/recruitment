<?php

use PHPUnit\Framework\TestCase;
use WrRecruitment\Controller\HomeController;

class HomeControllerTest extends TestCase {

	/**
	 * Create new class
	 * @test
	 * @covers \WrRecruitment\Controller\HomeController
	 */
	public function ClassCanBeInstantiated(){
		$app = new HomeController();
		$this->assertInstanceOf(HomeController::class, $app);
	}
}
