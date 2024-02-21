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
$plant_protection_products_youtube_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `plant_protection_products_youtube` SET DeletedStatus='1' where plant_protection_products_youtube_id ='$plant_protection_products_youtube_id'");
if ($query) {
    header("Location:plant-protection-videos.php?id=$_GET[id1]&id1=$_GET[id2]&msg=successd");
} else {
    header("Location:plant-protection-videos.php?id=$_GET[id1]&id1=$_GET[id2]&msg=faild");
} ?>