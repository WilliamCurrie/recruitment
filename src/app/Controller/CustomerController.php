<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Validator\Customer as CustomerValidator;
use Util\Controller\BaseController;

class CustomerController extends BaseController
{
    const CSRF = 'NOTIMEFORPROPPERONE';

    const SUCCESS_MESSAGE = 'Customer successfully created!';

    public function handleGet()
    {
        $this->view(
            'customer/create',
            [
                'csrf' => self::CSRF,
            ]
        );

        return null;
    }

    public function handlePost()
    {
        // Check for CSRF token validity
        if (empty(static::$request['postArgs']['csrf']) ||
            self::CSRF !== static::$request['postArgs']['csrf']) {
            throw new \LogicException('No CSRF token presented in the request');
        }

        // Very simple field validation
        CustomerValidator::validate(static::$request['postArgs']);

        // If invalid field values detected - go back and display error messages
        if ([] !== CustomerValidator::$errorMessages) {
            $this->view(
                'customer/create',
                [
                    'csrf' => self::CSRF,
                    'errors' => CustomerValidator::$errorMessages
                ]
            );

            return null;
        }
        // If no errors - just create the entity
        $address = isset(static::$request['postArgs']['address']) ?
            static::$request['postArgs']['address'] : null;

        $twitter_alias = isset(static::$request['postArgs']['twitter_alias']) ?
            static::$request['postArgs']['twitter_alias'] : null;

        (new Customer)
            ->create([
                'title' => static::$request['postArgs']['title'],
                'name' => static::$request['postArgs']['name'],
                'surname' => static::$request['postArgs']['surname'],
                'address' => $address,
                'twitter_alias' => $twitter_alias,
            ]);
        // Go and make those happy faces
        $this->view(
            'customer/create',
            [
                'csrf' => self::CSRF,
                'message' => self::SUCCESS_MESSAGE
            ]
        );

        return null;
    }
}
