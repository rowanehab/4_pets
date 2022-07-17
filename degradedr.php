<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '' && isset($_SESSION['DR_LOGIN'])) {
    $id = $_GET['id'];
    $sql = "UPDATE doctor set doctor.role = 1 where doctor.id = '$id'";
    $result = mysqli_query($conn, $sql);
    header('location:doctor_management.php');

}else{
   header('location:login.php');
   exit();
}
?>
