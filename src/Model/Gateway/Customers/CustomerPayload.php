<?php


namespace Model\Gateway\Customers;


class CustomerPayload
{
    /**
     * @var int|null
     */
    private $customerId = null;
    /**
     * @var string|null
     */
    private $customerFirstName = null;
    /**
     * @var string|null
     */
    private $customerSecondName = null;
    /**
     * @var string|null
     */
    private $customerAddress = null;
    /**
     * @var string|null
     */
    private $customerTwitterAlias = null;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param int|null $customerId
     * @return CustomerPayload
     */
    public function setCustomerId(?int $customerId): CustomerPayload
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return null|string
     */
    public function getCustomerFirstName(): ?string
    {
        return $this->customerFirstName;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param null|string $customerFirstName
     * @return CustomerPayload
     */
    public function setCustomerFirstName(?string $customerFirstName): CustomerPayload
    {
        $this->customerFirstName = $customerFirstName;

        return $this;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return null|string
     */
    public function getCustomerSecondName(): ?string
    {
        return $this->customerSecondName;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param null|string $customerSecondName
     * @return CustomerPayload
     */
    public function setCustomerSecondName(?string $customerSecondName): CustomerPayload
    {
        $this->customerSecondName = $customerSecondName;

        return $this;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return null|string
     */
    public function getCustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param null|string $customerAddress
     * @return CustomerPayload
     */
    public function setCustomerAddress(?string $customerAddress): CustomerPayload
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return null|string
     */
    public function getCustomerTwitterAlias(): ?string
    {
        return $this->customerTwitterAlias;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param null|string $customerTwitterAlias
     * @return CustomerPayload
     */
    public function setCustomerTwitterAlias(?string $customerTwitterAlias): CustomerPayload
    {
        $this->customerTwitterAlias = $customerTwitterAlias;

        return $this;
    }
}