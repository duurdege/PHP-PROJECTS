<!DOCTYPE html>
<html>

<head>
    <title>UPDATE CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="card m-5">
        <div class="card-body">

            <!-- PHP CODE PART -->
     <?php
    include ("Connection.php");

    // get all varible from update buttun in Index.php file
    $id = $_GET['id'];
    // echo $id;
    $name = $_GET['name1'];
    $phoneno = $_GET['phoneno'];
    $email = $_GET['emal'];
    $address = $_GET['address'];
    $gender = $_GET['gender'];
    $date = $_GET['date'];

    if(isset($_POST['update'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $add = mysqli_real_escape_string($conn,$_POST['address']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $date = mysqli_real_escape_string($conn,$_POST['date']);

        $updateqry = "UPDATE `crud` SET `Name` = '".$name."', `Phone` = '".$phone."', `Email` = '".$email."', `Address` = '".$add."', `Gender` = '".$gender."',`C_Date` = '".$date."' WHERE `id` = ".$id." ";
        $resUpdate = mysqli_query($conn, $updateqry);

        if($resUpdate){
            echo "<script>alert('Updated successfully')</script>";
            echo "<script>window.location.href='index.php';</script>";

        }
        else{
            echo $conn->error;
        }
    }


    //<a href='update.php?id=$row[0]&name1=$row[1]&phoneno= $row[2]&emal=$row[3]&address=$row[4]&gender=$row[7]&date=$row[5]'class='btn btn-success'>Edit</a>
?>


            <form action="" class="" method="post">
                <div class="row p-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Full Name">Full Name</label>
                            <input type="text" class="form-control" value="<?php echo $name ?>" Name="name" id="name"
                                placeholder="Enter full Name" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" value="<?php echo $phoneno ?>" Name="phone"
                                id="phone" placeholder="Enter Phone" required>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" value="<?php echo $email ?>" Name="email"
                                id="email" placeholder="Enter Email" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" value="<?php echo $address ?>" Name="address"
                                id="address" placeholder="Enter Address" required>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Email">Gender</label>
                            <select name="gender" id="gender" class="form-control" required">
                                <option value="value=" <?php echo $gender ?>><?php echo $gender ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="Date" class="form-control" value="<?php echo $date ?>" Name="date" id="date"
                                name="date">
                        </div>
                    </div>
                    <div class="row pt-3 pl-0 pr-0 ">


                        <div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <button type="cancel" name="reset" class="btn btn-success">Reset</button>
                            <a href="index.php" class="btn btn-danger">Close</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>