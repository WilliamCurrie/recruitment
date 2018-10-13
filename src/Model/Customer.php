<?php
namespace Booking\Model;

class Customer extends AbstractModel
{
    protected $fields = [
        'id' => 'id',
        'firstName' => 'firstname',
        'surname' => 'surname',
        'address' => 'address',
        'twitterAlias' => 'twitter_alias'
    ];

    public function fullName() {
        return $this->firstName.' '.$this->surname;
    }

    public function getBookings() {
        return $this->repository->getBookings($this->id);
    }
}