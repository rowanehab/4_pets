<?php
include('include/connections.php');
session_start();
if(isset($_SESSION['id']) && (isset($_SESSION['ADMIN_LOGIN']) || isset($_SESSION['USER_LOGIN']) || isset($_SESSION['DR_LOGIN'] ))){

$sql = "SELECT appointment.id,doctor.username, date, time, price FROM appointment JOIN doctor where appointment.status=0 and doctor_id = doctor.id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Pets</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/bookAnAppointment.css?v=<?php echo time();?>">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    .out1 {
        margin-left: 1000px;
    }

    iframe {
        position: relative;
        width: 200px;
        height: 570px;
    }

    #abc {
        position: relative;
        width: 1530px;
        height: 150px;
        /*  bottom: 575px;*/

    }

    </style>
    <script src="js/bookAnAppointment.js"></script>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <ul class="navbar-nav">
            <a class="nav-item" href="#">
                <img src="css/logo.png" width="60" height="60">
            </a>
            <div id="takeAction" class="collapse navbar-collapse">
                <!-- <li class="nav-item">
                    <a href="userlanding.php" class="nav-link">Home</a>
                </li> -->
                <li class="nav-item">
                    <a href="bookAnAppointment.php" class="nav-link">Book Appointment</a>
                </li>
                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="aboutUs.php" class="nav-link">About Us</a>
                </li>
                <!-- 
                <li class="nav-item out1">
                    <a href="userprofile.php" class="nav-link">Profile</a>
                </li> -->
                <li class="nav-item out1">
                    <a href="logout.php" class="nav-link">Log out</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->

    <img id="abc" src="source.gif"></img>

    <!--table booking-->
    <div class="containery">
        <!--searching-->
        <div class="row align-items-center justify-content-center">
            <div class="col">
                <h2>Available Appointments</h2>
            </div>
            <div class="col">
                <input type="text" id="name" class="search form-control" onkeyup="searchName()" placeholder="Dr. ....">
            </div>
            <div class="col">
                <input type="date" id="date" class="search form-control" onkeyup="searchDate()" placeholder="Date">
            </div>
            <div class="col">
                <input type="text" id="price" class="search form-control" onkeyup="searchPrice()" placeholder="Price">
            </div>

        </div>
        <span class="counter pull-right"></span>
        <!--searching-->

        <table class="table table-hover table-bordered" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 20%;" scope="col">Dr's Name</th>
                    <th style="width: 20%;" scope="col">Date</th>
                    <th style="width: 20%;" scope="col">Time</th>
                    <th style="width: 20%;" scope="col">Price</th>
                    <th style="width: 20%;" scope="col">Book here</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i=1;
                    while($row=mysqli_fetch_array($result)){?>
                <tr>
                    <td>Dr <?php echo $row['username']?></th>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['time']?></td>
                    <td><?php echo $row['price']?> LE</td>
                    <td scope="col">
                        <?php 
                    
                        echo '<a class="btn btn-outline-dark  " href="booking.php?id='.$row['id'].'">Book</a>';
                    
                    ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    <!--table booking-->

    <br><br><br>

    <!--footer-->
    <div class="footer">
        <footer class="bg-light text-center text-lg-start fixed-bottom ">
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
</body>

</html>
<?php
}else{
header('location:login.php');
   exit();
}
?>
