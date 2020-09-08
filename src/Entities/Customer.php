<?php

namespace Mfisher\Entities;

/**
 * Customer object
 *
 * @Entity
 * @Table(name="customers")
 *
 */
class Customer
{
    /**
     * @var int|null
     * 
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue 
     */   
    private $id;

    /**
     * @var string|null
     *
     * @Column(type="string", length=30, name="first_name")
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @Column(type="string", length=30, name="last_name")
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @Column(type="string", length=255, name="address")
     */
    private $address;

    /**
     * @var string|null
     *
     * @Column(type="string", length=255, name="twitter_alias")
     */
    private $twitterAlias;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getId();
    }

    /**
     * @return Customer
     */
    public function setId(int $id): Customer
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
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
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Customer
     */
    public function setLastName(string $lastName): Customer
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Customer
     */
    public function setAddrress(string $address): Customer
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTwitterAlias(): ?string
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
}