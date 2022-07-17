<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '') {

    $idDr = $_SESSION['id'];
    $idApp = $_GET['id'];

    $sql = "DELETE FROM `appointment` WHERE appointment.id='$idApp'";
    mysqli_query($conn, $sql);

    header('location:doctorprofile.php');

}
?>
