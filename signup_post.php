<?php
require('vendor/autoload.php');
include('include/connections.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {
    $username = stripcslashes(strtolower($_POST['username']));
    $firstname = stripcslashes($_POST['firstname']);
    $lastname = stripcslashes($_POST['lastname']);
    $email = stripcslashes($_POST['email']);
    $phone = stripcslashes($_POST['phone']);
    $dateofbirth = stripcslashes($_POST['dateofbirth']);
    $password = stripcslashes($_POST['password']);
    $confirmpassword = stripcslashes($_POST['confirmpassword']);
    $gender = stripcslashes($_POST['gender']);
    $verification_code =null;
    $email_verified_at = null;
    
    $mail = new PHPMailer(true);


    $username = htmlentities(mysqli_real_escape_string($conn, $_POST['username']));
    $firstname = htmlentities(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = htmlentities(mysqli_real_escape_string($conn, $_POST['lastname']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $phone = htmlentities(mysqli_real_escape_string($conn, $_POST['phone']));
    $dateofbirth = htmlentities(mysqli_real_escape_string($conn, $_POST['dateofbirth']));
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['gender']));
    $md5_pass = md5($password);
    $error_s = 0;

    $check_user = "SELECT * FROM `user` where username  = '$username'";
    $check_result = mysqli_query($conn, $check_user);
    $num_rows = mysqli_num_rows($check_result);
    if ($num_rows != 0) {
        $user_error = '<div class="alert alert-danger text-center">Sorry, Username already exist.</div>';
        $error_s = 1;
    }

    $check_email = "SELECT * FROM `user` where email  = '$email'";
    $check_result = mysqli_query($conn, $check_email);
    $num_rows = mysqli_num_rows($check_result);

    if ($num_rows != 0) {
        $email_error = '<div class="alert alert-danger text-center">Sorry, Email already exist.</div>';
        $error_s = 1;
    }
    $check_phone = "SELECT * FROM `user` where phone  = '$phone'";
    $check_result = mysqli_query($conn, $check_phone);
    $num_rows = mysqli_num_rows($check_result);

    if ($num_rows != 0) {
        $phone_error = '<div class="alert alert-danger text-center">Sorry, Phone already exist.</div>';
        $error_s = 1;
    }

    if($password != $confirmpassword){
        $passworderror = '<div class="alert alert-danger text-center">Sorry, Password and Confirm password not matched.</div>';
        $error_s = 1;
    }

    if (($num_rows == 0) && ($error_s == 0)) {
        
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
        $mail->addAddress($email,$username);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code;

        $mail->send();

        //$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(username,firstname,lastname,email,phone,dateofbirth,password,md5_pass,gender,role,status, verification_code, email_verified_at,image) VALUES
                                ('$username','$firstname','$lastname','$email','$phone','$dateofbirth','$password','$md5_pass','$gender',0,0, '$verification_code', 'null','OIP.jpg')";
        mysqli_query($conn, $sql);
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
        //header('location:signuppet.php');
        header('location:email-verification.php?email=' . $email);
    } else {
        include('signup.php');
    }
}
