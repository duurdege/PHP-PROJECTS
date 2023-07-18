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

    include "SRC/Header.php";
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee information Table</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="pb-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Employeemodal">
                    Add New
                  </button>
                </div>
                <?php
                include("SRC/connection.php");
                $readqryEmp = mysqli_query($conn, "SELECT *FROM `employee` ");
                ?>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Emp ID</th>
                      <th>Emp Photo</th>
                      <th>Emp Name</th>
                      <th>Emp Phone</th>
                      <th>Emp Address</th>
                      <th>Emp Gender</th>
                      <th>Dept ID</th>
                      <th>Schedual</th>                      
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if ($readqryEmp) {
                      foreach ($readqryEmp as $row) {
                    ?>
                        <tr>
                        <td><?php echo $row['Emp_id'] ?></td>
                          <td>
                           <img src="<?php echo $row['Emp_photo'] ?>" class="img-circle" width="50px" alt="">
                          </td>
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
  
                          <td colspan="2">
                            <form action="updateEmployee.php" method="post">
                            <input type="hidden" name="Empid" value="<?php echo $row['Emp_id'] ?>" >
                            <button type="submit" class="btn btn-success" name="updateEmp"  ><i class="fa fa-edit"></i></button>
                            <button type="button" id="" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></button>
                            </form>
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
              <!-- Modal -->
              <div class="modal fade" id="Employeemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" action="./insert/insertEmployee.php">

                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div> -->
                        <div class="form-group">
                          <label for="">Photo</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="" name="EmpPhoto">
                            <label class="custom-file-label" for="">Choose file</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="EmployeeName">Full Name</label>
                          <input type="Text" class="form-control" id="EmployeeName" name="EmployeeName" aria-describedby="EmployeeName" placeholder="Enter Fullnanme">
                        </div>
                        <div class="form-group">
                          <label for="empPhone">Phone</label>
                          <input type="Text" class="form-control" id="empPhone" name="empPhone" aria-describedby="empPhone" placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                          <label for="empAddress">Address</label>
                          <input type="Text" class="form-control" id="empAddress" name="empAddress" aria-describedby="empAddress" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                          <label for="empGender">Gender</label>
                          <input type="Radio" class="form-check-inline ml-2" id="empGender" name="empGender" aria-describedby="empGender" value="Male" >Male
                          <input type="Radio" class="form-check-inline ml-2" id="empGender" name="empGender" aria-describedby="empGender" value="Female">Female
                        </div>
                        <div class="form-group">
                          <?php
                          $selectAllqry = mysqli_query($conn, "SELECT * FROM department");

                          ?>
                          <label for="empGender">Department</label>
                          <select name="deparment" id="Deparment" class="form-control">
                            <option value="">select Department</option>
                            <?PHP
                            while ($result = mysqli_fetch_array($selectAllqry)) {
                            ?>
                              <option value="<?php echo $result['dept_id'] ?>"><?php echo $result['dept_name'] ?></option>
                            <?php }
                            ?>

                          </select>
                        </div>
                        <?php
                        $selectAllqrysche = mysqli_query($conn, "SELECT * FROM schedual");

                        ?>
                        <label for="Schedual">Schedual</label>
                        <select name="schedual" id="schedualselect" class="form-control">
                          <option value="">select Schedual</option>
                          <?PHP
                          while ($resultsche = mysqli_fetch_array($selectAllqrysche)) {
                          ?>
                            <option value="<?php echo $resultsche['sche_id'] ?>"><?php echo $resultsche['time_in'], ' - ', $resultsche['time_out'] ?></option>
                          <?php }
                          ?>
                        </select>


                        <!-- <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="saveEmp" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>


                              <!-- delete pop up -->
                              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Employee Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./delete/deleteEmp.php" method="post"
                                                    enctype="multipart/form-data">

                                                    <input type="hidden" name="delete_id" id="delete_id">

                                                    <h4>Do you want to Delete this Data?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="submit" name="delete"
                                                    class="btn btn-danger">Yes !! Delete it.</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->



          </div><!-- /.container-fluid -->
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


  <script>

  $(document).ready(function() 
    {
      
      $('.deletebtn').on('click',function()
        {
            $('#deleteModal').modal('show');
            $tr =$(this).closest('tr');

            var data = $tr.children('td').map(function()
            {
                return $(this).text();
            }).get();
            $('#delete_id').val(data[0]);
            console.log(data);
        });


    });
  </script>

</body>

</html>