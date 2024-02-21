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
$plant_nutritional_management_tab_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `plant_nutritional_management_tabs` SET DeletedStatus='1' where plant_nutritional_management_tab_id ='$plant_nutritional_management_tab_id'");

$query33 = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_documents` WHERE plant_nutritional_management_tab_id ='$plant_nutritional_management_tab_id'");
   while ($row33 = mysqli_fetch_array($query33)) {
   $plant_nutritional_management_documents_id = $row33['plant_nutritional_management_documents_id'];

  $query44 = mysqli_query($db, "UPDATE `plant_nutritional_management_documents` SET DeletedStatus='1' where plant_nutritional_management_documents_id ='$plant_nutritional_management_documents_id'");
}

$query333 = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_youtube` WHERE plant_nutritional_management_tab_id ='$plant_nutritional_management_tab_id'");
   while ($row333 = mysqli_fetch_array($query333)) {
   $plant_nutritional_management_youtube_id = $row333['plant_nutritional_management_youtube_id'];

  $query444 = mysqli_query($db, "UPDATE `plant_nutritional_management_youtube` SET DeletedStatus='1' where plant_nutritional_management_youtube_id ='$plant_nutritional_management_youtube_id'");
}

if ($query) {
    header("Location:plant-nutritional-management-documents-tabs.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:plant-nutritional-management-documents-tabs.php?id=$_GET[id1]&msg=faild");
} ?>