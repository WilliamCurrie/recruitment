<?php

namespace Wranx\Controllers;

use Framework\Contracts\RequestContract;
use Framework\Contracts\ViewContract;
use Framework\Controller;
use Wranx\Contracts\Repositories\BookingRepositoryContract;
use Wranx\Contracts\Repositories\CustomerRepositoryContract;

class IndexController extends Controller
{
    /**
     * @var BookingRepositoryContract
     */
    public $bookingRepository;
    /**
     * @var CustomerRepositoryContract
     */
    public $customerRepository;

    /**
     * IndexController constructor.
     * @param RequestContract $request
     * @param ViewContract $viewGenerator
     * @param BookingRepositoryContract $bookingRepository
     * @param CustomerRepositoryContract $customerRepository
     */
    public function __construct(
        RequestContract $request,
        ViewContract $viewGenerator,
        BookingRepositoryContract $bookingRepository,
        CustomerRepositoryContract $customerRepository
    ) {
        parent::__construct($request, $viewGenerator);
        $this->bookingRepository = $bookingRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        //Just adds new user every time visited, like the refactor-me.
        $newCustomer = [
            'first_name' => "Jim",
            'second_name' => "Johnson",
        ];
        if (!$this->customerRepository->save($newCustomer)) {
            throw new \Exception('Error Creating new user');
        }

        $customers = $this->customerRepository->get()->sortBy('second_name', SORT_DESC);

        $bookings = false;
        $customer = false;
        if ($this->request->get('customerId') && $this->customerRepository->exists($this->request->get('customerId'))) {
            $bookings = $this->bookingRepository->get($this->request->get('customerId'));
            $customer = $this->customerRepository->find($this->request->get('customerId'));
        }

        return $this->viewGenerator->make('index', compact(
            'newCustomer',
            'customer',
            'customers',
            'bookings'
        ));
    }
}
