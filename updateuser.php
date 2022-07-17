<?php
include('include/connections.php');
include('include/functions.php');
session_start();
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn, $_GET['id']);
    
    $res = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
    $row = mysqli_fetch_array($res);

    $resultPet = mysqli_query( $conn, "SELECT * FROM pet JOIN user where pet.user_id='$id'" );
    $rowPet= mysqli_fetch_array( $resultPet );

    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $dateofbirth = $row['dateofbirth'];
    $name=$rowPet['namee'];
    $type=$rowPet['typee'];
    $info=$rowPet['info'];
    $breed=$rowPet['breed'];
    $genderpet = $rowPet['genderr'];
    $agepet = $rowPet['age'];
}

if (isset($_POST['submit'])) {
    $username = get_safe_value($conn, $_POST['username']);
    $email = get_safe_value($conn, $_POST['email']);
    $mobile = get_safe_value($conn, $_POST['mobile']);
    $password = get_safe_value($conn, $_POST['password']);
    $firstname = get_safe_value($conn, $_POST['firstname']);
    $lastname = get_safe_value($conn, $_POST['lastname']);
    $gender = get_safe_value($conn, $_POST['gender']);
    $dateofbirth = get_safe_value($conn, $_POST['dateofbirth']);
    $name=get_safe_value($conn, $_POST['Pet_Name']);
    $type=get_safe_value($conn, $_POST['Pet_Type']);
    $info=get_safe_value($conn, $_POST['Pet_Info']);
    $breed=get_safe_value($conn, $_POST['Pet_Breed']);
    $genderpet=get_safe_value($conn, $_POST['genderpet']);
    $agepet=get_safe_value($conn, $_POST['agepet']);



    $res = mysqli_query($conn, "select * from user where username='$username'");
    $check = mysqli_num_rows($res);


    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = '<div class="alert alert-danger text-center">Sorry, Username already exist.</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger text-center">Sorry, Username already exist.</div>';
        }
    }

    $resEmail = mysqli_query($conn, "select * from user where email='$email'");
    $checkEmail = mysqli_num_rows($resEmail);


    if ($checkEmail > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($resEmail);
            if ($id == $getData['id']) {
            } else {
                $msgEmail = '<div class="alert alert-danger text-center">Sorry, Email already exist.</div>';
            }
        } else {
            $msgEmail = '<div class="alert alert-danger text-center">Sorry, Email already exist.</div>';
        }
    }

    $resphone = mysqli_query($conn, "select * from user where phone='$mobile'");
    $checkphone = mysqli_num_rows($resphone);


    if ($checkphone > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($resphone);
            if ($id == $getData['id']) {
            } else {
                $msgphone = '<div class="alert alert-danger text-center">Sorry, Mobile already exist.</div>';
            }
        } else {
            $msgphone = '<div class="alert alert-danger text-center">Sorry, Mobile already exist.</div>';
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update_sqlUser = "update user set username='$username',password='$password',email='$email',phone='$mobile' ,firstname='$firstname',lastname='$lastname',gender='$gender',dateofbirth='$dateofbirth' where id='$id'";
            $update_sqlPet = "update pet set namee='$name',typee='$type',breed='$breed',info='$info',genderr='$genderpet', age='$agepet' where user_id='$id'";
            mysqli_query($conn, $update_sqlUser);
            mysqli_query($conn, $update_sqlPet);
        } else {
            mysqli_query($conn, "insert into user (username,password,email,phone,role,status,firstname,lastname,gender,dateofbirth) values('$username','$password','$email','$mobile',0,1,'$firstname','$lastname','$gender','$dateofbirth')");
            mysqli_query($conn, "insert into pet (namee,typee,breed,info,genderr,age) values('$name','$type','$breed','$info','$genderpet','$agepet')");
        }
        if(isset($_SESSION['ADMIN_LOGIN']) && isset($_SESSION['USER_AS_ADMIN_LOGIN'])){
            header('location:userprofileasadmin.php');
        } else if(isset($_SESSION['USER_LOGIN'])) {
            header('location:userprofile.php');
        } else if (isset($_SESSION['ADMIN_LOGIN'])){
            header('location:adminprofile.php');
        }
        die();
    }
}
?>

