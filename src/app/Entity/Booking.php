<?php

namespace App\Entity;

use DateTime;
use Util\Entity\AbstractMapper;

class Booking extends AbstractMapper
{
    const TABLE = 'bookings';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $customer_id;

    /**
     * @var string
     */
    public $reference;

    /**
     * @var DateTime
     */
    public $for_date;
}
