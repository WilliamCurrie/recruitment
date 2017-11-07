<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomersRepository")
 */
class Customers
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=30)
     *
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     *
     */
    protected $secondName;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    protected $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $twitterAlias;

    /**
     * One Customer has many Bookings
     * @ORM\OneToMany(targetEntity="Bookings", mappedBy="customer", cascade={"persist", "remove"})
     */
    protected $bookings;


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getTwiterAlias()
    {
        return $this->twiterAlias;
    }

    /**
     * @param mixed $twiterAlias
     */
    public function setTwiterAlias($twiterAlias)
    {
        $this->twiterAlias = $twiterAlias;
    }


    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getFullName()
    {
        return $this->firstName . ' ' . $this->secondName;
    }

}