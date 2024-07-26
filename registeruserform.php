<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <link rel="stylesheet" href="css/cssregisterform.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <title>RegisterForm</title>
</head>

<body>
    <div class="back-button">
        <a href="index.php">
            <img src="img/back.png" alt="teenbear" width="80px">

        </a>
    </div>



    <main>
        </div>
        <form method="post">
            <div class="imgContainer">
                <img src="img/rej.jpg" alt="Bear">
            </div>
            <div class="formContainer">
                <h1>Registration Form</h1>
                <br>



                <div class="nameInput">
                    <input type="text" name="fname" id="" placeholder="First Name" required>
                    <input type="text" name="lname" id="" placeholder="Last Name" required>
                </div>

                <!-- <select class="gender">
                        <option value="" disabled selected hidden>select gender</option>
                        <option  value="Female">Female</option>
                        <option  value="Male">Male</option>
                        <option  value="Other">Other</option>
                    </select> -->

                <div class="inputGroup">
                    <input type="text" name="tel" id="" placeholder="Tel" required>
                </div>

                <div class="inputGroup">
                    <input type="text" name="email" id="" placeholder="Email Address" required>
                    <!-- <input type="text" name="email" id="" placeholder="Email Address"> -->
                </div>

                <div class="inputGroup">
                    <input type="text" name="username" id="" placeholder="username" required>
                </div>

                <div class="inputGroup">
                    <input type="text" name="passwordd" id="" placeholder="Password" required>
                </div>

                <div class="center">
                    <button type="submit" name="register" class="registerButton">Register ▶</button>
                </div>

            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php include "config.php";

if (isset($_POST['register'])) {
    $_fname = $_POST['fname'];
    $_lname = $_POST['lname'];
    // $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_tel = $_POST['tel'];
    $_username = $_POST['username'];
    $_passwordd = $_POST['passwordd'];
    $_usertype = 'user';

    $sql = "INSERT INTO user(firstname, lastname, email, tel, username, passwordd, user_type) 
VALUES ('$_fname', '$_lname', '$_email', '$_tel', '$_username', '$_passwordd', '$_usertype')";
    if (mysqli_query($conn, $sql)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "สมัครสมาชิกสำเร็จ",
                text: "โปรดรอสักครู่",
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location = 'login.php';
            });
        </script>
    <?php
    } else { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "สมัครสมาชิกไม่สำเร็จ",
                text: "โปรดสมัครอีกครั้ง",
            });
        </script>
<?php
    }
    mysqli_close($conn);
}
?>