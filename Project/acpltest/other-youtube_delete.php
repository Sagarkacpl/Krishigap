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
$others_youtube_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `others_youtube` SET DeletedStatus='1' where others_youtube_id ='$others_youtube_id'");
if ($query) {
    header("Location:other-youtube.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:other-youtube.php?id=$_GET[id1]&msg=faild");
} ?>