<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
include "most_visited_page.php";
if (isset($_POST['Q'])) {
    $qn = $_POST['Q'];
    $Amountt = 0;
    foreach ($qn as $Qname) {
        $query = mysqli_query($db, "SELECT Amount from gap_standard_wise_price where DeletedStatus='0' AND GAPStandardWise ='$Qname' AND Plan ='Quaterly'");
        $row = mysqli_fetch_assoc($query);
        $Amount = $row['Amount'];
        $Amountt = $Amountt + $Amount;
    }
}
if ($Amountt != '' AND $Amountt > 0) { ?>
<i class="fa fa-inr" aria-hidden="true"></i><?php echo $Amountt; ?><span class="text-small font-weight-normal ml-2">/ quaterly</span>
<?php
} ?>
 