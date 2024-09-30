<?php
    
    include "../connection.php";

    $id = $_POST["id"];
    $room = $_POST["room"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];

    $update_room_guery = "UPDATE kamar SET room_type='$room', price='$price', description='$desc' WHERE room_id='$id'";

    if($connect->query($update_room_guery)){
        echo '
            <script>
                alert(`succesfully updated`);
                window.location.href = "index.php"
            </script>
            ';
    }else{
        echo '
        <script>
            alert(`succesfully updated`);
            window.location.href = "index.php"
        </script>
        ';
    }

?>