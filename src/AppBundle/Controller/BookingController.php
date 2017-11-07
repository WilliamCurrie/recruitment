<?php
/**
 * Created by PhpStorm.
 * User: walkyria
 * Date: 07/11/17
 * Time: 20:01
 */

namespace AppBundle\Controller;


use AppBundle\Repository\BookingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
u
class BookingController extends Controller
{

    /**
     * @Route("/list", "booking_list")
     */
    public function findBookingsAction($id = null){

        if(!empty($id)){
            $bookings = $this->getDoctrine()->getRepository(BookingsRepository::class)->findBy(["customer"=>$id]);
        }else {
            $bookings = $this->getDoctrine()->getRepository(BookingsRepository::class)->findAll();
        }


        foreach ($bookings as $booking) {
            $customer                                       = $booking->getCustomer();
            $return[$result['id']]['customer_name']     = $User->first_name . ' ' . $User->last_name;
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date']      = date('D dS M Y', result['booking_date']);

            $results  = $bookings->GetBookings($_GET['customerId']);
            foreach ($results as $result):
                echo $result['booking_reference'] . ' - ' . $result['customer_name'] . $result['booking_date'];
            endforeach;
        }

        return $return;
    }
}