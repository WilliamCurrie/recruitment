<?php

namespace Application\Model;

/**
 * Class Booking
 *
 * @package Application\Model
 */
class Booking
{
    /** @var int $bookingID */
    protected $bookingID;

    /** @var int $customerID */
    protected $customerID;

    /** @var Customer $customer */
    protected $customer;

    /** @var string $bookingReference */
    protected $bookingReference;

    /** @var string $bookingDate */
    protected $bookingDate;

    /**
     * @return int
     */
    public function getBookingID(): int
    {
        return $this->bookingID;
    }

    /**
     * @param int $bookingID
     *
     * @return Booking
     */
    public function setBookingID($bookingID): Booking
    {
        $this->bookingID = $bookingID;

        return $this;
    }

    /**
     * @return string
     */
    public function getBookingReference(): string
    {
        return $this->bookingReference;
    }

    /**
     * @param string $bookingReference
     *
     * @return Booking
     */
    public function setBookingReference(string $bookingReference): Booking
    {
        $this->bookingReference = $bookingReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getBookingDate(): string
    {
        return $this->bookingDate;
    }

    /**
     * @param string $bookingDate
     * @return Booking
     */
    public function setBookingDate(string $bookingDate): Booking
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * NB: this requires a relationship being recognise between objects.
     *
     * @return Customer|bool|false
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Booking
     */
    public function setCustomer(Customer $customer): Booking
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerID(): int
    {
        return $this->customerID;
    }

    /**
     * @param int $customerID
     *
     * @return Booking
     */
    public function setCustomerID(int $customerID): Booking
    {
        $this->customerID = $customerID;

        return $this;
    }
}
