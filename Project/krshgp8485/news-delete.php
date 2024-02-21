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
$NewsID = $_GET['id'];
$query = mysqli_query($db, "UPDATE `news` SET DeletedStatus='1' where NewsID ='$NewsID'");
if ($query) {
    header("Location:news-edit.php?msg=successd");
} else {
    header("Location:news-edit.php?msg=faild");
} ?>