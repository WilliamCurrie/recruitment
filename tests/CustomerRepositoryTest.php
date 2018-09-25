<?php

namespace RecruitMe\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitMe\CustomerRepository;
use RecruitMe\Db;

class CustomerRepositoryTest extends TestCase
{
	const DATA_FOLDER = __DIR__.'/data';

	private static $db;

	private static $data = [];

	public static function setUpBeforeClass()
	{
		$dotenv = new Dotenv(__DIR__.'/../');
		$dotenv->load();

		self::$db = Db::getInstance();

		$rows = array_map('str_getcsv', file(self::DATA_FOLDER."/customers.csv"));
		$header = array_shift($rows);
		foreach ($rows as $row) {
			self::$data[] = array_combine($header, $row);
		}
	}

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
		$this->assertEquals($customers, self::$data);
	}

	/**
	 * @test
	 */
	public function fetchById()
	{
		$customer = (new CustomerRepository(self::$db))->fetchById(1);
		$item = [];
		foreach (self::$data as $key => $value)
		{
			if ($value['id'] == 1) {
				$item = $value;
				break;
			}
		}

		$this->assertEquals($customer, $item);
	}
}
