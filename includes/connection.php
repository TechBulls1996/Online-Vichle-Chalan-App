<?php
session_start();
//display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$env = [
    'DB' => 'u918699320_rajat',
    'HOST' => 'localhost',
    'DBUSERNAME' => 'u918699320_rajat',
    'DBPASS' => 'Rajat@232',
];

$servername = $env["HOST"];
$username = $env["DBUSERNAME"];
$password = $env["DBPASS"];
$database = $env["DB"];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close connection (optional, as PHP will automatically close it at the end of the script)
//$conn->close();