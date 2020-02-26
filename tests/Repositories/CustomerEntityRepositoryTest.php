<?php

namespace Tests\Repositories;

use Tests\BaseTestCase;
use App\Entities\Customer;
use App\Repositories\CustomerEntityRepository;

class CustomerEntityRepositoryTest extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->createSchema();
    }

    public function tearDown(): void
    {
        $this->dropSchema();
        parent::tearDown();
    }

    /**
     * @test
     */
    public function can_save_a_customer()
    {
        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);

        $customer = new Customer();
        $customer->setFirstName('Jimmy')
            ->setSurname('McNulty');
        $repository->save($customer);

        $customerFromDb = $repository->find($customer->getId());

        $this->assertNotFalse($customer->getId());
        $this->assertEquals($customer->getId(), $customerFromDb->getId());
        $this->assertEquals($customer->getFirstName(), $customerFromDb->getFirstName());
        $this->assertEquals($customer->getSurname(), $customerFromDb->getSurname());
    }

    /**
     * @test
     */
    public function can_get_all_customers()
    {
        $this->loadDataFixtures();

        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);
        $customers = $repository->getAllCustomers();

        $this->assertEquals(4, count($customers));
    }

    /**
     * @test
     */
    public function can_get_customer_by_id()
    {
        $this->loadDataFixtures();

        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);

        $customer = new Customer();
        $customer->setFirstName('Ellis')
            ->setSurname('Carver');
        $repository->save($customer);

        $customerEllis = $repository->findById($customer->getId());

        $this->assertEquals($customerEllis->getId(), $customer->getId());
        $this->assertEquals($customerEllis->getFullName(), $customer->getFullName());
    }

    /**
     * @test
     */
    public function can_get_customers_by_surname()
    {
        $this->loadDataFixtures();

        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);

        $customer1 = new Customer();
        $customer1->setFirstName('Omar')
            ->setSurname('Little');
        $repository->save($customer1);

        $customer2 = new Customer();
        $customer2->setFirstName('Anthony')
            ->setSurname('Little');
        $repository->save($customer2);

        $customersWithSurnameLittle = $repository->findBySurname('Little');

        $this->assertEquals(2, count($customersWithSurnameLittle));

        foreach ($customersWithSurnameLittle as $customer) {
            $this->assertEquals('Little', $customer->getSurname());
        }
    }

    /**
     * @test
     */
    public function can_get_customers_sorted_by_surname_descending()
    {
        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);

        $customer1 = new Customer();
        $customer1->setFirstName('Terry')
            ->setSurname('Goldsmith');
        $repository->save($customer1);

        $customer2 = new Customer();
        $customer2->setFirstName('Richard')
            ->setSurname('Zellman');
        $repository->save($customer2);

        $customer3 = new Customer();
        $customer3->setFirstName('John')
            ->setSurname('Ashcroft');
        $repository->save($customer3);

        $customers = $repository->getAllCustomersSortedBySurname('desc');

        $this->assertEquals('Zellman', $customers[0]->getSurname());
        $this->assertEquals('Goldsmith', $customers[1]->getSurname());
        $this->assertEquals('Ashcroft', $customers[2]->getSurname());
    }

    /**
     * @test
     */
    public function can_get_customers_sorted_by_surname_ascending()
    {
        /** @var CustomerEntityRepository $repository */
        $repository = $this->container->get(CustomerEntityRepository::class);

        $customer1 = new Customer();
        $customer1->setFirstName('Terry')
            ->setSurname('Goldsmith');
        $repository->save($customer1);

        $customer2 = new Customer();
        $customer2->setFirstName('Richard')
            ->setSurname('Zellman');
        $repository->save($customer2);

        $customer3 = new Customer();
        $customer3->setFirstName('John')
            ->setSurname('Ashcroft');
        $repository->save($customer3);

        $customers = $repository->getAllCustomersSortedBySurname('asc');

        $this->assertEquals('Ashcroft', $customers[0]->getSurname());
        $this->assertEquals('Goldsmith', $customers[1]->getSurname());
        $this->assertEquals('Zellman', $customers[2]->getSurname());
    }
}