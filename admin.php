<?php
session_start();
require('include/connections.php');
require('include/functions.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['ADMIN_LOGIN'])){
    $id=$_SESSION['id'];
    $username=$_SESSION['username'];
    $mobile=$_SESSION['mobile'];
    $email=$_SESSION['email'];


?>

<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
    
    google.charts.load("current", {
        packages: ["corechart"]
    });

    
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn("string", "Topping");
        data.addColumn("number", "Type");
        data.addRows([
            ["Pharaoh Hound", 20],
            ["Basenji", 48],
            ["Saluki", 15],
            ["Ibizan Hound", 25],
            ["Armant Herding", 46],
        ]);

        // Set chart options
        var options = {
            title: "Percentage of Dog Types",
            width: 600,
            height: 300,
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(
            document.getElementById("chart_div")
        );
        chart.draw(data, options);
    }
    </script>


    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["bar"]
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ["Quarter", "Percentage"],
            ["Quarter 1", 38],
            ["Quarter 2", 56],
            ["Quarter 3", 64],
            ["Quarter 4", 90],
        ]);

        var options = {
            width: 800,
            legend: {
                position: "none"
            },
            chart: {
                title: "The rate of increase in the last year"
            },
            axes: {
                x: {
                    0: {
                        side: "top",
                        label: "Quarters of the last year"
                    }, // Top x-axis.
                },
            },
            bar: {
                groupWidth: "90%"
            },
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div"));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>



    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Type", "Avg Of visit"],
            ["Cats", 38],
            ["Dogs", 32],
            ["Turtles", 15],
            ["Birds", 15]
        ]);

        var options = {
            title: "Animals",
            is3D: true,
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart_3d")
        );
        chart.draw(data, options);
    }
    </script>




    <style>
    .container {
        margin-left: 300px;
    }

    </style>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebar.js"></script>

</head>

<body>
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
                            <?php 
                            if(isset($_SESSION['USER_AS_ADMIN_LOGIN']) && isset($_SESSION['ADMIN_LOGIN'])){
                                //echo("profile as user as admin ");
                                echo '<a class="nav-link" href="userprofileasadmin.php">Profile</a>';
                            } else {
                                //echo("profile as normal admin ");
                                echo '<a class="nav-link" href="adminprofile.php">Profile</a>';
                            }
                            ?>

                            <a class="nav-link" href="reports.php">Reports</a>
                            <a class="nav-link" href="logout.php">Logout</a>
                        </div>

                    </div>
                </div>
            </div>
        </header>
    </div>

</body>

</html>
<?php
}else{
   header('location:login.php');
   exit();
}
?>
