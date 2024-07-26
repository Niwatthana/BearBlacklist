<?php

    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ล็อคอินเรียบร้อย</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>


    <section>
            <div class="form-box">
                <div class="form-value">
                    <form action="">
                        <h3>สวัสดีคุณ</h3>
                        <div class="inputbox1">
                        Username: <?php echo $_POST["username"]; ?>
                        </div>
                        <div class="inputbox1">
                        Password: <?php echo $_POST["password"]; ?>
                        </div>
                        <button> <a href="logout.php">log out</a> </button>
                    </form>
                </div>
            </div>
        </section>





</body>

</html>