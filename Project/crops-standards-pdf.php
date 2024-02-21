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
// include "most_visited_page.php";
$plant_nutritional_management_documents_id = $_GET['doc'];
$query = mysqli_query($db,"SELECT documents_name from plant_nutritional_management_documents where DeletedStatus='0' and plant_nutritional_management_documents_id='$plant_nutritional_management_documents_id' ");
$row = mysqli_fetch_array($query);
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
<iframe id="fraDisabled" src="Plant-Nutritional-Management/<?php echo $row['documents_name']; ?>#toolbar=0" width="100%" height="800px"></iframe>
<div style="width:98%;height:100%;background-color:transparent;position:absolute;top:0px;left:0px;right:0px;"></div>
</body>
</html>  