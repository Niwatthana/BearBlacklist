<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>Login-BearBlacklist</title>

</head>

<body>
    <!-- <a href="index.php">
        <img src="img/icon.png" alt="teenbear" width="50px">
        ย้อนกลับ
    </a> -->
    <div class="back-button">
    <a href="index.php">
        <img src="img/back.png" alt="teenbear" width="80px" >
        
    </a>
    </div>
    <section>

        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Login</h2>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username" placeholder="กรุณากรอกUser">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="password" placeholder="กรุณากรอกรหัสผ่าน">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                        <label>
                            <a href="#">Forgot password?</a>
                        </label>
                    </div>
                    <button type="submit" name="login">Log in</button>
                    <div class="register">
                        <p>Don't have a account ? <a href="registeruserform.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- แยก -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </form>
</body>

</html>
<?php
session_start();
include('config.php');

$errors = array();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $user_type = $_POST['user_type'];

    if (empty($username) || empty($password)) {
        array_push($errors, "กรุณากรอก Username และ password ให้ถูกต้อง");
    } else {
        $password = $password;
        $query = "SELECT * FROM user WHERE username = '$username' AND passwordd = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            $row = mysqli_fetch_array($result);

            if ($row['user_type'] == 'admin') {

                $_SESSION['admin_name'] = $row['username'];
                $_SESSION['u_type'] = $row['user_type'];
?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: "เข้าสู่ระบบAdminสำเร็จ",
                        text: "โปรดรอสักครู่",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location = 'indexadmin.php';
                    });
                </script>
            <?php

            } elseif ($row['user_type'] == 'user') {

                $_SESSION['user_name'] = $row['username'];
                $_SESSION['u_type'] = $row['user_type'];
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: "เข้าสู่ระบบสำเร็จ",
                        text: "โปรดรอสักครู่",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location = 'search.php';
                    });
                </script>
        <?php
            }
        } else {
            array_push($errors, "ไม่สามารถเข้าสู่ระบบได้ โปรดลองใหม่อีกครั้งนึง");
        }
    }

    if (count($errors) > 0) {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'ไม่สำเร็จ :( ',
                text: '<?php echo implode("<br>", $errors); ?>',
            });
        </script>
<?php
    }
}
?>