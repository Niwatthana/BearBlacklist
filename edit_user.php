<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
    <title>แก้ไขข้อมูลลูกค้า</title>
</head>

<body>
    <?php
    $username = null;
    if (isset($_GET["username"])) {
        $username = $_GET["username"];
    }

    $user = $username;

    include_once "config.php";
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM user WHERE username = '$user'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h4>ฟอร์มแก้ไขข้อมูล</h4>
                <form method="POST">
                    <input type="hidden" name="firstname" value="<?= $result['firstname']; ?>">
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" class="form-control" value="<?= $result['firstname']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">นามสกุล</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" class="form-control" value="<?= $result['lastname']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="<?= $result['email']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">tel</label>
                        <div class="col-sm-10">
                            <input type="text" name="tel" class="form-control" value="<?= $result['tel']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" value="<?= $result['username']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" name="passwordd" class="form-control" value="<?= $result['passwordd']; ?>">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="col-sm-2 col-form-label">ประเภทผู้ใช้</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_type" class="form-control" value="<?= $result['user_type']; ?>">
                        </div>
                    </div>
                    <button type="submit" name="edit_user" class="btn btn-primary">แก้ไขข้อมูล</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
include_once "config.php";
if (isset($_POST["edit_user"])) {

    $sql = "UPDATE user SET
    firstname = '" . $_POST["firstname"] . "' ,
    lastname = '" . $_POST["lastname"] . "' ,
    email = '" . $_POST["email"] . "' ,
    tel = '" . $_POST["tel"] . "' ,
    username = '" . $_POST["username"] . "' ,
    passwordd = '" . $_POST["passwordd"] . "' ,
    user_type = '" . $_POST["user_type"] . "'
    WHERE username = '" . $_POST["username"] . "' ";

    $query = mysqli_query($conn, $sql);
    if ($query) {
?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "เสร็จสิ้น!!",
                text: "อัปเดตข้อมูลเสร็จสิ้น โปรดรอสักครู่",
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                document.location.href = 'tableuser.php';
            });
        </script>
<?php
    }
    mysqli_close($conn);
}
?>