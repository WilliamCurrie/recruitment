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

//    public function get($userId = false)
//    {
//        $sql = "SELCT * FROM bookings";
//        if ($userId !== false) {
//            $sql .= " WHERE customerID=" . $userId;
//        }
//
//
//        $db = new \mysqli('database', 'testuser', 'password', 'test', DB_PORT);
//        $res = $db->query($sql);
//
//        while ($result = $res->fetch_assoc()) {
//            $User = User::findById($result['customerID']);
//            $return[$result['id']]['customer_name'] = $User->first_name . ' ' . $User->last_name;
//            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
//            $return[$result['id']]['booking_date'] = date('D dS M Y', result['booking_date']);
//        }
//
//        return $return;
//    }


//    public function find($bookingId = false)
//    {
//        $sql = "SELCT * FROM bookings";
//        if ($userId !== false) {
//            $sql .= " WHERE customerID=" . $userId;
//        }
//
//
//        $db = new \mysqli('database', 'testuser', 'password', 'test', DB_PORT);
//        $res = $db->query($sql);
//
//        while ($result = $res->fetch_assoc()) {
//            $User = User::findById($result['customerID']);
//            $return[$result['id']]['customer_name'] = $User->first_name . ' ' . $User->last_name;
//            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
//            $return[$result['id']]['booking_date'] = date('D dS M Y', result['booking_date']);
//        }
//
//        return $return;
//    }
}