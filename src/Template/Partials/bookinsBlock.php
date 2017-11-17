<?php
/**
 * BOOKINGS BlOCK PARTIAL.
 */

foreach ($data as $result):

    if (!empty($result['booking_reference'])) {
        echo $result['booking_reference'].' - ';
    }

    if (!empty($result['second_name']) && !empty($result['first_name'])) {
        echo formatNames($result['first_name'], $result['second_name']).' - ';
    }

    if (!empty($result['booking_date'])) {
        echo $result['booking_date'];
    }

endforeach;
