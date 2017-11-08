<?php

namespace AppBundle\Controller;


use AppBundle\Manager\BookingManager;
use AppBundle\Repository\BookingsRepository;
use AppBundle\Repository\CustomersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BookingController extends Controller
{

    /**
     * @Route("/list", name="booking_list")
     */
    public function findBookingsAction($id = null)
    {

        if (!empty($id)) {
            $customer = $this->getDoctrine()->getRepository(CustomersRepository::class)->find($id);
            $bookings = $this->get(BookingManager::class)->findBy(["customer" => $customer]);
        } else {
            $bookings = $this->get(BookingManager::class)->findAll();
        }

        return $this->render('booking/bookings.html.twig', ['bookings' => $bookings]);
    }
}