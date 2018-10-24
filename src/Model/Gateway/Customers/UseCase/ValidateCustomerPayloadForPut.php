<?php


namespace Model\Gateway\Customers\UseCase;


use Model\Gateway\Customers\CustomerPayload;

interface ValidateCustomerPayloadForPut
{
    /**
     * Will check if we got enough information to insert a new customer record
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param CustomerPayload $cp
     * @return array Collection of errors found during validation. Empty string if no errors
     */
    public function validate(CustomerPayload $cp): array;
}
