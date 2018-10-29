<?php

namespace Core\Error;

use Throwable;

/**
 * Class MissingDbConnectionCredentialException
 *
 * @package Core\Error
 */
class MissingDbConnectionCredentialException extends \Exception
{
    /**
     * MissingDbConnectionCredentialException constructor.
     *
     * @param null|string    $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(?string $message = null, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            $message ?? "A database credential was missing from config. The following are required: host, port, username, password",
            $code,
            $previous
        );
    }
}