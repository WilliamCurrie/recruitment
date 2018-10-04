<?php

namespace App\Library\Database\Interfaces;

interface IDatabaseAdapter {


    /**
     * @return mixed
     */
    public function connect();

    /**
     * @return bool
     */
    public function disconnect();

    /**
     * @param $table
     * @param string $select
     * @return mixed
     */
    public function select($table, $select = '*');

    /**
     * @return array|null
     */
    public function get();


    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function where($field, $operator, $value);

    /**
     * @param $table
     * @param array $data
     * @return mixed
     */
    public function insert($table, array $data);

    /**
     * @param $table
     * @param array $data
     * @param string $where
     * @return int
     */
    public function update($table, array $data, $where = '');

    /**
     * @param string $order_col
     * @param string $order_dir
     * @return mixed
     */
    public function orderBy($order_col = 'id', $order_dir = 'asc');
}