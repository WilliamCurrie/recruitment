<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Service\Customers\Bookings;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomerBookingsController extends AbstractController
{
    /** @var Bookings */
    private $bookings;

    public function __construct(Bookings $bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * @Route("/bookings", name="bookings")
     */
    public function index()
    {
        $bookings = $this->bookings->getBookings();

        return $this->render('bookings/index.html.twig', [
            'bookings' => $bookings
        ]);
    }

    /**
     * @Route("/customer/{customer}/bookings", name="customer_bookings")
     */
    public function bookings(Customer $customer)
    {
        return $this->render('bookings/customer.html.twig', [
            'customer' => $customer
        ]);
    }
}
