<?php


namespace Model\Gateway\Customers\UseCase;


use Doctrine\ORM\ORMException;
use Model\Entity\Customer;
use Model\Gateway\Customers\CustomerPayload;

interface InsertNewCustomerInterface
{
    /**
     * Creates a new record in table 'customers' with the data passed as parameter.
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param CustomerPayload $cp
     * @throws ORMException
     *
     * @return Customer
     */
    public function insertNewCustomer(CustomerPayload $cp): Customer;
}
