

<?php

include ("../SRC/connection.php");

if(isset($_POST['updatedept'])){

    $departID = $_POST['Dept_ID'];
    $Departname = $_POST['DeptName'];


    echo $id;
    $updatedept = mysqli_query($conn, "UPDATE department SET dept_name = '$Departname' WHERE dept_id = '$departID'");
    if($updatedept){
        echo "<script>alert('updated successfully')</script>";
        header("location: ../Department.php");
    }else{
        echo $conn->error;
    }
}

?>