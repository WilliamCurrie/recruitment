<?php
namespace App\Controllers;

use App\Models\Customer;
use App\Models\Booking;
/**
 * Class CustomerController
 * @package App\Controllers
 */
class CustomerController extends Controller
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
     *
     */
    public function index() {

    }

    /**
     * @param $request
     * @throws HttpException
     */
    public function saveCustomer($request)
    {
        if (empty($request['firstName']) || empty($request['lastName']) || empty($request['address'])){
            throw new HttpException('Firstname and LastName is required');
        }
        $customer = new Customer();
        $customer->createCustomer($request['firstName'], $request['lastName'], $request['address']);
    }


    /**
     * Get Customer info
     * @return array
     * @throws HttpException
     */
    public function getInfo()
    {
        $id = $this->url[2];

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
