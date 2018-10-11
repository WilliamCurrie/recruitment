<?php
namespace App;

use App\Controllers\BookingController;
use App\Controllers\CustomerController;
use Illuminate\Database\Capsule\Manager as Capsule;

class App{

    /**
     *
     */
    public function boot(){
        $this->registerEloquent();
        return $this;
    }

    /**
     *
     */
    public function routes()
    {
        if(request('customer'))
            return (new BookingController())->store();

        return (new CustomerController)->view();
    }

    /**
     *
     */
    public function registerEloquent()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            "driver"    => "mysql",
            "host"      => env("DB_HOST", "127.0.0.1"),
            "database"  => env("DB_DATABASE", "recruitment"),
            "username"  => env("DB_USER", "root"),
            "password"  => env("DB_PASSWORD", "")
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }

}