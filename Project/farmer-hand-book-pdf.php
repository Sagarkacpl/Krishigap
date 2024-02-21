<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }
include "connection.php";
if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
       header("Location: login.php");
   }
//  include "most_visited_page.php";
$farmer_hand_book_documents_id = $_GET['doc'];
$query = mysqli_query($db,"SELECT documents_name_folder from farmer_hand_book_documents where DeletedStatus='0' and farmer_hand_book_documents_id='$farmer_hand_book_documents_id' ");
$row = mysqli_fetch_array($query);
$f20 = substr($row['documents_name_folder'], 0, 20);
$file = glob("Farmer-Hand-Book/$f20*");
$file = array_values($file);
?>
<!DOCTYPE HTML>
<html>
<head>
<script type="text/jscript">
  function disableContextMenu()
  {
    window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};
  }  
</script>
</head>
<body bgcolor="#FFFFFF" onload="disableContextMenu();" oncontextmenu="return false">
<iframe id="fraDisabled" src="<?php echo $file[0]; ?>#toolbar=0" width="100%" height="600px"></iframe>
<div style="width:98%;height:100%;background-color:transparent;position:absolute;top:0px;left:0px;right:0px;"></div>
</body>
</html>  