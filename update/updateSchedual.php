

<?php

include ("../SRC/connection.php");

if(isset($_POST['update'])){

    $id = $_POST['update_id'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];

    echo $id;
    $updatesche = mysqli_query($conn, "UPDATE schedual SET time_in = '$timein', time_out = '$timeout' WHERE sche_id = '$id'");
    if($updatesche){
        echo "<script>alert('updated successfully')</script>";
        header("location: ../Schedual_list.php");
    }else{
        echo $conn->error;
    }
}

?>