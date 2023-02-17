<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gobuddy";

$conn = new mysqli($servername, $username, $password, $dbname);
global $conn;
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

?>