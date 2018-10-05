<?php

namespace Main\Controller;

use Customer\Customer;
use Zend\View\Model\ViewModel;
use Manager\DoctrineORM;

/**
 * Class IndexController
 * @package Main\Controller
 */
class IndexController
{
  /**
   * @var \Manager\DoctrineORM
   */
  protected $_em;

  /**
   * @var \recruitmentLoader
   */
  protected $_application;

  /**
   * IndexController constructor.
   * @param \recruitmentLoader $application
   */
  public function __construct(\recruitmentLoader $application)
  {
    $this->_application = $application;
    $this->_em = new DoctrineORM($application);
  }

  /**
   * @return \Zend\View\Model\ViewModel
   */
  public function indexAction()
    {
      $request = $this->_application->getRequestManager()->getHandler();
      $params = $request->getQuery();

      $customers = $this->_em->getEntityManager()->getRepository('Customer\Customer')->findAll();

      $map = [];
      foreach($customers as $user)
      {
        $map[$user->getId()] = $user;
      }

      $customersByName = $this->_em->getEntityManager()->getRepository('Customer\Customer')->findBy([],['secondName' => 'ASC']);

      $customer = new Customer();
      $customer
        ->setFirstName(sprintf('Jim %d',count($customers)))
        ->setSecondName(sprintf('Johnson %d',rand(1,10000)))
        ->setTwitterAlias(sprintf('%s_%s',$customer->getFirstName(),$customer->getSecondName()))->setAddress('Liberty City');
      $this->_em->getEntityManager()->persist($customer);
      $this->_em->getEntityManager()->flush();

      $model = new ViewModel();
      $model->setVariables([
        'customer' => $customer,
        'customers' => $map,
        'customersByName' => $customersByName
      ]);

      if($request->isGet() && isset($params['customerId']))
      {
        $bookings = $this->_em->getEntityManager()->getRepository('Booking\Booking')->findBy(['customerid' => $params['customerId']]);
        $model->setVariable('bookings', $bookings);
      }

      $model->setTemplate('index/index');
      return $model;
    }
} 