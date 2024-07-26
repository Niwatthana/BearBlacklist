<?php
$servername = "localhost";
$username = "root";
$password = "0650535292";
$dbName = " bearblacklist";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);
mysqli_set_charset($conn, "utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>