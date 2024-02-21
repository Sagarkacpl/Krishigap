<?php
session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
$payment_id=$_REQUEST['payment_id'];
$payment_status=$_REQUEST['payment_status'];


if($payment_status=="Credit"){
   
   $query = mysqli_query($db, "UPDATE `users` SET `PaymentID`='$payment_id', DeletedStatus = '0' AND `UserID`='$_SESSION[UserID]'");
   
   if($query){
    unset($_SESSION['Amountt']);
    unset($_SESSION['UserID']);
    unset($_SESSION['PlanType']);
    unset($_SESSION['PlanDetails1']);
    unset($_SESSION['FormType']); 
       header("Location:order_success.php?pid=$payment_id&msg=success");
   }else{
        unset($_SESSION['Amountt']);
        unset($_SESSION['UserID']);
        unset($_SESSION['PlanType']);
        unset($_SESSION['PlanDetails1']);
        unset($_SESSION['FormType']); 
       header("Location:order_success.php");
   }
}else{
   header("Location:order_success.php");
}
?>