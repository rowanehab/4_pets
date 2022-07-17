<?php
session_start();
include( 'include/connections.php' );
if (isset($_SESSION['id']) && isset($_GET['id']) && $_GET['id'] != '' && isset($_SESSION['ADMIN_LOGIN'])) {

    $idAdmin = $_SESSION['id'];
    $idApp = $_GET['id'];

    echo($idAdmin.$idApp);

    $sql = "UPDATE `appointment` SET `status`=1,`admin_id`='$idAdmin' WHERE appointment.id='$idApp'";
    mysqli_query($conn, $sql);

    header('location:adminprofile.php');

}else {
    header("location:login.php");
}
?>
