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
$id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `most_visited_page` SET DeletedStatus='1' where Id ='$id'");
if ($query) {
    echo "<script>alert('Successfully delete')</script>";
    echo "<script>window.location.href ='most_visited_page.php'</script>";
} else {
    echo "<script>alert('Try after some time')</script>";
    echo "<script>window.location.href ='most_visited_page.php'</script>";
} ?>