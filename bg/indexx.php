<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกแบบฟอร์ม</title>

</head>

<body>



    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">กรอกแบบฟอร์ม</h4>

                        <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                            <a class="btn btn-warning float-end" role="button" data-bs-toggle="modal" data-bs-target="#student">ชื่อผู้ทำ</a>
                            <a class="btn btn-danger float-end" role="button" data-bs-toggle="modal" data-bs-target="#teacher">ครูผู้สอน</a>
                        </div>
                    </div>

                    <!-- Navbar content -->
                    <nav class="navbar navbar-light" style="background-color: #7AE1EC;">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">Home</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="form.php">กรอกรายชื่อ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="table.php">รายชื่อ</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="type_med.php">รายชื่อประเภทยา</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">ชื่อผู้ทำ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>นาย นิวัฒนา นรบิน 642021123</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="teacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">ครูผู้สอน</h5>
                                    <button type="button" class="btn-close" data-bs-toggle="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>อ.ดร.คณิดา สินใหม</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>
</html>