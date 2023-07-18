<?php

include("../SRC/connection.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $deleteQry = mysqli_query($conn,"DELETE FROM users WHERE user_ID = '$id'");

    if($deleteQry)
    {
         echo "<script>window.location.href='../User_list.php';</script>";
    }
    else
    {
        echo $conn->error;
    }


}
