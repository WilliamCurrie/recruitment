<?php

declare(strict_types=1);

namespace WilliamCurrie\Recruitment\Models;

use PDO;
use WilliamCurrie\Recruitment\Exceptions\DatabaseException;
use WilliamCurrie\Recruitment\ValueObjects\Customer;

class Customers
{
    /** @var PDO $pdo */
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param Customer $customer
     * @return bool
     * @throws DatabaseException
     */
    public function saveCustomer(Customer $customer): bool
    {
        $query = 'INSERT INTO `customers` (`first_name`, `second_name`)
                  VALUES (:first_name, :second_name)';

        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':first_name', $customer->firstName, PDO::PARAM_STR);
        $statement->bindParam(':second_name', $customer->secondName, PDO::PARAM_STR);

        if (!$statement->execute()) {
            throw new DatabaseException('Error whilst inserting customer into customers table.');
        }

        return true;
    }

    // TODO: Consider adding other fields
    /**
     * Get all the customers from the database and output them as an associative array
     * @param bool $sortByName default false; sorts results by name
     * @return array associative array of customers indexed by customer id or empty array if non returned
     * @throws DatabaseException on PDOStatement->execute() == false if PDO error mode exception is not configured
     */
    public function getAllCustomers(bool $sortByName = false): array
    {
        $query = 'SELECT `id`, `first_name`, `second_name`
                  FROM `customers`';

        if ($sortByName === true) {
            $query .= ' ORDER BY `second_name`, `first_name`, `id` ASC';
        }

        $statement = $this->pdo->prepare($query);

        if (!$statement->execute()) {
            throw new DatabaseException('Error whilst selecting customers from database.');
        }

        $customers = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($customers) > 0) {
            // Index customers by customer id
            $customers = array_combine(array_column($customers, 'id'), $customers);
        }

        return $customers;
    }
}
