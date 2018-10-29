<?php

namespace App\Repository;

use App\Entity\Booking;
use Aura\SqlQuery\QueryFactory;
use Core\Model\ModelInterface;
use Core\Repository\AbstractRepository;
use Core\Repository\RepositoryInterface;

/**
 * Class BookingRepository
 *
 * @package App\Repository
 */
class BookingRepository extends AbstractRepository implements RepositoryInterface
{
    /** @var string */
    protected $table = 'bookings';

    /**
     * @param int $customerId
     *
     * @return array|mixed
     */
    public function getByCustomerId(int $customerId)
    {
        $queryFactory = new QueryFactory('mysql');

        $select = $queryFactory->newSelect();
        $select->cols([
            '*',
        ])
            ->from($this->table)
            ->where('customer_id = :id')
            ->bindValue('id', $customerId);

        $sth = $this->db->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $results = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $return = [];
        foreach ($results as $result) {
            $return[] = $this->hydrateObject($result);
        }

        return $return;
    }

    public function save()
    {
        //@todo add functionality
    }

    /**
     * @param array $results
     *
     * @return array|mixed
     */
    public function hydrateObject(array $results): ModelInterface
    {
        return Booking::hydrate($results);
    }
}
