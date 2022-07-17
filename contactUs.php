<?php 
include('include/connections.php');
session_start();
if (isset($_POST["register"]))
    {
        $email = $_POST["email"];
        $tellus = $_POST["tellus"];
        $sql ="INSERT INTO `contactus`(`email_user`, `tellus`) VALUES ('$email','$tellus')";
 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/contactUs.css">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    .out1 {
        margin-left: 1130px;
    }

    </style>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <ul class="navbar-nav">
            <a class="nav-item" href="userlanding0.php">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="userlanding.php" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="aboutUs.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item out1">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->

    <section class="contactUs">

        <div class="px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 bold">
                        <h1 class="my-5 display-4 fw-bold ls-tight">
                            Contact Us <br />
                            <span class="text-primary">Tell us your Message.</span>
                        </h1>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="x">
                            <form method="POST">
                                <div class="text-primary" style="font-size:50px"
                                    class="form-group d-flex align-items-center justify-content-center form-control-lg">
                                    Call 01125037505</div>
                                <br>
                                <div style="font-size:30px"
                                    class="form-group d-flex align-items-center justify-content-center form-control-lg">
                                    Or tell us your message down here.


                                </div>

                                <div id="textt" class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>

                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email" required>


                                    <div class="form-group">
                                        <label for="Message">Tell us</label>

                                        <textarea type="textarea" name="tellus" class="form-control" id="Message"
                                            required placeholder="Your message here ...">


                                        </textarea>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="submit"
                                    class="btn btn-outline-primary btn-group-lg btn-block">Send
                                    Message</button>

                                <hr class="my-4">


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>

    </div>


















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
</body>

</html>
