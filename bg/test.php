<?php include "config.php";

    if(isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $sql = "DELETE FROM medicine WHERE med_id = $delete_id";
      $stmt = mysqli_query($conn,$sql);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>รายชื่อยา</title>
</head>
<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h4 align="center">รายชื่อยา</h4>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="insert_medicine.php" class="btn btn-warning float-end" role="button">เพิ่มข้อมูลยา</a>
                <a href="index.php" class="btn btn-danger float-end" role="button">ย้อนกลับ</a>
              </div>            
            </div>
            
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead class="table-dark">
                <tr>
                    <th scope="col">รหัสยา</th>
                    <th scope="col">ชื่อยา</th>
                    <th scope="col">ประเภทยา</th>
                    <th scope="col">ราคายา</th>
                    <th scope="col">จัดการข้อมูลยา</th>
                </tr>
              </thead>
                <tbody>
                  <?php
                  include_once "config.php";
                  $sql = "SELECT * FROM `edicinem` , type_med where medicine.med_type = type_med.type_med_id";
                  $query = mysqli_query($conn,$sql);
                  while($result=mysqli_fetch_array($query))
                  { ?>
                  <tr>
                      <td><?= $result["med_id"]; ?></td>
                      <td><?= $result["med_name"]; ?></td>
                      <td><?= $result["type_med_name"]; ?></td>
                      <td><?= $result["med_price"]; ?></td>
                  <td>
                      <a href="edit_medicine.php?med_id=<?= $result["med_id"]; ?>" class="btn btn-success btn-sm">แก้ไข</a>
                      <a data-id="<?= $result["med_id"];?>" href="?delete=<?= $result["med_id"];?>" class="btn btn-danger btn-sm delete-btn">ลบ</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
    $(".delete-btn").click(function(e) {
            var medID = $(this).data('id');
            e.preventDefault();
            deleteConfirm(medID);
        })

        function deleteConfirm(medID) {
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
                                url: 'medicine.php',
                                type: 'GET',
                                data: 'delete=' + medID,
                            })
                            .done(function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ลบสำเร็จ',
                                    text: 'สำเร็จ',
                                }).then(() => {
                                    document.location.href = 'medicine.php';
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
