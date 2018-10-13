<?php

namespace Booking\Controller;

use Booking\Model\BookingRepository;
use Booking\Model\CustomerRepository;
use DI\Container;
use Twig_Environment;

class HomeController
{
    /**
     * @var CustomerRepository
     */
    private $repository;

    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(Twig_Environment $twig, CustomerRepository $repository)
    {
        $this->twig = $twig;
        $this->repository = $repository;
    }

    public function __invoke()
    {
        if(!empty($_REQUEST['search'])) {
            $customerCollections = $this->repository->findBySurname($_REQUEST['search']);
        } else {
            $customerCollections = $this->repository->all();
        }

        echo $this->twig->render('home.twig', [
            'customerCollections' => $customerCollections,
            'search' => !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''
        ]);
    }
}