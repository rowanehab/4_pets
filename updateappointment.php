<?php
include('include/connections.php');
include('include/functions.php');
session_start();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM appointment where id='$id'";
    $result = mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($result);

    $timest=strtotime($row['time']);
    $finaltime = date("h:i", $timest);

}


if (isset($_POST['submit'])) {
$date = stripcslashes(strtolower($_POST['date']));
$time = stripcslashes($_POST['time']);
$price = stripcslashes($_POST['price']);


$date = htmlentities(mysqli_real_escape_string($conn, $_POST['date']));
$time = htmlentities(mysqli_real_escape_string($conn, $_POST['time']));
$price = htmlentities(mysqli_real_escape_string($conn, $_POST['price']));

$sql = "UPDATE `appointment` SET date='$date', time='$time', price='$price' WHERE id = '$id'";
mysqli_query($conn, $sql);
header('location:doctorprofile.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update an Appointment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/signUp.css?v=<?php echo time();?>">
    <link rel="shourt" href="css/bootstrap.min.css">
    <script src="js/signUp.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <ul class="navbar-nav">
            <a class="nav-item" href="#">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="userlanding.php" class="nav-link">Home</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>

    <div class="container">
        <div class="formStyle mx-auto">
            <div style="font-size:30px" class="form-group d-flex justify-content-center form-control-lg">
                Add An Appointment
            </div>

            <form method="post" name="regForm">


                <div class="form-group">
                    <label for="date">Date of the appointment<h style="color: red;"> *</h></label>
                    <input type="date" name="date" class="form-control" value="<?php echo $row['date']?>" required>
                </div>
                <div class="form-group">
                    <label for="time"> Time <h class="ast">*</h></label>
                    <input type="time" class="form-control" name="time" id="time" value="<?php echo $finaltime?>"
                        required />
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Price<h class="ast"> *
                        </h></label>
                    <input type="number" id="phoneNumber" class="form-control" name="price"
                        value="<?php echo $row['price']?>" required />
                </div>

                <div class="btns text-center">
                    <button name="submit" type="submit" id="submit" class="btn btn-outline-primary mr-3">Update</button>
                </div>
        </div>
        </form>
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
</body>
