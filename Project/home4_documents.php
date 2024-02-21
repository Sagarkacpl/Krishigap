<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
if ($_SESSION['UID'] == '') {
    if ($_GET['page'] != '') {
        header("Location: login.php?page=$_GET[page]");
    } else {
        header("Location: login.php");
    }
}
include "connection.php";
$scheme = $_POST['scheme'];
$querydoc = mysqli_query($db, "SELECT DISTINCT Documents from mainpage_others WHERE Scheme='$scheme' AND DeletedStatus='0' ORDER BY Documents");
echo " <option></option>";
while ($rowdoc = mysqli_fetch_array($querydoc)) {
?>
<option <?php if ($_GET['document'] == $rowdoc['Documents']) {
        echo "selected";
    } ?> value="<?php echo $rowdoc['Documents']; ?>"><?php echo $rowdoc['Documents']; ?></option>
<?php } ?>