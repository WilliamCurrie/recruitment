<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Customers;
use AppBundle\Manager\CustomerManager;
use AppBundle\Repository\CustomersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            ->findAll(true);

        return $this->render('customer/names.html.twig', ["customers" =>$customers]);
    }

    /**
     * @Route("/form", name="customer_form")
     */
    public function newFormAction(){

        return $this->render('customer/form.html.twig');
    }

    /**
     *
     * @Route("/new", name="customer_new", methods="post")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {

        $firstName  = $request->request->get('firstName');
        $secondName = $request->request->get('secondName');
        $address    = $request->request->get('address');
        $new        = $this->get(CustomerManager::class)->createNew(
            $firstName,
            $secondName,
            $address
        );

        if(!empty($new)){
            return new \Symfony\Component\HttpFoundation\Response("Success", \Symfony\Component\HttpFoundation\Response::HTTP_OK);
        }else{
            return new \Symfony\Component\HttpFoundation\Response("Failure", \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }
    }

}