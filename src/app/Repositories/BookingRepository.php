<?php

namespace Wranx\Repositories;

use Wranx\Contracts\Models\BookingContract;
use Wranx\Contracts\Models\CustomerContract;
use Wranx\Contracts\Repositories\BookingRepositoryContract;

class BookingRepository implements BookingRepositoryContract
{
    /**
     * @var BookingContract
     */
    private $booking;
    /**
     * @var CustomerContract
     */
    private $customer;

    public function __construct(BookingContract $booking, CustomerContract $customer)
    {
        $this->booking = $booking;
        $this->customer = $customer;
    }

    public function find($bookingId = false)
    {
        return $bookingId ? $this->booking->find($bookingId) : false;
    }

    public function exists($bookingId)
    {
        return $this->booking->where('id', $bookingId)->exists();
    }

    public function get($userId = false)
    {

        return $userId ? $this->booking->where('customerID', $userId)->get() : false;
    }
}
