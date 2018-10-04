<?php

namespace App\Library\Database;

use App\Library\Database\Interfaces\IBaseModel;

class BaseModel implements IBaseModel {

    /**
     * @var SqlAdapter
     */
    private $db_adapter;

    /**
     * @var string
     */
    private $object_table;

    /**
     * @var string
     */
    private $object_class;

    /**
     * @var array
     */
    protected $_attributes;

    /**
     * BaseMapper constructor.
     * @param array $data
     */
    public function __construct($data = []) {

        $this->db_adapter  = new SqlAdapter();
        $this->_attributes = $data;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function __get($key) {
        //var_dump($this->_attributes[0]);
        return array_key_exists($key, $this->_attributes) ? $this->_attributes[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value) {
        $this->_attributes[$key] = $value;
    }

    /**
     * @return array
     */
    public function toArray() {
        return $this->_attributes;
    }

    /**
     * @param $table
     */
    public function setTable($table) {
        $this->object_table = $table;
    }

    /**
     * @param $class
     */
    public function setClass($class) {
        $this->object_class = $class;
    }

    /**
     * @param $id
     * @return array|mixed|null
     */
    public function find($id) {

        $data = $this->db_adapter->select($this->object_table)->where('id', '=', $id)->get();

        //Check if there is data before returning
        if($data){
            return $this->createObject($data[0]);
        }
        return null;
    }

    /**
     * @param string $select
     * @return $this
     */
    public function select($select = '*') {
        $this->db_adapter->select($this->object_table, $select);
        return $this;
    }

    /**
     * @param $field
     * @param $operator
     * @param $value
     * @return $this|mixed
     */
    public function where($field, $operator, $value) {
        $this->db_adapter->where($field, $operator, $value);
        return $this;
    }

    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data) {
        return $this->db_adapter->insert($this->object_table, $data);
    }

    /**
     * @param array $data
     * @param string $where
     * @return int|mixed
     */
    public function update(array $data, $where = '') {
        return $this->db_adapter->update($this->object_table, $data, $where);
    }

    /**
     * @param $order_col
     * @param $order_dir
     * @return $this|mixed
     */
    public function orderBy($order_col, $order_dir) {
        $this->db_adapter->orderBy($order_col, $order_dir);
        return $this;
    }

    /**
     * @return array|null
     */
    public function get() {
        return $this->db_adapter->get();
    }

    /**
     * @return mixed
     */
    public function first(){
        return $this->get()[0];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function createObject(array &$data) {
        return new $this->object_class($data);
    }
}