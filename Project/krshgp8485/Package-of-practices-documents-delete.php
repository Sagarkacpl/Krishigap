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
$package_of_practices_documentsId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `package_of_practices_documents` SET DeletedStatus='1' where package_of_practices_documentsId ='$package_of_practices_documentsId'");

$query3 = mysqli_query($db, "SELECT * FROM `package_of_practices_documents_videos` WHERE package_of_practices_documentsId ='$package_of_practices_documentsId'");
   while ($row3 = mysqli_fetch_array($query3)) {
   $package_of_practices_documents_video_id = $row3['package_of_practices_documents_video_id'];

  $query4 = mysqli_query($db, "UPDATE `package_of_practices_documents_videos` SET DeletedStatus='1' where package_of_practices_documents_video_id ='$package_of_practices_documents_video_id'");
}
if ($query) {
    header("Location:Package-of-practices-documents.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:Package-of-practices-documents.php?id=$_GET[id1]&msg=faild");
} ?>