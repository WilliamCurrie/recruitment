<?php

namespace RecruitJordi\Tests;

use RecruitJordi\BookingRepository;

class BookingRepositoryTest extends RepositoryTestCase
{
	public static function setUpBeforeClass()
	{
		parent::setUpBeforeClass();

		self::csvLoad(self::DATA_FOLDER.'/bookings_join_customers.csv');
	}

	/**
	 * @test
	 */
	public function fetchByCustomerId()
	{
		$id = 1;
		$bookings = (new BookingRepository(self::$db))->fetchByCustomerId($id);
		$csvRows = $this->csvRows(['customer_id' => $id]);

		$this->assertEquals($bookings, $csvRows);
	}
}
