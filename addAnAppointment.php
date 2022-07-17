<?php
include('include/connections.php');
include('include/functions.php');
session_start();

if (isset($_GET['id']) && $_GET['id'] != '' && isset($_SESSION['DR_LOGIN'])) {
    $doctor_id = get_safe_value($conn, $_GET['id']);
}else {
    header("location:login.php");
}


if (isset($_POST['submit'])) {
    $date = stripcslashes(strtolower($_POST['date']));
    $time = stripcslashes($_POST['time']);
    $price = stripcslashes($_POST['price']);
    
    
    $date = htmlentities(mysqli_real_escape_string($conn, $_POST['date']));
    $time = htmlentities(mysqli_real_escape_string($conn, $_POST['time']));
    $price = htmlentities(mysqli_real_escape_string($conn, $_POST['price']));
   
    $sql = "INSERT INTO appointment(date,time,price,doctor_id,status) VALUES ('$date', '$time','$price','$doctor_id',0)";
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
    <title>Add An Appointment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/signUp.css">
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
                <li class="nav-item">
                    <a href="bookAnAppointment.php" class="nav-link">Add an Appointment</a>
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
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time"> Time <h class="ast">*</h></label>
                    <input type="time" class="form-control" name="time" id="time" required />
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Price<h class="ast"> *
                        </h></label>
                    <input type="number" id="phoneNumber" class="form-control" name="price" required />
                </div>

                <div class="btns text-center">
                    <button name="submit" type="submit" id="submit"
                        class="btn btn-outline-primary mr-3">Register</button>
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
