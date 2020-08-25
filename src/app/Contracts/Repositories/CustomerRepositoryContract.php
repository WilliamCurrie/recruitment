<?php

namespace Wranx\Contracts\Repositories;

interface CustomerRepositoryContract
{
    public function save($customerData);
    public function find($id = null);
    public function get();
}