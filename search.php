<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>BearBlacklist</title>
</head>

<body>
    <header class="p-3 bg-white text-white">
        <div class="container">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Navbar brand -->
                        <a class="navbar-brand mt-2 mt-lg-0" href="search.php">
                            <img src="img/icon.png" height="50" alt="MDB Logo" loading="lazy" />
                        </a>
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="listnumber.php">เบอร์มิจฉาชีพ</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Projects</a>
                            </li> -->
                        </ul>
                        <!-- Left links -->
                    </div>
                    <!-- Collapsible wrapper -->

                    <!-- Right elements -->
                    <div class="d-flex align-items-center">

                        <?php
                        if (isset($_SESSION['username']))
                            $username = $_SESSION['username'];
                        ?>
                        <!-- Avatar -->
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="img/<?= $username; ?>.jpg" class="rounded-circle" height="50" alt="Profile" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <!-- <a href="index.php" type="button" class="btn btn-dark btn-lg">Logout</a> -->
                    </div>
                    <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
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
                        <input type="text" id="telnumber" name="telnumber" required maxlength="10">
                        <label for="">เบอร์ที่คุณต้องการค้นหา</label>
                    </div>
                    <button type="submit" name="search" disabled>ค้นหา</button>
                    <div class="register">
                        <p>ต้องการแจ้งเบอร์ที่ไม่พึงประสงค์หรือไม่? <a href="blacklistnumber.php">แจ้งคลิ๊ก</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ... (JavaScript libraries and PHP code as before) ... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var telnumberInput = document.getElementById('telnumber');
            var searchResultModal = document.getElementById('searchResultModal');
            var searchButton = document.querySelector('button[name="search"]');

            telnumberInput.addEventListener('input', function() {
                if (telnumberInput.value.length === 10) {
                    searchButton.removeAttribute('disabled');
                } else {
                    searchButton.setAttribute('disabled', 'disabled');
                }
            });

            searchButton.addEventListener('click', function(event) {
                if (searchButton.hasAttribute('disabled')) {
                    event.preventDefault();
                } else {
                    searchResultModal.style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>

<?php
// session_start();
include('config.php');

$errors = array();
$safetyLevel = "ปลอดภัย";
$progressBarClass = "bg-success";

if (isset($_POST['search'])) {
    $telnumber = mysqli_real_escape_string($conn, $_POST['telnumber']);
    $sql = "SELECT * FROM search WHERE telnumber = '$telnumber'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("ข้อผิดพลาดในคำสั่งคิวรี: " . $conn->error);
    }

    $count = $result->num_rows;

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
            $progressWidth = 25;
        }

        $modalContent = "<h2 style='color: green;'>ผลลัพธ์จากค้นหา '$telnumber'</h2>";

        while ($row = $result->fetch_assoc()) {
            $modalContent .= "เบอร์โทร: " . $row["telnumber"] . " ชื่อ: " . $row["name"] . "<br>";
        }
    } else {
        $modalContent = "<h2 style='color: red;'>ไม่พบผลลัพธ์สำหรับ '$telnumber'</h2>";
    }

    $modalContent .= "<p>ระดับความปลอดภัย: $safetyLevel </p>";

    $modalContent .= "<div class='progress' style='height: 15px;'>
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
<div class="modal fade" id="searchResultModal" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="searchResultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchResultModalLabel">ผลลัพธ์การค้นหา</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $modalContent; ?>
            </div>
        </div>
    </div>
</div>