<?php

namespace Wranx\Application;

use Wranx\Application\Services\BookingService;
use Wranx\Application\Services\CustomerService;
use Wranx\Contracts\Support\Collection;

/**
 * Class BookingApp
 * @package Wranx\Application
 */
class BookingApp
{
    /**
     * @var BookingService $bookingService
     */
    private $bookingService;

    /**
     * @var CustomerService $customerService
     */
    private $customerService;

    /**
     * BookingApp constructor.
     * @param BookingService $bookingService
     * @param CustomerService $customerService
     */
    public function __construct(BookingService $bookingService, CustomerService $customerService)
    {
        $this->bookingService  = $bookingService;
        $this->customerService  = $customerService;
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function saveCustomer(array $data): Collection
    {
        return $this->customerService->create($data);
    }

    /**
     * Get All customers
     *
     * @return Collection
     */
    public function getAllCustomers(): Collection
    {
        return $this->customerService->findAll();
    }

    /**
     * Get All customers by username
     *
     * @return Collection
     */
    public function getCustomersByUsername(): Collection
    {
        return $this->customerService->orderBy('second_name');
    }

    /**
     * @param int $customerId
     * @return Collection
     */
    public function getBookings(int $customerId): Collection
    {
        $customer = $this->customerService->findBy('id', $customerId);
        $result   = $this->bookingService
            ->findBy('customerID', $customerId)
            ->mapToGroups(static function ($value) use ($customer) {
                $user = $customer->first();
                return [
                    'data'   => [
                        'customer_name'       => $user['first_name'] . ' ' . $user['second_name'],
                        'booking_reference'   => $value['booking_reference'],
                        'booking_date'        => date('D dS M Y', strtotime($value['booking_date']))
                    ]
                ];
            });
        return $result->first();
    }
}