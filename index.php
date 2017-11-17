<?php
namespace App;

use App\Controllers\HomeController;

require  __DIR__. '/src/Bootstrap.php';
$home = new HomeController();
$home->index();