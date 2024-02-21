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
$plant_protection_products_tab_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `plant_protection_products_tabs` SET DeletedStatus='1' where plant_protection_products_tab_id ='$plant_protection_products_tab_id'");

$query3 = mysqli_query($db, "UPDATE `plant_protection_products_tabs` SET DeletedStatus='1' where plant_protection_products_tab_id ='$plant_protection_products_tab_id'");
   $query4 = mysqli_query($db, "SELECT * FROM `plant_protection_products_documents` WHERE plant_protection_products_tab_id ='$plant_protection_products_tab_id'");
   while ($row4 = mysqli_fetch_array($query4)) {
   $plant_protection_products_documents_id = $row4['plant_protection_products_documents_id'];
   $query5 = mysqli_query($db, "UPDATE `plant_protection_products_documents` SET DeletedStatus='1' where plant_protection_products_documents_id ='$plant_protection_products_documents_id'");
}
   $query6 = mysqli_query($db, "SELECT * FROM `plant_protection_products_youtube` WHERE plant_protection_products_tab_id ='$plant_protection_products_tab_id'");
   while ($row6 = mysqli_fetch_array($query6)) {
   $plant_protection_products_youtube_id = $row6['plant_protection_products_youtube_id'];
   $query7 = mysqli_query($db, "UPDATE `plant_protection_products_youtube` SET DeletedStatus='1' where plant_protection_products_youtube_id ='$plant_protection_products_youtube_id'");
}
if ($query) {
    header("Location:plant-protection-documents-tabs.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:Package-of-practices-videos.php?id=$_GET[id1]&msg=faild");
} ?>