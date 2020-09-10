<?php

namespace Mfisher\Entities;

use DateTime;

/**
 * Booking object
 * 
 * @Entity
 * @Table(name="bookings")
 */
class Booking
{
    /** @var string */
    public const REPOSITORY_NAME = 'Mfisher\Entities\Booking';

    /** @var string */
    private const DATE_FORMAT = 'D dS M Y';

    /**
     * @var int|null
     * 
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue 
    */   
    private $id;

    /**
     * @var Customer|null
     *
     * @ManyToOne(targetEntity="Customer", fetch="EXTRA_LAZY")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
    */
    private $customer;

    /**
     * @var string|null
     * 
     * @Column(type="string", length=15, name="booking_reference")
    */
    private $bookingReference;

    /**
     * @var DateTime|null
     *
     * @Column(type="datetime", name="booking_date")
    */
    private $bookingDate;

    /**
     * @return int|null
    */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Booking
    */
    public function setId(int $id): Booking
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Customer|null
    */
    public function getCustomer(): ?Customer
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
     * @return string|null
    */
    public function getBookingReference(): ?string
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
     * @return DateTime|null
    */
    public function getBookingDate(): ?DateTime
    {
        return $this->bookingDate;
    }

    /**
     * @return string|null
    */
    public function getBookingDateFormated(): ?string
    {
        return $this->getBookingDate()->format(self::DATE_FORMAT);
    }

    /**
     * @param DateTime $bookingDate
     *
     * @return Booking
    */
    public function setBookingDate(DateTime $bookingDate): Booking
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }
}
