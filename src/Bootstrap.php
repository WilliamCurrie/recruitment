<?php
namespace App;

use Dotenv\Dotenv;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/helpers.php';

$dotenv = new Dotenv(__DIR__.'/../');
$dotenv->load();
