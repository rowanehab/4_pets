<?php
session_start();
require('include/connections.php');
require('include/functions.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['ADMIN_LOGIN'])){
    $id=$_SESSION['id'];
    $username =$_SESSION['username'];
    
    $sql = "SELECT DISTINCT user.username, pet.namee,pet.breed FROM pet  join user where (pet.user_id = user.id )";
    $result = mysqli_query($conn, $sql);


    $sql2 = "SELECT doctor.username, appointment.price from doctor join appointment where doctor.id =appointment.doctor_id order by price asc"; 
    $result2 = mysqli_query($conn, $sql2);

    
    $sql3 = "SELECT doctor.username,appointment.status ,sum(appointment.price) as summ from doctor join appointment where doctor.id =appointment.doctor_id and appointment.status = 1 GROUP BY doctor.username, appointment.status"; 
    $result3 = mysqli_query($conn, $sql3);
    
    
    $sql4 = "SELECT doctor.username,appointment.status ,sum(appointment.price) as    summ from doctor join appointment where doctor.id =appointment.doctor_id and appointment.status = 1 GROUP BY doctor.username, appointment.status"; 
    $result4 = mysqli_query($conn, $sql4);
    
    
}


?>
<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo time();?>">
<link rel="stylesheet" href="css/bookAnAppointment.css?v=<?php echo time();?>">


<link rel="stylesheet" href="assets/css/normalize.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
<link rel="stylesheet" href="assets/css/flag-icon.min.css">
<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" href="css/logo.png" type="image/x-icon">
<aside id="left-panel" class="left-panel">
    <nav id="nav" class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">MENU</li>

                <li class="menu-item-has-children dropdown">
                    <a href="adminbody.php"> HOME </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="admin_management.php"> ADMIN MANAGEMENT </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="doctor_management.php"> DOCTOR MANAGEMENT </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="user_management.php"> USER MANAGEMENT </a>
                </li>

            </ul>
        </div>
    </nav>
</aside>



<div class="container " style="margin-left:300px; margin-top:100px;">
    <h1 class="m-4">Classic Report</h1>
    <table class="table table-hover table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th style="width: 25%;" scope="col">Users Name</th>
                <th style="width: 25%;" scope="col">Pet name</th>
                <th style="width: 50%;" scope="col">Pet Breed</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                    $i=1;
                    while($row=mysqli_fetch_array($result)){?>
            <tr>
                <td> <?php echo $row['username']?></th>
                <td><?php echo $row['namee']?></td>
                <td><?php echo $row['breed']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>







<div class="container " style="margin-left:300px; margin-top:100px;">
    <h1 class="m-4">Ranking Report</h1>
    <table class="table table-hover table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th style="width: 50%;" scope="col">Drs Name</th>
                <th style="width: 50%;" scope="col">Price</th>


            </tr>
        </thead>
        <tbody>
            <?php 
                    $i=1;
                    while($row2=mysqli_fetch_array($result2)){?>
            <tr>
                <td> <?php echo $row2['username']?></th>
                <td><?php echo $row2['price']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>



<div class="container " style="margin-left:300px; margin-top:100px;">
    <h1 class="m-4">Pivot Report</h1>
    <table class="table table-hover table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th style="width: 50%;" scope="col">Drs Name</th>
                <th style="width: 50%;" scope="col">Sum of Price</th>


            </tr>
        </thead>
        <tbody>
            <?php 
                    $i=1;
                    while($row3=mysqli_fetch_array($result3)){?>
            <tr>
                <td> <?php echo $row3['username']?></th>
                <td><?php echo $row3['summ']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<div class="container " style="margin-left:300px; margin-top:100px;">
    <h1 class="m-4">InterActive Report</h1>
    <table class="table table-hover table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th style="width: 50%;" scope="col">Drs Name</th>
                <th style="width: 50%;" scope="col">Sum of Price</th>


            </tr>
        </thead>
        <tbody>
            <?php 
                    $i=1;
                    while($row3=mysqli_fetch_array($result3)){?>
            <tr>
                <td> <?php echo $row3['username']?></th>
                <td><?php echo $row3['summ']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>




<div id="right-panel" class="right-panel">
    <header id="header" class="header">

        <div class="top-left">
            <div class="navbar navbar-header">
                <a class="navbar navbar-brand" href="admin.php">4pets</a>
                <a id="menuToggle" onclick="closeNav()" class="menutoggle">&#9776;</a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="user-area dropdown show float-right">
                    <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">WELCOME <?php echo $username;?>
                    </a>
                    <div class="user-menu dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="nav-link" href="adminprofile.php">Profile</a>
                        <a class="nav-link" href="reports.php">Reports</a>
                        <a class="nav-link" href="logout.php">Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </header>
</div>
