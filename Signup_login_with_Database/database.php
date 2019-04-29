<?php

$host = "localhost";
$username = "root";
$database = "database2";
$password = "xxxxxxxx";

//  Create a new connection to the MySQL database using PDO
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>