<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed second_name
 * @property mixed first_name
 */
class Customer extends Model
{
    /**
     * @var array $fillable
     */
    public $fillable = ['first_name', 'second_name', 'address'];

    public $timestamps = false;

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name." ".$this->second_name;
    }

}