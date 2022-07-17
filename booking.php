<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '' && (isset($_SESSION['ADMIN_LOGIN']) || isset($_SESSION['USER_LOGIN']))){

    $idUser = $_SESSION['id'];
    $idApp = $_GET['id'];

    $sql = "UPDATE `appointment` SET `status`=1,`user_id`='$idUser' WHERE appointment.id='$idApp'";
    mysqli_query($conn, $sql);

    if(isset($_SESSION['ADMIN_LOGIN']) && isset($_SESSION['USER_AS_ADMIN_LOGIN'])){
        header('location:userprofileasadmin.php');
    } else if(isset($_SESSION['USER_LOGIN'])) {
        header('location:userprofile.php');
    } else if (isset($_SESSION['ADMIN_LOGIN'])){
        header('location:adminprofile.php');
    }
    
}else {
    header("location:login.php");
}
?>