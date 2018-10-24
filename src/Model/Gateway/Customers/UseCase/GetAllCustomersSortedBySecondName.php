<?php


namespace Model\Gateway\Customers\UseCase;


use Model\Entity\Customer;
use Model\Enums\SortingDirection;

interface GetAllCustomersSortedBySecondName
{
    /**
     * Gets all customers sorted by second name
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param SortingDirection $direction Ascending or descending
     * @return Customer[]
     */
    public function getAllCustomersSortedBySecondName(SortingDirection $direction): array;
}
