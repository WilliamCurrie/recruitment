<?php

namespace App\Repositories\Contracts;

use App\Entities\Contracts\CustomerContract;

interface CustomerRepositoryContract
{
    public function save(CustomerContract $customer);

    public function getAllCustomers();

    public function getAllCustomersSortedBySurname(string $direction);

    public function findById(int $id);

    public function findBySurname(string $surname);
}
