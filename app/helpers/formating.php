<?php

/**
 * Formats name into Full Name.
 * @param $firstName - string.
 * @param $secondName - string.
 */

function formatNames($firstName, $secondName) {
    $full_name = $firstName . ' ' . $secondName;

    return $full_name;
}
