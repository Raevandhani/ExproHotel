<?php
    include "../connection.php";

    $id = $_GET["id"];

    $delete_user_query = "DELETE FROM kamar WHERE room_id=$id";

    $get_room_data = "SELECT room_type FROM kamar WHERE room_id=$id";
    $result = $connect->query($get_room_data);

    // $row = mysqli_fetch_assoc($result);

    foreach($result as $row){
        if(mysqli_query($connect, $delete_user_query)){ 
            echo '
                <script>
                    alert(`user '.$row["room_type"].' was succesfully delete`);
                    window.location.href = "index.php";
                </script>
                ';
        }else{
            echo '
            <script>
                alert(`user '.$row["room_type"].' was unsuccesfully delete`);
                window.location.href = "index.php";
            </script>
            ';
        }
    } 
?>