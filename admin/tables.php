<?php
    include "../connection.php";
    session_start();
    
    if($_SESSION["username"] == null){
        header("location: ../login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Admin</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        table{
            /* box-shadow: 6px 7px 10px 4px rgba( 0, 0, 0, 0.15); */
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include "../sidebar.html";?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

               <?php include "navbar.php" ?>

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color: rgb(34, 128, 151);">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <a href="add.php" class="btn btn-primary">Add Admin</a>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" width="100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 1%;">No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $get_data = "SELECT * FROM admin";

                                        $result = $connect->query($get_data);
                                        $no = 1;

                                        foreach($result as $row){
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row["name"]?></td>
                                            <td><?= $row["username"]?></td>
                                            <td><?= $row["password"]?></td>
                                            <td class="text-center"><?= $row["status"]?></td>
                                            <td style="width: 15%; text-align: center;">
                                                <a href="edit.php?id=<?=$row["id_admin"];?>" class="btn btn-success">Edit</a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmation<?= $no ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="confirmation<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="dashboard-delete.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id_admin"];?>">
                                                        <div class="modal-body text-center">
                                                            <h5>Delete User : <?= $row["name"];?>?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a type="button" class="btn btn-danger" href="delete.php?id=<?= $row["id_admin"]?>">Confrim</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>