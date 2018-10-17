<?php

namespace Util\Entity;

interface MapperInterface
{
    public function findById($id);

    public function find($criteria = '');

    public function create($entityData);

    public function update($entity);

    public function delete($entity);
}
