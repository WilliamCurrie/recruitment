<?php

namespace Model\Entity;

/**
 * Customer
 */
class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $secondName;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $twitterAlias;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set secondName.
     *
     * @param string $secondName
     *
     * @return Customer
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get secondName.
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set address.
     *
     * @param string|null $address
     *
     * @return Customer
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set twitterAlias.
     *
     * @param string|null $twitterAlias
     *
     * @return Customer
     */
    public function setTwitterAlias($twitterAlias = null)
    {
        $this->twitterAlias = $twitterAlias;

        return $this;
    }

    /**
     * Get twitterAlias.
     *
     * @return string|null
     */
    public function getTwitterAlias()
    {
        return $this->twitterAlias;
    }
}
