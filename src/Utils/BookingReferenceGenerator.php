<?php

namespace App\Utils;

use Ramsey\Uuid\Uuid;

class BookingReferenceGenerator
{
    const DEFAULT_LENGTH = 8;
    const MAX_LENGTH = 30;
    const MIN_LENGTH = 5;

    /**
     * Generate a new random booking code
     */
    public static function generate(int $length = self::DEFAULT_LENGTH): string
    {
        $length = ($length > self::MAX_LENGTH) ? self::MAX_LENGTH : $length;
        $length = ($length < self::MIN_LENGTH) ? self::MIN_LENGTH : $length;

        $code = str_replace('-', null, Uuid::uuid4());
        $code = substr($code, 0, $length);
        $code = strtoupper($code);
        return $code;
    }
}
