<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Bookings;
use AppBundle\Repository\BookingsRepository;
use Doctrine\ORM\EntityManager;

class BookingManager
{

    protected $bookingsRepository;

    protected $entityManager;

    public function __construct(EntityManager $em, BookingsRepository $bookingsRepository)
    {
        $this->entityManager = $em;
        $this->bookingsRepository = $bookingsRepository;
    }


    public function findBy($value = [])
    {
        return $this->bookingsRepository->findBy($value);
    }

    public function findAll(){
        return $this->bookingsRepository->findAll();
    }

}