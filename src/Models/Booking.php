<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model{

    /**
     * @var array $fillable
     */
    public $fillable = ['customerID', 'booking_reference', 'booking_date'];

    /**
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * @var array $attributes
     */
    public $attributes = [
        'booking_date' => ''
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customerID');
    }

}