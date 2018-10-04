<?php

namespace App\Library\Database\Interfaces;

interface IBaseModel {

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param string $select
     * @return mixed
     */
    public function select($select = '*');

    /**
     * @return mixed
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
     * @param array $data
     * @return mixed
     */
    public function insert(array $data);

    /**
     * @param array $data
     * @param string $where
     * @return mixed
     */
    public function update(array $data, $where = '');

    /**
     * @param $order_col
     * @param $order_dir
     * @return mixed
     */
    public function orderBy($order_col, $order_dir);
}