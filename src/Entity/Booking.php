<?php

namespace App\Entity;

use Core\Error\MissingEntityDetailException;
use Core\Model\ModelInterface;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class Booking
 *
 * @package App\Entity
 */
class Booking implements ModelInterface
{
    /** @var integer */
    private $id;

    /** @var integer */
    private $customerId;

    /** @var string */
    private $bookingReference;

    /** @var \DateTime */
    private $bookingDate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Booking
     */
    public function setId(int $id): Booking
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     *
     * @return Booking
     */
    public function setCustomerId(int $customerId): Booking
    {
        $this->customerId = $customerId;

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
     * @return \DateTime
     */
    public function getBookingDate(): \DateTime
    {
        return $this->bookingDate;
    }

    /**
     * @param \DateTime $bookingDate
     *
     * @return Booking
     */
    public function setBookingDate(\DateTime $bookingDate): Booking
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * @param array $row
     *
     * @return Booking|mixed
     * @throws MissingEntityDetailException
     */
    public static function hydrate(array $row)
    {
        if (!isset($row['id']) ||  !isset($row['customer_id']) || !isset($row['date']) || !isset($row['reference']))
        {
            throw new MissingEntityDetailException('You must provide a id, customer_id, date and reference to create a booking');
        }

        $date = new \DateTime($row['date']);

        $customer = new Booking();
        $customer->setCustomerId($row['customer_id'])
            ->setBookingDate($date)
            ->setBookingReference($row['reference'])
            ->setId($row['id']);

        return $customer;
    }
}
