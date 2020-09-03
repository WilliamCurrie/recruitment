<?php

namespace Application\Adaptor\Database;

/**
 * Class DatabaseInterface
 *
 * @package Application\Adaptor\Database
 */
interface DatabaseInterface
{
    /**
     * Sample interface method
     *
     * @param string $required
     */
    public function escapeString(string $required);

    /**
     * NB: this wouldn't normally be used and should be replaced with Select Query builder or PDO
     * Left as parse of SQL for brevity
     *
     * @param string $sql
     */
    public function query(string $sql);
}
