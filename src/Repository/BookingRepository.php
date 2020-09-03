<?php

namespace Application\Repository;

use Application\Adaptor\Database\MysqlAdapter;
use Application\Model\Booking;
use Application\Model\Customer;

/**
 * Class BookingRepository
 *
 * @package Application\Repository
 */
class BookingRepository extends AbstractRepository
{
    /**
     * NB: Normally the Service Manager would ensure a single instance of each Repository is used,
     * this is a horrible workaround to facility the model relationship without a framework.
     */
    /** @var CustomerRepository $customerRepository */
    protected $customerRepository;

    /**
     * BookingRepository constructor.
     *
     * @param array[] $config
     */
    public function __construct(array $config)
    {
        $this->customerRepository = new CustomerRepository($config);
        $this->dbAdapter = new MysqlAdapter($config);
    }

    /**
     * @param int $customerID
     *
     * @return Booking[]
     */
    public function getBookings(int $customerID = 0)
    {
        $bookings = [];
        /** NB: raw sql left for brevity but this would be a built select query. */
        $sql = "SELECT * FROM bookings";
        if (!empty($customerID)) {
            $sql .= " WHERE id = " . (int)$customerID;
        }

        $res = $this->dbAdapter->query($sql);

        while ($result = $res->fetch_assoc()) {
            /** NB: this would normally be framework Hydrator, but manual build for brevity, keyed by ID */
            $booking = new Booking();
            $booking->setBookingID($result["id"]);
            $booking->setCustomerID($result['customer_id']);

            $customer = $this->customerRepository->findByID($result["customer_id"]);
            if ($customer instanceof Customer) {
                $booking->setCustomer($customer);
            }
            $booking->setBookingReference($result["booking_reference"]);
            $booking->setBookingDate($result["booking_date"]);

            $bookings[$booking->getBookingID()] = $booking;
        }

        return $bookings;
    }
}
