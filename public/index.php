<?php

use Dotenv\Dotenv;
use RecruitJordi\BookingRepository;
use RecruitJordi\Db;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__.'/../');
$dotenv->load();

// echo getenv('DB_USER'); exit;

/* $foo = new \MySQLI(
    getenv('DB_HOST'),
    getenv('DB_USER'),
    getenv('DB_PASSWORD'),
    getenv('DB_NAME'),
    getenv('DB_PORT')
); */

Db::getInstance();

// $bookings = (new BookingRepository(Db::getInstance()))->fetchAll();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
</head>

<body>
<h1>Simple Database App</h1>
<table>
   <caption>Passagers du vol 377</caption>

   <thead> <!-- Passengers of flight 377 -->
       <tr>
           <th>Name</th>
           <th>Age</th>
           <th>Country</th>
       </tr>
   </thead>

   <tfoot> <!-- Table footer -->
       <tr>
           <th>Name</th>
           <th>Age</th>
           <th>Country</th>
       </tr>
   </tfoot>

   <tbody> <!-- Table body -->
       <tr>
           <td>Carmen</td>
           <td>33 years old</td>
           <td>Spain</td>
      </tr>
      <tr>
           <td>Michelle</td>
           <td>26 years</td>
           <td>United States</td>
       </tr>
       <tr>
           <td>François</td>
           <td>43 years old</td>
           <td>France</td>
       </tr>
       <tr>
           <td>Martine</td>
           <td>34 years old</td>
           <td>France</td>
       </tr>
       <tr>
           <td>Jonathan</td>
           <td>13 years old</td>
           <td>Australia</td>
       </tr>
       <tr>
           <td>Xu</td>
           <td>19 years old</td>
           <td>China</td>
       </tr>
   </tbody>
</table>

</body>
</html>
