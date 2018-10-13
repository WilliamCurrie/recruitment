<?php


namespace Booking\Model;

use Booking\Model\Contracts\ModelInterface;
use Booking\Model\Contracts\RepositoryInterface;
use DI\Container;
use Slim\PDO\Database;

abstract class AbstractRepository
{
    protected $db;
    protected $table='';
    protected $key='id';
    protected $model= \stdClass::class;
    protected $currentModelId = null;
    protected $container;

    public function __construct(Container $container) {
        $this->db = $container->get(Database::class);
        $this->container = $container;
    }

    public function findById($id = '') {
        if(empty($id) && $this->currentModelId) {
          $id = $this->currentModelId;
        } else if(empty($id) && empty($this->currentModelId)) {
            throw new \Exception('parameter is required.');
        } else {
            $this->setCurrentModelId($id);
        }

        $selectStatement = $this->db->select()
            ->from($this->table)
            ->where($this->key, '=', $id);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();
        if(!empty($data)) {
            $this->model;
            $model = new $this->model($this);
            if($model instanceof ModelInterface) {
                $model->hydrate($data);
            }

            return $model;
        }
        return false;
    }

    public function all() {
        $output = [];

        $selectStatement = $this->db->select(['*'])
            ->from($this->table);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetchAll();

        if(empty($data)) {
            return $output;
        }

        foreach($data as $val) {
            $model = new $this->model($this);
            if($model instanceof ModelInterface) {
                $model->hydrate($val);
            }

            $output[] =  $model;
        }
        return $output;
    }

    /**
     * @param null $currentModelId
     */
    public function setCurrentModelId($currentModelId)
    {
        $this->currentModelId = $currentModelId;
    }

    public function save($data) {
        $insertStatement = $this->db->insert(array_keys($data))
            ->into($this->table)
            ->values(array_values($data));
        return $insertStatement->execute(false);
    }

    public function getModel() {
       return new $this->model($this);
    }
}