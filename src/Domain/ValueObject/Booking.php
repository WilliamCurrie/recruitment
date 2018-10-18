<?php
namespace App\Domain\ValueObject;

use App\Domain\DateTimeStringTrait;
use App\Domain\Entity\Customer\Customer;

final class Booking {

    use DateTimeStringTrait;

    public $id;
    public $customer;
    public $booking_reference;
    public $booking_date;

    public function __construct($id, Customer $customer, $booking_reference, $booking_date)
    {
        $this->id                = $id;
        $this->customer          = $customer;
        $this->booking_reference = $booking_reference;
        $this->booking_date      = $booking_date;
    }

    public static function fromArray($array): self
    {
        return new self(
            array_key_exists('id',$array) ? $array['id'] : null,
            (array_key_exists('customer',$array) && $array['customer'] instanceof Customer) ? $array['customer'] : null,
            array_key_exists('booking_reference',$array) ? $array['booking_reference'] : null,
            array_key_exists('booking_date',$array) ? self::dateTimeFromString($array['booking_date']) : null
        );
    }

    public static function fromJsonAndCustomer($json, Customer $customer): self
    {
        $object = json_decode($json);
        return new self(
            isset($object->id) ? $object->id : null,
            $customer,
            isset($object->booking_reference) ? $object->booking_reference : null,
            isset($object->booking_date) ? self::dateTimeFromString($object->booking_date) : null
        );
    }
}