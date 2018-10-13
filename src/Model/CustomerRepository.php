<?php

namespace Booking\Model;

use Booking\Model\Contracts\RepositoryInterface;
use DI\Container;

class CustomerRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'customers';
    protected $model = Customer::class;
    protected $bookingRepository = null;

    public function __construct(Container $container, BookingRepository $bookingRepository) {
        parent::__construct($container);
        $this->bookingRepository = $bookingRepository;
        return $this;
    }

    public function findBySurname($surname) {
        $output = [];
        $selectStatement = $this->db->select()
            ->from($this->table)
            ->where('surname', 'LIKE', "%{$surname}%");

        $stmt = $selectStatement->execute();
        $data = $stmt->fetchAll();
        if(empty($data)) {
            return $output;
        }

        foreach($data as $val) {
            $customer = new Customer($this);
            $customer->hydrate($val);
            $output[]  = $customer;

        }
        return $output;
    }

    public function getBookings($id) {
        return $this->bookingRepository->findByCustomerId($id);
    }
}