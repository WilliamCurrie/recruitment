<?php

namespace Wranx\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Wranx\Contracts\Models\BookingContract;

class Booking extends Eloquent implements BookingContract
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
        'customerID',
        'booking_reference',
        'booking_date',
    ];

    /**
     * Customer relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID', 'id');
    }
}
