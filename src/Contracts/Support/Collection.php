<?php

namespace Wranx\Contracts\Support;

use CachingIterator;
use JsonException;
use Wranx\Support\WranxCollection;

interface Collection
{
    /**
     * Get all of the items in the collection.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Add an item to the collection.
     *
     * @param  mixed  $item
     * @return WranxCollection
     */
    public function add($item): WranxCollection;

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function has($key): bool;

    /**
     * Put an item in the collection by key.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return $this
     */
    public function put($key, $value): WranxCollection;

    /**
     * Push an item onto the end of the collection.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function push($value): WranxCollection;

    /**
     * Remove an item from the collection by key.
     *
     * @param  string|array  $keys
     * @return $this
     */
    public function forget($keys): WranxCollection;

    /**
     * Determine if the collection is empty or not.
     *
     * @param string|null $key
     * @return bool
     */
    public function isEmpty(string $key = null): bool;

    /**
     * Determine if the collection is not empty.
     *
     * @param string|null $key
     * @return bool
     */
    public function isNotEmpty(string $key = null):bool;

    /**
     * Get the keys of the collection items.
     *
     * @return static
     */
    public function keys();

    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    public function values();

    /**
     * Run a map over each of the items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function map(callable $callback);

    /**
     * Get a CachingIterator instance.
     *
     * @param  int  $flags
     * @return CachingIterator
     */
    public function getCachingIterator($flags = CachingIterator::CALL_TOSTRING):CachingIterator;

    /**
     * Get the collection of items as JSON.
     *
     * @param int $options
     * @return string
     * @throws JsonException
     */
    public function toJson($options = 0): string;

    /**
     * Sort through each item with a callback.
     *
     * @param  callable|null  $callback
     * @return static
     */
    public function sort(callable $callback = null);

    /**
     * Chunk the underlying collection array.
     *
     * @param  int  $size
     * @return static
     */
    public function chunk($size);

    /**
     * Slice the underlying collection array.
     *
     * @param  int  $offset
     * @param  int  $length
     * @return static
     */
    public function slice($offset, $length = null);

    /**
     * Search the collection for a given value and return the corresponding key if successful.
     *
     * @param  mixed  $value
     * @param  bool  $strict
     * @return mixed
     */
    public function search($value, $strict = false);

    /**
     * Intersect the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function intersect($items);

    /**
     * Replace the collection items with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function replace($items);

    /**
     * @return void
     */
    public function reset(): void;

    /**
     * Get the first item from the collection passing the given truth test.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function first(callable $callback = null, $default = null);

    /**
     * Run a dictionary map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapToDictionary(callable $callback);

    /**
     * Create a new collection instance if the value isn't one already.
     *
     * @param  mixed  $items
     * @return static
     */
    public static function make($items = []);

    /**
     * Run a grouping map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapToGroups(callable $callback);
}