<?php

namespace Wranx\Tests\Unit\app\Repositories;

use Mockery;
use Mockery\Mock;
use Wranx\Application\Repositories\CustomerRepository;
use Wranx\Contracts\Database\SQLQueryBuilder;
use Wranx\Contracts\Manager\ManagerInterface as Manager;
use Wranx\Contracts\Support\Collection;
use Wranx\Tests\TestCase;

class CustomerRepositoryTest extends TestCase
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
     * Create new Entry
     * @test
     */
    public function create(): void
    {
        $this->mockSQLQueryBuilder
            ->expects()
            ->table('customers')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->insert(['columns', 'value'])
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->exec()
            ->andReturns($this->mockCollection);
        $this->mockManager
            ->expects()
            ->driver()
            ->andReturns($this->mockSQLQueryBuilder);
        $app = new CustomerRepository($this->mockManager);
        $response = $app->create(['columns', 'value']);

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Get Recors by column's name
     * @test
     */
    public function order_by(): void
    {
        $this->mockSQLQueryBuilder
            ->expects()
            ->table('customers')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->select(['*'])
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->orderBy('columns')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->exec()
            ->andReturns($this->mockCollection);
        $this->mockManager
            ->expects()
            ->driver()
            ->andReturns($this->mockSQLQueryBuilder);
        $app = new CustomerRepository($this->mockManager);
        $response = $app->orderBy('columns');

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Find a Record by column name
     * @test
     */
    public function find_by(): void
    {
        $this->mockSQLQueryBuilder
            ->expects()
            ->table('customers')
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
        $app = new CustomerRepository($this->mockManager);
        $response = $app->findBy('columns', 'value');

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Find all records
     * @test
     */
    public function find_all(): void
    {
        $this->mockSQLQueryBuilder
            ->expects()
            ->table('customers')
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->select(['*'])
            ->andReturns($this->mockSQLQueryBuilder);
        $this->mockSQLQueryBuilder
            ->expects()
            ->exec()
            ->andReturns($this->mockCollection);
        $this->mockManager
            ->expects()
            ->driver()
            ->andReturns($this->mockSQLQueryBuilder);
        $app = new CustomerRepository($this->mockManager);
        $response = $app->findAll();

        $this->assertInstanceOf(Collection::class, $response);
    }
}