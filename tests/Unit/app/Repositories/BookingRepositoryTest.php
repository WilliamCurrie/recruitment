<?php

namespace Wranx\Tests\Unit\app\Repositories;

use Mockery;
use Mockery\Mock;
use Wranx\Application\Repositories\BookingRepository;
use Wranx\Contracts\Database\SQLQueryBuilder;
use Wranx\Contracts\Manager\ManagerInterface as Manager;
use Wranx\Contracts\Support\Collection;
use Wranx\Tests\TestCase;

class BookingRepositoryTest extends TestCase
{
    /**
     * @var Mock|Manager
     */
    protected $mockManager;

    /**
     * @var Mock|SQLQueryBuilder
     */
    protected $mockSQLQueryBuilder;

    /**
     * @var Mock|Collection
     */
    protected $mockCollection;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockManager          = Mockery::mock(Manager::class);
        $this->mockSQLQueryBuilder  = Mockery::mock(SQLQueryBuilder::class);
        $this->mockCollection       = Mockery::mock(Collection::class);
    }

    /**
     * Find a Record by column name
     * @test
     */
    public function find_by(): void
    {
        $this->mockSQLQueryBuilder
            ->expects()
            ->table('bookings')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->select(['*'])
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->where('columns', '=', 'value')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->exec()
            ->andReturns($this->mockCollection);
        $this->mockManager
            ->expects()
            ->driver()
            ->andReturns($this->mockSQLQueryBuilder);
        $app = new BookingRepository($this->mockManager);
        $response = $app->findBy('columns', 'value');

        $this->assertInstanceOf(Collection::class, $response);
    }
}