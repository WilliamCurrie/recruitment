<?php


namespace Booking\Model;


use Booking\Model\Contracts\ModelInterface;

abstract class AbstractModel implements ModelInterface
{
    protected $repository;
    protected $fields = [];
    protected $data = [];

    public function __construct($repository) {
        $this->repository = $repository;
        return $this;
    }

    public function hydrate(array $data) {
        foreach($this->fields as $key=>$value) {
            if(isset($data[$value])) {
                $this->data[$key] = $data[$value];
            } else  {
                $this->data[$key] = '';
            }
        }
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function getData(){
        return $this->data;
    }

    public function save() {
        $data = [];
        foreach($this->fields as $key=> $val) {
            $data[$val] = $this->data[$key];
        }
        /**
         * TODO: store id to this model after save to database.
         */
        $this->data['id'] = $this->repository->save($data);
    }
}