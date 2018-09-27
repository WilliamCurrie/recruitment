<?php


use App\Models\Customer;

class CustomerController {

    /**
     * @var Customer
     */
    protected $model;

    /**
     * CustomerController constructor.
     */
    public function __construct() {
        $this->model = new Customer();
    }

    /**
     * @return array
     */
    public function index(): array {
        return $this->model->orderBy('second_name', 'desc')->get();
    }

    /**
     * @param array $data
     * @return Customer
     */
    public function store(array $data): Customer {

        $customer_id = $this->model->insert($data);

        return $this->getCustomer($customer_id);
    }

    /**
     * @param $id
     * @return Customer
     */
    public function getCustomer($id): Customer {
        return $this->model->find($id);
    }
}