<?php 


//'localhost', 'testuser', 'password', 'test', DB_PORT
DEFINE ('DB_USER', 'root');
//  BLANK for local dev env
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test1');
DEFINE ('DB_PORT','3306');
// Make the connection:
// 

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );



?>


