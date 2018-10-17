<?php

namespace Util\Helper;

use App\Entity\Customer as CustomerEntity;

class Customer
{
    /**
     * @param CustomerEntity $customer
     * @return string
     */
    public static function formatCustomerName(CustomerEntity $customer)
    {
        return $customer->title . ' ' . $customer->name . ' ' . $customer->surname;
    }

    /**
     * @param CustomerEntity $customer
     * @return string
     */
    public static function formatCustomerAddress(CustomerEntity $customer)
    {
        return '"' . $customer->address . '"';
    }
}
