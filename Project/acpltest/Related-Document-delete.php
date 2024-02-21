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
$RelatedDocumentId = $_GET['id'];
$query = mysqli_query($db, "UPDATE `related_documents` SET DeletedStatus='1' where RelatedDocumentId  ='$RelatedDocumentId'");
$query1 = mysqli_query($db, "UPDATE `related_document_files` SET DeletedStatus='1' where RelatedDocumentId  ='$RelatedDocumentId'");
if ($query) {
    header("Location:Related-Documents-list.php?msg=successd");
} else {
    header("Location:Related-Documents-list.php?msg=faild");
} ?>