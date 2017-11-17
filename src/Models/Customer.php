<?php

namespace App\Models;

/**
 * Class Customer.
 *
 * Basic Model to outline the Customer and
 * related functions.
 */
class Customer extends BaseModel
{
    protected $table = 'customers';

    public $title;
    public $firstName;
    public $last_name;
    public $address;
    public $fillable = ['first_name','second_name'];
}
