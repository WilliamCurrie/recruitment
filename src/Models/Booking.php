<?php

namespace Bff\Models;

use Bff\Helpers\DatabaseHelper;
use Exception;

class Booking
{

    public static $db;

    public function __construct()
    {
        self::$db = new DatabaseHelper();
    }

    public static function getBookings($id = false)
    {
        //check to see if we have the singleton DB
        if (is_null(self::$db)) {
            self::$db = new DatabaseHelper();
        }

        $sql = "";
        if ($id !== false && !empty($id)) {
            $sql .= " WHERE customerID='$id'";
        }

        $res = self::$db->get("bookings", $sql);

        $return = [];
        foreach ($res as $result) {

            try {
                $user = new User();
                $user->findById($result['customerID']);

                $name = Customer::formatNames($user->first_name, $user->last_name);
            } catch (Exception $e) {
                $name = "Customer Not Found";
            }

            $return[$result['id']]['customer_name'] = $name;
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date'] = date('D M Y', strtotime($result['booking_date']));
        }

        return $return;
    }

}
