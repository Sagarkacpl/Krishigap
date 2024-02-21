<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
unset($_SESSION['UID']);
unset($_SESSION['PlanDetails']);
unset($_SESSION['PlanStartDate']);
unset($_SESSION['PlanEndDate']);
unset($_SESSION['EmailId']);
header("Location: https://www.krishigap.com");
?> 
