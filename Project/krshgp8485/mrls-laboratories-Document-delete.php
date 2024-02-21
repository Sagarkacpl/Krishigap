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
$mrls_laboratories_documentId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `mrls_laboratories_documents` SET DeletedStatus='1' where mrls_laboratories_documentId  ='$mrls_laboratories_documentId'");
$query1 = mysqli_query($db, "UPDATE `mrls_laboratories_document_files` SET DeletedStatus='1' where mrls_laboratories_documentId  ='$mrls_laboratories_documentId'");
if ($query) {
    header("Location:mrls-laboratories-Documents-list.php?msg=successd");
} else {
    header("Location:mrls-laboratories-Documents-list.php?msg=faild");
} ?>