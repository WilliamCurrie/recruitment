<?php
namespace App\Domain\ValueObject;

final class Customer {

    public $id;
    public $first_name;
    public $second_name;
    public $address;
    public $twitter_alias;

    public function __construct($id, $first_name, $second_name, $address, $twitter_alias)
    {
        $this->id            = $id;
        $this->first_name    = $first_name;
        $this->second_name   = $second_name;
        $this->address       = $address;
        $this->twitter_alias = $twitter_alias;
    }

    public static function fromArray($array): self
    {
        return new self(
            array_key_exists('id',$array) ? $array['id'] : null,
            array_key_exists('first_name',$array) ? $array['first_name'] : null,
            array_key_exists('second_name',$array) ? $array['second_name'] : null,
            array_key_exists('address',$array) ? $array['address'] : null,
            array_key_exists('twitter_alias',$array) ? $array['twitter_alias'] : null
        );
    }

    public static function fromJson($json): self
    {
        $object = json_decode($json);
        return new self(
            isset($object->id) ? $object->id : null,
            isset($object->first_name) ? $object->first_name : null,
            isset($object->second_name) ? $object->second_name : null,
            isset($object->address) ? $object->address : null,
            isset($object->twitter_alias) ? $object->twitter_alias : null
        );
    }
}