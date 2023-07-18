<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Report</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include "./SRC/connection.php";
        include "./SRC/Header.php";
        ?>

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee Report Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


                                <?php
                                include("SRC/connection.php");
                                $readqryEmp = mysqli_query($conn, "SELECT *FROM `employee` ");
                                ?>
                                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                                <table id="example1" class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Emp Name</th>
                                            <th>Emp Phone</th>
                                            <th>Emp Address</th>
                                            <th>Emp Gender</th>
                                            <th>Department</th>
                                            <th>Schedual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    if ($readqryEmp) {
                      foreach ($readqryEmp as $row) {
                    ?>
                                        <tr>
                                            <td><?php echo $row['Emp_id'] ?></td>
                                            <td><?php echo $row['Emp_name'] ?></td>
                                            <td><?php echo $row['Emp_phone'] ?></td>
                                            <td><?php echo $row['Emp_address'] ?></td>
                                            <td><?php echo $row['Emp_gender'] ?></td>
                                            <td>
                                                <?php
                            $id = $row['Dept_id'];
                            $dep = mysqli_query($conn, "SELECT *FROM department WHERE dept_id = '$id' ");
                            while($res = mysqli_fetch_array($dep)){
                              echo $res['dept_name'];

                            }
                             ?>
                                            </td>

                                            <td>
                                                <?php
                            $id1 = $row['sche_id'];
                            $scheee = mysqli_query($conn, "SELECT * FROM schedual WHERE sche_id = '$id1' ");
                            while($rest = mysqli_fetch_array($scheee)){
                              echo $rest['time_in'] ,' - ', $rest['time_out'] ;

                            }
                             ?>
                                            </td>

                                        </tr>
                                        <?php }
                    } else {
                      echo "no record found";
                    }
                    ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- /.content-wrapper -->
    <?php
    include "./SRC/footer.php"


    ?>


    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [ "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>