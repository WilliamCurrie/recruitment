<?php

namespace App\Models;

use PDO;

abstract class BaseModel
{
    protected $db;
    protected $table = '';
    protected $query;
    protected $fillable = [];
    protected $opperands = ['=', '<=', '=>'];
    protected $data = [];

    protected function connect()
    {
        $this->open();
        if (empty($this->query)) {
            $this->query = 'SELECT * FROM '.$this->table.' ';

            return true;
        }

        $this->query = 'SELECT * FROM '.$this->table.' '.$this->query;
    }

    /**
     * Affix WHERE query to PDO Statement.
     *
     * @param $field
     * @param $opperand
     * @param $valuess
     *
     * @return BaseModel
     */
    public function where($field, $opperand, $value)
    {
        if (in_array($opperand, $this->opperands)) {
            $this->query .= "where $field $opperand :$field";
            $this->data[':'.$field] = $value;
        }
    }

    /**
     * Affix WHERE query to PDO Statement.
     *
     * @param $field
     * @param $opperand
     * @param $value
     *
     * @return BaseModel
     */
    public function orderBy($order, $field)
    {
        if ($order == 'ASC' || $order == 'DESC') {
            $this->query .= ' ORDER BY :orderBy :orderDir ';
            $this->data[':orderBy'] = $field;
            $this->data[':orderDir'] = $order;
        }
    }

    /**
     * Compleate the query.
     *
     * @return mixed
     */
    public function get()
    {
        $this->connect();
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->data);

        return $stmt->fetchAll();
    }

    /**
     * Save the inputted data.
     *
     * @param $array
     *
     * @return mixed
     */
    public function save($array)
    {
        $this->prepareSave($array);
        $statement = $this->db->prepare($this->query);
        $statement->execute($this->data);
    }

    private function prepareSave($array)
    {
        $first = true;
        $this->db = new PDO('mysql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $this->query = 'INSERT INTO '.$this->table.' (';
        foreach ($array as $key => $value) {
            if (in_array($key, $this->fillable)) {
                if ($first != true) {
                    $this->query .= ',';
                }
                $this->query .= $key;
            }
            $first = false;
        }
        $this->query .= ') values (';

        $first = true;
        foreach ($array as $key => $value) {
            if ($first != true) {
                $this->query .= ',';
            }
            if (in_array($key, $this->fillable)) {
                $this->query .= '?';
                $this->data[] = $value;
            }
            $first = false;
        }
        $this->query .= ')';
    }

    public function open()
    {
        $this->db = new PDO('mysql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }

    public function findById($id)
    {
        if (is_int($id)) {
            $this->where('id', '=', $id);
        }
    }
}
