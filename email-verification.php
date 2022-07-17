<?php
session_start();
include('include/connections.php');
if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    

    if ($verification_code == $row['verification_code']) {
        $sql = "UPDATE user SET status = 1 WHERE email = '$email' ";
        $result  = mysqli_query($conn, $sql);
        $_SESSION['id'] = $row['id'];
        header('location:signuppet.php');
    } else {
        $msg = '<div class="alert alert-danger text-center">Sorry, your code is worng.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification code</title>
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
            <div class="form-group d-flex justify-content-center form-control-lg">
                Enter your verification code to be able to login.
            </div>
            <form method="POST">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <div class="form-group">
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
                    <input class="form-control" type="text" name="verification_code"
                        placeholder="Enter verification code" required />
                </div>
                <input class="btn btn-outline-primary btn-block" type="submit" name="verify_email" value="Verify Email">
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

</html>
