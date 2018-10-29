<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Core\Controller\BaseController;

/**
 * Class CustomerController
 *
 * @package App\Controller
 */
class CustomerController extends BaseController
{
    public function createAction()
    {
        //@todo add functionality
        echo '501 Not Implemented';
    }

    /**
     * @param int $id
     *
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getAction(int $id)
    {
        /** @var CustomerRepository $customerRepo */
        $customerRepo = $this->container->get('\\App\Repository\\CustomerRepository');

        $customer = $customerRepo->getById($id);

        return $this->render('customers/view.html.twig', [
            'customer' => $customer,
        ]);
    }

    /**
     * @return string
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getAllAction()
    {
        /** @var CustomerRepository $customerRepo */
        $customerRepo = $this->container->get('\\App\Repository\\CustomerRepository');

        $customers = $customerRepo->getAll();

        return $this->render('customers/all.html.twig', [
            'customers' => $customers,
        ]);
    }
}
