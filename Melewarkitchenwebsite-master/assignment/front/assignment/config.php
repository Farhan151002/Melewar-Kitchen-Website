<?php

$host = 'localhost';
$dbname = 'melewar';
$username = 'user';
$password = 'userpwd';


// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}else{
    echo("Database successfully connect");
}

?>