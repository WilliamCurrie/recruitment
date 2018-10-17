<?php

namespace App\Validator;

class Customer
{
    const NOT_PRESENTED = ' is not presented!';

    /**
     * @var array
     */
    private static $requiredFields = [
       'title',
       'name',
       'surname',
    ];

    /**
     * @var array
     */
    public static $errorMessages = [];

    /**
     * @param array $incomingData
     */
    public static function validate(array $incomingData)
    {
        foreach (self::$requiredFields as $requiredField) {
            if (!isset($incomingData[$requiredField]) || '' === trim($incomingData[$requiredField])) {
                self::$errorMessages[] = '"' . $requiredField . '"' . self::NOT_PRESENTED;
            }
        }
    }
}
