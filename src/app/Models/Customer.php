<?php

namespace App\Models;

use App\Library\Database\BaseModel;

class Customer extends BaseModel {

    /**
     * @var string
     */
    private $table = 'customers';

    /**
     * Customer constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        parent::setTable($this->table);
        parent::setClass(self::class);
    }

    /**
     * @return string
     */
    public function getFullName(){
        return $this->first_name . ' ' . $this->second_name;
    }
}