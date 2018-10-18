<?php
namespace App\Domain\Entity\Booking;

use App\Domain\ValueObject\Booking as BookingValueObject;
use App\Domain\Entity\Customer\Customer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Sergio Lopez
 * @ORM\Entity
 * @ORM\Table(name="bookings")
 * @ORM\Entity(repositoryClass="\App\Infrastructure\Doctrine\Repository\Booking")
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $customer_id;

    /**
     * @ORM\Column(type="string")
     */
    private $booking_reference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $booking_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Entity\Customer\Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    public static function fromValueObject(BookingValueObject $valueObject): self
    {
        $booking = new self();
        $booking->setId($valueObject->id);
        $booking->setCustomer($valueObject->customer);
        $booking->setBookingReference($valueObject->booking_reference);
        $booking->setBookingDate($valueObject->booking_date);
        return $booking;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @param mixed $booking_reference
     */
    public function setBookingReference($booking_reference): void
    {
        $this->booking_reference = $booking_reference;
    }

    /**
     * @param mixed $booking_date
     */
    public function setBookingDate($booking_date): void
    {
        $this->booking_date = $booking_date;
    }
}
