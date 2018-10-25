<?php

namespace App\Utils;

use App\Entity\Booking;
use App\Entity\Customer;

/**
 * This class is to generate random data, demonstration purposes only.
 */
class RandomDemoData
{
    public static function getRandomCustomer(): Customer
    {
        $faker = \Faker\Factory::create();

        return new Customer(
            $faker->firstName,
            $faker->lastName,
            $faker->address,
            "@{$faker->firstName}{$faker->lastName}"
        );
    }

    public static function getRandomBookings(Customer $customer): array
    {
        $bookings = [];
        for ($x = 0; $x <= mt_rand(1,10); $x++) {
            $bookings[] = new Booking(
                $customer,
                BookingReferenceGenerator::generate()
            );
        }

        return $bookings;
    }
}
