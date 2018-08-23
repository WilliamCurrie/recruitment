<?php

namespace Wranx\Domain\Booking\Persistence;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Wranx\Bootstrap\ConfigFactory;
use Wranx\Bootstrap\ContainerFactory;
use Wranx\Domain\Booking\Entity\Booking;
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

    public function test_can_insert_and_retrieve_a_booking_record()
    {
        $booking = new Booking(10, 'REF123', new \DateTimeImmutable('2018-08-23'));

        $this->repository->insert($booking);

        $fetched = $this->repository->getByCustomerId(10);

        $this->assertEquals(1, $fetched->getId());
        $this->assertEquals(10, $fetched->getCustomerId());
        $this->assertEquals('REF123', $fetched->getReference());
        $this->assertEquals(new \DateTimeImmutable('2018-08-23'), $fetched->getDate());
    }
}
