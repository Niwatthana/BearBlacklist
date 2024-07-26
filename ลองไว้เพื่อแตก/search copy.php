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

<body>
    <header class="p-3 bg-white text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="search.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="img/icon.png" alt="teenbear" width="50">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-4 text-dark">Features</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">Pricing</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">FAQs</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">About</a></li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <a href="index.php" type="button" class="btn btn-dark btn-lg">Logout</a>

                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>ค้นหา</h2>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="telnumber" required maxlength="">
                        <label for="">เบอร์ที่คุณต้องการค้นหา</label>
                    </div>
                    <button type="submit" name="search">ค้นหา</button>
                    <div class="register">
                        <p>ต้องการแจ้งเบอร์ที่ไม่พึงประสงค์หรือไม่? <a href="blacklistnumber.php">แจ้งคลิ๊ก</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- แยก -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
session_start();
include('config.php');

$errors = array();
$safetyLevel = "ปลอดภัย"; // Default safety level
$progressBarClass = "bg-success"; // Default progress bar color class

if (isset($_POST['search'])) {
    $telnumber = mysqli_real_escape_string($conn, $_POST['telnumber']);

    $sql = "SELECT * FROM search WHERE telnumber = '$telnumber'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("ข้อผิดพลาดในคำสั่งคิวรี: " . $conn->error);
    }

    $count = $result->num_rows; // Count of duplicate phone numbers

    if ($count > 0) {
        if ($count >= 10) {
            $safetyLevel = "อันตราย";
            $progressBarClass = "bg-danger";
            $progressWidth = 100;
        } elseif ($count > 5) {
            $safetyLevel = "เสี่ยงสูง";
            $progressBarClass = "bg-warning";
            $progressWidth = 75;
        } elseif ($count >= 5) {
            $safetyLevel = "เริ่มเสี่ยง";
            $progressBarClass = "bg-info";
            $progressWidth = 50;
        } else {
            $progressWidth = 25; // Default progress width if none of the conditions match
        }

        $modalContent = "<h2 style='color: green;'>ผลลัพธ์จากค้นหา '$telnumber'</h2>";
        // $modalContent .= "จำนวนเบอร์โทรที่ซ้ำกัน: " . $count . "<br>";



        while ($row = $result->fetch_assoc()) {
            $modalContent .= "เบอร์โทร: " . $row["telnumber"] . " ชื่อ: " . $row["name"] . "<br>";
        }
    } else {
        $modalContent = "<h2 style='color: red;'>ไม่พบผลลัพธ์สำหรับ '$telnumber'</h2>";
    }

    // Display the safety level
    $modalContent .= "<p>ระดับความปลอดภัย: $safetyLevel</p>";

    // Display the progress bar
    $modalContent .= "<div class='progress'>
    <div class='progress-bar progress-bar-striped progress-bar-animated $progressBarClass' role='progressbar' style='width: $progressWidth%' aria-valuenow='$progressWidth' aria-valuemin='0' aria-valuemax='100'>$safetyLevel</div>
    </div>";

    echo '<script>
        $(document).ready(function() {
            $("#searchResultModal").modal("show");
        });
    </script>';
}
?>

<!-- Modal -->
<div class="modal fade" id="searchResultModal" tabindex="-1" aria-labelledby="searchResultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchResultModalLabel">ผลลัพธ์การค้นหา</h5>
                <button type="button" class="btn btn-danger btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $modalContent; ?>
            </div>
        </div>
    </div>
</div>