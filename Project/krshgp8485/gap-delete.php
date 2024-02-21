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
$gap_standard_wise_price_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `gap_standard_wise_price` SET DeletedStatus='1' where gap_standard_wise_price_id ='$gap_standard_wise_price_id'");
if ($query) {
    header("Location:gap-edit.php?msg=successd");
} else {
    header("Location:gap-edit.php?msg=faild");
} ?>