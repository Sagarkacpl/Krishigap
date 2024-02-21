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
$Id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `mainpage_others` SET DeletedStatus='1' where Id ='$Id'");
if ($query) {
    header("Location:main_others.php?msg=successd");
} else {
    header("Location:main_others.php?msg=faild");
} ?>