<?php
    include "../connection.php";
    session_start();

    $id = $_GET["id"];

    $get_room_query = "SELECT * FROM kamar WHERE room_id='$id'";

    $result =  mysqli_query($connect, $get_room_query);

    $row = mysqli_fetch_array($result);

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
        .design-choice{
            height: 30px;
            width: 100%;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(53,115,158,1) 0%, rgba(79,225,255,1) 95%);
            border-radius: 20px 20px 0px 0px;
            position: absolute;
            top: 0;
            left: 0;
        }
        .form-wrapper{
            background-color: white;
            width: 45%;
            padding: 70px 70px;
            position: relative;
            border-radius: 20px;
        }
        input{
            width: 100%;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid rgb(220, 220, 220);
        }
        .btn-edit{
            background-color: rgb(34, 128, 151);
            border:none;
            color:white;
            font-weight:600;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include "../sidebar.html";?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

               <?php include "navbar.php"?>

               <div class="container-fluid">

                    <div class="form-wrapper mt-2">
                        <div class="design-choice"></div>
                        <div class="form-box">

                            <h2 class="text-center">Update Room</h2>
                    
                            <form action="update.php" method="POST" class="mt-2">
                                <label class="mt-3">Room Type:<span style="color:rgb(34, 128, 151); font-weight: 600;">*</span></label><br>
                                <input type="text" name="room" value="<?= $row["room_type"];?>"><br>

                                <label class="mt-3">Price:<span style="color:rgb(34, 128, 151); font-weight: 600;">*</span></label><br>
                                <input type="text" name="price" value="<?= $row["price"];?>"><br>

                                <label class="mt-3">Price:<span style="color:rgb(34, 128, 151); font-weight: 600;">*</span></label><br>
                                <input type="text" name="desc" value="<?= $row["description"];?>" style="width: 100%; height: 100px;"><br>
        
            
                                <input type="hidden" name="id" value="<?= $row["room_id"];?>"><br>
                                <input type="submit" value="Update Room" class="btn-edit mt-2">
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