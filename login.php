<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Pets</title>
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time();?>">
    <style>
    body {
        background-image: url("css/image.jpg");
    }

    </style>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
        <ul class="navbar-nav">
            <a class="nav-item" href="userlanding0.php  ">
                <img src="css/logo.png" width="60" height="60">
            </a>

            <div id="takeAction" class="collapse navbar-collapse">
                <li class="nav-item">
                    <a href="userlanding0.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="aboutUs.php" class="nav-link">About Us</a>
                </li>
            </div>
        </ul>
        <a href="#takeAction" data-toggle="collapse" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </a>
    </nav>
    <!--navbar-->

    <!--form-->
    <section class="corona">

        <div class="px-4 py-5 px-md-5 text-lg-start ">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 bold text-center">
                        <h1 class="my-5 display-4 fw-bold ls-tight">
                            4 Pets <br />
                            <span class="text-primary">Your pet, Our passion.</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Paws, whiskers and a dose of love.
                            Pawsitively Great Care.
                            Paws-itively passionate about pets!
                            Pawsitively the best.
                            Pet’s Best Friend.
                            Pets are our passion.
                            Protecting all nine lives.
                            Providing Special Care For Your Pets.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="formStyle">
                            <form method="post" action="login_get.php">
                                <div style="font-size:30px"
                                    class="form-group d-flex justify-content-center form-control-lg">
                                    Sign in
                                </div>
                                <?php
                                if (isset($user_error)) {
                                    echo $user_error;
                                }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>

                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                        aria-describedby="UserName" placeholder="Enter Username" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>

                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password" placeholder="Password" required>
                                </div>


                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                                checked />
                                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <!-- Simple link -->
                                        <a href="forgetpassword.php">Forgot password?</a>
                                    </div>
                                </div>

                                <button name="submit" type="submit"
                                    class="btn btn-outline-primary btn-group-lg btn-block" id="login">Login</button>

                                <hr class="my-4">

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Don't have an account? <a href="signup.php"
                                            class="btn-link">Register
                                            here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br><br><br>

    <!--form-->

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
