<?php

namespace Wranx\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Wranx\Contracts\Models\CustomerContract;
use Wranx\Contracts\Repositories\CustomerRepositoryContract;

/**
 * Class CustomerRepository
 * @package Wranx\Repositories
 * @mixin Builder
 */
class CustomerRepository implements CustomerRepositoryContract
{
    private $model;

    public function __construct(CustomerContract $model)
    {
        $this->model = $model;
    }

    /**
     * @param $customerData
     */
    public function save($customerData)
    {
        $customer = new $this->model();
        $customer->first_name = $customerData['first_name'] ?? '';
        $customer->second_name = $customerData['second_name'] ?? '';
        $customer->address = $customerData['address'] ?? '';

        return $customer->save();
    }

    public function find($id = null)
    {
        return $this->model->find($id);
    }

    public function get()
    {
        return  $this->model->get();
    }

    public function exists($id = null){
        if(!$id){
            return false;
        }

        return $this->model->where('id', $id)->exists();
    }
}