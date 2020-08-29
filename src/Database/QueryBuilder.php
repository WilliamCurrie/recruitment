<?php

namespace Wranx\Database;

use PDO;
use PDOStatement;
use Wranx\Contracts\Database\SQLQueryBuilder;
use Wranx\Contracts\Support\Collection;

/**
 * Class QueryBuilder
 * @package Wranx\Database
 */
abstract class QueryBuilder extends Connection implements SQLQueryBuilder
{
    /**
     * @var array $fieldsType
     */
    private $fieldsType = [
        'integer'  => PDO::PARAM_INT,
        'string'   => PDO::PARAM_STR,
    ];

    /**
     * @param array $values
     * @return array
     */
    protected function buildValues(array $values): array
    {
        $data = [];
        foreach ($values as $key => $value) {
            $data[":{$key}"][gettype($value)]    = $value;
        }
        return $data;
    }

    /**
     * @param PDOStatement $statement
     * @return PDOStatement
     */
    protected function buildParams(PDOStatement $statement): PDOStatement
    {
        if ($this->collection->has('values') && is_array($this->collection->get('values')) && $this->collection->isNotEmpty('values')) {
            foreach ($this->collection->get('values') as $key => $value) {
                $current  = current($value);
                $arrayKey = key($value);
                $statement->bindParam($key, $current, $this->fieldsType[$arrayKey]);
            }
        }
        return $statement;
    }

    /**
     * @param string $table
     * @return self
     */
    abstract public function table(string $table);

    /**
     * @param array $columns
     * @return self
     */
    abstract public function select(array $columns);

    /**
     * Add a WHERE condition.
     * @param string $field
     * @param string $value
     * @param string $operator
     * @return self
     */
    abstract public function where(string $field, string $operator, string $value);

    /**
     * Add a WHERE condition.
     * @param array $values
     * @return self
     */
    abstract public function insert(array $values);

    /**
     * Add Order By.
     * @param string $column
     * @return self
     */
    abstract public function orderBy(string $column);

    /**
     * @return Collection
     */
    abstract public function exec(): Collection;
}