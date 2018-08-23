<?php

namespace Wranx\Domain\Customer\Persistence;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Wranx\Bootstrap\ConfigFactory;
use Wranx\Bootstrap\ContainerFactory;
use Wranx\Domain\Customer\Entity\Customer;
use Wranx\Testing\RunsMigrations;

class RepositoryIntegrationTest extends TestCase
{
    use RunsMigrations;

    /** @var  ContainerInterface */
    private $container;
    /** @var  Repository */
    private $repository;

    public function setUp()
    {
        $this->container = $this->runMigrations(
            (new ContainerFactory)->create(ConfigFactory::create())
        );
        $this->repository = $this->container->get(Repository::class);
    }

    public function test_interface_is_bound()
    {
        $this->assertInstanceOf(Repository::class, $this->repository);
    }

    public function test_customer_can_be_inserted_into_and_fetched_from_database()
    {
        $customer = new Customer(
            'Mr',
            'Joe',
            'Sweeny',
            '1 Upton Park, East London, E6'
        );

        $this->repository->insert($customer);

        $fetched = $this->repository->getById(1);

        $this->assertEquals(1, $fetched->getId());
        $this->assertEquals('Mr', $fetched->getTitle());
        $this->assertEquals('Joe', $fetched->getFirstName());
        $this->assertEquals('Sweeny', $fetched->getLastName());
        $this->assertEquals('1 Upton Park, East London, E6', $fetched->getAddress());
        $this->assertNull($fetched->getTwitterHandle());
    }
}
