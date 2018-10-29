<?php

class CustomerRepositoryTest extends \PHPUnit\Framework\TestCase
{
    private $container;

    /** @var \App\Repository\CustomerRepository */
    private $repo;

    public function setUp()
    {
        $containerBuilder = new \DI\ContainerBuilder();
        $this->container = $containerBuilder->build();

        $this->repo = $this->container->get('App\\Repository\\CustomerRepository');

        parent::setUp();
    }

    public function testGetAll()
    {
        $customers = $this->repo->getAll();

        $this->assertNotNull($customers);

        /** @var \App\Entity\Customer $customer */
        foreach ($customers as $customer)
        {
            $this->assertInstanceOf(\App\Entity\Customer::class, $customer);
        }
    }

    public function testGetById()
    {
        /** @var \App\Entity\Customer $customer */
        $customer = $this->repo->getById(1);

        $this->assertInstanceOf(\App\Entity\Customer::class, $customer);
        $this->assertNotNull($customer->getFirstName());
        $this->assertNotNull($customer->getLastName());
        $this->assertNotNull($customer->getAddress());
        $this->assertNotNull($customer->getId());
    }

    public function testCreate()
    {
        $data = [
            'firstName' => 'John',
            'lastName' => 'Smith',
            'address' => '1 High St'
        ];

        $customer = $this->repo->create($data);

        $this->assertInstanceOf(\App\Entity\Customer::class, $customer);
    }
}

