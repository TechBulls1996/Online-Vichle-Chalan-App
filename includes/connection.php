<?php
$servername = "localhost";
$username = "u918699320_rajat";
$password = "Rajat@232";
$database = "u918699320_rajat";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection (optional, as PHP will automatically close it at the end of the script)
$conn->close();
?>
