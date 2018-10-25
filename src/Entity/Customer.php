<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * For the old AutoIncrement ID, immutable
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $legacyId;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $secondName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $twitterAlias;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="customer")
     */
    private $bookings;

    public function __construct(
        string $firstName,
        string $secondName,
        string $address = '',
        string $twitterAlias = ''
    ) {
        $this->id = Uuid::uuid4();
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->address = $address;
        $this->twitterAlias = strtolower($twitterAlias);

        $this->bookings = new ArrayCollection();
    }

    public function __toString()
    {
        return "{$this->firstName} {$this->secondName}";
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getLegacyId()
    {
        return $this->legacyId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTwitterAlias(): ?string
    {
        return $this->twitterAlias;
    }

    public function setTwitterAlias(?string $twitterAlias): self
    {
        $this->twitterAlias = strtolower($twitterAlias);

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setCustomer($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getCustomer() === $this) {
                $booking->setCustomer(null);
            }
        }

        return $this;
    }
}
