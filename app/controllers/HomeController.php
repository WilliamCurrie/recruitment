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
     * @return array
     * @throws HttpException
     */
    public function getInfoByID()
    {
        $id = $this->url[1];

        if(is_numeric($id)) {
            $customers = $this->customers->getCustomerByID($id);
        } else {
            $customers = $this->customers->getCustomerBySurname($id);
            $id = $customers[0]['id'];
        }

        if (empty($customers)) {
            throw new HttpException('Customer not found');
        }
        $bookings = $this->bookings->getBookingById($id);

        $data = ['bookings'=> $bookings,
                'customers' => $customers];

        return ['content' => $this->view->render($data, 'home/index')];
    }
}
