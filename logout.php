<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <?php 
    include "./SRC/connection.php";
    session_destroy();
    echo "<script>window.location.href='index.php';</script>";
    
    


    ?>

</body>
</html>