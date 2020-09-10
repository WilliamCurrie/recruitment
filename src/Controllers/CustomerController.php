<?php

namespace Mfisher\Controllers;

use Mfisher\Services\BookingService;
use Mfisher\Services\CustomerService;
use Mustache_Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CustomerController
 */
class CustomerController extends AbstractController
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * @var BookingService
     */
    private $bookingService;

    /**
     * CustomerController for handling customer actions
     *
     * @param CustomerService $customerService
     * @param BookingService $bookingService
     */
    public function __construct(CustomerService $customerService, BookingService $bookingService, Mustache_Engine $renderEngine)
    {
        $this->customerService = $customerService;
        $this->bookingService = $bookingService;
        parent::__construct($renderEngine);
    }

    /**
     * The index action
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function indexAction(ServerRequestInterface $request): ResponseInterface
    {
        return $this->render('index', [
            'customers' => $this->customerService->getAllCustomers()
        ]);
    }

    /**
     * Gets booking by customer id
     *
     * @param ServerRequestInterface $request
     * @param array $args
     *
     * @return ResponseInterface
     */
    public function getCustomerBookingAction(ServerRequestInterface $request, array $args) : ResponseInterface
    {
        $customerId = intval($args['id']);

        return $this->render('bookings', [
            'bookings' => $this->bookingService->getBookingsByCustomerId($customerId)
        ]);
    }
}