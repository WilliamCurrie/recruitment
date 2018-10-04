<?php

namespace App\Models;

use App\Library\Database\BaseModel;

class Booking extends BaseModel {

    /**
     * @var string
     */
    private $table = 'bookings';

    /**
     * Booking constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {

        parent::__construct($data);
        $this->setTable($this->table);
        $this->setClass(self::class);
    }


}