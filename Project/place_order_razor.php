<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
if (!isset($_SESSION["Amountt"]) || $_SESSION["Amountt"] == '') {
    header("Location:price-page.php");
}

if ($_SESSION['UID'] != '') {
        $UserID = $_SESSION['UID'];
    }else{
        if (isset($_SESSION["UserID"]) AND $_SESSION["UserID"] != '') {
    header("Location:pay.php");
}
$UserID = $_SESSION["UserID"];
    }
    




include "connection.php";
$PlanType = $_SESSION['PlanType'];
$PlanDetails = $_SESSION['PlanDetails1'];
$PlanAmount = $_SESSION['Amountt'];
$PlanStartDate = date("Y-m-d");
if ($PlanType == 'Quaterly') {
    $PlanEndDate = date('Y-m-d', strtotime('+3 month'));
}
if ($PlanType == 'Half Yearly') {
    $PlanEndDate = date('Y-m-d', strtotime('+6 month'));
}
if ($PlanType == 'Yearly') {
    $PlanEndDate = date('Y-m-d', strtotime('+12 month'));
}
$PaymentID = $_GET['payment_id'];
$query = mysqli_query($db, "UPDATE `users` SET `PlanType`='$PlanType',`PlanAmount`='$PlanAmount',`PlanDetails`='$PlanDetails',`PlanStartDate`='$PlanStartDate',`PlanEndDate`='$PlanEndDate',`PaymentID`='$PaymentID' WHERE DeletedStatus = '0' AND `UserID`='$UserID'");
$query1 = mysqli_query($db, "INSERT INTO `payment_transactions` (`payment_transaction_id`, `UserID`, `PaymentID`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$UserID', '$PaymentID', '0', current_timestamp());");
if($query && $query1){

if ($_SESSION['UID'] != '') {
session_start();
$_SESSION["UID"] = $UserID;
$_SESSION["PlanDetails"] = $PlanDetails;
$_SESSION["PlanStartDate"] = $PlanStartDate;
$_SESSION["PlanEndDate"] = $PlanEndDate;

unset($_SESSION['Amountt']);
unset($_SESSION['PlanType']);
unset($_SESSION['FormType']); 
}else{
unset($_SESSION['Amountt']);
unset($_SESSION['UserID']);
unset($_SESSION['PlanType']);
unset($_SESSION['PlanDetails1']);
unset($_SESSION['FormType']);  
}


header("Location:order_success.php?pid=$PaymentID&msg=success");


}else{
    header("Location:pay.php?msgroz=fail");
}
?>