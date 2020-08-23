<?php
namespace App\Connection;

interface DatabaseInterface
{
    /**
     * @return object
     */
    public function get(string $tableName, string $fieldName, string $parameter);

    public function getAll(string $tableName);

    public function create(string $tableName, array $values, string $types, string $fieldName);
}
