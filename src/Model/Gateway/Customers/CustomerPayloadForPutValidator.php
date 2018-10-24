<?php


namespace Model\Gateway\Customers;


use Model\Gateway\Customers\UseCase\ValidateCustomerPayloadForPut;

class CustomerPayloadForPutValidator implements ValidateCustomerPayloadForPut
{
    /**
     * @inheritDoc
     */
    public function validate(CustomerPayload $cp): array
    {
        $result = [];

        if (strlen(trim($cp->getCustomerFirstName() . '')) === 0) {
            $result[] = 'Customer first name is compulsory';
        }

        if (strlen(trim($cp->getCustomerSecondName() . '')) === 0) {
            $result[] = 'Customer second name is compulsory';
        }

        return $result;
    }
}
