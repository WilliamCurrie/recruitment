<?php

namespace Wranx\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Wranx\Contracts\Models\CustomerContract;

/**
 * Class Customer
 * @package Wranx\Models
 *
 * @property $first_name
 * @property $second_name
 * @property $address
 */
class Customer extends Eloquent implements CustomerContract
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'address'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customerID', 'id');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->second_name;
    }
}
