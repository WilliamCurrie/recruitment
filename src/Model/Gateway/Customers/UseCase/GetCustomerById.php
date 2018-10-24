<?php


namespace Model\Gateway\Customers\UseCase;


use Doctrine\ORM\ORMException;
use Model\Entity\Customer;

interface GetCustomerById
{
    /**
     * Finds a customer in the database, identified by its ID
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param int $customerId
     * @return Customer|null
     * @throws ORMException
     */
    public function findById(int $customerId): ?Customer;
}
