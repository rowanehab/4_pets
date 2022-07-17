<?php
include('include/connections.php');
session_start();
if(isset($_SESSION['id'])&& isset($_SESSION['username'])){
    $id = $_SESSION['id'];
}

if (isset($_POST['submit'])) {
    $namee = stripcslashes(strtolower($_POST['namee']));
    $typee = stripcslashes($_POST['typee']);
    $breed = stripcslashes($_POST['breed']);
    $age = stripcslashes($_POST['age']);
    $gender = stripcslashes($_POST['gender']);
    $info = stripcslashes($_POST['info']);
    
    
    $namee = htmlentities(mysqli_real_escape_string($conn, $_POST['namee']));
    $typee = htmlentities(mysqli_real_escape_string($conn, $_POST['typee']));
    $breed = htmlentities(mysqli_real_escape_string($conn, $_POST['breed']));
    $age = htmlentities(mysqli_real_escape_string($conn, $_POST['age']));
    $info = htmlentities(mysqli_real_escape_string($conn, $_POST['info']));
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['gender']));
    
    
   
    $sql = "INSERT INTO pet(namee,typee,breed,age,genderr,info,user_id,admin_id) VALUES ('$namee','$typee','$breed','$age','$gender','$info',null,'$id')";
    mysqli_query($conn, $sql);

    header('location:adminprofile.php');
    
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <title>Signup your Pet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signUp.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
            <form onsubmit="validation()" method="post" name="regForm">
                <div style="font-size:30px" class="form-group d-flex justify-content-center form-control-lg">
                    Your pet's information
                </div>

                <div class="form-group m-2">
                    <label for="petname">Pet Name <h class="ast">*</h></label>
                    <input type="text" class="form-control" id="petname" name="namee" required>
                </div>

                <div class="form-group row">

                    <div class="form-group col m-2">
                        <label for="pettype">Pet Type <h class="ast"> *</h></label>
                        <input type="text" class="form-control" id="pettype" name="typee" required />
                    </div>
                    <div class="form-group col m-2">
                        <label for="yourpet">Pet Breed <h class="ast">*</h></label>
                        <input type="text" class="form-control" id="yourpet" name="breed" required>
                    </div>
                </div>

                <div class="form-group m-2">
                    <label for="petage"> Pet Age<h class="ast"> * </h>
                    </label>
                    <input type="text" class="form-control" id="petage" name="age" required />
                </div>

                <div class="form-group m-2">
                    <label>Gender<h class="ast"> * </h>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                value="Male" />Male


                            <input class="form-check-input p-1" type="radio" name="gender" id="maleGender "
                                style="margin-left: 50px;" value="Female" />Female

                        </div>
                </div>

                <div class="form-group">
                    <label for="comment" style="margin-left: 10px;">Extra Information</label>
                    <textarea class="form-control" rows="5" id="comment" name="info"
                        style="margin-left: 10px;"></textarea>
                </div>
                <div class="btns text-center">
                    <button name="submit" type="submit" id="submit" onclick="matchPassword()"
                        class="btn btn-outline-primary mr-3">Register</button>
                    <button type="reset" class="btn btn-outline-primary mr-3">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    </div>

</body>
</body>
