<?php namespace Wranx;

use Iterator;
use PDO;
use PDOException;

class Customer extends Database
{
    private $id;
    private $firstName;
    private $lastName;
    private $address;
    private $twitterAlias;

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
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        // Sanitise the string
        $firstName = filter_var(trim($firstName), FILTER_SANITIZE_STRING);

        if (strlen($firstName) > 0 && strlen($firstName) <= 30){
            $this->firstName = $firstName;
        }
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        // Sanitise the string
        $lastName = filter_var(trim($lastName), FILTER_SANITIZE_STRING);

        if (strlen($lastName) > 0 && strlen($lastName) <= 30){
            $this->lastName = $lastName;
        }
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string title
     */
    public function setAddress(string $address): void
    {
        // Sanitise the string
        $address = filter_var(trim($address), FILTER_SANITIZE_STRING);

        if (strlen($address) > 0 && strlen($address) <= 255){
            $this->address = $address;
        } else {
            $this->address = '';
        }
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string title
     */
    public function setTwitterAlias(string $twitterAlias): void
    {
        // Sanitise the string
        $twitterAlias = filter_var(trim($twitterAlias), FILTER_SANITIZE_STRING);

        if (strlen($twitterAlias) > 0 && strlen($twitterAlias) <= 255){
            $this->twitterAlias = $twitterAlias;
        } else {
            $this->twitterAlias = '';
        }
    }

    /**
     * @return string
     */
    public function getTwitterAlias(): string
    {
        return $this->twitterAlias;
    }

    /**
     * Get customer by ID.
     *
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        $result = [];

        try {
            $sql = "SELECT * FROM customers WHERE id = :id";
            $sth = $this->dbh->prepare($sql);
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $tmp = $sth->fetch(PDO::FETCH_ASSOC);
            if ($tmp){
                $result = &$tmp;
            }
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }

    public function existsOne(): bool
    {
        $result = false;

        try {
            $sql = "SELECT id FROM customers LIMIT 1";
            $sth = $this->dbh->query($sql);
            $result = $sth->fetchColumn();
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }

    /**
     * This works on small data sets, but it would exceed memory limits on large ones.
     *
     * @return array
     */
    public function getAll(): array
    {
        $result = [];

        try {
            $sql = "SELECT * FROM customers";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }

    /**
     * Get all customers by surname in ascending order and return
     * as fully formatted first name, last name tuples.
     *
     * This works well on small data sets, but would exceed memory limits
     * on large tables.
     *
     * @return array
     */
    public function getAllBySurname(): array
    {
        $result = [];

        try {
            // TBD: This is inefficient because we will have a natural table scan
            $sql = "SELECT * FROM customers ORDER BY second_name";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($result)){
                $tmp = [];
                $fn = '';

                foreach ($result as $k => $v){
                    $fn = $this->fullName($v['first_name'], $v['second_name']);
                    array_push($tmp, $fn);
                }
                $result = &$tmp;
            }
        } catch (PDOException $e) {
            // log $e->getMessage()
        }

        return $result;
    }

    /**
     * Get all customers by surname in ascending order and return
     * as fully formatted first name, last name tuples.
     *
     * This works well on large data sets with constant memory use.
     *
     * @return Iterator
     */
    public function streamAllByFullName(): Iterator
    {
        try {
            $sql = "SELECT * FROM customers ORDER BY second_name";
            $result = $this->dbh->query($sql);

            while ($record = $result->fetch((PDO::FETCH_ASSOC))){
                yield $this->fullName($record['first_name'], $record['second_name']);
            }
        } catch (PDOException $e) {
            // log $e->getMessage()
        }
    }

    /**
     * Return formatted first name, last name tuple.
     *
     * @param string $firstName
     * @param string $lastName
     * @return string
     */
    public function fullName(string $firstName = '', $lastName = ''): string
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * @param string $firstName
     * @param $lastName
     * @param string $address
     * @param string $twitterAlias
     * @return int
     */
    public function insert(string $firstName, $lastName, $address = '', $twitterAlias = ''): int
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setAddress($address);
        $this->setTwitterAlias($twitterAlias);

        // first_name and second_name in the database cannot be null
        if (!$this->firstName && !$this->lastName){
             // log failed insert
             return 0;
        }

        // Only if we have all obligatory fields
        try {

            $sql = "INSERT INTO customers (first_name, second_name, address, twitter_alias) VALUES "
                 . "(:first_name, :second_name, :address, :twitter_alias)";

            $sth = $this->dbh->prepare($sql);
            $sth->bindParam('first_name', $this->firstName, PDO::PARAM_STR);
            $sth->bindParam('second_name', $this->lastName, PDO::PARAM_STR);
            $sth->bindParam('address', $this->address, PDO::PARAM_STR);
            $sth->bindParam('twitter_alias', $this->twitterAlias, PDO::PARAM_STR);

            $this->dbh->beginTransaction();
            $sth->execute();
            $inserted = $this->dbh->lastInsertId();
            $this->dbh->commit();

            // Log inserted success with id $inserted
            return $inserted;
        } catch (PDOException $e) {
            // log the exception $e->getMessage()
            $this->dbh->rollBack();
        }
    }

    /**
     * Delete all records from the table
     */
    public function deleteAll(): void
    {
        try {
            $sql = "DELETE FROM customers";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
        } catch (PDOException $e) {
            // log $e->getMessage()
        }
    }
}