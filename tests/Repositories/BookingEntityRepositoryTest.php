<?php

namespace Tests\Repositories;

use Tests\BaseTestCase;
use App\Repositories\BookingEntityRepository;

class BookingEntityRepositoryTest extends BaseTestCase
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
    public function can_get_all_bookings()
    {
        $this->loadDataFixtures();

        /** @var BookingEntityRepository $repository */
        $repository = $this->container->get(BookingEntityRepository::class);

        $bookings = $repository->getAllBookings();

        $this->assertEquals(4, count($bookings));
    }
}
