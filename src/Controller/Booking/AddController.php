<?php

namespace Booking\Controller\Booking;

use Booking\Model\BookingRepository;
use Booking\Model\CustomerRepository;
use Twig_Environment;

class AddController
{
    /**
     * @var CustomerRepository
     */
    private $repository;
    private $customerRepository;

    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig, BookingRepository $repository, CustomerRepository $customerRepository)
    {
        $this->twig = $twig;
        $this->repository = $repository;
        $this->customerRepository = $customerRepository;
    }

    public function __invoke($customerId)
    {
        $customer = $this->customerRepository->findById($customerId);
        echo $this->twig->render('new-booking.twig', [
            'customer' => $customer
        ]);

    }
}