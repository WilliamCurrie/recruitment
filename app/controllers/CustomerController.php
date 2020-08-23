<?php
namespace App\Controllers;

use App\Models\Customer;

/**
 * Class CustomerController
 * @package App\Controllers
 */
class CustomerController extends Controller
{

    /**
     * @param $request
     * @throws HttpException
     */
    public function saveCustomer($request)
    {
        if (empty($request['firstName']) || empty($request['lastName'])) {
            throw new HttpException('Firstname and LastName is required');
        }
        $customer = new Customer();
        $customer->createCustomer($request['firstName'], $request['lastName']);
    }
}
