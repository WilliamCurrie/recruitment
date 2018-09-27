<?php

namespace App\Library\Database;

use App\Library\Database\Interfaces\IDatabaseAdapter;

class SqlAdapter implements IDatabaseAdapter {

    /**
     * @var array
     */
    protected $config = [];

    /**
     * MySql Connection
     */
    public $connection;

    /**
     * Query string
     */
    protected $query;

    /**
     * SqlAdapter constructor.
     * @param array $config
     */
    public function __construct(array $config = []) {

        if (count($config) !== 5) {
            $config = [
                'host'     => 'localhost',
                'username' => 'testuser',
                'password' => 'password',
                'database' => 'test',
                'port'     => 3306
            ];
        }
        $this->config = $config;

        $this->connect();
    }

    /**
     * SqlAdapter destructor.
     */
    public function __destruct() {
        $this->disconnect();
    }

    /**
     * @return \mysqli
     */
    public function connect() {

        if (!$this->connection) {
            if (!$this->connection = mysqli_connect($this->config['host'],
                                                    $this->config['username'],
                                                    $this->config['password'],
                                                    $this->config['database'],
                                                    $this->config['port'])) {
                throw new \RuntimeException("cant connect to database");
            }
        }

        return $this->connection;
    }

    /**
     * @return bool
     */
    public function disconnect() {
        if ($this->connection) {
            mysqli_close($this->connection);
            $this->connection = null;
            return true;
        }
        return false;
    }

    /**
     * @param $table
     * @param string $select
     * @return $this|mixed
     */
    public function select($table, $select = '*') {
        $this->query = "select {$select} from {$table}";
        return $this;
    }

    /**
     * @param string $order_col
     * @param string $order_dir
     * @return $this|mixed
     */
    public function orderBy($order_col = 'id', $order_dir = 'asc') {
        $this->query .= " order by {$order_col} {$order_dir}";
        return $this;
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return $this|mixed
     */
    public function where($field, $operator, $value) {
        $this->query .= " where {$field} {$operator} '{$value}'";
        return $this;
    }

    /**
     * @return array|null
     */
    public function get() {

        if ($this->connection && $this->query) {
            $result = mysqli_query($this->connection, $this->query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            throw new \RuntimeException('Could not run query');
        }
    }

    /**
     * @param $table
     * @param array $data
     * @return mixed
     */
    public function insert($table, array $data) {

        $keys           = implode(',', array_keys($data));
        $values         = implode("','", array_values($data));

        $this->query = "insert into {$table} ($keys) values ('$values')";

        mysqli_query($this->connection, $this->query);
        return mysqli_insert_id($this->connection);
    }

    /**
     * @param $table
     * @param array $data
     * @param string $where
     * @return int
     */
    public function update($table, array $data, $where = '') {

        $set = $this->createSetData($data);

        $this->query = "update {$table} set {$set}";

        if ($where) {
            $this->query .= ' where ' . $where;
        }

        mysqli_query($this->connection, $this->query);
        return mysqli_affected_rows($this->connection);
    }

    /**
     * @param array $update_data
     * @return string
     */
    private function createSetData(array $update_data) {

        $update_values = [];
        foreach ($update_data as $field => $value) {
            $update_values[] = $this->createSetString($field, $value);
        }

        $final = implode(',', $update_values);
        return $final;
    }

    /**
     * @param $field
     * @param $value
     * @return string
     */
    private function createSetString($field, $value) {
        $value = mysqli_real_escape_string($this->connection, $value);
        return $field . '=' . "'{$value}'";
    }
}