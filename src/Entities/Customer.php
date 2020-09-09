<?php

namespace Mfisher\Entities;

/**
 * Customer object
 *
 * @Entity
 * @Table(name="customers")
 */
class Customer
{
    /** @var string */
    public const REPOSITORY_NAME = 'Mfisher\Entities\Customer';

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
     * @Column(type="string", length=30, name="second_name")
     */
    private $secondName;

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
        return $this->id;
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
    public function getSecondName(): ?string
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