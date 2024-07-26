<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>Login-BearBlacklist</title>

</head>
<header class="p-3 bg-white text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="img/icon.png" alt="teenbear" width="50">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-4 text-dark">Features</a></li>
                <li><a href="#" class="nav-link px-4 text-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-4 text-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-4 text-dark">About</a></li>
            </ul>

            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->

            <!-- <div class="d-grid gap-2 col-1 mx-auto">
          <button type="button" class="btn btn-light btn-lg">Login</button>
        </div> -->
            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">

          <a href="login.php" type="button" class="btn btn-dark btn-lg">Login</a>

        </div> -->
        </div>
    </div>
</header>

<body>
    <!-- <a href="index.php">
        <img src="img/icon.png" alt="teenbear" width="50px">
        ย้อนกลับ
    </a> -->
    <section>

        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>ค้นหา</h2>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" telnumber="telnumber" name="telnumber"  required>
                        <label for="">เบอร์ที่คุณต้องการค้นหา</label>
                    </div>
                    <button type="submit" name="search">ค้นหา</button>
                    <div class="register">
                        <p>Don't have a account ? <a href="registeruserform.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- แยก -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </form>
</body>

</html>
<?php
session_start();
include('config.php');

$errors = array();

if (isset($_POST['search'])) {
    $telnumber = mysqli_real_escape_string($conn, $_POST['telnumber']);

    // คำสั่ง SQL สำหรับค้นหาเบอร์โทร
    $sql = "SELECT * FROM search WHERE telnumber = '$telnumber'";

    // ทำการส่งคำสั่ง SQL
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 1) {
        // มีผลลัพธ์
        $_SESSION['telname'] = $telnumber;
        $_SESSION['success'] = "Logged in successfully";
        $row = mysqli_fetch_array($result);
        
        echo "<h2>ผลลัพธ์จากค้นหา \"$telnumber\"</h2>";
        while ($row = $result->fetch_assoc()) {
            echo " - เบอร์โทร: " . $row["เบอร์โทร"] . "ชื่อ: " . $row["name"] . "<br>";
        }
    } else {
        echo "<h2>ไม่พบผลลัพธ์สำหรับ \"$telnumber\"</h2>";
    }
}
?>
