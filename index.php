<?php 

session_start();

?>


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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" >
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>HRMS </b>SYSTEM</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-5">
          <input type="text" id="user" name="username" class="form-control" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="pass" name="password" required="" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <?php 
        include "./SRC/connection.php";
        if(isset($_POST['login'])){
            $user = mysqli_real_escape_string($conn,  $_POST['username']);
            $passlog = mysqli_real_escape_string($conn,  $_POST['password']);

            $login = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$user' AND `password` = '$passlog' ");
            $countResult = mysqli_num_rows($login);
            $result = mysqli_fetch_array($login);

            if($countResult >0){
                $_SESSION['user_ID'] = $result[0];
                $_SESSION['fullname'] = $result[1];
                $_SESSION['username'] = $result[2];
                $_SESSION['password'] = $result[3];
                $_SESSION['Role'] = $result[4];
                $_SESSION['user_photo'] = $result[5];
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.location.href='dashboard.php';</script>";
                 
            }else
            {
                echo "<script>alert('Sorry! invalid Username or Password Please try again ')</script>";
                echo "<script>window.location.href='index.php';</script>";
                
            }

        }

      ?>
 
      <!-- /.social-auth-links -->

 
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
