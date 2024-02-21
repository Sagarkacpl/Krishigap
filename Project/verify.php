<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
require ('config.php');
session_start();
require ('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;
$error = "Payment Failed";
if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);
    try {
        $attributes = array('razorpay_order_id' => $_SESSION['razorpay_order_id'], 'razorpay_payment_id' => $_POST['razorpay_payment_id'], 'razorpay_signature' => $_POST['razorpay_signature']);
        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
if ($success === true) {
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    header("Location:place_order_razor.php?payment_id={$_POST['razorpay_payment_id']}");
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
    header("Location:pay.php?msgroz=fail");
}
echo $html;
?>