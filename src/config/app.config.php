<?php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

return array(
	// connection parameters
	'connection' => array(
		'database_type' => 'mysqli',
		'params' => array(
			'host' => $_ENV['DB_HOST'],
			'port' => $_ENV['DB_PORT'],
			'user' => $_ENV['DB_USER'],
			'password' => $_ENV['DB_PASSWORD'],
			'dbname' => $_ENV['DB_NAME'],
		)
	)
);


