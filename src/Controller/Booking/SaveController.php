<?php

namespace Booking\Controller\Booking;

use Booking\Model\BookingRepository;
use Booking\Model\CustomerRepository;
use Twig_Environment;

class SaveController
{
    /**
     * @var CustomerRepository
     */
    private $repository;

    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig, BookingRepository $repository)
    {
        $this->twig = $twig;
        $this->repository = $repository;
    }

    public function __invoke($customerId)
    {
        /**
         * TODO: backend validation before save this new booking
         */

        $data['customer_id'] = $customerId;
        $data['booking_reference'] = substr(uniqid(), 0, 4);
        $data['booking_date'] = $_POST['booking_date'];
        $booking = $this->repository->getModel();
        $booking->hydrate($data);
        $booking->save();

        $_SESSION['message'] = 'New booking added.';;
        header('Location: /');
    }
}