<?php
namespace App\Domain\Entity\Customer;

use App\Domain\ValueObject\Customer as CustomerValueObject;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Sergio Lopez
 * @ORM\Entity
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="App\Infrastructure\Doctrine\Repository\Customer")
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $second_name;

    /**
     * @ORM\Column(type="string")
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     */
    private $twitter_alias;

    /**
     * One Customer may have Many Bookings.
     * @ORM\OneToMany(targetEntity="App\Domain\Entity\Booking\Booking", mappedBy="customer_id")
     */
    private $bookings;

    public static function fromValueObject(CustomerValueObject $valueObject): self
    {
        $customer = new self();
        $customer->setId($valueObject->id);
        $customer->setFirstName($valueObject->first_name);
        $customer->setSecondName($valueObject->second_name);
        $customer->setAddress($valueObject->address);
        $customer->setTwitterAlias($valueObject->twitter_alias);
        return $customer;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @param mixed $second_name
     */
    public function setSecondName($second_name): void
    {
        $this->second_name = $second_name;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @param mixed $twitter_alias
     */
    public function setTwitterAlias($twitter_alias): void
    {
        $this->twitter_alias = $twitter_alias;
    }
}
