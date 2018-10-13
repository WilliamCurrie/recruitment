<?php

namespace Booking\Controller\Customer;

use Booking\Model\CustomerRepository;
use Twig_Environment;

class AddController
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
        echo $this->twig->render('new-customer.twig', []);
    }
}