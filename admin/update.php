<?php
    
    include "../connection.php";

    $id = $_POST["id"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $update_data_query = "UPDATE admin SET username='$username', name='$name', password='$password' WHERE id_admin='$id'";

    if($connect->query($update_data_query)){
        echo '
            <script>
                alert(`succesfully updated`);
                window.location.href = "tables.php"
            </script>
            ';
    }else{
        echo '
        <script>
            alert(`succesfully updated`);
            window.location.href = "tables.php"
        </script>
        ';
    }

?>