<?php
namespace App\Domain;

trait DateTimeStringTrait {

    public static function dateTimeFromString($string) {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $string);
    }
}