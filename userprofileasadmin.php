<?php
session_start();
include('include/connections.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['ADMIN_LOGIN'] && isset($_SESSION['USER_AS_ADMIN_LOGIN'])){
    $id=$_SESSION['id'];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
    $row = mysqli_fetch_array($res);

    $resultPet = mysqli_query( $conn, "SELECT * FROM pet JOIN user where pet.user_id='$id'" );
    $rowPet= mysqli_fetch_array( $resultPet );

    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $dateofbirth = $row['dateofbirth'];
    $name=$rowPet['namee'];
    $type=$rowPet['typee'];
    $info=$rowPet['info'];
    $breed=$rowPet['breed'];
    $age=$rowPet['age'];
    $gender=$rowPet['genderr'];
    $image = $row['image'];

    $sql = "SELECT DISTINCT appointment.id, `date`, `time`, `price`,doctor.username FROM `appointment` JOIN doctor JOIN user WHERE doctor_id = doctor.id AND user_id = '$id'";
    $resultAppointments = mysqli_query($conn, $sql);
    
    $msg = "";
    if (isset($_POST['upload'])) {
    
        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "image/".$filename;
        
        $sql = "UPDATE user SET image = '$filename' where id='$id'";
        
        $result = mysqli_query($conn, $sql);

        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
            
        }else{
            $msg = "Failed to upload image";
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/userprofile.css?v=<?php echo time();?>">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    .out1 {
        margin-left: 900px;
    }

    </style>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light d-flex">
        <ul class="navbar-nav">
            <a class="nav-item" href="#">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse d-flex">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="bookAnAppointment.php" class="nav-link">Book Appointment</a>
                </li>
                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="aboutUs.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item out1">
                    <a href="userprofileasadmin.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Log out</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card" id="c1">
                    <div class="card-body">
                        <div class="user-name">
                            <div class="profile-pic-div">
                                <img src="<?php echo "image/".$image; ?>" alt="" id="photo"
                                    style="width:140px;height:140px;">

                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group  mt-2">

                                        <input type="file" name="photo" id="file">
                                        <label class="btn btn-outline-dark" for="file" id="uploadBtn">choose
                                            Photo</label>
                                        <button class="btn btn-outline-dark" type="submit" name="upload"> Upload
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <h5 class="user-name"><?php echo $username ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--profile details-->
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card" id="c2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary"><i class="fa-solid fa-id-card"></i> Personal Details
                                </h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="fullName"><strong>Full
                                            Name:</strong></label>
                                    <p><?php echo $firstname; echo " ";echo $lastname ?></p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="eMail"><strong>Email:</strong></label>
                                    <p><?php echo $email ?></p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="phone"><strong>Phone:</strong></label>
                                    <p><?php echo $phone?></p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="pet"><strong>Pet Name:</strong></label>
                                    <p><?php echo $name ?>
                                    <address></address>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="pet"><strong>Pet Breed:</strong></label>
                                    <p><?php echo $breed ?>
                                    <address></address>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="type"><strong>Pet Type:</strong></label>
                                    <p><?php echo $type?>
                                    <address></address>
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="type"><strong>Pet Age:</strong></label>
                                    <p><?php echo $age?>
                                    <address></address>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="type"><strong>Pet Gender:</strong></label>
                                    <p><?php echo $gender?>
                                    <address></address>
                                    </p>
                                </div>
                            </div>

                            <div class="card cardy mb-3">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-primary">
                                                <i class="fa fa-book" aria-hidden="true"></i> Your
                                                Appointment
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-body-- ">
                                        <div class="table-stats order-table ov-h">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>Dr Name</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Price</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i=1;
                                                    while($row=mysqli_fetch_array($resultAppointments)){?>
                                                    <tr>
                                                        <td>Dr <?php echo $row['username']?>
                                                        </td>
                                                        <td><?php echo $row['date']?>
                                                        </td>
                                                        <td><?php echo $row['time']?>
                                                        </td>
                                                        <td><?php echo $row['price']?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                        echo "<div class='badge badge-delete'><a href='deleteappointment.php?id=".$row['id']."'>Cancel</a></div>";
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php
                        
                        echo "<div class='form-group'><a class='btn btn-outline-primary stretched-link btn-block' href='updateuser.php?id=".$id."'>Edit</a></div>";                        
								
                        ?>
                    </div>
                </div>
            </div>
            <br><br><br>
            <!--footer-->
            <!--     <div class="footer">
        <footer class="bg-light text-center text-lg-start fixed-bottom">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>
    </div> -->
            <!--footer-->


            <script src="js/popper.min.js"></script>
            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/profile.js"></script>
</body>

</html>
<?php
}else{
   header('location:login.php');
   exit();
}
?>
