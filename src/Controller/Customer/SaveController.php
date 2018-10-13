<?php

namespace Booking\Controller\Customer;

use Booking\Model\CustomerRepository;
use Twig_Environment;

class SaveController
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
        /**
         * TODO: backend validation before save this new customer
         */
        $customer = $this->repository->getModel();
        $customer->hydrate($_POST);
        $customer->save();
        $_SESSION['message'] = 'Customer has been save successfully.';;
        header('Location: /');
    }
}