<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time();?>">
    <title>4Pets</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    .container {
        margin-top: 100px;
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
                    <a href="userlanding.php" class="nav-link">Home</a>

                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->




    <div class="container formStyle mx-auto">

        <div class="form-group d-flex justify-content-center form-control-lg">
            Find Your account
        </div>

        <form method="POST">
            <div class="form-group">
                <input class="form-control" type=" email" name='user_email' placeholder="Please Enter Your Email"
                    required>
            </div>
            <div class="form-group text-center">
                <button type="submit" name="submit" class="btn btn-outline-primary mr-3">Send</button>
            </div>
        </form>
    </div>

</body>

</html>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include( 'include/connections.php');
require 'vendor/autoload.php';

if(isset($_POST['submit'])){
    
    
    $user_email=$_POST['user_email'];

    $sql="SELECT * FROM `user` WHERE `email` = '$user_email'";
    if ($res = mysqli_query($conn,$sql))
    {
    $con=mysqli_num_rows($res);
    $row=mysqli_fetch_assoc($res);
    if($con==1){
        $mail = new PHPMailer(true);
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'fcaiLMS123@gmail.com';
 
            //SMTP password
            $mail->Password = 'fcailms123';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('fcaiLMS123@gmail.com', '4Pets');
 
            //Add a recipient
            $mail->addAddress($user_email);
 
            //Set email format to HTML
            $mail->isHTML(true);

 
            $mail->Subject = 'Forget Password';
            $mail->Body    = '<p>Your password is: <b style="font-size: 30px;">' . $row['password'].'<p>Your Name is: <b style="font-size: 30px;">'. $row['username']. '</b></p>'.'We wish you a happy experience';
 
            $mail->send();

            header("location:login.php");

            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
     }
    }
?>
