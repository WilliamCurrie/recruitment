<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Core\Controller\BaseController;
use App\Repository\BookingRepository;

/**
 * Class BookingController
 *
 * @package App\Controller
 */
class BookingController extends BaseController
{
    public function createAction()
    {
        //@todo add functionality
        echo '501 Not Implemented';
    }


    public function getAllAction()
    {
        /** @var BookingRepository $bookingRepo */
        $bookingRepo = $this->container->get('\\App\Repository\\BookingRepository');

        $bookings = $bookingRepo->getAll();

        return $this->render('bookings/all.html.twig', [
            'bookings' => $bookings,
        ]);
    }

    /**
     * @param int $customerId
     *
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getByCustomerIdAction(int $customerId)
    {
        /** @var BookingRepository $bookingRepo */
        $bookingRepo = $this->container->get('\\App\Repository\\BookingRepository');

        /** @var CustomerRepository $customerRepo */
        $customerRepo = $this->container->get('\\App\\Repository\\CustomerRepository');

        /** @var Booking $bookings */
        $bookings = $bookingRepo->getByCustomerId($customerId);

        /** @var Customer $customer */
        $customer = $customerRepo->getById($customerId);

        return $this->render('bookings/get_by_customer_id.html.twig', [
            'bookings' => $bookings,
            'customer' => $customer,
        ]);
    }
}
