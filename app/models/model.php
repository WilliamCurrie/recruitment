<?php

namespace App\Models;

use App\Database;

class Model
{
    protected $db;
    protected $objectId;

    public function __construct($objectId = NULL)
    {
        $this->db = new \App\Database\Connection;
        if ($objectId)  $this->objectId = $objectId;
    }
}
