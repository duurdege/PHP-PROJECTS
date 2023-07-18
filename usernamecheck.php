<?php 
include "./SRC/connection.php";

$userName = $_POST['username'];
$checuserdatabase = mysqli_query($conn, "SELECT * FROM `users` WHERE username ='$userName'");
$countUser = mysqli_num_rows($checuserdatabase);

if($userName == ""){
    echo  "<span></span>";
}elseif($countUser > 0){
    echo  "<span class='badge badge-danger'><b> $userName</b> is Already Exits</span>";
    echo "<script>document.getElementById('savebtn').disabled = true </script>";
}elseif($countUser <=0){
    echo  "<span class='badge badge-success'><b> $userName </b> is Available </span>";
    echo "<script>document.getElementById('savebtn').disabled = false </script>";
}

?>