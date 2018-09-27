<?php

namespace RecruitJordi\Repository;

use RecruitJordi\AbstractRepository;
use RecruitJordi\Db;

class Booking extends AbstractRepository
{
    public function __construct(Db $db)
    {
        parent::__construct($db);

        $this->table = 'bookings';
    }

    public function fetchByCustomerId(int $id): array
    {
        $sql = "SELECT b.id as booking_id, b.reference as booking_reference, b.date as booking_date,
            c.id as customer_id, c.first_name as customer_first_name, c.last_name as customer_last_name,
            c.address as customer_address, c.twitter_alias as customer_twitter_alias
            FROM {$this->table} AS b JOIN customers as c ON b.customer_id = c.id WHERE c.id = $id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
