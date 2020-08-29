<?php

namespace Wranx\Database;

use RuntimeException;
use Wranx\Contracts\Support\Collection;

/**
 * Class MysqlQueryBuilder
 * @package Wranx\Database
 */
class MysqlQueryBuilder extends QueryBuilder
{
    /**
     * @var Collection $collection
     */
    protected $collection;

    /**
     * MysqlQueryBuilder constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function table(string $table)
    {
        $this->collection->reset();
        $this->collection->put('table', $table);
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function select(array $columns)
    {
        $table = $this->collection->has('table') ? $this->collection->get('table'):null;
        $this->collection->put('base', "SELECT " . implode(", ", $columns) . " FROM " . $table);
        $this->collection->put('type', 'select');
        return $this;
    }

    /**
     * Add a WHERE condition.
     * @param string $field
     * @param string $value
     * @param string $operator
     * @return MysqlQueryBuilder
     */
    public function where(string $field, string $operator, string $value)
    {
        if ($this->collection->has('type') && !in_array($this->collection->get('type'), ['select', 'update', 'delete'])) {
            throw new RuntimeException("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->collection->put('where', [[
            'column'    => $field,
            'operator'  => $operator,
            'value'     => $value,
        ]]);
        return $this;
    }

    /**
     * Add a WHERE condition.
     * @param array $values
     * @return MysqlQueryBuilder
     */
    public function insert(array $values)
    {
        $columns             = array_keys($values);
        $table               = $this->collection->has('table') ? $this->collection->get('table'):null;
        $this->collection->put('values', $this->buildValues($values));
        $bindKeys            = $this->collection->has('values') ?array_keys($this->collection->get('values')): [];
        $insertQuery         = "INSERT INTO {$table} (". implode(', ', $columns) .") VALUES (". implode(', ', $bindKeys) .")";

        $this->collection->put('base', $insertQuery);
        $this->collection->put('type', 'insert');
        return $this;
    }

    /**
     * Add Order By.
     * @param string $column
     * @return MysqlQueryBuilder
     */
    public function orderBy(string $column)
    {
        if ($this->collection->has('type') && $this->collection->get('type') !== 'select') {
            throw new RuntimeException("ORDER BY can only be added to SELECT");
        }
        $this->collection->put('orderBy', " ORDER BY {$column}");
        return $this;
    }

    /**
     * @return Collection
     */
    public function exec(): Collection
    {
        $result = null;
        switch ($this->collection->get('type')) {
            case "insert":
                $values = array_flatten(array_values($this->collection->get('values')));
                $stmt   = $this->connection->prepare($this->collection->get('base'));
                $this->buildParams($stmt);
                $stmt->execute($values);
                $result =  [
                    'record_id' => $this->connection->lastInsertId()
                ];
            break;
            case "select":
                $sql   = $this->collection->get('base');

                $values = [];
                if ($this->collection->has('where') && $this->collection->isNotEmpty('where')) {
                    $data   = [];
                    foreach ($this->collection->get('where') as $value) {
                        $data[]   = "{$value['column']} {$value['operator']} :{$value['column']}";
                        $values[] = $value['value'];
                    }
                    $sql  .= " WHERE " . implode(' AND ', $data);
                }

                if ($this->collection->has('orderBy')) {
                    $sql .= $this->collection->get('orderBy');
                }
                $stmt  = $this->connection->prepare($sql);
                $this->buildParams($stmt);
                $stmt->execute($values);
                $result  = $stmt->fetchAll();
            break;
        }
        return collect($result);
    }
}