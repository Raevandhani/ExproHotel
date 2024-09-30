<?php
    include "../connection.php";

    $id = $_GET["id"];

    $delete_user_query = "DELETE FROM admin WHERE id_admin=$id";

    $get_user_data = "SELECT username FROM admin WHERE id_admin=$id";
    $result = $connect->query($get_user_data);

    foreach($result as $row){
        if(mysqli_query($connect, $delete_user_query)){ 
            echo '
                <script>
                    alert(`user '.$row["username"].' was succesfully delete`);
                    window.location.href = "tables.php";
                </script>
                ';
        }else{
            echo '
            <script>
                alert(`user '.$row["username"].' was unsuccesfully delete`);
                window.location.href = "tables.php";
            </script>
            ';
        }
    } 
?>