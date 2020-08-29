<?php

namespace Wranx\Tests\Unit\app\Services;

use Mockery;
use Mockery\Mock;
use Wranx\Application\Services\BookingService;
use Wranx\Contracts\Support\Collection;
use Wranx\Tests\TestCase;
use Wranx\Application\Contracts\Repositories\BookingRepositoryInterface as Repository;


class BookingServiceTest extends TestCase
{
    /**
     * @var Mock|Repository
     */
    protected $mockRepository;

    /**
     * @var Mock|Collection
     */
    protected $mockCollection;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockRepository          = Mockery::mock(Repository::class);
        $this->mockCollection          = Mockery::mock(Collection::class);
    }

    /**
     * FindBy
     * @test
     */
    public function find_by(): void
    {
        $this->mockRepository
            ->expects()
            ->findBy('column_name', 'value')
            ->andReturns($this->mockCollection);
        $app = new BookingService($this->mockRepository );
        $response = $app->findBy('column_name', 'value');

        $this->assertInstanceOf(Collection::class, $response);
    }
}