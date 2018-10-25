<?php

namespace App\Controller;

use App\Service\Customers\Bookings;
use App\Service\Customers\Customers;
use App\Utils\RandomDemoData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController  extends AbstractController
{
    /** @var Customers */
    private $customers;
    /** @var Bookings */
    private $bookings;

    public function __construct(Customers $customers, Bookings $bookings)
    {
        $this->customers = $customers;
        $this->bookings = $bookings;
    }

    /**
     * @Route("/customers", name="customers")
     */
    public function index()
    {
        $customers = $this->customers->getCustomersSortedBySurname();

        return $this->render('customers/index.html.twig', [
            'customers' => $customers
        ]);
    }

    /**
     * @Route("/customers/create", name="customers_create")
     */
    public function create()
    {
        //
        // note: I would add symfony forms here https://symfony.com/doc/current/forms.html
        //       but it's overkill for this demonstration. So going to generate random data.
        //

        // generate a randomised customer
        $customer = RandomDemoData::getRandomCustomer();
        $this->customers->save($customer);

        // generate some randomised bookings for this customer
        $bookings = RandomDemoData::getRandomBookings($customer);
        $this->bookings->saveBatch($bookings);

        return $this->redirectToRoute('customers');
    }
}
