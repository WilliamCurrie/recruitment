<?php

namespace Model\Gateway\Customers\UseCase;

use Model\Entity\Customer;

interface ApiFormatCustomer
{
    /**
     * Will return an associative array with the values of the entity passed as parameter, so it can be converted into a
     *     JSON object which could be used as a GET response
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param Customer $customer
     * @return array
     */
    public function formatForGetResponse(Customer $customer): array;
}
