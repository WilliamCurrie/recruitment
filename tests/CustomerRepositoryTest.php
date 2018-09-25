<?php

namespace RecruitJordi\Tests;

use RecruitJordi\CustomerRepository;

class CustomerRepositoryTest extends RepositoryTestCase
{
	public static function setUpBeforeClass()
	{
		parent::setUpBeforeClass();

		self::csvLoad(self::DATA_FOLDER.'/customers.csv');
	}

	/**
	 * @test
	 */
	public function fetchAll()
	{
		$customers = (new CustomerRepository(self::$db))->fetchAll();

		$this->assertEquals(4, count($customers));
		$this->assertEquals($customers, self::$csv);
	}

	/**
	 * @test
	 */
	public function fetchById()
	{
		$id = 1;
		$customer = (new CustomerRepository(self::$db))->fetchById($id);
		$csvRows = $this->csvRows(['id' => $id]);

		$this->assertEquals($customer, current($csvRows));
	}
}
