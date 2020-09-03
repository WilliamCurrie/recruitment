<?php

namespace Application\Model;

/**
 * Class Customer
 *
 * @package Application\Model
 */
class Customer
{
    /** @var string $firstName */
    protected $firstName;

    /** @var string $secondName */
    protected $secondName;

    /**
     * @var string $address
     * NB: this is probably better represented by it's own model using https://schema.org/PostalAddress
     */
    protected $address;

    /** @var string $twitterAlias */
    protected $twitterAlias;

    /**
     * @return string
     */
    public function getTwitterAlias(): string
    {
        return $this->twitterAlias;
    }

    /**
     * @param string $twitterAlias
     *
     * @return Customer
     */
    public function setTwitterAlias(string $twitterAlias): Customer
    {
        $this->twitterAlias = $twitterAlias;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @param string $secondName
     *
     * @return Customer
     */
    public function setSecondName(string $secondName): Customer
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Customer
     */
    public function setAddress(string $address): Customer
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function formatNames(): string
    {
        return $this->firstName . ' ' . $this->secondName;
    }
}
