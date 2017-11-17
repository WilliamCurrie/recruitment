<?php

/**
 * Returns a formatted version of the persons full name
 *
 * @param string $firstName
 * @param string $surname
 *
 * @return string
 */
function formatNames($firstName = '', $surname = '')
{
    $full_name = $firstName.' '.$surname;

    return $full_name;
}

function partial($file,$data){

    include (__DIR__.'/Template/Partials/'.$file);

}