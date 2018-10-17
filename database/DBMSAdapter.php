<?php

namespace Database;

interface DBMSAdapter
{
    public function connect();

    public function disconnect();

    public function query($query);

    public function fetch();

    public function select($table, $conditions = '', $fields = '*', $order = '');

    public function insert($table, array $data);

    public function update($table, array $data, $conditions);

    public function delete($table, $conditions);
}
