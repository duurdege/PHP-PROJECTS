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

    ?>






    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Schedual </h1>
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
                <h3 class="card-title">Schedual information Table</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="pb-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#schedualModal">
                    Add New
                  </button>
                </div>

                <?php
                include("SRC/connection.php");
                $readqry = mysqli_query($conn, "SELECT *FROM `schedual` ");
                ?>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sche ID</th>
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if ($readqry) {
                      foreach ($readqry as $row) {
                    ?>
                        <tr>
                          <td><?php echo $row['sche_id'] ?></td>
                          <td><?php echo $row['time_in'] ?></td>
                          <td><?php echo $row['time_out'] ?></td>
                          <td colspan="2">
                            <button type="button" name="editbtn" id="editbtn" class="btn btn-success editbtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></button>
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
              <div class="modal fade" id="schedualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Schedual</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" action="./insert/insertsche.php">

                        <!-- <div class="form-group">
                          <label for="scheId">Sche Id</label>
                          <input type="text" class="form-control" id="scheid" name="scheid" aria-describedby="scheid" placeholder="Schedual Id">
                        </div> -->
                        <div class="form-group">
                          <label for="timein">Time In</label>
                          <input type="time" class="form-control" id="Timein" name="timein" aria-describedby="timein">
                        </div>
                        <div class="form-group">
                          <label for="TimeOut">Time Out</label>
                          <input type="time" class="form-control" id="timeout" name="timeout">
                          <!-- <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="savesche" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>



                <!-- update modal -->
   <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Schedual</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" action="./update/updateSchedual.php">

                        <!-- <div class="form-group">
                          <label for="scheId">Sche Id</label>
                          <input type="text" class="form-control" id="scheid" name="scheid" aria-describedby="scheid" placeholder="Schedual Id">
                        </div> -->
                        <input type="hidden" class="form-control" id="update_id" name="update_id" aria-describedby="update_id">

                        <div class="form-group">
                          <label for="timein">Time In</label>
                          <input type="text" class="form-control" id="timeIn" value="" name="timein" aria-describedby="timein">
                        </div>
                        <div class="form-group">
                          <label for="TimeOut">Time Out</label>
                          <input type="text" class="form-control" id="timeOut" value="" name="timeout">
                          <!-- <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-success">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>



                <!-- delete pop up -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Schadule Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./delete/deletesche.php" method="post"
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

  <!-- upadte -->
  <script>
    $(document).ready(function() 
    {
      
      $('.editbtn').on('click', function() {

        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function ()
        {
          return $(this).text();
        }).get();

        $('#update_id').val(data[0]);
        $('#timeIn').val(data[1]);
        $('#timeOut').val(data[2]);
        // console.log(data);
      });

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