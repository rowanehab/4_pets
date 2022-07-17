<?php
session_start();
if(isset($_SESSION['DR_LOGIN'])){


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/userlanding.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/fontawesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
    body {
        background-image: url("css/h1_hero.png"), url("css/image.jpg");
        background-position: right, left;
        background-repeat: no-repeat, repeat;
        background-attachment: fixed, scroll;
        background-size: 800px, 500px;
    }

    .out1 {
        margin-left: 900px;
    }

    </style>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
            <a class="nav-item" href="#">
                <img src="css/logo.png" width="60" height="60">
            </a>
            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="doctorlanding.php" class="nav-link">Home</a>
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
    <!--navbar-->

    <div>
        <div class="sec child">
            <p>We help to groom your pet</p>
            <h1 style="font-size: 70px;">We Care Your Pets.</h1>
            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna sectetur
                adipisci.</p>
            <a href="bookAnAppointment.php">Book an Appointment &nbsp;&nbsp;<i class="fa fa-arrow-right"
                    aria-hidden="true"></i></a>

        </div>
        <div class="pet child"></div>
    </div>


    <div class="footer">
        <footer class="bg-light text-center text-lg-start fixed-bottom">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>
    </div>



    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
<?php
}else{
   header('location:login.php');
   exit();
}
?>
