<?php namespace Wranx;

use Iterator;
use PDO;
use PDOException;

class Booking extends Database
{

    private $id;
    private $customerID;
    private $bookingReference;
    private $bookingDate;

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        // Sanitise the integer
        filter_var(trim($id), FILTER_SANITIZE_NUMBER_INT);
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param int $customerID
     */
    public function setCustomerId(int $customerID): void
    {
        // Sanitise the string
        $this->customerID = trim($customerID);
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerID;
    }

    /**
     * @param string $bookingReference
     */
    public function setBookingReference(string $bookingReference): void
    {
        // Sanitise the string
        $customerID = filter_var(trim($bookingReference), FILTER_SANITIZE_STRING);

        if (strlen($customerID) > 0 && strlen($customerID) <= 15){
            $this->customerID = $customerID;
        }
    }

    /**
     * @return string
     */
    public function getBookingReference(): string
    {
        return $this->bookingReference;
    }

    /**
     * @param string $bookingDate
     */
    public function setBookingDate(string $bookingDate): void
    {
        // Sanitise the string
        $bookingDate = filter_var(trim($bookingDate), FILTER_SANITIZE_STRING);

        if (strlen($bookingDate) === 10){
            $this->bookingDate = $bookingDate;
        }
    }

    /**
     * @return string
     */
    public function getBookingDate(): string
    {
        return $this->bookingDate;
    }


    public function getAll(): array
    {
        $result = [];

        try {
            $sql = "SELECT b.booking_reference, "
                . "DATE_FORMAT(b.booking_date, '%a %D %b %Y') AS booking_date, "
                . "CONCAT(c.first_name, \" \", c.second_name) AS customer_name "
                . "FROM bookings b JOIN customers c ON b.customerID = c.id ";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }


    public function getAllForCustomerId(int $id): array
    {
        $result = [];

        try {
            $sql = "SELECT b.booking_reference, "
                 . "DATE_FORMAT(b.booking_date, '%a %D %b %Y') AS booking_date, "
                 . "CONCAT(c.first_name, \" \", c.second_name) AS customer_name "
                 . "FROM bookings b JOIN customers c ON b.customerID = c.id "
                 . "WHERE c.id = :id";
            $sth = $this->dbh->prepare($sql);
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }
}
