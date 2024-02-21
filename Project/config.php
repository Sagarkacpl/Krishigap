<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
$keyId = 'rzp_test_LhtuwxpszLiB2b';
$keySecret = 'ZdkbmFRRz4SX2QfofOyHjzoL';
$displayCurrency = 'INR';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
