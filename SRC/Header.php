
<?php 
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] == true){
    // echo "<script>alert('signed in.. ')</script>";
}else{
    echo "<script>window.location.href='index.php';</script>";
}
?>




<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <h6><i class="fa fa-user mr-2"></i><?php echo $_SESSION['fullname'] ?>
                <i class="fas fa-angle-down right" style= "font-size:20px;" ></i> </h6>
                 
                <!-- <span class="badge badge-danger navbar-badge">3</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="logout.php" class="dropdown-item">
                    <h3 class="dropdown-item-title">
                       <i class= "nav-icon fas fa-sign-out-alt">  Logout </i>
                    </h3>
                </a>
 
                <a href="changepassword.php" class="dropdown-item">
                    <h3 class="dropdown-item-title">
                       <i class= "nav-icon fas fa-lock">  Change Password </i>
                    </h3>
                </a>
 
            </div>
            </div>
            
            </a>
        </li>

        
        <!-- Notifications Dropdown Menu -->
    

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>HRM SYSTEM</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION['user_photo'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
 
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php 
            if($_SESSION['Role'] == 'Admin'){

           

            ?>
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Emp_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee List</p>
                            </a>
                        </li>
                    </ul>
                </li>
     
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Department
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Department.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            schedual
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Schedual_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Schedual List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="User_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Attendance_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="EmployeeReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="DailyAttendance.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Attendancet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="MonthlyAttendanceReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monthly Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Allattendance.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>
           <?php }else if($_SESSION['Role'] == 'User') {?>
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            schedual
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Schedual_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Schedual List</p>
                            </a>
                        </li>
                    </ul>
                </li>


            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Attendance
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Attendance_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                    </ul>
                </li>



            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="DailyAttendance.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Attendancet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="MonthlyAttendanceReport.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monthly Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Allattendance.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Attendance</p>
                            </a>
                        </li>
                    </ul>
                </li>

 


      <?php }?>
      <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class= "nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sign Out
                        </p>
                    </a>
                 
                </li>
            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">