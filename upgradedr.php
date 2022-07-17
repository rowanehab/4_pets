<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "UPDATE doctor set doctor.role = 2 where doctor.id = '$id'";
    $result = mysqli_query($conn, $sql);
    header('location:doctor_management.php');
}
?>
