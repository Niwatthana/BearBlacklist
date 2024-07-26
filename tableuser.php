<?php include "config.php";

if (isset($_GET['delete'])) {
    $delete_username = $_GET['delete'];
    $sql = "DELETE FROM user WHERE `user`.`username` = '$delete_username'";
    $stmt = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>รายชื่อUserที่สมัคร</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">รายชื่อUserที่สมัคร</h4>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="form.php" class="btn btn-warning float-end" role="button">เพิ่มข้อมูลลูกค้า</a>
                            <a href="indexadmin.php" class="btn btn-danger float-end" role="button">ย้อนกลับ</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>

                                    <th scope="col">fname</th>
                                    <th scope="col">lname</th>
                                    <th scope="col">email</th>
                                    <th scope="col">tel</th>
                                    <th scope="col">username</th>
                                    <th scope="col">password</th>
                                    <th scope="col">สถานะuser</th>
                                    <th scope="col">เวลาที่Userสมัคร</th>
                                    <th scope="col">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "config.php";
                                $sql = "SELECT * FROM user";
                                $query = mysqli_query($conn, $sql);
                                while ($result = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?= $result["firstname"]; ?></td>
                                        <td><?= $result["lastname"]; ?></td>
                                        <td><?= $result["email"]; ?></td>
                                        <td><?= $result["tel"]; ?></td>
                                        <td><?= $result["username"]; ?></td>
                                        <td><?= $result["passwordd"]; ?></td>
                                        <td><?= $result["user_type"]; ?></td>
                                        <td><?= $result["reg_date"]; ?></td>
                                        <td>
                                            <a href="edit_user.php?username=<?= $result["username"]; ?>" class="btn btn-success btn-sm">แก้ไข</a>
                                            <a data-username="<?= $result["username"]; ?>" href="?delete=<?= $result["username"]; ?>" class="btn btn-danger btn-sm delete-btn">ลบ</a>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        $(".delete-btn").click(function(e) {
            var Username = $(this).data('username');
            e.preventDefault();
            deleteConfirm(Username);
        })

        function deleteConfirm(Username) {
            Swal.fire({
                title: 'แน่ใจใช่มั้ย ?',
                text: "หากลบ จะไม่สามารถกู้ข้อมูลกลับมาได้อีก!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4CBB17',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'tableuser.php',
                                type: 'GET',
                                data: 'delete=' + Username,
                            })
                            .done(function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ลบสำเร็จ',
                                    text: 'สำเร็จ',
                                }).then(() => {
                                    document.location.href = 'tableuser.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('ผิดพลาด', 'โปรดลองอีกครั้ง', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script>
</body>

</html>