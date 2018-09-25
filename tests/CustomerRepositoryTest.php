<?php

namespace RecruitJordi\Tests;

use RecruitJordi\CustomerRepository;

class CustomerRepositoryTest extends RepositoryTestCase
{
	public function __construct()
	{
		parent::__construct();

		$this->csvLoad(self::DATA_FOLDER.'/customers.csv');
	}

	/**
	 * @test
	 */
	public function fetchAll()
	{
		$customers = (new CustomerRepository($this->db))->fetchAll();

		$this->assertEquals(4, count($customers));
		$this->assertEquals($customers, $this->csv);
	}

	/**
	 * @test
	 */
	public function fetchById()
	{
		$id = 1;
		$customer = (new CustomerRepository($this->db))->fetchById($id);
		$csvRows = $this->csvRows(['id' => $id]);

		$this->assertEquals($customer, current($csvRows));
	}
}
