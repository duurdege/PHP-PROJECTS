<?php

include ("../SRC/connection.php");

if(isset($_POST['saveAtten'])){

    $Emptimein =  date('h:i:s A', strtotime($_POST['timein']));
    $emploid = $_POST['Eid'];
    $date = $_POST['date'];
   
    $readqry = mysqli_query($conn, "SELECT  schedual.time_in, schedual.time_out FROM schedual,
    employee WHERE employee.sche_id = schedual.sche_id AND Emp_id ='$emploid' ");
    
    if($readqry)
    {
        foreach($readqry as $row)
        {
            $time_IN = date('h:i:s A', strtotime($row['time_in']));
            $time_OUT = date('h:i:s A', strtotime($row['time_out']));

            if($time_IN == $Emptimein){
                $status = 1;
            }else{
                $status = 0;
            }
            $bile = date("M");
            $insertQuer = mysqli_query($conn, " INSERT INTO  `attendance`(`EmployeID`, `Date`,`monthly` ,`status`, `time_in`, `time_out`) Values('".$emploid."','".$date."','".$bile."','".$status."','".$time_IN."','".$time_OUT."') ");
            if($insertQuer){
                // echo "<script>alert('inserted successfully')</script>";
                echo "<script>window.location.href='../Attendance_list.php';</script>";
            }else{
                echo $conn->error;
            }
        }
    }


     
}

?>