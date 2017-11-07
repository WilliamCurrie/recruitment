<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Customers;
use AppBundle\Manager\CustomerManager;
use AppBundle\Repository\CustomersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{

    /**
     * @Route("/list", name="customer_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findAllAction()
    {
        $customers = $this->getDoctrine()
            ->getRepository(Customers::class)
            ->findAll();

        return $this->render('customer/list.html.twig', ["customers" =>$customers]);
    }


    /**
     * @Route("/secondname", name="customer_second_name")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findBySecondNameAction()
    {
        $customers = $this->getDoctrine()
            ->getRepository(Customers::class)
            ->findAll();

        return $this->render('customer/names.html.twig', ["customers" =>$customers]);
    }

    /**
     * @Route("/new/{firstName}/{secondName}/{address}", name="customer_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $firstName  = $request->get('firstName');
        $secondName = $request->get('secondName');
        $address    = $request->get('address');
        $new        = $this->get(CustomerManager::class)->createNew(
            $firstName,
            $secondName,
            $address
        );

        echo json_encode($new);
        die();
    }

}