<?php
    include "connection.php";
    
    if(isset($_POST["register"])){
        $👥 = $_POST["name"];
        $👤 = $_POST["username"];
        $🔑 = $_POST["password"];

        $query_register = "INSERT INTO admin (name, username, password) VALUES ('$👥', '$👤','$🔑');";

        if($connect->query($query_register)){
            header("location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>register</h1>
    <form action="register.php" method="POST">
        <label>Full Name</label><br>
        <input type="text" name="name" placeholder="full name"><br>

        <label>Username</label><br>
        <input type="text" name="username" placeholder="username"><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="Min 8 Characters" min="8"><br><br>

        <input type="submit" name="register" value="Create Account">
    </form>
    <a href="login.php">Already Have an Account?</a>
</body>
</html>