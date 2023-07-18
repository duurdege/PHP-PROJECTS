<!DOCTYPE html>
<?php 
session_start();

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRM | Change Password </title>

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
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>HRM</b>SYSTEM</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">change your password now.</p>
      <form  method="post">

        <div class="input-group mb-3">
          <input type="text" class="form-control"name="username" value="<?php echo $_SESSION['username'] ?>" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mt-3">
          <input type="password" class="form-control" id="currentpass" name="oldpassword" placeholder="Current Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           
        </div><span id="oldspan"></span>

        <div class="input-group mt-3">
          <input type="password" class="form-control" id="newpass"  name="newpassword" placeholder="Enter New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;" ></span>
            </div>
          </div>
           
        </div><span id="newspan"></span>
        <div class="input-group mt-3">
          <input type="password" class="form-control" id="confpass" name="confpassword" placeholder="Confirm New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           
        </div><span id="confspan"></span>

        <div class="row mt-3">
          <div class="col-6">
            <button type="submit" name="change" class="btn btn-primary btn-block" id="change">Change password</button>
          </div>
          <div class="col-6">
            <a href="dashboard.php" class="btn btn-danger btn-block">Back</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

   
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php 
include "./SRC/connection.php";
if(isset($_POST['change'])){
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $oldp = mysqli_real_escape_string($conn, $_POST['oldpassword']);
    $newp = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $confp = mysqli_real_escape_string($conn, $_POST['confpassword']);

    $check = "SELECT * FROM users WHERE `username` = '".$uname."' AND `password` = '".$oldp."'  ";
    $query1 = mysqli_query($conn, $check);
    $countrow = mysqli_num_rows($query1);
    if($countrow > 0){
        $updatepss = "UPDATE users SET `password` = '".$newp."' WHERE  username = '".$uname."' ";
        $qry = mysqli_query($conn, $updatepss);
        if($qry){
            echo "<script>alert('Change Password successfully')</script>";         
        }
        echo "<script>window.location.href='logout.php'</script>";

    }else if($countrow <=0){
        echo "<script>alert(' your current password is incorrect')</script>";         

    }
}


?>

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#newpass');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>

$(document).ready(function(){

$('#confpass').keyup(function(){
  var pass2 = $('#newpass').val();
  var confirmpass = $(this).val();
  if(confirmpass == ""){
    $('#confspan').html("<span></span>");
  }else if(pass2 != confirmpass){
    $('#confspan').html("<span class='badge badge-danger'><b> Password is not match </b></span>");
    $("#change").prop("disabled", true);
  }else {
    $('#confspan').html("<span class='badge badge-success'><b> Password is  matched </b></span>");
    $("#change").prop("disabled", false);
  }
})

$('#newpass').keyup(function(){
  var pass1 = $(this).val();
  if(pass1 == "")
  {
    $('#newspan').html("<span></span>");
  }
  else if(pass1.length >=1 && pass1.length <=5){
    $("#newspan").html("<span class='badge badge-danger'><b> Password is very week </b></span>");
  }
  else if(pass1.length >=6 && pass1.length <=10){
    $("#newspan").html("<span class='badge badge-primary'><b> Password is Medium </b></span>");
  }
  else{
    $("#newspan").html("<span class='badge badge-success'><b> Password is strong </b></span>");
  }

});

});

    </script>
</body>
</html>
