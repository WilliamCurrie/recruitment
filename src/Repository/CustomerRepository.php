<?php

namespace Application\Repository;

use Application\Adaptor\Database\MysqlAdapter;
use Application\Model\Customer;
use mysqli_result;

/**
 * Class CustomerRepository
 *
 * @package Application\Repository
 */
class CustomerRepository extends AbstractRepository
{
    /**
     * CustomerRepository constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->dbAdapter = new MysqlAdapter($config);
    }

    /**
     * @return Customer[]
     */
    public function getOurCustomersBySecondName()
    {
        $customers = [];

        /** NB: raw query left for brevity, but this should be built as PDO statement for execution */
        $res = $this->dbAdapter->query('SELECT * FROM `customers` ORDER BY `second_name`');

        while ($result = $res->fetch_assoc()) {
            /**
             * NB: normally I would expect a Hydrator so that result set is an array of Customer models
             * Set manually for brevity
             */
            $customer = new Customer();
            $customer->setFirstName($result['first_name']);
            $customer->setSecondName($result['second_name']);

            $customers[] = $customer;
        }

        return $customers;
    }

    /**
     * Get all the customers from the database and output them
     *
     * @return Customer[]
     */
    public function getAllCustomers()
    {
        $customers = [];

        /** NB: raw query left for brevity, but this should be built as PDO statement for execution. */
        $res = $this->dbAdapter->query('SELECT * FROM `customers`');

        while ($result = $res->fetch_assoc()) {
            /**
             * NB: normally I would expect a Hydrator so that result set is an array of Customer models.
             * Set manually for brevity.
             */
            $customer = new Customer();
            $customer->setFirstName($result['first_name']);
            $customer->setSecondName($result['second_name']);

            $customers[] = $customer;
        }

        return $customers;
    }

    /**
     * @param Customer $customer
     *
     * @return bool|mysqli_result
     */
    function saveCustomer(Customer $customer)
    {
        /**
         * NB: raw data should be parsed with Input Filters and Validators before building query params
         * NB: raw query left for brevity, but this should be built as PDO statement for execution with params bound
         *  or explicitly using framework query builder and unit tests
         * NB: for speed a manual sprintf and mysqli_escape_string have been used to build string. DO NOT USE THIS!
         */
        $sql = sprintf(
            "INSERT INTO `customers` (`first_name`, `second_name`, `address`) VALUES ('%s', '%s', '%s')",
            $this->dbAdapter->escapeString($customer->getFirstName()),
            $this->dbAdapter->escapeString($customer->getSecondName()),
            $this->dbAdapter->escapeString($customer->getAddress())
        );

        return $this->dbAdapter->query($sql);
    }

    /**
     * @param int $id
     *
     * @return Customer|false
     */
    function findByID(int $id)
    {
        if (!empty($id)) {
            // short circuit
            return false;
        }

        /**
         * NB: raw data should be parsed with Input Filters and Validators before building query params
         * NB: raw query left for brevity, but this should be built as PDO statement for execution with params bound
         *  or explicitly using framework query builder and unit tests
         * NB: for speed a manual sprintf and mysqli_escape_string have been used to build string. DO NOT USE THIS!
         */
        $res = $this->dbAdapter->query(sprintf("SELECT * FROM customers WHERE id = %d", (int)$id));

        if (!empty($res)) {
            /** NB: this should use a Hydrator or a utility method like ExchangeArray() to swap data / Model, vice-versa */
            $customer = new Customer();
            $customer->setFirstName($res["first_name"]);
            $customer->setSecondName($res["second_name"]);
            $customer->setAddress($res["address"]);

            return $customer;
        }

        /** Either return false, or throw an exception and allow the caller to decide what to do. */
        return false;
    }
}
