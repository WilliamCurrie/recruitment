<?php

namespace RecruitMe\Tests;

use RecruitMe\CustomerRepository;

class CustomerRepositoryTest extends RepositoryTestCase
{
	/**
     * @test
     */
	public function new()
	{
		$customerRepository = new CustomerRepository(self::$db);

		$this->assertInstanceOf(CustomerRepository::class, $customerRepository);
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
		$csvRow = $this->csvRowById($id);

		$this->assertEquals($customer, $csvRow);
	}
}
