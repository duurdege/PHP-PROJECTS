<?php

include("../SRC/connection.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $deleteQry = mysqli_query($conn,"DELETE FROM attendance WHERE atten_id = '$id'");

    if($deleteQry)
    {
        echo "<script>alert('Deleted Successfully..');</script>";
        header("Location: ../Attendance_list.php");
    }
    else
    {
        echo $conn->error;
    }


}
