<?php
echo "HELOLLLLLLLLLLLLLLL";
include ("../SRC/connection.php");

if(isset($_POST['savesche'])){

    $timein =  date('h:i:s A', strtotime($_POST['timein']));
    $timeout =  date('h:i:s A', strtotime($_POST['timeout']));
    
    $insertQuer = mysqli_query($conn, " INSERT INTO  `schedual`(`time_in`, `time_out`) Values('".$timein."','".$timeout."') ");
    if($insertQuer){
        echo "<script>alert('inserted successfully')</script>";
        header("location: ../Schedual_list.php");
    }else{
        echo $conn->error;
    }
}

?>