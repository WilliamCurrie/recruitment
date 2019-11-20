<?php

declare(strict_types=1);

namespace WilliamCurrie\Recruitment\Validators;

use Exception;
use LogicException;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;

class CustomerValidator
{
    // TODO: Consider accepting value objects or variables by reference to allow simple trim and cast operations

    /**
     * @var UserFeedback
     */
    protected $feedback;

    /**
     * @param UserFeedback $feedback
     * @return $this
     */
    public function setUserFeedback(UserFeedback $feedback)
    {
        $this->feedback = $feedback;

        return $this;
    }

    /**
     * @return UserFeedback
     */
    public function getUserFeedback(): UserFeedback
    {
        if (!$this->feedback instanceof UserFeedback) {
            throw new LogicException('UserFeedback object must be set in ' . self::class);
        }

        return $this->feedback;
    }

    /**
     * @param string|int $customerId Must be an unsigned integer or a string containing an unsigned integer
     * @return bool true on valid
     * @throws Exception
     */
    public function validateCustomerId($customerId): bool
    {
        $feedback = $this->getUserFeedback();

        // Warning PHP doesn't have unsigned int, so the max is PHP_INT_MAX==2147483647
        // the datatype for the mysql column uses unsigned so allows up to 4294967295

        if (!ctype_digit($customerId) && !is_int($customerId)) {
            $feedback->add(
                'Value given for customerId must be an integer.',
                $feedback::MESSAGE_TYPE_WARN
            );
        } elseif ($customerId < 1 || $customerId > 4294967295) { // Max int allowed in customerId field
            $feedback->add(
                'Value given for customerId outside of allowable range.',
                $feedback::MESSAGE_TYPE_WARN
            );
        } else {
            return true;
        }

        return false;
    }

    /**
     * @param string $firstName Customers first name
     * @param string $secondName Customers second name
     * @return bool true on valid
     */
    public function validateName(string $firstName, string $secondName): bool
    {
        $feedback = $this->getUserFeedback();

        $firstName = trim($firstName);
        $secondName = trim($secondName);

        if ($firstName === '') {
            $feedback->add(
                'Customer first name must include one or more characters.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        if ($secondName === '') {
            $feedback->add(
                'Customer second name must include one or more characters.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        if (strlen($firstName) > 30) {
            $feedback->add(
                'Customer first name must be no more than 30 characters long.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        if (strlen($secondName) > 30) {
            $feedback->add(
                'Customer second name must be no more than 30 characters long.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        // Regex matches a-z plus common name chars from the Latin1 supplement
        if (!preg_match('/^([A-Za-z\xC0-\xD6\xD8-\xf6\xf8-\xff]*)$/u', $firstName)) {
            $feedback->add(
                'Customer name includes unsupported characters.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        // TODO: Disallow Hyphen and apostrophe at start or end of secondName with regex lookaround or simple
        //       if (strlen(trim($secondName, '-\'')) < strlen($secondName)) {} ...and add to unit tests

        // Regex matches a-z plus common name chars from the Latin1 supplement
        // Hyphen to support double barrel name
        // Apostrophe to support O'Reily etc
        // Space to support Van/Von/De etc
        if (!preg_match('/^([A-Za-z\xC0-\xD6\xD8-\xf6\xf8-\xff\'\-\s]*)$/u', $secondName)) {
            $feedback->add(
                'Customer name includes unsupported characters.',
                $feedback::MESSAGE_TYPE_WARN
            );
            return false;
        }

        return true;
    }
}
