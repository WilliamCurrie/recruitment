<?php

namespace Wranx\Application\Http\Api\Controller;

use Wranx\Boundary\Booking\BookingService;
use Wranx\Boundary\Customer\CustomerService;
use Zend\Diactoros\Response\JsonResponse;

class DataController
{
    /**
     * @var CustomerService
     */
    private $customerService;
    /**
     * @var BookingService
     */
    private $bookingService;

    public function __construct(CustomerService $customerService, BookingService $bookingService)
    {
        $this->customerService = $customerService;
        $this->bookingService = $bookingService;
    }

    public function __invoke()
    {
        $customers = $this->customerService->getCustomers();

        $bookings = array_map(function (\stdClass $customer) {
            return $bookings[] = $this->bookingService->getBookingsForCustomer($customer->id);
        }, $customers);

        return new JsonResponse([
            'customers' => $customers,
            'bookings' => array_merge(...$bookings)
        ]);
    }
}
