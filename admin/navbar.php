<?php
    // ini_set('display_errors',0);
    include "../connection.php";

    if(isset($_POST['logout'])){
        session_destroy();
        ?>
            <script>
                window.location.href = "../login.php"
            </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .btn-logout{
            background-color: rgb(34, 128, 151);
            color: white;
            font-weight: 500;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: rgb(255, 255, 255)">

<ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown no-arrow me-3">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="me-3 d-none d-lg-inline text-dark">Admin | <?=$_SESSION["username"]?></span>
            <img class="img-profile rounded-circle" src="../assets/l60Hf.png">
        </a>
    </li>

    <li class="d-flex align-items-center me-3">
        <form method="POST">
            <input type="submit" name="logout" value="Logout" class="btn btn-logout">
        </form>
    </li>
</ul>

</nav>
</body>
</html>