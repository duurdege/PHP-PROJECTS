
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

<?php 
 if($_SESSION['Role']== 'Admin'){


?>




    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
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
                <h3 class="card-title">Users information Table</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="pb-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UserModal">
                    Add New
                  </button>
                  <?php
                include("SRC/connection.php");
                $readqryuser = mysqli_query($conn, "SELECT *FROM `users` ");
                ?>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>User photo</th>
                      <th>Fullname</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Created Date</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($readqryuser) {
                      foreach ($readqryuser as $row) {
                    ?>
                        <tr>
                        <td><?php echo $row['user_ID'] ?></td>
                          <td>
                           <img src="<?php echo $row['user_photo'] ?>" class="img-circle" width="50px" alt="">
                          </td>
                          <td><?php echo $row['fullname'] ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td><?php echo $row['password'] ?></td>
                          <td><?php echo $row['Role'] ?></td>
                          <td><?php echo $row['created_Date'] ?></td>
                         
                          <td colspan="2">
                            <form action="updateUser.php" method="post">
                            <input type="hidden" name="num" value="<?php echo $row['user_ID'] ?>" >
                            <button type="submit" class="btn btn-success" name="updateuserbtn"  ><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i></button>
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

              <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" action="./insert/insertUser.php">

                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div> -->
                        <div class="form-group">
                          <label for="userphoto">Photo</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="userphoto">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Full Name</label>
                          <input type="Text" class="form-control" id="userfullname" name="userfullname" aria-describedby="username" placeholder="Enter Fullnanme">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <input type="Text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter Username">
                          <span id="checkuser"></span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="passwordid" name="password" placeholder="Enter Password" required="">
                          <span id="pass"></span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Confirm Password</label>
                          <input type="password" class="form-control" id="confpass" name="confpassword" placeholder=" Confirm Password">
                          <span id="passcon"></span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Role</label>
                          <select name="role"class="form-control">
                            <option value="">Select Role</option>
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
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" id="savebtn" name="saveuser" class="btn btn-primary">Save</button>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete User Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./delete/deleteUser.php" method="post"
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
  <?php } else if($_SESSION['Role']== 'User'){
  echo "<script>window.location.href='Attendance_list.php';</script>";
  }?>




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
    $(document).ready(function(){

      $('#confpass').keyup(function(){
        var pass2 = $('#passwordid').val();
        var confirmpass = $(this).val();
        if(confirmpass == ""){
          $('#passcon').html("<span></span>");
        }else if(pass2 != confirmpass){
          $('#passcon').html("<span class='badge badge-danger'><b> Password is not match </b></span>");
          $("#savebtn").prop("disabled", true);
        }else {
          $('#passcon').html("<span class='badge badge-success'><b> Password is  matched </b></span>");
          $("#savebtn").prop("disabled", false);
        }
      })
      
      $('#passwordid').keyup(function(){
        var pass1 = $(this).val();
        if(pass1 == "")
        {
          $('#pass').html("<span></span>");
        }
        else if(pass1.length >=1 && pass1.length <=5){
          $("#pass").html("<span class='badge badge-danger'><b> Password is very week </b></span>");
        }
        else if(pass1.length >=6 && pass1.length <=10){
          $("#pass").html("<span class='badge badge-primary'><b> Password is Medium </b></span>");
        }
        else{
          $("#pass").html("<span class='badge badge-success'><b> Password is strong </b></span>");
        }

      });

      
      $('#username').keyup(function(){
        var usern = $(this).val();
        $.ajax({
          url:"usernamecheck.php",
          method:"POST",
          data:{username:usern},
          dataType:"text",
          success:function(res){
            $('#checkuser').html(res);
          }
        });
      });

    });


  </script>


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