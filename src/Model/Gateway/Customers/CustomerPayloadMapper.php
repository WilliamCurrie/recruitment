<?php


namespace Model\Gateway\Customers;


use Model\Gateway\Customers\UseCase\MapCustomerPayload;
use Model\Helpers\Http\InputSanitizer;

class CustomerPayloadMapper implements MapCustomerPayload
{
    /**
     * @var InputSanitizer
     */
    private $inputSanitizer;

    /**
     * CustomerPayloadMapper constructor.
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param InputSanitizer $inputSanitizer
     */
    public function __construct(InputSanitizer $inputSanitizer)
    {
        $this->inputSanitizer = $inputSanitizer;
    }

    /**
     * @inheritDoc
     */
    public function mapFromRequest(array $requestPayload): CustomerPayload
    {
        $result = new CustomerPayload();

        $result
            ->setCustomerId($this->inputSanitizer->sanitizeString($requestPayload['customer_id']))
            ->setCustomerFirstName($this->inputSanitizer->sanitizeString($requestPayload['customer_first_name']))
            ->setCustomerSecondName($this->inputSanitizer->sanitizeString($requestPayload['customer_second_name']))
            ->setCustomerAddress($this->inputSanitizer->sanitizeString($requestPayload['customer_address']))
            ->setCustomerTwitterAlias($this->inputSanitizer->sanitizeString($requestPayload['customer_twitter_alias']));

        return $result;
    }
}
