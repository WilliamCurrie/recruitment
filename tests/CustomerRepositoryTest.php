<?php

namespace RecruitMe\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitMe\CustomerRepository;
use RecruitMe\Db;

class CustomerRepositoryTest extends TestCase
{
	private static $db;

	public static function setUpBeforeClass()
	{
		$dotenv = new Dotenv(__DIR__.'/../');
		$dotenv->load();

		self::$db = Db::getInstance();
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
	}
}
