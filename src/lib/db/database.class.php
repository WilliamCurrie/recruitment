<?php

class Database {
    // Constants should be in the class rather than outside...
    const DB_SERVERNAME = 'localhost';
    const DB_PORT = 3306;
    const DB_USERNAME = 'testuser';
    const DB_USERPWD = 'password';
    const DB_DBNAME = 'test';

    /*
    I've considered the poor security of 'password', 'test', etc. but
    wanted to keep the details the same in case it ties in with a
    real test db at the Wranx end.
    */

    // Function to connect to database
    public function connect() {

        $conn = new mysqli(self::DB_SERVERNAME, self::DB_USERNAME, self::DB_USERPWD, self::DB_DBNAME, self::DB_PORT);

        if ($conn->connect_error) {
            // For the purposes of this example we can just report a problem
            die("Connection failed: " . $conn->connect_error);
        }

        // We've made it past the die, so return the connection
        return $conn;

    }

}
