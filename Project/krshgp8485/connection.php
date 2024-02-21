<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
$host = 'localhost';
$username = 'krishigap888_krishigap_user';
$password = 'JxtHHn.7y}i%';
$database = 'krishigap888_krishigap';
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'krishigap888_krishigap';
$db = mysqli_connect($host, $username, $password, $database);
if ($db->connect_error) {
   echo "Not connected, error: " . $mysqli_connection->connect_error;
}
?>
