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

        $view = '<table>';
        foreach ($customers as $customer) {
            $view .= '<tr>';
            $view .= '<tr>' . $customer->getFirstName() . '</td>';
            $view .= '<td>' . $customer->getSecondName() . '</td>';
            $view .= '</tr>';
        }

        $view .= '</table>';

        echo $view;
        die();
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
        $view      = '<table>';
        foreach ($customers as $customer) {
            $view .= '<tr>';
            $view .= '<td>';
            $view .= $customer->getFullName();
            $view .= '</td>';
            $view .= '</tr>';
        }
        $view .= '</table>';
        echo $view;
        die();
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