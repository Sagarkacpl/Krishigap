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
//  include "most_visited_page.php";
if(isset($_POST["country_id"])){
  $country_id= $_POST['country_id'];
  $query = mysqli_query( $db, "SELECT * from state_list where CountryID='$country_id' ORDER BY StateName");   
    $count = mysqli_num_rows($query);
    if($count > 0){
        echo '<option value="00">Select ALL</option>';
        while($row = mysqli_fetch_array($query)){
    $state_id=$row['StateID'];
    $state_name=$row['StateName'];?>
       <option value="<?php echo $state_id; ?>"><?php echo ucwords(strtolower($state_name));?></option>
       <?php }
    }else{
        echo '<option value="0">State not available</option>';
    }
}
?>