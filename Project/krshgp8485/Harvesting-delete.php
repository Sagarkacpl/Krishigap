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
$HarvestingId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `harvesting` SET DeletedStatus='1' where HarvestingId  ='$HarvestingId'");
$query1 = mysqli_query($db, "UPDATE `harvesting_documents` SET DeletedStatus='1' where HarvestingId  ='$HarvestingId'");
if ($query) {
    header("Location:Harvesting-add-edit.php?msg=successd");
} else {
    header("Location:Harvesting-add-edit.php?msg=faild");
} ?>