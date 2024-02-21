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
$OthersId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `others_php` SET DeletedStatus='1' where OthersId ='$OthersId'");
$query1 = mysqli_query($db, "UPDATE `others_documents_php` SET DeletedStatus='1' where OthersId ='$OthersId'");
$query2 = mysqli_query($db, "UPDATE `others_videos_php` SET DeletedStatus='1' where OthersId ='$OthersId'");
$query3 = mysqli_query($db, "UPDATE `others_youtube_php` SET DeletedStatus='1' where OthersId ='$OthersId'");
if ($query) {
    header("Location:other-edit_PHP.php?msg=successd");
} else {
    header("Location:other-edit_PHP.php?msg=faild");
} ?>