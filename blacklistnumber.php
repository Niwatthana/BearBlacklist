<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <link rel="stylesheet" href="css/cssregisterform.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <title>blacklistnumber</title>

</head>

<body>

    </head>

    <body>
        <div class="back-button">
            <a href="search.php">
                <img src="img/back.png" alt="teenbear" width="80px">

            </a>
        </div>

        <main>
            <form method="post">
                <div class="imgContainer">
                    <img src="img/jon500.png" alt="Bear" style="background-color: #FF7A07;">
                </div>
                <div class="formContainer">
                    <h1>แจ้งเบอร์มิฉชีพ</h1>
                    <br>




                    <!-- <select class="gender">
                        <option value="" disabled selected hidden>select gender</option>
                        <option  value="Female">Female</option>
                        <option  value="Male">Male</option>
                        <option  value="Other">Other</option>
                    </select> -->

                    <div class="inputGroup">
                        <input type="text" name="telnumber" id="" placeholder="เบอร์ที่คุณต้องการแจ้ง" required maxlength="10">
                    </div>

                    <div class="inputGroup">
                        <input type="text" name="name" id="" placeholder="ชื่อผู้ที่โทรมาแล้วแจ้งว่าอะไร" required>
                        <!-- <input type="text" name="email" id="" placeholder="Email Address"> -->
                    </div>

                    <div class="center">
                        <button type="submit" name="blacklistnumber" class="registerButton">ตกลง ▶</button>
                    </div>

                </div>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

</html>

<?php include "config.php";

if (isset($_POST['blacklistnumber'])) {
    $_telnumber = $_POST['telnumber'];
    $_name = $_POST['name'];
    // $_gender = $_POST['gender'];

    $sql = "INSERT INTO search(telnumber, name) 
VALUES ('$_telnumber', '$_name')";
    if (mysqli_query($conn, $sql)) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "แจ้งเบอร์สำเร็จ",
                text: "โปรดรอสักครู่",
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location = 'search.php';
            });
        </script>
    <?php
    } else { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "แจ้งเบอร์ไม่สำเร็จ",
                text: "โปรดสมัครอีกครั้ง",
            });
        </script>
<?php
    }
    mysqli_close($conn);
}
?>