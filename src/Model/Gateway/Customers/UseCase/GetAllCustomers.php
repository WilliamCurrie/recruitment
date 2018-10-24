<?php


namespace Model\Gateway\Customers\UseCase;


use Model\Entity\Customer;

interface GetAllCustomers
{
    /**
     * Returns all records from table 'customers' (unfiltered)
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return Customer[]
     */
    public function getAllCustomers(): array;
}
