<?php
namespace Booking\Model;
/**
 * Booking repository for create booking/ edit/ get booking logic
 */
class BookingRepository extends AbstractRepository
{
    protected $table = 'bookings';
    protected $key = 'customer_id';
    protected $model = Booking::class;

    public function findByCustomerId($id = '') {
        $selectStatement = $this->db->select()
            ->from($this->table)
            ->where($this->key, '=', $id);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetchAll();
        $output = [];
        if(empty($data)) {
            return $output;
        }
        foreach($data as $val) {
            $booking = new Booking($this);
            $booking->hydrate($val);
            $output[] = $booking;
        }
        return $output;
    }
}