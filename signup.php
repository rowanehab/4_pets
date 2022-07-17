<?php

if (isset($_POST["register"]))
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
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

    <div class="container">
        <div class="formStyle mx-auto">
            <div style="font-size:30px" class="form-group d-flex justify-content-center form-control-lg">
                Sign up
            </div>

            <form onsubmit="validation()" action="signup_post.php" method="post" name="regForm">
                <?php
                if (isset($user_error)) {
                    echo $user_error;
                }
                ?>
                <div class="form-group">
                    <div class="form-group">
                        <label for="username"> Username <h class="ast">*</h></label>
                        <input type="text" class="form-control" id="username" name="username" required />
                    </div>
                    <div class="row">
                        <div class="form-group col">

                            <label for="firstname"> First Name <h class="ast">*</h></label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required />
                        </div>

                        <div class="form-group col">
                            <label for="lastname"> Last Name <h class="ast">*</h></label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        if (isset($email_error)) {
                            echo $email_error;
                        }
                        ?>
                        <label for="email"> Email <h class="ast">*</h></label>
                        <input type="email" class="form-control" name="email" id="email" required />
                    </div>

                    <?php
                        if (isset($phone_error)) {
                            echo $phone_error;
                        }
                        ?>


                    <div class="form-group">
                        <label for="phoneNumber">Phone Number<h class="ast"> *
                            </h></label>
                        <input type="tel" id="phone" class="form-control phone" name="phone"
                            placeholder="+20 (___) ___-_____" />
                    </div>

                    <div class="form-group">
                        <h style="font-weight: bold; ">Gender<h style="color: red;"> *
                            </h>
                        </h>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Male" id="femaleGender"
                                checked />Male


                            <input class="form-check-input p-1" type="radio" name="gender" value="Female"
                                id="maleGender " style="margin-left: 50px;" />Female
                        </div>
                    </div>
                    <div class="form-group">
                        <h style="font-weight: bold; ">Date of Birth<h style="color: red;"> *
                            </h>
                        </h>
                        <input type="date" name="dateofbirth">
                    </div>

                    <?php
                        if (isset($passworderror)) {
                            echo $passworderror ;
                        }
                    ?>

                    <div class="form-group">
                        <label for="psw"> Password <h class="ast">*</h></label>
                        <input type="password" class="form-control" id="psw" name="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>

                    <div class="form-group">
                        <label for="psw2">Confirm Password<h class="ast">*</h> </label>
                        <input type="password" class="form-control" id="psw2" name="confirmpassword"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must
                    contain at least one number and one uppercase and lowercase letter, and at least 8 or more
                    characters" required>
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <div class="g-recaptcha " data-sitekey="6Lcm-pgfAAAAAIlxu6zVcKhtpTjhb9y68-8SbXXO"></div>
                    </div>

                    <div class="btns text-center">
                        <button name="submit" type="submit" id="submit" onclick="matchPassword()"
                            class="btn btn-outline-primary mr-3">Register</button>
                        <button type="reset" class="btn btn-outline-primary mr-3">Clear</button>
                    </div>
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
<script>
document.getElementById('phone').addEventListener('input', function(e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
</script>
