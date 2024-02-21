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
$query = mysqli_query($db, "UPDATE `demo_farm` SET DeletedStatus='1' where DemoFarmId ='$DemoFarmId'");
$query2 = mysqli_query($db, "UPDATE `demo_farm_documents` SET DeletedStatus='1' where DemoFarmId ='$DemoFarmId'");
if ($query) {
    header("Location:demo-farm-edit.php?msg=successd");
} else {
    header("Location:demo-farm-edit.php?msg=faild");
} ?>