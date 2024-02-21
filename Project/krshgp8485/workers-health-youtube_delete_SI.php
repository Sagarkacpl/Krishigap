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
$workers_health_safety_welfare_youtube_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `workers_health_safety_welfare_youtube_si` SET DeletedStatus='1' where workers_health_safety_welfare_youtube_id ='$workers_health_safety_welfare_youtube_id'");
if ($query) {
    header("Location:workers-health-youtube_SI.php?id=$_GET[id1]&id1=$_GET[id2]&msg=successd");
} else {
    header("Location:workers-health-youtube_SI.php?id=$_GET[id1]&id1=$_GET[id2]&msg=faild");
} ?>