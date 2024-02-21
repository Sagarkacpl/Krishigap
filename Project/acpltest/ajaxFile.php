<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
include "connection.php";
if(isset($_POST["country_id"])){
  $country_id= $_POST['country_id'];
  $query = mysqli_query( $db, "SELECT * from state_list where CountryID='$country_id' ORDER BY StateName"); 
     $row_count2 = mysqli_num_rows($query);  
    $count = mysqli_num_rows($query);
    if($count > 0){
        echo '<option value="0">Select State</option>';
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