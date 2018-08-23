<?php

namespace Wranx\Domain\Booking\Entity;

class Booking
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $customerId;
    /**
     * @var string
     */
    private $reference;
    /**
     * @var \DateTimeImmutable
     */
    private $date;

    public function __construct(int $customerId, string $reference, \DateTimeImmutable $date)
    {
        $this->customerId = $customerId;
        $this->reference = $reference;
        $this->date = $date;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
