<?php


namespace Application\Controller;

use Application\Model\Customer;
use Application\Repository\BookingRepository;
use Application\Repository\CustomerRepository;

/**
 * Normally this class would extend a framework abstract controller and would be have dependencies injects by service
 * manager. For simplicity I have created a basic Factory to create this controller manually and rather than use a
 * service container, just injected services directly.
 *
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController
{
    /** @var array $config */
    protected $config;

    /** @var BookingRepository $bookingRepository */
    protected $bookingRepository;

    /** @var CustomerRepository $customerRepository */
    protected $customerRepository;

    /**
     * IndexController constructor.
     *
     * @param array $config
     * @param BookingRepository $bookingRepository
     * @param CustomerRepository $customerRepository
     */
    public function __construct(
        array $config,
        BookingRepository $bookingRepository,
        CustomerRepository $customerRepository
    ) {
        $this->config = $config;
        $this->bookingRepository = $bookingRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array[] $config
     *
     * @return IndexController
     */
    public function setConfig(array $config): IndexController
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return BookingRepository
     */
    public function getBookingRepository(): BookingRepository
    {
        return $this->bookingRepository;
    }

    /**
     * @param BookingRepository $bookingRepository
     *
     * @return IndexController
     */
    public function setBookingRepository(BookingRepository $bookingRepository): IndexController
    {
        $this->bookingRepository = $bookingRepository;

        return $this;
    }

    /**
     * @return CustomerRepository
     */
    public function getCustomerRepository(): CustomerRepository
    {
        return $this->customerRepository;
    }

    /**
     * @param CustomerRepository $customerRepository
     *
     * @return IndexController
     */
    public function setCustomerRepository(CustomerRepository $customerRepository): IndexController
    {
        $this->customerRepository = $customerRepository;

        return $this;
    }

    /**
     * NB: for brevity I've simply used an include rather than a proper template engine to remain framework agnostic
     *
     * @return void NB: this would normally return a View from template engine.
     */
    public function indexAction()
    {
        $customerRepository = $this->customerRepository;

        $customer = new Customer();
        $customer->setFirstName("Boris");
        $customer->setSecondName("Johnson");
        $customer->setAddress("Test Address");
        $customerRepository->saveCustomer($customer);

        /**
         * NB: never use global to fetch request data. Use framework Request / Input Filter / Validator
         * Such values can be constrained within Routing and invalid values discarded
         * In the absence of these framework tools I will use the simplest filtering.
         * NB: my preference is for variables to use camelCaseID and for SQL columns to use snake_case customer_id
         * - subject to company Coding Standards
         */
        $customerID = !empty($_GET['customer_id']) ? (int)$_GET['customer_id'] : 0;
        $bookings = $this->bookingRepository->getBookings($customerID);

        /**
         * This would be something like;
         *
         * return View(<name_of_template>, ["array" => "of variables for view to use"]
         */
        include "view/application/index/index.phtml";
        /** NB: again, include of file is ONLY used for brevity in refactor! */
    }

    /**
     * This home action is only for minimal implementation as an example to illustrate that refactoring has NOT
     * implemented a templating engine and certainly does NOT advocate merely dumping file contents in applications!
     *
     * NB: Normally this will be handled by the framework templating engine which will render layout and content
     * In this instance, no layout or engine is used. The view file convention is that of Zend / Laminas
     * - view/<module>/<controller>/<action>.phtml
     *
     * @return string
     */
    public function homeAction()
    {
        /**
         * This would typically be;
         *
         * return View(<name_of_template>, ["array" => "of variables for view to use"]
         */
        return (string)file_get_contents("view/application/index/home.phtml");
        /**
         * NB: again, `file_get_contents` is ONLY used for brevity in refactor!
         */
    }
}
