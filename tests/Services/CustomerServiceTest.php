<?php

namespace Mfisher\Tests\Services;

use Mfisher\Entities\Customer;
use Mfisher\Services\CustomerService;

/**
 * CustomerService Tests
 */
class CustomerServiceTest extends AbstractCoreTest
{
    /** @var array */
    private const GET_ALL_CUSTOMERS_EXPECTED_ORDER = [1,3,2,4];

    /**
     * Test CustomerService::testGetAllCustomers
     */
    public function testGetAllCustomers()
    {
        $customerSqlPath = __DIR__ . '/fixtures/' . static::CUSTOMER_SQL_FIXTURE;

        $query = file_get_contents($customerSqlPath);
        $this->entityManager->getConnection()->executeQuery($query);

        $customerService = new CustomerService($this->entityManager->getRepository(Customer::REPOSITORY_NAME));

        $customers = $customerService->getAllCustomers();
        $position = 0;

        foreach($customers as $customer) {
            $this->assertSame(static::GET_ALL_CUSTOMERS_EXPECTED_ORDER[$position], $customer->getId());

            $position++;
        }
    }

    /**
     * Test CustomerService::testGetAllCustomersEmpty
     */
    public function testGetAllCustomersEmpty()
    {
        $customerService = new CustomerService($this->entityManager->getRepository(Customer::REPOSITORY_NAME));

        $this->assertSame([], $customerService->getAllCustomers());
    }
}