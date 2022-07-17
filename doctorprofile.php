<?php
session_start();
include('include/connections.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['DR_LOGIN'])){
    $id=$_SESSION['id'];
    $username=$_SESSION['username'];
    $mobile=$_SESSION['mobile'];
    $email=$_SESSION['email'];

    
    $resultdr = mysqli_query($conn, "SELECT image From doctor where id= '$id'");
    $rowimage = mysqli_fetch_array($resultdr);
    $image = $rowimage['image'];
    

    $sql = "SELECT * FROM appointment where doctor_id='$id'";
    $result = mysqli_query($conn, $sql);
    


    $msg = "";
    if (isset($_POST['upload'])) {
    
        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "image/".$filename;
        
        $sql = "UPDATE doctor SET image = '$filename' where id='$id'";
        
        $resultt = mysqli_query($conn, $sql);

        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
            
        }else{
            $msg = "Failed to upload image";
        }
        //echo($msg);
        
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/doctorprofile.css?v=<?php echo time();?>">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" rel="stylesheet">

</head>
<style>
body {
    background-image: url("css/image.jpg");
}

#c1 {
    padding: 10px;
    /*height:680px;*/
}

#c2 {
    padding: 10px;

}

.out1 {
    margin-left: 1090px;
}

</style>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <ul class="navbar-nav">
            <a class="nav-item" href="#">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="doctorlanding.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">

                    <?php
                    echo "<a href='addAnAppointment.php?id=".$id."' class='nav-link'>Add an Appointment</a>";
                    ?>
                </li>
                <li class="nav-item out1">
                    <a href="doctorprofile.php" class="nav-link">Profile</a>
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
    <!--profile-->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card" id="c1" style="height: 500px;">
                    <div class="card-body">
                        <div class="pic" style="text-align: center;">
                            <div class="profile-pic-div">
                                <img src="<?php echo "image/".$image; ?>" alt="" id="photo"
                                    style="width:140px;height:140px;">
                                <br>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group  mt-2">

                                        <input type="file" name="photo" id="file">
                                        <label class="btn btn-outline-dark" for="file" id="uploadBtn">choose
                                            photo</label>


                                        <button class="btn btn-outline-dark" type="submit" name="upload"> Upload
                                        </button>

                                    </div>

                                </form>
                            </div>
                            <h5>Dr <?php echo $username ?></h5>
                        </div>
                        <div class="about">
                            <!-- <h3>About</h3> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card" id="c2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">
                                    <i class="fa-solid fa-id-card"></i> Personal Details
                                </h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="Name"><strong>Name:</strong></label>
                                    <p><?php echo $username ?></p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="phone"><strong>phone:</strong></label>
                                    <p><?php echo $mobile ?></p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-info">
                                    <label for="Email"><strong>Email:</strong></label>
                                    <p><?php echo $email ?></p>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div>
                                <div>
                                    <div class="card cardy mb-3">
                                        <div class="card-body">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mt-3 mb-2 text-primary">
                                                        <i class="fa fa-book" aria-hidden="true"></i> Your Appointment
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body--">
                                            <div class="table-stats order-table ov-h">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Price</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                    $i=1;
                                                    while($row=mysqli_fetch_array($result)){?>
                                                        <tr>


                                                            <td><?php echo $row['date']?></td>
                                                            <td><?php echo $row['time']?></td>
                                                            <td><?php echo $row['price']?></td>


                                                            <td>
                                                                <?php
    
                                                        echo "<span class='badge badge-edit'><a href='updateappointment.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                                        
                                                        echo "<div class='badge badge-delete'><a href='deleteappointmentforever.php?id=".$row['id']."'>Delete</a></div>";
                                                        
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <!--footer-->
        <div class="footer">
            <footer class="bg-light text-center text-lg-start fixed-bottom">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2020 Copyright:
                    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
            </footer>
        </div>
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
