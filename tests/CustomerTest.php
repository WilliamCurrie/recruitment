<?php

namespace RecruitMe\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitMe\Customer;
use RecruitMe\Db;

class CustomerTest extends TestCase
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
		$customer = new Customer(self::$db);

		$this->assertInstanceOf(Customer::class, $customer);
	}

	/**
     * @test
     */
	public function save()
	{
		$firstName = 'Bob';
		$lastName = 'Smith';
		$address = '1101 St John Street';
		$twitterAlias = '@bob_smith';

		$customer = new Customer(self::$db);
		$customer->setFirstName($firstName);
		$customer->setLastName($lastName);
		$customer->setAddress($address);
		$customer->setTwitterAlias($twitterAlias);
		$customer->save();

		$sql = "SELECT * FROM customers WHERE address = '$address' ORDER BY ID DESC";
		$row = self::$db->query($sql)->fetch_assoc();

		$this->assertEquals($firstName, $row['first_name']);
		$this->assertEquals($lastName, $row['last_name']);
		$this->assertEquals($address, $row['address']);
		$this->assertEquals($twitterAlias, $row['twitter_alias']);
	}
}
