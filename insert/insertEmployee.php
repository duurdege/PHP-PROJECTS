<?php
include ("../SRC/connection.php");

if(isset($_POST['saveEmp']))
{
    $allowedPhoto = array("png", "jpg", "jpeg", "gif", "PNG", "JPEG", "GIF", "");
    $filename = $_FILES['EmpPhoto']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(in_array($extension, $allowedPhoto))
    {
        move_uploaded_file($_FILES['EmpPhoto']['tmp_name'],'../img/'.$filename);
        if($filename == ""){
            $path = 'img/user.png';
        }else{
            $path = 'img/'.$filename;
        }

            //variables from input
    $Emp_name = $_POST['EmployeeName'];
    $Emp_phone = $_POST['empPhone'];
    $Emp_Address = $_POST['empAddress'];
    $Emp_gender = $_POST['empGender'];
    $Emp_depart = $_POST['deparment'];
    $Emp_schedual = $_POST['schedual'];
    $Emp_Date = date('y-m-d');


    $insertQueremp = mysqli_query($conn, " INSERT INTO  `employee`(`Emp_name`, `Emp_phone`, `Emp_address`, `Emp_gender`, `Dept_id`, `sche_id`, `Emp_photo` , `created_at`) 
    Values('".$Emp_name."','".$Emp_phone."','".$Emp_Address."','".$Emp_gender."','".$Emp_depart."', '".$Emp_schedual."', '".$path."', '".$Emp_Date."') ");

    if($insertQueremp){
        echo "<script>alert('inserted successfully')</script>";
        header("location: ../Emp_list.php");
    }
    else{
        echo $conn->error;
    }

    }else{
        echo $extension."<script>alert('only use png, jpeg and gif extension')</script>";
    }
}

?>