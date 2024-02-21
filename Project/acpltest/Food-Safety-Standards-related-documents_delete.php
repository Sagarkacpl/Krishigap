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
$rel_food_safety_standards_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `rel_food_safety_standards` SET DeletedStatus='1' where rel_food_safety_standards_id ='$rel_food_safety_standards_id'");
if ($query) {
    header("Location:Food-Safety-Standards-related-documents.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:Food-Safety-Standards-related-documents.php?id=$_GET[id1]&msg=faild");
} ?>