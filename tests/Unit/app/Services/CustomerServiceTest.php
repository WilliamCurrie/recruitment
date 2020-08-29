<?php

namespace Wranx\Tests\Unit\app\Services;

use Mockery;
use Mockery\Mock;
use Wranx\Application\Services\CustomerService;
use Wranx\Contracts\Support\Collection;
use Wranx\Tests\TestCase;
use Wranx\Application\Contracts\Repositories\CustomerRepositoryInterface as Repository;

class CustomerServiceTest extends TestCase
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
     * Create new record
     * @test
     */
    public function create(): void
    {
        $this->mockRepository
            ->expects()
            ->create(['column_name', 'value'])
            ->andReturns($this->mockCollection);
        $app = new CustomerService($this->mockRepository);
        $response = $app->create(['column_name', 'value']);

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Get all Records sorted by column name
     * @test
     */
    public function order_by(): void
    {
        $this->mockRepository
            ->expects()
            ->orderBy('column_name')
            ->andReturns($this->mockCollection);
        $app = new CustomerService($this->mockRepository);
        $response = $app->orderBy('column_name');

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Get all Records sorted by column name
     * @test
     */
    public function find_all(): void
    {
        $this->mockRepository
            ->expects()
            ->findAll()
            ->andReturns($this->mockCollection);
        $app = new CustomerService($this->mockRepository);
        $response = $app->findAll();

        $this->assertInstanceOf(Collection::class, $response);
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
        $app = new CustomerService($this->mockRepository);
        $response = $app->findBy('column_name', 'value');

        $this->assertInstanceOf(Collection::class, $response);
    }
}