<style>
.ast {
    color: red;
}

</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/signUp.css?v=<?php echo time();?>">
    <link rel="shourt" href="css/bootstrap.min.css">
    <script src="js/signUp.js"></script>

    <style>
    .container {
        width: 500px;
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
                    <a href="bookAnAppointment.php" class="nav-link">Book Appointment</a>
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

    <div class="card-header"><strong>Update User Form</strong></div>
    <div class="container">

        <form method="post" enctype="multipart/form-data">
            <div class="card-body card-block">
                <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
                <div class="form-group">
                    <label for="username" class=" form-control-label">Username
                    </label>
                    <input type="text" name="username" placeholder="Enter username" class="form-control" required
                        value="<?php echo $username ?>">
                </div>
                <div class="form-group">
                    <label for="firstname" class=" form-control-label">Firstname
                    </label>
                    <input type="text" name="firstname" placeholder="Enter firstname" class="form-control" required
                        value="<?php echo $firstname ?>">
                </div>
                <div class="form-group">
                    <label for="lastname" class=" form-control-label">Lastname
                    </label>
                    <input type="text" name="lastname" placeholder="Enter lastname" class="form-control" required
                        value="<?php echo $lastname ?>">
                </div>
                <div class="form-group">
                    <label for="gender" class=" form-control-label">Gender</label>
                    <input type="text" name="gender" placeholder="Enter Gender" class="form-control" required
                        value="<?php echo $gender ?>">
                </div>
                <div class="form-group">
                    <label for="dateofbirth" class=" form-control-label">Date Of Birth
                    </label>
                    <input type="Date" name="dateofbirth" placeholder="Enter Date Of Birth" class="form-control"
                        required value="<?php echo $dateofbirth ?>">
                </div>
                <?php
            if (isset($msgphone)) {
                echo $msgphone;
            }
            ?>
                <div class="form-group">
                    <label for="Mobile" class=" form-control-label">Mobile</label>
                    <input type="text" name="mobile" placeholder="Enter mobile" class="form-control" required
                        value="<?php echo $phone ?>">
                </div>
                <?php
            if (isset($msgEmail)) {
                echo $msgEmail;
            }
            ?>
                <div class="form-group">
                    <label for="email" class=" form-control-label">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" required
                        value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="password" class=" form-control-label">Password
                    </label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control" required
                        value="<?php echo $password ?>">
                </div>






                <div class="form-group">
                    <label class=" form-control-label">Pet Name
                    </label>
                    <input type="text" name="Pet_Name" placeholder="Enter Pet Name" class="form-control" required
                        value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Pet Type
                    </label>
                    <input type="text" name="Pet_Type" placeholder="Enter Pet Type" class="form-control" required
                        value="<?php echo $type ?>">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Pet Breed
                    </label>
                    <input type="text" name="Pet_Breed" placeholder="Enter Pet Breed" class="form-control" required
                        value="<?php echo $breed ?>">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Pet Age
                    </label>
                    <input type="text" name="agepet" placeholder="Enter Pet age" class="form-control" required
                        value="<?php echo $agepet ?>">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Pet Gender
                    </label>
                    <input type="text" name="genderpet" placeholder="Enter Pet gender" class="form-control" required
                        value="<?php echo $genderpet ?>">
                </div>

                <div class="form-group">
                    <label class=" form-control-label">Pet Info
                    </label>
                    <input type="text" name="Pet_Info" placeholder="Enter Pet Info" class="form-control" required
                        value="<?php echo $info ?>">
                </div>
                <button id="payment-button" name="submit" type="submit" class="btn btn-info btn-block">
                    <span id="payment-button-amount">SUBMIT</span>
                </button>
            </div>
        </form>
    </div>


    </div>

</body>

</html>
