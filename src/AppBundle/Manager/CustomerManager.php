<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Customers;
use AppBundle\Repository\CustomersRepository;
use Doctrine\ORM\EntityManager;

class CustomerManager
{

    protected $customersRepository;

    protected $entityManager;

    public function __construct(EntityManager $em, CustomersRepository $customersRepository)
    {
        $this->entityManager = $em;
        $this->customersRepository = $customersRepository;
    }


    public function findById($id)
    {
        return $this->customersRepository->find($id);
    }

    public function createNew($firstName,$secondName,$address){

        $customer = new Customers();
        $customer->setFirstName($firstName);
        $customer->setSecondName($secondName);
        $customer->setAddress($address);
        $this->entityManager->persist($customer);
        $this->entityManager->flush();
        return $customer;
    }

}