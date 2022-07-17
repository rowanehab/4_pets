<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != ''&& isset($_SESSION['ADMIN_LOGIN'])) {

    $id = $_GET['id'];
    echo($id);
    $sql = "UPDATE user set user.role = 0 where user.id = '$id'";
    $result = mysqli_query($conn, $sql);
    header('location:user_management.php');

}else{
    header('location:login.php');
    exit();
 }
?>
