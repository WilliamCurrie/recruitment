<?php

namespace Wranx\Tests\Unit\src\Support;

use Mockery;
use Mockery\Mock;
use Wranx\Contracts\Support\Collection;
use Wranx\Support\WranxCollection;
use Wranx\Tests\TestCase;

class WranxCollectionTest extends TestCase
{
    /**
     * @var Mock|Collection
     */
    protected $mockCollection;

    public function setup(): void
    {
        parent::setUp();
        $this->mockCollection      = Mockery::mock(Collection::class);
    }

    /**
     * Get all of the items in the collection.
     * @test
     */
    public function all(): void
    {
        $collection = new WranxCollection(['name'  => 'randomName']);
        $response   = $collection->all();
        $this->assertEquals(['name'  => 'randomName'], $response);
    }

    /**
     * Add an item to the collection.
     *
     * @test
     */
    public function add(): void
    {
        $collection = new WranxCollection();
        $response   = $collection->add('hello');
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect('hello'), $response);
    }

    /**
     * Get an item from the collection by key.
     *
     * @test
     */
    public function get(): void
    {
        $collection = new WranxCollection([
            'name'  => 'randomName'
        ]);
        $response   = $collection->get('name');
        $this->assertEquals('randomName', $response);
    }

    /**
     * Determine if an item exists in the collection by key.
     *
     * @test
     */
    public function has(): void
    {
        $collection = new WranxCollection([
            'name'  => 'randomName'
        ]);
        $response   = $collection->has('name');
        $this->assertEquals(true, $response);
    }

    /**
     * Put an item in the collection by key.
     *
     * @test
     */
    public function put(): void
    {
        $collection = new WranxCollection([]);
        $response   = $collection->put( 'name', 'randomName');
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect(['name'  => 'randomName']), $response);
    }

    /**
     * Push an item onto the end of the collection.
     *
     * @test
     */
    public function push(): void
    {
        $collection = new WranxCollection([]);
        $response   = $collection->push([
            'name'  => 'randomName'
        ]);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect([['name'  => 'randomName']]), $response);
    }

    /**
     * Remove an item from the collection by key.
     *
     * @test
     */
    public function forget(): void
    {
        $collection = new WranxCollection( [
            'name' => 'randomName',
            'age'  => 33,
        ]);
        $response   = $collection->forget('name');
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect(['age'  => 33]), $response);
    }

    /**
     * Determine if the collection is empty or not.
     *
     * @test
     */
    public function is_empty(): void
    {
        $collection = new WranxCollection([
            'values'    => []
        ]);
        $response   = $collection->isEmpty('values');
        $this->assertTrue($response);
    }

    /**
     * Determine if the collection is not empty.
     *
     * @test
     */
    public function is_not_empty(): void
    {
        $collection = new WranxCollection([
            'values'    => [
                'name'  => 'random'
            ]
        ]);
        $response   = $collection->isNotEmpty('values');
        $this->assertTrue($response);
    }

    /**
     * Get the keys of the collection items.
     *
     * @test
     */
    public function keys(): void
    {
        $collection = new WranxCollection([
            'values'    => [
                'name'  => 'random'
            ]
        ]);
        $response   = $collection->keys();
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect(['values']), $response);
    }

    /**
     * Reset the keys on the underlying array.
     *
     * @test
     */
    public function values(): void
    {
        $collection = new WranxCollection([
            'values'    => [
                'name'  => 'random'
            ]
        ]);
        $response   = $collection->values();
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect([['name'  => 'random']]), $response);
    }

    /**
     * Run a map over each of the items.
     *
     * @test
     */
    public function map(): void
    {
        $collection = new WranxCollection([
            'name'  => 'random'
        ]);
        $response   = $collection->map(static function ($value) {
            return [
                'user'  => $value
            ];
        });
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect([
            'name'  => [
                'user'  => 'random'
            ]
        ]), $response);
    }

    /**
     * Sort through each item with a callback.
     *
     * @test
     */
    public function sort(): void
    {
        $collection = new WranxCollection([5, 3, 1, 2, 4]);
        $sort       = static function ($a, $b) {
            if ($a === $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        };
        $response   = $collection->sort($sort);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals([
            2 => 1,
            3 => 2,
            1 => 3,
            4 => 4,
            0 => 5,
        ], $response->toArray());
    }

    /**
     * Chunk the underlying collection array.
     *
     * @test
     */
    public function chunk(): void
    {
        $collection = new WranxCollection(['first_name'   => 'random']);
        $response   = $collection->chunk(1);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals([['first_name'   => 'random']], $response->toArray());
    }

    /**
     * Slice the underlying collection array.
     *
     * @test
     */
    public function slice(): void
    {
        $collection = new WranxCollection([
            ['first_name'   => 'random1'],
            ['first_name'   => 'random2']
        ]);
        $response   = $collection->slice(1);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals([
            1 => ['first_name'   => 'random2']
        ], $response->toArray());
    }

    /**
     * Search the collection for a given value and return the corresponding key if successful.
     *
     * @test
     */
    public function search(): void
    {
        $collection = new WranxCollection([
            'first_name'   => 'random1',
            'last_name'   => 'random2'
        ]);
        $response   = $collection->search('random2');
        $this->assertEquals('last_name', $response);
    }

    /**
     * Intersect the collection with the given items.
     *
     * @test
     */
    public function intersect(): void
    {
        $collection = new WranxCollection([
            'first', 'second', 'third'
        ]);
        $response   = $collection->intersect(['fourth', 'third']);
        $this->assertEquals([
            2 => 'third'
        ], $response->toArray());
    }

    /**
     * Replace the collection items with the given items.
     *
     * @test
     */
    public function replace(): void
    {
        $collection = new WranxCollection([
            'first', 'second', 'third'
        ]);
        $response   = $collection->replace(['first1']);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(collect([
            'first1', 'second', 'third'
        ]), $response);
    }

    /**
     * Reset the object
     *
     * @test
     */
    public function reset(): void
    {
        $collection = new WranxCollection([
            'first', 'second', 'third'
        ]);
        $this->assertNull($collection->reset());
    }

    /**
     * Get the first item from the collection passing the given truth test.
     *
     * @test
     */
    public function first(): void
    {
        $collection = new WranxCollection([
            'first', 'second', 'third'
        ]);
        $response   = $collection->first();
        $this->assertEquals('first', $response);
    }

    /**
     * Get the collection of items as a plain array.
     *
     * @test
     */
    public function toArray(): void
    {
        $collection = new WranxCollection([
            'first', 'second', 'third'
        ]);
        $response   = $collection->toArray();
        $this->assertEquals([
            'first', 'second', 'third'
        ], $response);
    }
}