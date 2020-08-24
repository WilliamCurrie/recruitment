<?php
namespace App\Controllers;

use App\Models\Booking;
use App\Models\Customer;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{
    private $bookings;
    private $customers;

    /**
     * HomeController constructor.
     * @param array $url
     */
    public function __construct(array $url)
    {
        $this->bookings = new Booking();
        $this->customers = new Customer();
        parent::__construct($url);
    }

    /**
     * @return array
     */
    public function index()
    {
        $data = ['bookings'=> $this->bookings->getBookings(),
                'customers' => $this->customers->getCustomers()];

        return ['content' => $this->view->render($data, 'home/index')];
    }

    /**
     * Get Info method if it needet
     */
    public function getInfo()
    {

    }

}
