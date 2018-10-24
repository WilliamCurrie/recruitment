<?php


namespace Model\Gateway\Customers;


use Model\Entity\Customer;
use Model\Gateway\Customers\UseCase\ApiFormatCustomer;

class CustomerFormatterApi implements ApiFormatCustomer
{
    /**
     * @inheritDoc
     */
    public function formatForGetResponse(Customer $customer): array
    {
        $result = [
            'customer_id' => $customer->getId(),
            'customer_first_name' => $customer->getFirstName(),
            'customer_second_name' => $customer->getSecondName(),
            'customer_address' => $customer->getAddress(),
            'customer_twitter_alias' => $customer->getTwitterAlias()
        ];

        return $result;
    }
}
