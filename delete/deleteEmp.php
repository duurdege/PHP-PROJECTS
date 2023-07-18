<?php

include("../SRC/connection.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $deleteQry = mysqli_query($conn,"DELETE FROM employee WHERE Emp_id = '$id'");

    if($deleteQry)
    {
        // echo "<script>alert('Deleted Successfully..');</script>";
        echo "<script>window.location.href='../Emp_list.php';</script>";
    }
    else
    {
        echo $conn->error;
    }


}
