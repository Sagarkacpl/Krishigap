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
$FoodSafetyStandardsId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `food_safety_standards_documents_php` SET DeletedStatus='1' where FoodSafetyStandardsId  ='$FoodSafetyStandardsId'");
$query1 = mysqli_query($db, "UPDATE `food_safety_standards_documents` SET DeletedStatus='1' where FoodSafetyStandardsId  ='$FoodSafetyStandardsId'");
$query2 = mysqli_query($db, "UPDATE `rel_food_safety_standards` SET DeletedStatus='1' where FoodSafetyStandardsId  ='$FoodSafetyStandardsId'");
if ($query) {
    header("Location:Food-Safety-Standards-add-edit_PHP.php?msg=successd");
} else {
    header("Location:Food-Safety-Standards-add-edit_PHP.php?msg=faild");
} ?>