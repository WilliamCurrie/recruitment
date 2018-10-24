<?php


namespace Model\Gateway\Customers\UseCase;


use Model\Gateway\Customers\CustomerPayload;

interface MapCustomerPayload
{
    /**
     * Maps the payload received from the client into an actual object that can be shared and manipulated more easily
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param array $requestPayload The payload of the request, converted to an array from a JSON object
     * @return CustomerPayload
     */
    public function mapFromRequest(array $requestPayload): CustomerPayload;
}
