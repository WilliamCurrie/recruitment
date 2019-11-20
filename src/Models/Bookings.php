<?php

namespace WilliamCurrie\Recruitment\Models;

use PDO;
use WilliamCurrie\Recruitment\Exceptions\DatabaseException;

class Bookings
{
    /** @var PDO $pdo */
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param null|int $customerId Optional customer ID to lookup, if not present all booking will be returned
     * @return array associative array of bookings indexed by booking_reference empty array if no results
     * @throws DatabaseException on PDOStatement->execute() == false if PDO error mode exception is not configured
     */
    public function getBookings(?int $customerId = null): array
    {
        $query = 'SELECT b.`id`, b.`customerID`, b.`booking_reference`, b.`booking_date`, c.`first_name`,
                  c.`second_name`
                  FROM `bookings` b
                  LEFT JOIN `customers` c
                  ON `b`.`customerID` = `c`.`id`';

        if (!is_null($customerId)) {
            $query .= ' WHERE `customerID` = :id';
        }

        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $customerId, PDO::PARAM_INT);

        if (!$statement->execute()) {
            throw new DatabaseException('Error whilst selecting bookings from database.');
        }

        $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($bookings) > 0) {
            // Index bookings by booking id
            $bookings = array_combine(array_column($bookings, 'booking_reference'), $bookings);
        }
        return $bookings;
    }
}
