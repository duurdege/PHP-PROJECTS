<?php

include("../SRC/connection.php");

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $deleteQry = mysqli_query($conn,"DELETE FROM department WHERE dept_id = '$id'");

    if($deleteQry)
    {
        echo "<script>alert('Deleted Successfully..');</script>";
        header("Location: ../Department.php");
    }
    else
    {
        echo $conn->error;
    }


}
