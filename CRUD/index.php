<!DOCTYPE html>
<html>

<head>
    <title>CRUD OPERATION</title>
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

    if(isset($_POST['save'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $date = mysqli_real_escape_string($conn,$_POST['date']);

        $insert = mysqli_query($conn, "INSERT INTO crud(`Name`,`Phone`, `Email`,`Address`,`Gender`,`C_Date`)VALUES('".$name."', '".$phone."', '".$email."', '".$address."', '".$gender."', '".$date."')");

        if($insert){
            echo "<script>alert('inserted successfully')</script>";
        }else{
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
                            <input type="text" class="form-control" Name="name" id="name" placeholder="Enter full Name"
                                required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" Name="phone" id="phone" placeholder="Enter Phone"
                                required>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" Name="email" id="email" placeholder="Enter Email"
                                required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" Name="address" id="address"
                                placeholder="Enter Address" required>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Email">Gender</label>
                            <select name="gender" id="gender" class="form-control" required">
                                <option value="">select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="Date" class="form-control" Name="date" id="date" name="date">
                        </div>
                    </div>
                    <div class="row pt-3 pl-0 pr-0 ">


                        <div>
                            <button type="submit" name="save" class="btn btn-primary">SAVE</button>
                            <button type="reset" name="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>
            </form>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                $reslut = mysqli_query($conn, "SELECT *FROM crud");
                while($row = mysqli_fetch_array($reslut)){

                
                ?>
                    <tr>
                        <th><?php echo$row[0];?></th>
                        <td><?php echo$row[1];?></td>
                        <td><?php echo$row[2];?></td>
                        <td><?php echo$row[3];?></td>
                        <td><?php echo$row[4];?></td>
                        <td><?php echo$row[7];?></td>
                        <td><?php echo$row[6];?></td>

                        <?php echo " 
                        <td>
                            <a href='update.php?id=$row[0]&name1=$row[1]&phoneno= $row[2]&emal=$row[3]&address=$row[4]&gender=$row[7]&date=$row[5]'class='btn btn-success'>Edit</a>
                            <a href='delete.php?id=$row[0]' onclick = 'return ConformDelete()' class='btn btn-danger'>Delete</a>
                        </td>";
                        ?>

                    </tr>
                    <?php }?>


                </tbody>
            </table>

        </div>
    </div>


    <script>
    function ConformDelete() {
        return confirm("Are sure you want to delete ..?")
    }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>