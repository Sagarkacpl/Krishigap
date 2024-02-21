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
   include "most_visited_page.php";
   if(isset($_POST["country_id"])){
     $country_id= $_POST['country_id'];
     $query = mysqli_query( $db, "SELECT DISTINCT StateID from package_of_practices where CountryID='$country_id' AND StateID != '' AND StateID != '0' AND DeletedStatus = '0' ORDER BY StateID ASC"); 
       $count = mysqli_num_rows($query);
       if($count > 0){
           echo '<option value="00">Select ALL</option>';
           while($row = mysqli_fetch_array($query)){
       $state_id=$row['StateID'];
       $query2 = mysqli_query( $db, "SELECT StateName from state_list where StateID ='$state_id'"); 
       $row2 = mysqli_fetch_assoc($query2);
       $StateName = $row2['StateName'];
       ?>
<!--<option value="<?php echo $state_id; ?>"><?php echo ucwords(strtolower($StateName));?></option>-->
<?php }
   }else{
       echo '<option value="0">State not available</option>';
   }
   }
?>