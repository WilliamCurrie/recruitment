<?php

namespace Application\Adaptor\Database;

/**
 * Class AbstractAdapter
 *
 * @package Application\Adaptor\Database
 */
class AbstractAdapter implements DatabaseInterface
{
    /** framework would provide standard adapter methods and properties */

    /**
     * This method is only present as an example. Left deliberate 'TODO'.
     *
     * @param  string $required
     * @return void
     */
    public function escapeString(string $required)
    {
        // TODO: Implement generic escapeString() method.
    }

    /**
     * Deliberately left as stub. Overridden in DB specific adapter
     *
     * @param string $sql
     */
    public function query(string $sql)
    {
        // TODO: Implement query() method.
    }
}
