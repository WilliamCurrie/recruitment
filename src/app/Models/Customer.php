<?php

namespace Wranx\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Wranx\Contracts\Models\CustomerContract;

/**
 * Class Customer
 * @package Wranx\Models
 *
 * @property $first_name
 * @property $second_name
 * @property $address
 */
class Customer extends Eloquent implements CustomerContract
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'address'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customerID', 'id');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->second_name;
    }

    public function saveCustomer()
    {
        $db = new mysqli('database', 'testuser', 'password', 'test', DB_PORT);
        $db->query('INSERT INTO customers (, ) VALUES (\''.$this->firstName.'\', \''.$this->last_name.'\', \''.$this->address.'\')');
    }
    public function get_our_customers_by_surname()
    {
        $db = new \mysqli('database', 'testuser', "password", 'test', DB_PORT);
        $res = $db->query('SELECT * FROM customers ORDER BY second_name');
        while ($result=$res->fetch_assoc()) {
            echo($this->fullName);
        }
    }

    public function findById(string  $id)
    {
        $db = new \mysqli('database', 'testuser', 'password', 'test', DB_PORT);
        $res = $db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
        mysqli_close($db);
        return $res;
    }

    //Get all the customers from the database and output them
    public function getAllCustomers()
    {
        $db = new \mysqli('database', 'testuser', 'password', 'test', DB_PORT);




        $res = $db->query('SELECT * FROM customers');
        print '<table>';
        while ($result = $res->fetch_assoc()) {
            echo '<TR>';
            echo '<TD>'.$result['first_name'].'</ td>';
            echo '<td>'.$result['second_name'].'</ TD>';
            echo '</tr>';
        }




        echo('</table>');
    }
}