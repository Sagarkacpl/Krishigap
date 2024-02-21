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
$WorkersHealthSafetyWelfareId = $_GET['id'];
$id = $_GET['id1'];
$query = mysqli_query($db, "UPDATE `workers_health_safety_welfare_si` SET DeletedStatus='1' where WorkersHealthSafetyWelfareId ='$WorkersHealthSafetyWelfareId'");

$query33 = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare_documents_si` WHERE WorkersHealthSafetyWelfareId ='$WorkersHealthSafetyWelfareId'");
   while ($row33 = mysqli_fetch_array($query33)) {
   $workers_health_safety_welfare_documents_id = $row33['workers_health_safety_welfare_documents_id'];

  $query44 = mysqli_query($db, "UPDATE `workers_health_safety_welfare_documents_si` SET DeletedStatus='1' where workers_health_safety_welfare_documents_id ='$workers_health_safety_welfare_documents_id'");
}

$query333 = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare_images_si` WHERE WorkersHealthSafetyWelfareId ='$WorkersHealthSafetyWelfareId'");
   while ($row333 = mysqli_fetch_array($query333)) {
   $workers_health_safety_welfare_images_id = $row333['workers_health_safety_welfare_images_id'];

  $query444 = mysqli_query($db, "UPDATE `workers_health_safety_welfare_images_si` SET DeletedStatus='1' where workers_health_safety_welfare_images_id ='$workers_health_safety_welfare_images_id'");
}

$query3333 = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare_youtube_si` WHERE WorkersHealthSafetyWelfareId ='$WorkersHealthSafetyWelfareId'");
   while ($row3333 = mysqli_fetch_array($query3333)) {
   $workers_health_safety_welfare_youtube_id = $row3333['workers_health_safety_welfare_youtube_id'];

  $query4444 = mysqli_query($db, "UPDATE `workers_health_safety_welfare_youtube_si` SET DeletedStatus='1' where workers_health_safety_welfare_youtube_id ='$workers_health_safety_welfare_youtube_id'");
}

if ($query) {
    header("Location:workers-health-edit1_SI.php?id=$id&msg=successd");
} else {
    header("Location:workers-health-edit1_SI.php?id=$id&msg=faild");
} ?>