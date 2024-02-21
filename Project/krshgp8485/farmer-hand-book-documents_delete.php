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
$farmer_hand_book_documents_id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `farmer_hand_book_documents` SET DeletedStatus='1' where farmer_hand_book_documents_id ='$farmer_hand_book_documents_id'");
if ($query) {
    header("Location:farmer-hand-book-documents.php?id=$_GET[id1]&msg=successd");
} else {
    header("Location:farmer-hand-book-documents.php?id=$_GET[id1]&msg=faild");
} ?>