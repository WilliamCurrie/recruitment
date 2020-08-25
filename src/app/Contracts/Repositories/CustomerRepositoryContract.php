<?php

namespace Wranx\Contracts\Repositories;

interface CustomerRepositoryContract
{
    /**
     * Saves a customer to the database
     *
     * @param $customerData
     * @return mixed
     */
    public function save($customerData);

    /**
     * Finds a single Customer.
     *
     * @param int|null $id
     * @return mixed
     */
    public function find($id = null);

    /**
     * Gets all customers.
     *
     * @return mixed
     */
    public function get();
}
