<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['ADMIN_LOGIN']) && isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "UPDATE user set user.role = 2 where user.id = '$id'";
    $result = mysqli_query($conn, $sql);
    header('location:user_management.php');
}
?>
