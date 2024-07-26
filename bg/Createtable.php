<?php 
include "config.php";
// sqlto create table 

$sql = "CREATE TABLE  search(
    telnumber INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(30) NOT NULL, 
    reg_date TIMESTAMP 
    )";
if (mysqli_query($conn, $sql)) {
    echo "Table MyGuestscreated successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>