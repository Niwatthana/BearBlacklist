<?php include "config.php";

$_fname = $_POST['fname'];
$_lname = $_POST['lname'];
// $_gender = $_POST['gender'];
$_email = $_POST['email'];
$_tel = $_POST['tel'];
$_passwordd = $_POST['passwordd'];

$sql = "INSERT INTO user(firstname, lastname, email, tel, passwordd) 
VALUES ('$_fname', '$_lname', '$_email', '$_tel', '$_passwordd')";
if (mysqli_query($conn, $sql)) {
    echo "New record createdsuccessfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>