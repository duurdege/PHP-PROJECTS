<?php
include "Connection.php";

$deleteqry = mysqli_query($conn, "DELETE FROM crud WHERE `id` = ".$_GET['id']." ");
if($deleteqry){
    echo "<script>alert('Deleted successfully')</script>";
    echo "<script>window.location.href='index.php';</script>";
}else{
    echo $conn->error;
}
?>