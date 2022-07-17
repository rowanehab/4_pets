<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '') {

    
    $idAdmin = $_SESSION['id'];
    $idApp = $_GET['id'];

    $sql = "UPDATE `appointment` SET `status`=0,`admin_id`=null WHERE appointment.id='$idApp'";
    mysqli_query($conn, $sql);

    header('location:adminprofile.php');

}
?>
