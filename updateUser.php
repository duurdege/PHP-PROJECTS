<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRM</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">




    <div class="wrapper">



        <!-- header and navbar -->
        <?php

        include "./SRC/Header.php";
        include "./SRC/connection.php";

        ?>






        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-11">
                        <div class="card ml-5">
                            <div class="card-body">

                                <?php
                                if (isset($_POST['updateuserbtn'])) {
                                    $id = $_POST['num'];
                                    $qureryT = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_ID` = '$id'");
                                    foreach ($qureryT as $row) { ?>

                                        <form method="post" enctype="multipart/form-data" action="">
                                            <input type="hidden" name="user_id" value="<?php echo $row['user_ID'] ?>" >
                                            <div class="form-group">
                                                <label for="userphoto">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"  name="userphoto">
                                                    
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                     <input type="hidden" name="old_photo" value="<?php echo $row['user_photo'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Full Name</label>
                                                <input type="Text" class="form-control" id="userfullname" name="userfullname" aria-describedby="username" placeholder="Enter Fullnanme" value="<?php echo $row['fullname'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="Text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter Username" value="<?php echo $row['username'] ?>">
                                                <span id="checkuser"></span>
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="passwordid" name="password" placeholder="Enter Password" required="" value="<?php echo $row['password'] ?>">
                                                <span id="pass"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Confirm Password</label>
                                                <input type="password" class="form-control" id="confpass" name="confpassword" placeholder=" Confirm Password">
                                                <span id="passcon"></span>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Role</label>
                                                <select name="role" class="form-control" value="<?php echo $row['Role'] ?>">
                                                    <option value="<?php echo $row['Role'] ?>" ><?php echo $row['Role'] ?></option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>

                                            <!-- <div class="form-group">
  <label for="Date">Date</label>
  <input type="Date" class="form-control" id="date" aria-describedby="date" name="userdate">
</div> -->
                                            <!-- <div class="form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
</div> -->

                            </div>
                            <div class="modal-footer">
                                <a href="User_list.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" id="savebtn" name="updateuser" class="btn btn-success">Update</button>
                            </div>
                            </form>



                    <?php }
                                } ?>



                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

    <!-- update code -->
    <?php

    if (isset($_POST['updateuser'])) {

        $allowedPhoto = array("png", "jpg", "jpeg", "gif", "PNG", "JPEG", "GIF", "");
        $filename = $_FILES['userphoto']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($extension, $allowedPhoto)) {
            move_uploaded_file($_FILES['userphoto']['tmp_name'], 'img/' . $filename);
            if ($filename == "") {
                // $path = 'img/user.png';
                $photo = $_POST['old_photo'];
                $path = $photo;
            } else {
                $path = 'img/' . $filename;
            }

            // variable from input names
            $id = $_POST['user_id'];
            $userfName = $_POST['userfullname'];
            $username = $_POST['username'];
            $userRole = $_POST['role'];
            $User_Date = date('y-m-d');
            $userupdate = date('y-m-d');

            $quryUpdate = mysqli_query($conn, "UPDATE `users` SET fullname = '$userfName', username = '$username', Role = '$userRole',
            user_photo = '$path', created_Date = '$User_Date', updated_time = '$userupdate' WHERE user_ID = '$id' ");
            if ($quryUpdate) {
                // echo "<script>alert('Updated successfully')</script>";
                echo "<script>window.location.href='User_list.php';</script>";
                exit;
            } else {
                echo $conn->error;
            }
        } else {
            echo $extension . "<script>alert('only use png, jpeg and gif extension')</script>";
        }
    }

    ?>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <?php
    include "SRC/footer.php";
    ?>





    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>