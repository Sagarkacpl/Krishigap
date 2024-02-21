<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }?>
<h5>IMPORTANT POINTS TO BE NOTED</h5>
<p><b></b></p>