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
                                if (isset($_POST['updateEmp'])) {
                                    $id = $_POST['Empid'];
                                    $qureryT = mysqli_query($conn, "SELECT * FROM `employee` WHERE `Emp_id` = '$id'");
                                    foreach ($qureryT as $row) { ?>

                                        <form method="post" enctype="multipart/form-data" action="">
                                            <input type="hidden" class="form-control" id="" name="Empid" value="<?php echo $row['Emp_id'] ?>">
                                            <div class="form-group">
                                                <label for="">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="" name="EmpPhoto" value="<?php echo $row['Emp_photo'] ?>">
                                                    <label class="custom-file-label" for="">Choose file</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="EmployeeName">Full Name</label>
                                                <input type="Text" class="form-control" id="EmployeeName" name="EmployeeName" aria-describedby="EmployeeName" placeholder="Enter Fullnanme" value="<?php echo $row['Emp_name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="empPhone">Phone</label>
                                                <input type="Text" class="form-control" id="empPhone" name="empPhone" aria-describedby="empPhone" placeholder="Enter Phone" value="<?php echo $row['Emp_phone'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="empAddress">Address</label>
                                                <input type="Text" class="form-control" id="empAddress" name="empAddress" aria-describedby="empAddress" placeholder="Enter Address" value="<?php echo $row['Emp_address'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="empGender">Gender</label>
                                                <input type="Radio" class="form-check-inline ml-2" id="empGender" name="empGender" aria-describedby="empGender" value="Male" <?php
                                                                                                                                                                                if ($row['Emp_gender'] == 'Male') {
                                                                                                                                                                                    echo 'Checked';
                                                                                                                                                                                }
                                                                                                                                                                                ?>>Male
                                                <input type="Radio" class="form-check-inline ml-2" id="empGender" name="empGender" aria-describedby="empGender" value="Female" <?php
                                                                                                                                                                                if ($row['Emp_gender'] == 'Female') {
                                                                                                                                                                                    echo 'Checked';
                                                                                                                                                                                }
                                                                                                                                                                                ?>>Female
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                $selectAllqry = mysqli_query($conn, "SELECT * FROM department");

                                                ?>
                                                <label for="empGender">Department</label>
                                                <select name="deparment" id="Deparment" class="form-control">
                                                    <option value="<?php echo $row['Dept_id'] ?>">
                                                        <?php
                                                        $selectdep = $qureryT = mysqli_query($conn, "SELECT * FROM department WHERE dept_id = '" . $row['Dept_id'] . "' ");
                                                        while ($re = mysqli_fetch_array($selectdep)) {
                                                            echo $re['dept_name'];
                                                        }
                                                        ?>

                                                    </option>
                                                    <?PHP
                                                    while ($result = mysqli_fetch_array($selectAllqry)) {
                                                    ?>
                                                        <option value="<?php echo $result['dept_id'] ?>">
                                                            <?php echo $result['dept_name'] ?></option>
                                                    <?php }
                                                    ?>

                                                </select>
                                            </div>
                                            <?php
                                            $selectAllqrysche = mysqli_query($conn, "SELECT * FROM schedual");

                                            ?>
                                            <label for="Schedual">Schedual</label>
                                            <select name="schedual" id="schedualselect" class="form-control">
                                                <option value="<?php echo $row['sche_id'] ?>">
                                                    <?php
                                                    $selectsche = $qureryT = mysqli_query($conn, "SELECT * FROM schedual WHERE sche_id = '" . $row['sche_id'] . "' ");
                                                    while ($resche = mysqli_fetch_array($selectsche)) {
                                                        echo $resche['time_in'], '-', $resche['time_out'];
                                                    }
                                                    ?>

                                                </option>
                                                <?PHP
                                                while ($resultsche = mysqli_fetch_array($selectAllqrysche)) {
                                                ?>
                                                    <option value="<?php echo $resultsche['sche_id'] ?>">
                                                        <?php echo $resultsche['time_in'], '-', $resultsche['time_out'] ?></option>
                                                <?php }
                                                ?>
                                            </select>


                                            <div class="modal-footer">
                                                <a href="Emp_list.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <button type="submit" name="editEmp" class="btn btn-success">Update</button>
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

    if (isset($_POST['editEmp'])) {

        $allowedPhoto = array("png", "jpg", "jpeg", "gif", "PNG", "JPEG", "GIF", "");
        $filename = $_FILES['EmpPhoto']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($extension, $allowedPhoto)) {
            move_uploaded_file($_FILES['EmpPhoto']['tmp_name'], 'img/' . $filename);
            if ($filename == "") {
                $path = 'img/user.png';
            } else {
                $path = 'img/' . $filename;
            }

            // variable from input names
            $id = $_POST['Empid'];
            $EmpName = $_POST['EmployeeName'];
            $Empphone = $_POST['empPhone'];
            $Empaddress = $_POST['empAddress'];
            $Empgender = $_POST['empGender'];
            $Empdept = $_POST['deparment'];
            $Empsche = $_POST['schedual'];
            $updatedat = date('Y-m-a');

            $quryUpdate = mysqli_query($conn, "UPDATE `employee` SET Emp_name = '$EmpName',
            Emp_phone = '$Empphone', Emp_address = '$Empaddress',Emp_gender = '$Empgender',
            Dept_id = '$Empdept',sche_id = '$Empsche',Emp_photo = '$path',updated_at = '$updatedat' WHERE Emp_id ='$id' ");
            if($quryUpdate){
                // echo "<script>alert('Updated successfully')</script>";
                echo "<script>window.location.href='Emp_list.php';</script>";
                exit;
            }else{
                echo $conn->error;
            }
        }else{
            echo $extension."<script>alert('only use png, jpeg and gif extension')</script>";
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