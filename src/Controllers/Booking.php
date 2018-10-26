<?php

namespace App\Controllers;

class Booking extends BaseController
{
    public $bookings = [];

    /**
     * @return string
     */
    public function baseSelectQuery(): string
    {
        return "SELECT b.booking_reference, b.booking_date, c.first_name FROM bookings b JOIN customers c ON c.id = b.customerID";
    }

    /**
     * @param null $customer_id
     * @return array
     */
    public function getBookings($customer_id = null): array
    {
        $query = $this->baseSelectQuery();

        if ($customer_id !== null) {
            $query = sprintf("{$query} WHERE b.customerID = %s", $customer_id);
        }

        $query = $this->database()->prepare($query);
        $query->execute();

        $result = $query->get_result();

        if ($result->num_rows === 0) {
            return [];
        }

        $bookings = [];

        while ($row = $result->fetch_assoc()) {
            $bookings[] = $this->transform($row);
        }

        return $bookings;
    }

    private function transform(array $row): array
    {
        return [
            'first_name' => $row['first_name'],
            'booking_reference' => $row['booking_reference'],
            'booking_date' => $row['booking_date'],
        ];
    }

}