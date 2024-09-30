<?php
    include "connection.php";
    session_start();

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $login = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
        $result = $connect->query($login);

        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username']; 

        if($result->num_rows > 0){
            header("location: admin/index.php");
        }elseif($user == "" && $pass == ""){
            header("location: login.php");
        }else{
            header("location: login.php");
        }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .box-wrapper{
            width: 100%;
            display: flex;
            box-shadow: 7px 7px 10px 6px rgba(0, 0, 0, 0.1);
        }
        .form-wrapper{
            width: 80%;
            background-color: white;
            display: grid;
            place-items: center;
        }
        .img-wrapper{
            height: 500px;
            width: 600px;
            background-image: url(assets/restaurant.webp);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .form-box{
            width: 70%;
        }
        input{
            width: 100%;
            padding: 7px;
            border-radius: 5px;
            border: 1px solid rgb(220, 220, 220);
        }
        .btn-login{
            background-color: rgb(34, 128, 151);
            border:none;
            color:white;
            font-weight:600;
        }
    </style>
</head>
<body style="background-color: rgb(250, 250, 250);">

    <div class="container-fluid" style="margin-top: 50px">
        
        <div class="container">

            <div class="box-wrapper">

                <div class="form-wrapper">

                    <div class="form-box">

                        <h2 class="text-center">Welcome Back!</h2>
                        <h5 class="text-center mb-4" style="color: rgb(150, 150, 150); margin-top: -5px;">Please enter your details to sign in</h5>

                        <form method="POST" class="mt-4">
                            <label for="">Username:<span style="color:rgb(34, 128, 151); font-weight: 600;">*</span></label><br>
                            <input type="text" name="username" class="mb-3" placeholder="username"><br>

                            <label for="">Password:<span style="color:rgb(34, 128, 151); font-weight: 600;">*</span></label><br>
                            <input type="password" name="password" class="mb-2" placeholder="password"><br><br>

                            <input type="submit" name="login" value="Sign In" class="btn-login"><br><br>

                            <a href="index.html"><- Back To Home Page</a>
                        </form>

                    </div>

                </div>

                <div class="img-wrapper">
                    <img src="assets/expro_hotel.png" width="200">
                    <h2 class="text-light">EXPRO HOTEL</h2>
                </div>

            </div>
        
        </div>

    </div>

</body>
</html>