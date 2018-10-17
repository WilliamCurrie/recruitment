<?php

namespace Util\Entity;

use Database\DBMSAdapter;
use Start\Application;

abstract class AbstractMapper implements MapperInterface
{
    const TABLE = '';

    /**
     * @return DBMSAdapter
     */
    public function getAdapter()
    {
        return Application::$container['DB_adapter'];
    }

    /**
     * Find an entity by its ID
     * @param int $id
     * @return null
     *
     * @throws \ReflectionException
     */
    public function findById($id)
    {
        $data = $this->getAdapter()
            ->select(static::TABLE, 'id='.$id)
            ->fetch();

        if ([] !== $data) {
            $this->createEntity($data);
        }

        return $this;
    }

    /**
     * @param string $conditions
     * @return array
     *
     * @throws \ReflectionException
     */
    public function find($conditions = '')
    {
        $collection = [];

        $this
            ->getAdapter()
            ->select(static::TABLE, $conditions);

        while ($data = $this->getAdapter()->fetch()) {

            $collection[] = $this->createEntity($data);
        }

        return $collection;
    }

    /**
     * Insert a new entity in the storage
     * @param array $entityData
     *
     * @return bool
     */
    public function create($entityData)
    {
        return $this
            ->getAdapter()
            ->insert(static::TABLE, $entityData);
    }

    /**
     * Update an existing entity in the storage
     * @param object $entity
     * @return bool
     */
    public function update($entity)
    {
        if (!$entity instanceof MapperInterface) {
            throw new \InvalidArgumentException(
                'The entity to be updated must be an instance of ' . static::class
            );
        }

        $id = $entity->id;
        $data = $entity->toArray();

        unset($data['id']);

        return $this->getAdapter()->update(static::TABLE, $data, "id = $id");
    }

    /**
     * Delete one or more entities from the storage
     * @param int $id
     * @param string $col
     *
     * @return bool
     */
    public function delete($id, $col = 'id')
    {
        return $this
            ->getAdapter()
            ->delete(static::TABLE, $col);
    }

    /**
     * @param array $data
     * @return AbstractMapper
     * @throws \ReflectionException
     */
     public function createEntity(array $data = [])
     {
         $class = new \ReflectionClass(static::class);

         $obj = clone $this;
         foreach ($class->getProperties() as $property) {
             if (array_key_exists($property->name, $data)) {
                 $obj->{$property->name} = $data[$property->name];
             }
         }

         return $obj;
     }
}
