<?php
date_default_timezone_set('Asia/Tehran');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shamsipour_library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>