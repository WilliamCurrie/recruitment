<?php
class design
{
    public static function formatNames($firstName, $lastName)
    {
        return $firstName . ' ' . $lastName;
    }

    public static function createTable($input = array())
    {
        $ret = '<table>';
        foreach($input as $row) {
            $ret .= '<tr><td>' . $row['firstName'] . '</td><td>' . $row['lastName'] . '</td></tr>';
        }
        $ret .= '</table>';

        return $ret;
    }

    public static function createBookingsTable($input = array())
    {
        $ret = '<table>';
        foreach($input as $row) {
            $ret .= '<tr><td>' . $row['bookingReference'] . '</td><td>' . $row['customerName'] . '</td>
                    <td>' . $row['bookingDate'] . '</td></tr>';
        }
        $ret .= '</table>';

        return $ret;
    }
}