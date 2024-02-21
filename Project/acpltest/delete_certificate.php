<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
if ($_SESSION['Admin_GAP793_Id'] == '') {
    header("Location: index.php");
}
include "connection.php";
error_reporting(0);
$DemoFarmId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `certificates` SET DeletedStatus='1' where Id ='$DemoFarmId'");
if ($query) {
    echo "<script>alert('Successfully Deleted')</script>";
    echo "<script>window.location.href='certificate.php'</script>";
} else {
    echo "<script>alert('Can not Deleted, Please try again')</script>";
} 
?>