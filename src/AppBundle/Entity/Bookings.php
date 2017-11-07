<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookings")
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingsRepository")
 */
class Bookings
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many Bookings has one Customer
     * @ORM\ManyToOne(targetEntity="Customers", inversedBy="bookings")
     */
    protected $customer;


    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $bookingReference;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $bookingDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getBookingReference()
    {
        return $this->bookingReference;
    }

    /**
     * @param mixed $bookingReference
     */
    public function setBookingReference($bookingReference)
    {
        $this->bookingReference = $bookingReference;
    }

    /**
     * @return mixed
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @param mixed $bookingDate
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;
    }



}