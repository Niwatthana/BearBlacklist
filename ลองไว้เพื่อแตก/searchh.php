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
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="img/icon.png" alt="teenbear" width="50">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-4 text-dark">Features</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">Pricing</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">FAQs</a></li>
                    <li><a href="#" class="nav-link px-4 text-dark">About</a></li>
                </ul>
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
                        <input type="text" name="telnumber" required>
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

    <!-- Modal (ระดับความอันตราย: ปลอดภัย) -->
    <div class="modal fade" id="searchResultModalSafe" tabindex="-1" aria-labelledby="searchResultModalLabelSafe" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchResultModalLabelSafe">ผลลัพธ์การค้นหา (ปลอดภัย)</h5>
                    <button type="button" class="btn btn-danger btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $modalContent; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (ระดับความอันตราย: สุ่ม) -->
    <div class="modal fade" id="randomResultModalWarning" tabindex="-1" aria-labelledby="randomResultModalLabelWarning" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="randomResultModalLabelWarning">ผลลัพธ์สุ่มเสี่ยง</h5>
                    <button type="button" class="btn btn-danger btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $modalContent; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (ระดับความอันตราย: อันตราย) -->
    <div class="modal fade" id="dangerResultModalDanger" tabindex="-1" aria-labelledby="dangerResultModalLabelDanger" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dangerResultModalLabelDanger">ผลลัพธ์อันตราย</h5>
                    <button type="button" class="btn btn-danger btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $modalContent; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    function setModalDangerLevel(modalId, dangerLevel) {
        var modal = document.getElementById(modalId);

        if (dangerLevel === "อันตราย") {
            modal.classList.add("bg-danger");
        } else if (dangerLevel === "สุ่มเสี่ยง") {
            modal.classList.add("bg-warning");
        } else if (dangerLevel === "ปลอดภัย") {
            modal.classList.add("bg-safe");
        }
    }

    // เรียกใช้งานฟังก์ชันเมื่อต้องการกำหนดระดับความอันตราย
    setModalDangerLevel("searchResultModalSafe", "ปลอดภัย");
    setModalDangerLevel("randomResultModalWarning", "สุ่มเสี่ยง");
    setModalDangerLevel("dangerResultModalDanger", "อันตราย");
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"></script>
</body>
</html>


<!-- <?php
session_start();
include('config.php');

$errors = array();

if (isset($_POST['search'])) {
    $telnumber = mysqli_real_escape_string($conn, $_POST['telnumber']);

    $sql = "SELECT * FROM search WHERE telnumber = '$telnumber'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("ข้อผิดพลาดในคำสั่งคิวรี: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $modalContent = "<h2 style='color: green;'>ผลลัพธ์จากค้นหา \"$telnumber\"</h2>";

        while ($row = $result->fetch_assoc()) {
            $modalContent .= "เบอร์โทร: " . $row["telnumber"] . " ชื่อ: " . $row["name"] . "<br>";
        }

        echo '<script>
            $(document).ready(function() {
                $("#searchResultModalSafe").modal("show");
            });
        </script>';
    } else {
        $modalContent = "<h2 style='color: red;'>ไม่พบผลลัพธ์สำหรับ \"$telnumber\"</h2>";

        echo '<script>
            $(document).ready(function() {
                $("#searchResultModalSafe").modal("show");
            });
        </script>';
    }
}
?> -->

<!-- Modal -->
<!-- <div class="modal fade" id="searchResultModalSafe" tabindex="-1" aria-labelledby="searchResultModalLabelSafe" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchResultModalLabelSafe">ผลลัพธ์การค้นหา (ปลอดภัย)</h5>
                <button type="button" class="btn btn-danger btn-close float-left" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $modalContent; ?>
            </div>
        </div>
    </div>
</div> -->
