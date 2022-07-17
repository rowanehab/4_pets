<?php
session_start();
include( 'include/connections.php' );
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user_id=null;
    //$id=$_POST['id'];
    $username = htmlentities( mysqli_real_escape_string( $conn, $_POST[ 'username' ] ) );
    $password = htmlentities( mysqli_real_escape_string( $conn, $_POST[ 'password' ] ) );

    $sql = "SELECT username,id,firstname,lastname,email,phone,role,status FROM `user` WHERE username='$username' AND password='$password'";
    $result = mysqli_query( $conn, $sql );
    $row = mysqli_fetch_array( $result );

    $sqldr = "SELECT username,id,email,password,mobile,role,status,image FROM `doctor` WHERE username='$username' AND password='$password'";
    $resultdr = mysqli_query( $conn, $sqldr );
    $rowdr = mysqli_fetch_array( $resultdr );

    $sqladmin = "SELECT username,id,email,password,mobile,role,status FROM `admin_users` WHERE username='$username' AND password='$password'";
    $resultadmin = mysqli_query( $conn, $sqladmin );
    $rowadmin = mysqli_fetch_array( $resultadmin );

    $sqll="SELECT namee,typee,info,breed FROM pet JOIN user where user.id='$user_id'";
    $resultt= mysqli_query( $conn, $sqll );
    $roww = mysqli_fetch_array( $resultt );

    
    if($row && $row['role'] == 0  && $row['status'] == 1){
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['id'] = $row['id'];
        $_SESSION['username' ] = $row['username'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['email']=$row['email'];
        $_SESSION['namee']=$roww['namee'];
        $_SESSION['typee']=$roww['typee'];
        $_SESSION['info']=$roww['info'];
        $_SESSION['breed']=$roww['breed'];
        header("location:userprofile.php");
    }elseif ($row && $row['role'] == 0 && $row['status'] == 0) {
        $user_error = '<div class="alert alert-danger text-center">You are suspended by Admin.</div>';
        include( 'login.php' );

    }elseif($rowdr && $rowdr['role'] == 1 && $rowdr['status'] == 1){
        $_SESSION['DR_LOGIN']='yes';
        $_SESSION['username' ] = $rowdr['username'];
        $_SESSION['id' ] = $rowdr['id'];
        $_SESSION['mobile']=$rowdr['mobile'];
        $_SESSION['email']=$rowdr['email'];
        $_SESSION['image'] = $rowdr['image'];
        header("location:doctorprofile.php");

    }elseif ($rowdr && $rowdr['role'] == 1 &&  $rowdr['status'] == 0) {
        $user_error = '<div class="alert alert-danger text-center">You are suspended by Admin.</div>';
        include( 'login.php' );

    }elseif($rowadmin && $rowadmin['role'] == 2 && $rowadmin['status'] == 1){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['id' ] = $rowadmin['id'];
        $_SESSION['username' ] = $rowadmin['username'];
        $_SESSION['mobile']=$rowadmin['mobile'];
        $_SESSION['email']=$rowadmin['email'];
        header("location:admin.php");

    } elseif ($rowadmin && $rowadmin['role'] == 2 && $rowadmin['status'] == 0) {
        $user_error = '<div class="alert alert-danger text-center">You are suspended by Admin.</div>';
        include( 'login.php' );

    } else if($row && $row['role'] == 2 && $row['status'] == 1){
        $_SESSION['USER_AS_ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['id'] = $row['id'];
        $_SESSION['username' ] = $row['username'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['email']=$row['email'];
        header("location:admin.php");
        
    }else{
        $user_error = '<div class="alert alert-danger text-center">wrong Username or password.</div>';
        include( 'login.php' );
    }
}
?>
