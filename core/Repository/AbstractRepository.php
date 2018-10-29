<?php

namespace Core\Repository;

use Aura\SqlQuery\QueryFactory;
use Core\Database\Database;

/**
 * Class AbstractRepository
 *
 * @package Core\Repository
 */
abstract class AbstractRepository
{
    /** @var string */
    protected $table;

    /** @var Database */
    protected $db;

    /**
     * @param array $results
     *
     * @return mixed
     */
    abstract function hydrateObject(array $results);

    /**
     * AbstractRepository constructor.
     *
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        $queryFactory = new QueryFactory('mysql');

        $select = $queryFactory->newSelect();
        $select->cols([
            '*',
        ])
            ->from($this->table)
            ->where('id = :id')
            ->bindValue('id', $id);


        $sth = $this->db->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetch(\PDO::FETCH_ASSOC);

        return $this->hydrateObject($result);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $queryFactory = new QueryFactory('mysql');

        $select = $queryFactory->newSelect();
        $select->cols([
            '*',
        ])
            ->from($this->table);

        $sth = $this->db->prepare($select->getStatement());

        $sth->execute();

        $results = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $return = [];
        foreach ($results as $result) {
            $return[] = $this->hydrateObject($result);
        }

        return $return;
    }
}
