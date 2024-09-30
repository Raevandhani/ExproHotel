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

    <title>Booking</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                            <h6 class="m-0 font-weight-bold" style="color: rgb(34, 128, 151);">Booking</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Identitas</th>
                                            <th>No Hp</th>
                                            <th>Jenis Kamar</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th style="width: 7%;">Durasi</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $get_data = "SELECT name, identitas, no_hp, room_type, price, checkin, checkout, durasi, jumlah, total_harga FROM kamar INNER JOIN sewa WHERE kamar.room_id=sewa.room_id";

                                        $result = $connect->query($get_data);
                                        $no = 1;

                                        foreach($result as $row){
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row["name"] ?></td>
                                            <td><?= $row["identitas"] ?></td>
                                            <td><?= $row["no_hp"] ?></td>
                                            <td><?= $row["room_type"]." Rp.".$row["price"] ?>,-</td>
                                            <td><?= $row["checkin"] ?></td>
                                            <td><?= $row["checkout"] ?></td>
                                            <td><?= $row["durasi"] ?> hari</td>
                                            <td class="text-center"><?= $row["jumlah"] ?></td>
                                            <td>Rp.<?= $row["total_harga"] ?>,-</td>
                                        </tr>

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