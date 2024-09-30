<?php
    include "../connection.php";
    session_start();

    if(isset($_POST["book"])){
        $name = $_POST["name"];
        $identitas = $_POST["identitas"];
        $no_hp = $_POST["no-hp"];
        $kamar = $_POST["kamar"];
        $check_in = $_POST["check_in"];
        $check_out = $_POST["check_out"];
        $jumlah = $_POST["jumlah"];

        $check_in_date = date_create($check_in);
        $check_out_date = date_create($check_out);
        $days = date_diff($check_in_date, $check_out_date);
        $selisih = $days->days;

        $count_price_query = "SELECT price FROM kamar WHERE room_id='$kamar'";
        $result = mysqli_query($connect, $count_price_query);
        $display_price = mysqli_fetch_array($result);
        $price = $display_price["price"];
        $total = $price*$jumlah*$selisih;

        $insert_query = "INSERT INTO sewa (name, identitas, no_hp, room_id, checkin, checkout, durasi, jumlah, total_harga) VALUES ('$name', '$identitas', '$no_hp', '$kamar', '$check_in', '$check_out', '$selisih', '$jumlah', '$total')";

        if(mysqli_query($connect, $insert_query)){
            ?>
                <script>
                    alert(`Successfully Booked a Room`);
                    window.location.href = 'index.php';
                </script>
            <?php
        }else{
            $failed = "failed";
        }
    }

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

    <title>Room</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .container-fluid{
            display: grid;
            place-items: center;
        }
        .btn-booking{
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(53,115,158,1) 0%, rgba(79,225,255,1) 95%);
            border: none
        }
        .btn-booking:hover{
            filter: brightness(90%);
            transition: 0.2s;
        }
        .form-wrapper{
            background-color: white;
            width: 78%;
            padding: 50px 50px;
            position: relative;
            border-radius: 20px;
        }
        input, select{
            width: 100%;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid rgb(220, 220, 220);
        }
        label{
            margin-bottom: -100px;
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
                
                    <div class="form-wrapper">

                        <div class="form-flex">
                            
                            <h1>Book A Room</h1>

                            <form method="POST" class="mt-4">

                                <div class="d-flex gap-3 mb-4 mt-4">

                                    <div class="w-50">

                                        <input type="text" name="name" id="name" placeholder="NAME" required><br>

                                        <input type="number" name="no-hp" id="no-hp" placeholder="PHONE NUMBER" class="mt-4 mb-1" required><br>

                                        <label for="check_in" class="mt-2" required>Check In</label>
                                        <input type="date" name="check_in" id="check_in" required><br>

                                    </div>

                                    <div class="w-50">

                                        <input type="number" name="identitas" id="identitas" placeholder="NO IDENTITAS" required><br>

                                        <div class="d-flex gap-2 mt-4 mb-1 w-100">

                                            <div class="w-50">
                                                <select name="kamar" id="kamar" required>
                                                    <?php
                                                        $get_room = "SELECT * FROM kamar";
                                                        $result_get_room = mysqli_query($connect, $get_room);
                                                        foreach ($result_get_room as $room) {
                                                            echo '<option value="'.$room["room_id"].'">'.$room["room_type"].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="w-50">
                                                <input type="number" name="jumlah" id="jumlah" placeholder="ROOMS" required><br>
                                            </div>
                                        </div>

                                        <label for="check_out" class="mt-2">Check Out</label>
                                        <input type="date" name="check_out" id="check_out" required><br>

                                    </div>

                                </div>

                                <input type="submit" name="book" class="btn btn-booking text-light fw-semibold">
                            </form>
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