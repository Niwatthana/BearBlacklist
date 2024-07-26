<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BearBlacklist";
// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

// Check connection 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database 
$sql = "CREATE DATABASE BearBlacklist";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating datavase: " . mysqli_error($conn);
}
mysqli_close($conn);
?>