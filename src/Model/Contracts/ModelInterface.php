<?php
/**
 * Created by PhpStorm.
 * User: fazleelahee
 * Date: 13/10/2018
 * Time: 18:03
 */

namespace Booking\Model\Contracts;


interface ModelInterface
{
    public function hydrate(array $data);
}