<?php

namespace RecruitJordi\Tests;

use RecruitJordi\BookingRepository;

class BookingRepositoryTest extends RepositoryTestCase
{
	public function __construct()
	{
		parent::__construct();
		
		$this->csvLoad(self::DATA_FOLDER.'/bookings_join_customers.csv');
	}

	/**
	 * @test
	 */
	public function fetchByCustomerId()
	{
		$id = 1;
		$bookings = (new BookingRepository($this->db))->fetchByCustomerId($id);
		$csvRows = $this->csvRows(['customer_id' => $id]);

		$this->assertEquals($bookings, $csvRows);
	}
}
