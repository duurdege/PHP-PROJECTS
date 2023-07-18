<?php
include ("../SRC/connection.php");

if(isset($_POST['saveuser']))
{
    $allowedPhoto = array("png", "jpg", "jpeg", "gif", "PNG", "JPEG", "GIF", "");
    $filename = $_FILES['userphoto']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(in_array($extension, $allowedPhoto))
    {
        move_uploaded_file($_FILES['userphoto']['tmp_name'],'../img/'.$filename);
        if($filename == ""){
            $path = 'img/user.png';
        }else{
            $path = 'img/'.$filename;
        }

            //variables from input
    $User_name = $_POST['userfullname'];
    $Username = $_POST['username'];
    $userPassword = $_POST['password'];
    $UserRole = $_POST['role'];
    $User_Date = date('y-m-d');
    $userupdate = date('y-m-d');


    $insertQueremp = mysqli_query($conn, " INSERT INTO  `users`(`fullname`, `username`, `password`,`Role`, `user_photo`, `created_Date`, `updated_time`) 
    Values('".$User_name."','".$Username."','".$userPassword."','".$UserRole."','".$path."', '".$User_Date."', '".$userupdate."') ");

    if($insertQueremp){
        echo "<script>alert('inserted successfully')</script>";
        header("location: ../User_list.php");
    }
    else{
        echo $conn->error;
    }

    }else{
        echo $extension."<script>alert('only use png, jpeg and gif extension')</script>";
    }
}

?>