<?php

namespace Src\Models;

class Customer
{
    public $id;
    public $first_name;
    public $last_name;
    public $address;
    public $twitter_alias;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if (isset($key)) {
                $this->$key = $value;
            }
        }
    }

    public function formattedName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
