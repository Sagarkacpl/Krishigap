<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
include "connection.php";
if (isset($_POST["NameofOrganization"]) && isset($_POST["Address"]) && isset($_POST["ContactPersonName"]) && isset($_POST["MobileNumber"]) && isset($_POST["EmailId"]) && isset($_POST["Website"]) && isset($_POST["BusinessActivity"]) && isset($_POST["Standers"]) && isset($_POST["Crop"]) && isset($_POST["Password"])) {
    $NameofOrganization = mysqli_real_escape_string($db, $_POST["NameofOrganization"]);
    $Address = mysqli_real_escape_string($db, $_POST["Address"]);
    $ContactPersonName = mysqli_real_escape_string($db, $_POST["ContactPersonName"]);
    $MobileNumber = mysqli_real_escape_string($db, $_POST["MobileNumber"]);
    $EmailId = mysqli_real_escape_string($db, $_POST["EmailId"]);
    $Website = mysqli_real_escape_string($db, $_POST["Website"]);
    $BusinessActivity = mysqli_real_escape_string($db, $_POST["BusinessActivity"]);
    $Standers = mysqli_real_escape_string($db, $_POST["Standers"]);
    $Crop = mysqli_real_escape_string($db, $_POST["Crop"]);
    $Password = md5($_POST["Password"]);
    $query2 = mysqli_query($db, "SELECT * from users where EmailId  = '$EmailId' AND DeletedStatus  = '0'");
    $row2 = mysqli_num_rows($query2);
    if ($row2 == 0) {
        
        if($_SESSION['FormType'] == 'free'){
        $PlanType = 'Trial';
        $PlanDetails = $_SESSION['PlanDetails1'];
        $PlanAmount = '0';
        $PlanStartDate = date("Y-m-d");
        
        $PlanEndDate = date('Y-m-d', strtotime('+5 days'));
            
        $query3 = mysqli_query($db, "INSERT INTO `users` (`UserID`, `NameofOrganization`, `Address`, `ContactPersonName`, `MobileNumber`, `EmailId`, `Website`, `BusinessActivity`, `Standers`, `Crop`, `Password`, `PlanType`, `PlanAmount`, `PlanDetails`, `PlanStartDate`, `PlanEndDate`, `PaymentID`, `Trial_Status`, `otp`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$NameofOrganization', '$Address', '$ContactPersonName', '$MobileNumber', '$EmailId', '$Website', '$BusinessActivity', '$Standers', '$Crop', '$Password', '', '0', '', NULL, NULL, '', '0', '', '0', CURRENT_TIMESTAMP);");
        $UserID = $db->insert_id;
        $query = mysqli_query($db, "UPDATE `users` SET `PlanType`='$PlanType',`PlanAmount`='$PlanAmount',`PlanDetails`='$PlanDetails',`PlanStartDate`='$PlanStartDate',`PlanEndDate`='$PlanEndDate',`PaymentID`='',`Trial_Status`='1' WHERE DeletedStatus = '0' AND `UserID`='$UserID'");
        if ($query3 AND $query) {
            unset($_SESSION['Amountt']);
            unset($_SESSION['UserID']);
            unset($_SESSION['PlanType']);
            unset($_SESSION['PlanDetails1']);
            unset($_SESSION['FormType']);
            header("Location:order_success.php?msg=success");
        } else {
            header("Location:subscription-person-information.php?msg=fail");
        }
          
        }
        if($_SESSION['FormType'] == 'paid'){
        $PlanType = 'paid';
        $PlanDetails = $_SESSION['PlanDetails'];
        $PlanAmount = $_SESSION['Amountt'];
        $PlanStartDate = date("Y-m-d");
        $PlanEndDate = date('Y-m-d', strtotime('+1 year'));
        
        $query3 = mysqli_query($db, "INSERT INTO `users` (`UserID`, `NameofOrganization`, `Address`, `ContactPersonName`, `MobileNumber`, `EmailId`, `Website`, `BusinessActivity`, `Standers`, `Crop`, `Password`, `PlanType`, `PlanAmount`, `PlanDetails`, `PlanStartDate`, `PlanEndDate`, `PaymentID`, `Trial_Status`, `otp`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$NameofOrganization', '$Address', '$ContactPersonName', '$MobileNumber', '$EmailId', '$Website', '$BusinessActivity', '$Standers', '$Crop', '$Password', '', '0', '', NULL, NULL, '', '0', '', '1', CURRENT_TIMESTAMP);");
        $UserID = $db->insert_id;
        $query = mysqli_query($db, "UPDATE `users` SET `PlanType`='$PlanType',`PlanAmount`='$PlanAmount',`PlanDetails`='$PlanDetails',`PlanStartDate`='$PlanStartDate',`PlanEndDate`='$PlanEndDate',`PaymentID`='',`Trial_Status`='0' WHERE DeletedStatus = '1' AND `UserID`='$UserID'");
        if ($query3) {
            $_SESSION["UserID"] = $UserID;
            //header("Location:pay.php");
        } else {
            header("Location:subscription-person-information.php?msg=fail");
        }
           
        }
    } else {
        header("Location:subscription-person-information.php?msg=failext");
    }
}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:c94853ae271de3f6b7bc5f573727b3dc",
                  "X-Auth-Token:597259c95825dcde90ec5cddedbbd553"));
$payload = Array(
    'purpose' => $_POST["NameofOrganization"],
    'amount' => $_SESSION["Amountt"],
    'phone' => $_POST["MobileNumber"],
    'buyer_name' => $_POST["ContactPersonName"],
    'redirect_url' => 'https://www.krishigap.com/redirect.php',
    'send_email' => true,
    //'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => $_POST["EmailId"],
    'allow_repeated_payments' => false
);


curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response = json_decode($response);
// echo "<pre>";
// print_r($response);
$_SESSION[$response->payment_request->id];

header('location:' .$response->payment_request->longurl);
die();

?>