<?php

namespace Application\Repository;

use Application\Adaptor\Database\DatabaseInterface;

/**
 * Class AbstractRepository
 *
 * @package Application\Repository
 */
class AbstractRepository
{
    /** @var DatabaseInterface $dbAdapter */
    protected $dbAdapter;
}
