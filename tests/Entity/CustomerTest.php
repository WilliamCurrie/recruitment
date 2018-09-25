<?php

namespace RecruitJordi\Tests\Entity;

use RecruitJordi\Tests\AbstractEntityTestCase;
use RecruitJordi\Entity\Customer as CustomerEntity;

class CustomerTest extends AbstractEntityTestCase
{
	/**
     * @test
     */
	public function new()
	{
		$customer = new CustomerEntity($this->db);

		$this->assertInstanceOf(CustomerEntity::class, $customer);
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

		$customer = new CustomerEntity($this->db);
		$customer->setFirstName($firstName);
		$customer->setLastName($lastName);
		$customer->setAddress($address);
		$customer->setTwitterAlias($twitterAlias);
		$customer->save();

		$sql = "SELECT * FROM customers WHERE address = '$address' ORDER BY ID DESC";
		$row = $this->db->query($sql)->fetch_assoc();

		$this->assertEquals($firstName, $row['first_name']);
		$this->assertEquals($lastName, $row['last_name']);
		$this->assertEquals($address, $row['address']);
		$this->assertEquals($twitterAlias, $row['twitter_alias']);
	}
}
