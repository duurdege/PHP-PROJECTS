<?php

include ("../SRC/connection.php");

if(isset($_POST['savedept'])){

    $DepartName = $_POST['DepartmentName'];
    $insertDept = mysqli_query($conn, " INSERT INTO  `department`(`dept_name`) Values('".$DepartName."') ");
    if($insertDept){
        echo "<script>alert('inserted successfully')</script>";
        header("location: ../Department.php");
    }else{
        echo $conn->error;
    }
}

?>