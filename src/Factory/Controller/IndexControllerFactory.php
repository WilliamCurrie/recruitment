<?php

namespace Application\Factory\Controller;

use Application\Controller\IndexController;
use Application\Repository\BookingRepository;
use Application\Repository\CustomerRepository;

/**
 * NB: this would normally be wired with the service configuration (Zend) and would extend a Service Manager or
 * Container aware DI provider.
 *
 * Class IndexControllerFactory
 *
 * @package Application\Factory\Controller
 */
class IndexControllerFactory /**
 * NB: this would normally extend a frameworks Abstract Factory class for DI etc.
 */
{
    /** @var array $config */
    protected $config;

    /** @var BookingRepository $bookRepository */
    protected $bookRepository;

    /** @var CustomerRepository $customerRepository */
    protected $customerRepository;

    /**
     * NB: normally config would be retrieved via framework container / service manager.
     * Added directly here for brevity.
     *
     * IndexControllerFactory constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        /** NB: normally this would be retrieved from Service Manager */
        $this->customerRepository = new CustomerRepository($config);
        /** NB: normally this would be retrieved from Service Manager */
        $this->bookRepository = new BookingRepository($config);
        $this->config = $config;
    }

    /**
     * NB: this would usually be an invokable in Zend, but manually added by method here
     *
     * @return IndexController
     */
    public function getController(): IndexController
    {
        return new IndexController(
            $this->config,
            $this->bookRepository,
            $this->customerRepository
        );
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return IndexControllerFactory
     */
    public function setConfig(array $config): IndexControllerFactory
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return BookingRepository
     */
    public function getBookingRepository(): BookingRepository
    {
        return $this->bookRepository;
    }

    /**
     * @param BookingRepository $bookRepository
     *
     * @return IndexControllerFactory
     */
    public function setBookingRepository(BookingRepository $bookRepository): IndexControllerFactory
    {
        $this->bookRepository = $bookRepository;

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
     * @return IndexControllerFactory
     */
    public function setCustomerRepository(CustomerRepository $customerRepository): IndexControllerFactory
    {
        $this->customerRepository = $customerRepository;

        return $this;
    }
}
