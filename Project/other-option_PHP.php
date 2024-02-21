<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
     header("Location: login.php?page=PHP_O"); 
   }
   include "connection.php";
   if (!in_array('Post Harvest Processing', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=PHP_O");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=PHP_O'</script>";
   }
   include "most_visited_page.php";
   $st = $_GET['st'];
   $type = $_GET['type'];
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Good Agricultural Practices</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <link href="img/favicon.ico" rel="icon">
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-1.4.2.js"></script>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Government Promoting Institutions (Post Harvest Processing)</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="home2.php">Post Harvest Processing</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Government Promoting Institutions</li>-->
      <!--               </ol>-->
      <!--               <a href='home2.php' class="btn btn-success btn-sm">Go Back</a>-->
      <!--            </nav>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
       <div class="container-fluid p-0 mb-5">
          <img class="img-fluid" src="img/post_harvest2.png" alt="" style="width:100%">
        </div>
      <!-- <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container-fluid">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12">
                  <div class="row g-3 m-tab">
                     <div class="col-md-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <?php
                              if($_GET['type'] != 'search'){
                                 $active1 ='active';
                                 $queryf = mysqli_query($db,"SELECT DISTINCT Title from others_php where DeletedStatus='0' ORDER BY Title");
                                 if($queryf){
                                    while($rowf = mysqli_fetch_array($queryf)){
                                       ?>
                           <li class="nav-item" role="presentation">
                              <a class="nav-link <?php echo $active1; ?>" href="other-option_PHP.php?nm=<?php echo $rowf['Title']; ?>&type=search" aria-selected="true"><?php echo $rowf['Title']; ?></a>
                           </li>
                           <?php $active1 ='';}}}else{  
                              $queryf = mysqli_query($db,"SELECT DISTINCT Title from others_php where DeletedStatus='0' ORDER BY Title");
                              if($queryf){
                                 while($rowf = mysqli_fetch_array($queryf)){
                                    ?>
                           <li class="nav-item" role="presentation">
                              <a class="nav-link <?php if($_GET['nm'] == $rowf['Title']){echo "active";} ?> <?php echo $active1; ?>" href="other-option_PHP.php?nm=<?php echo $rowf['Title']; ?>&type=search" aria-selected="true"><?php echo $rowf['Title']; ?></a>
                           </li>
                           <?php }}} ?>    
                        </ul>
                     </div>
                     <div class="col-md-8">
                        <?php if($_GET['type'] != 'search'){  }else{ 
                           $query11 = mysqli_query($db,"SELECT DISTINCT Title from others_php where DeletedStatus='0' AND Title = '$_GET[nm]' AND State != '0' ORDER BY Title LIMIT 1"); 
                           $rownum = mysqli_num_rows($query11);
                           $row11 = mysqli_fetch_assoc($query11);
                           $Title = $row11['Title'];
                              ?>
                        <?php if($rownum == 1){ 
                           if($_GET['st'] == 'ALL'){
                                         $query = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                   }elseif($_GET['st'] !=''){
                                         $query = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' AND State = '$_GET[st]' ORDER BY Title"); 
                                   }else{
                                    $query = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                   }
                                   $rownums = mysqli_num_rows($query);
                           if($rownums == '0'){
                                         $query11 = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                         $num11 = 0;
                                            while($row11 = mysqli_fetch_array($query11)){
                                               if($num11 == '0'){
                                               ?>
                        <h3><?php echo $row11['Title']; ?></h3>
                        <p><?php echo $row11['Description']; ?></p>
                        <div class="col-4" style="padding-bottom: 10px;">
                           <div class="form-group">
                              <div class="input-group col-xs-4">
                                 <select name="State" class="form-control" style="color: #282f3a;" onchange="if (this.value) window.location.href=this.value">
                                    <?php if($_GET['nm'] == $Title){  ?>
                                    <option value="other-option_PHP.php?nm=$Title&type=search">Select State</option>
                                    <?php }  ?>
                                    <?php
                                       $querycl = mysqli_query($db,"SELECT DISTINCT State from others_php where Title = '$Title' AND DeletedStatus='0' AND State != '0' ORDER BY State"); 
                                          while($rowcl = mysqli_fetch_array($querycl)){
                                       ?>
                                    <option <?php if($_GET['st'] == $rowcl['State']){echo "selected";}  ?> value="other-option_PHP.php?nm=<?php echo $_GET['nm'];?>&type=search&st=<?php echo $rowcl['State'];?>"><?php echo $rowcl['State'];?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                           </div>
                        </div>
                        <center>
                           <h4 style="color: red;">Record not found.</h4>
                        </center>
                        <?php $num11 = $num11 + 1;}}}
                           $count = 0;
                           $num = 0;
                           $numdt2 = '1';
                             while($row = mysqli_fetch_array($query)){
                                if($num == '0'){
                                ?>
                        <h3><?php echo $row['Title']; ?></h3>
                        <p><?php echo $row['Description']; ?></p>
                        <div class="col-4" style="padding-bottom: 10px;">
                           <div class="form-group">
                              <div class="input-group col-xs-4">
                                 <select name="State" class="form-control" style="color: #282f3a;" onchange="if (this.value) window.location.href=this.value">
                                    <option value="other-option_PHP.php?nm=<?php echo $Title;?>&type=search">Select State</option>
                                    <option <?php if($_GET['st'] == 'ALL'){echo "selected";}  ?> value="other-option_PHP.php?nm=<?php echo $Title;?>&type=search&st=ALL">Select ALL</option>
                                    <?php
                                       $querycl = mysqli_query($db,"SELECT DISTINCT State from others_php where Title = '$Title' AND DeletedStatus='0' AND State != '0' ORDER BY State"); 
                                          while($rowcl = mysqli_fetch_array($querycl)){
                                       ?>
                                    <option <?php if($_GET['st'] == $rowcl['State']){echo "selected";}  ?> value="other-option_PHP.php?nm=<?php echo $Title;?>&type=search&st=<?php echo $rowcl['State'];?>"><?php echo $rowcl['State'];?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                           </div>
                        </div>
                        <?php } $num = $num +1; $count = $count +1;  ?>
                        <div class="row">
                           <?php
                              $numdt = '1';
                                 $query22num = mysqli_query($db, "SELECT * from others_documents_php where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                 $numdt+= mysqli_num_rows($query22num);
                                 if ($numdt > 0 AND $_GET['st'] != '' AND $count == 1) {
                                    ?>
                           <div class="col-md-4">
                              <h5>Document Name</h5>
                           </div>
                           <div class="col-md-2">
                              <h5>Document</h5>
                           </div>
                           <div class="col-md-3">
                              <h5>Document Source</h5>
                           </div>
                           <div class="col-md-3">
                              <h5>Source Link</h5>
                           </div>
                           <?php }  
                              if ($numdt > 0 AND $_GET['st'] != '') {
                                 $query1 = mysqli_query($db,"SELECT * from others_documents_php where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY documents_name");
                                    if($query1){
                                      $docnum2 = 1;
                                      while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                           <div class="col-md-4">
                              <p class="mb-2" style="overflow-y: auto;">
                                 <i class="fa text-primary me-2"><?php echo $numdt2; ?>.</i>
                                 <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row1['documents_name'], strpos($row1['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?>
                              </p>
                           </div>
                           <div class="col-md-2">
                              <?php
                                 $allowed =  array('pdf');
                                 $ext = pathinfo($row1['documents_name'], PATHINFO_EXTENSION);
                                 if(in_array($ext,$allowed) ) {?>
                              <a href="other-option-pdf_PHP.php?doc=<?php echo $row1['others_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php }else{?>
                              <a href="Others_PHP/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['DocumentsSource']; ?>" target="_blank" ><?php echo $row['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['SourceLink']; ?>" target="_blank" ><?php echo $row['SourceLink']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['SourceLink']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <?php $docnum2 = $docnum2 +1;$numdt2 =$numdt2 +1;}} ?> 
                           <div class="col-md-12">
                              <?php
                                 $numdt1 = '0';
                                    $query22num1 = mysqli_query($db, "SELECT * from others_youtube_php where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !=''");
                                    $numdt1+= mysqli_num_rows($query22num1);
                                    if ($numdt1 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">You tube links</h5>
                              <?php }
                                 $query1 = mysqli_query($db,"SELECT * from others_youtube_php where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !='' ORDER BY others_youtube_id ASC");
                                 if($query1){
                                    $docnum1 = 1;
                                    while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <a href="<?php echo $row1['YoutubeTitleLink']; ?>" target="_blank">
                                 <i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i>
                                 </a>
                              </p>
                              <?php $docnum1 = $docnum1 +1;}} ?>    
                           </div>
                           <div class="col-md-12">
                              <?php
                                 $numdt11 = '0';
                                    $query22num11 = mysqli_query($db, "SELECT * from others_videos_php where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                    $numdt11+= mysqli_num_rows($query22num11);
                                    if ($numdt11 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Videos</h5>
                              <?php }
                                 $query15 = mysqli_query($db,"SELECT * from others_videos_php where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY others_video_id ASC");
                                 if($query15){
                                    $docnum15 = 1;
                                    while($row15 = mysqli_fetch_array($query15)){
                                       ?>
                              <a href="OthersVideos_PHP/<?php echo $row15['VideoFile']; ?>" target="_blank">
                                 <video height="200" width="200" controls>
                                    <source src="OthersVideos_PHP/<?php echo $row15['VideoFile']; ?>" type="video/mp4">
                                 </video>
                              </a>
                              <?php $docnum15 = $docnum15 +1;}} ?>    
                           </div>
                           <?php } ?>
                        </div>
                        <?php }}else{ 
                           $Title = $_GET['nm'];
                                                $query = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                           $rownums = mysqli_num_rows($query);
                                   if($rownums == '0'){
                                                   $query11 = mysqli_query($db,"SELECT * from others_php where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                                   $num11 = 0;
                                                      while($row11 = mysqli_fetch_array($query11)){
                                                         if($num11 == '0'){
                                                         ?>
                        <h3><?php echo $row11['Title']; ?></h3>
                        <p><?php echo $row11['Description']; ?></p>
                        <center>
                           <h4 style="color: red;">Record not found.</h4>
                        </center>
                        <?php $num11 = $num11 + 1;}}}
                           $num = 0;
                             while($row = mysqli_fetch_array($query)){
                                if($num == '0'){
                                ?>
                        <h3><?php echo $row['Title']; ?></h3>
                        <p><?php echo $row['Description']; ?></p>
                        <?php } $num = $num +1;  ?>
                        <div class="row">
                           <?php
                              $numdt = '0';
                                 $query22num = mysqli_query($db, "SELECT * from others_documents_php where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                 $numdt+= mysqli_num_rows($query22num);
                                 if ($numdt > 0) {
                                    ?>
                           <div class="col-md-4">
                              <h5>Document</h5>
                           </div>
                           <div class="col-md-4">
                              <h5>Description</h5>
                           </div>
                           <div class="col-md-4">
                              <h5>Document Source</h5>
                           </div>
                           <?php } 
                              $query1 = mysqli_query($db,"SELECT * from others_documents_php where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY documents_name");
                                 if($query1){
                                   $docnum2 = 1;
                                   while($row1 = mysqli_fetch_array($query1)){
                                    ?>
                           <div class="col-md-4">
                              <i class="fa text-primary me-2"><?php echo $docnum2;?>.</i>
                              <?php
                                 $allowed =  array('pdf');
                                 $ext = pathinfo($row1['documents_name'], PATHINFO_EXTENSION);
                                 if(in_array($ext,$allowed) ) {?>
                              <a href="other-option-pdf_PHP.php?doc=<?php echo $row1['others_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php }else{?>
                              <a href="Others_PHP/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php echo $row['Description']; ?>
                           </div>
                           <div class="col-md-4">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['DocumentsSource']; ?>" target="_blank" ><?php echo $row['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <?php $docnum2 = $docnum2 +1;}} ?> 
                           <div class="col-md-12">
                              <?php
                                 $numdt1 = '0';
                                    $query22num1 = mysqli_query($db, "SELECT * from others_youtube_php where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !=''");
                                    $numdt1+= mysqli_num_rows($query22num1);
                                    if ($numdt1 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Youtube links</h5>
                              <?php }
                                 $query1 = mysqli_query($db,"SELECT * from others_youtube_php where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !='' ORDER BY others_youtube_id ASC");
                                 if($query1){
                                    $docnum1 = 1;
                                    while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <a href="<?php echo $row1['YoutubeTitleLink']; ?>" target="_blank">
                                 <i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i>
                                 </a>
                              </p>
                              <?php $docnum1 = $docnum1 +1;}} ?>    
                           </div>
                           <div class="col-md-12">
                              <?php
                                 $numdt11 = '0';
                                    $query22num11 = mysqli_query($db, "SELECT * from others_videos_php where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                    $numdt11+= mysqli_num_rows($query22num11);
                                    if ($numdt11 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Videos</h5>
                              <?php }
                                 $query15 = mysqli_query($db,"SELECT * from others_videos_php where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY others_video_id ASC");
                                 if($query15){
                                    $docnum15 = 1;
                                    while($row15 = mysqli_fetch_array($query15)){
                                       ?>
                              <a href="OthersVideos_PHP/<?php echo $row15['VideoFile']; ?>" target="_blank">
                                 <video height="200" width="200" controls>
                                    <source src="OthersVideos_PHP/<?php echo $row15['VideoFile']; ?>" type="video/mp4">
                                 </video>
                              </a>
                              <?php $docnum15 = $docnum15 +1;}} ?>    
                           </div>
                        </div>
                        <?php }}} ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container-fluid">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12">
                  <div class="row g-3 m-tab">
                     <div class="col-md-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <?php
                              if($_GET['type'] != 'search'){
                                 $active1 ='active';
                                 $queryf = mysqli_query($db,"SELECT DISTINCT Title from others where DeletedStatus='0' ORDER BY Title");
                                 if($queryf){
                                    while($rowf = mysqli_fetch_array($queryf)){
                                       ?>
                           <li class="nav-item" role="presentation">
                              <a class="nav-link <?php echo $active1; ?>" href="other-option.php?nm=<?php echo $rowf['Title']; ?>&type=search" aria-selected="true"><?php echo $rowf['Title']; ?></a>
                           </li>
                           <?php $active1 ='';}}}else{  
                              $queryf = mysqli_query($db,"SELECT DISTINCT Title from others where DeletedStatus='0' ORDER BY Title");
                              if($queryf){
                                 while($rowf = mysqli_fetch_array($queryf)){
                                    ?>
                           <li class="nav-item" role="presentation">
                              <a class="nav-link <?php if($_GET['nm'] == $rowf['Title']){echo "active";} ?> <?php echo $active1; ?>" href="other-option.php?nm=<?php echo $rowf['Title']; ?>&type=search" aria-selected="true"><?php echo $rowf['Title']; ?></a>
                           </li>
                           <?php }}} ?>    
                        </ul>
                     </div>
                     <div class="col-md-8">
                        <?php if($_GET['type'] != 'search'){  }else{ 
                           $query11 = mysqli_query($db,"SELECT DISTINCT Title from others where DeletedStatus='0' AND Title = '$_GET[nm]' AND State != '0' ORDER BY Title LIMIT 1"); 
                           $rownum = mysqli_num_rows($query11);
                           $row11 = mysqli_fetch_assoc($query11);
                           $Title = $row11['Title'];
                              ?>
                        <?php if($rownum == 1){ 
                           if($_GET['st'] == 'ALL'){
                                         $query = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                   }elseif($_GET['st'] !=''){
                                         $query = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' AND State = '$_GET[st]' ORDER BY Title"); 
                                   }else{
                                    $query = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                   }
                                   $rownums = mysqli_num_rows($query);
                           if($rownums == '0'){
                                         $query11 = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                         $num11 = 0;
                                            while($row11 = mysqli_fetch_array($query11)){
                                               if($num11 == '0'){
                                               ?>
                        <h3><?php echo $row11['Title']; ?></h3>
                        <p><?php echo $row11['Description']; ?></p>
                        <div class="col-4" style="padding-bottom: 10px;">
                           <div class="form-group">
                              <div class="input-group col-xs-4">
                                 <select name="State" class="form-control" style="color: #282f3a;" onchange="if (this.value) window.location.href=this.value">
                                    <?php if($_GET['nm'] == $Title){  ?>
                                    <option value="other-option.php?nm=$Title&type=search">Select State</option>
                                    <?php }  ?>
                                    <?php
                                       $querycl = mysqli_query($db,"SELECT DISTINCT State from others where Title = '$Title' AND DeletedStatus='0' AND State != '0' ORDER BY State"); 
                                          while($rowcl = mysqli_fetch_array($querycl)){
                                       ?>
                                    <option <?php if($_GET['st'] == $rowcl['State']){echo "selected";}  ?> value="other-option.php?nm=<?php echo $_GET['nm'];?>&type=search&st=<?php echo $rowcl['State'];?>"><?php echo $rowcl['State'];?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                           </div>
                        </div>
                        <center>
                           <h4 style="color: red;">Record not found.</h4>
                        </center>
                        <?php $num11 = $num11 + 1;}}}
                           $count = 0;
                           $num = 0;
                           $numdt2 = '1';
                             while($row = mysqli_fetch_array($query)){
                                if($num == '0'){
                                ?>
                        <h3><?php echo $row['Title']; ?></h3>
                        <p><?php echo $row['Description']; ?></p>
                        <div class="col-4" style="padding-bottom: 10px;">
                           <div class="form-group">
                              <div class="input-group col-xs-4">
                                 <select name="State" class="form-control" style="color: #282f3a;" onchange="if (this.value) window.location.href=this.value">
                                    <option value="other-option.php?nm=<?php echo $Title;?>&type=search">Select State</option>
                                    <option <?php if($_GET['st'] == 'ALL'){echo "selected";}  ?> value="other-option.php?nm=<?php echo $Title;?>&type=search&st=ALL">Select ALL</option>
                                    <?php
                                       $querycl = mysqli_query($db,"SELECT DISTINCT State from others where Title = '$Title' AND DeletedStatus='0' AND State != '0' ORDER BY State"); 
                                          while($rowcl = mysqli_fetch_array($querycl)){
                                       ?>
                                    <option <?php if($_GET['st'] == $rowcl['State']){echo "selected";}  ?> value="other-option.php?nm=<?php echo $Title;?>&type=search&st=<?php echo $rowcl['State'];?>"><?php echo $rowcl['State'];?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                           </div>
                        </div>
                        <?php } $num = $num +1; $count = $count +1;  ?>
                        <div class="row">
                           <?php
                              $numdt = '1';
                                 $query22num = mysqli_query($db, "SELECT * from others_documents where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                 $numdt+= mysqli_num_rows($query22num);
                                 if ($numdt > 0 AND $_GET['st'] != '' AND $count == 1) {
                                    ?>
                           <div class="col-md-4">
                              <h5>Document Name</h5>
                           </div>
                           <div class="col-md-2">
                              <h5>Document</h5>
                           </div>
                           <div class="col-md-3">
                              <h5>Document Source</h5>
                           </div>
                           <div class="col-md-3">
                              <h5>Source Link</h5>
                           </div>
                           <?php }  
                              if ($numdt > 0 AND $_GET['st'] != '') {
                                 $query1 = mysqli_query($db,"SELECT * from others_documents where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY documents_name");
                                    if($query1){
                                      $docnum2 = 1;
                                      while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                           <div class="col-md-4">
                              <p class="mb-2" style="overflow-y: auto;">
                                 <i class="fa text-primary me-2"><?php echo $numdt2; ?>.</i>
                                 <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row1['documents_name'], strpos($row1['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?>
                              </p>
                           </div>
                           <div class="col-md-2">
                              <?php
                                 $allowed =  array('pdf');
                                 $ext = pathinfo($row1['documents_name'], PATHINFO_EXTENSION);
                                 if(in_array($ext,$allowed) ) {?>
                              <a href="other-option-pdf.php?doc=<?php echo $row1['others_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php }else{?>
                              <a href="Others/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['DocumentsSource']; ?>" target="_blank" ><?php echo $row['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['SourceLink']; ?>" target="_blank" ><?php echo $row['SourceLink']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['SourceLink']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <?php $docnum2 = $docnum2 +1;$numdt2 =$numdt2 +1;}} ?> 
                           <div class="col-md-12">
                              <?php
                                 $numdt1 = '0';
                                    $query22num1 = mysqli_query($db, "SELECT * from others_youtube where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !=''");
                                    $numdt1+= mysqli_num_rows($query22num1);
                                    if ($numdt1 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">You tube links</h5>
                              <?php }
                                 $query1 = mysqli_query($db,"SELECT * from others_youtube where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !='' ORDER BY others_youtube_id ASC");
                                 if($query1){
                                    $docnum1 = 1;
                                    while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <a href="<?php echo $row1['YoutubeTitleLink']; ?>" target="_blank">
                                 <i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i>
                                 </a>
                              </p>
                              <?php $docnum1 = $docnum1 +1;}} ?>    
                           </div>
                           <div class="col-md-12">
                              <?php
                                 $numdt11 = '0';
                                    $query22num11 = mysqli_query($db, "SELECT * from others_videos where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                    $numdt11+= mysqli_num_rows($query22num11);
                                    if ($numdt11 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Videos</h5>
                              <?php }
                                 $query15 = mysqli_query($db,"SELECT * from others_videos where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY others_video_id ASC");
                                 if($query15){
                                    $docnum15 = 1;
                                    while($row15 = mysqli_fetch_array($query15)){
                                       ?>
                              <a href="OthersVideos/<?php echo $row15['VideoFile']; ?>" target="_blank">
                                 <video height="200" width="200" controls>
                                    <source src="OthersVideos/<?php echo $row15['VideoFile']; ?>" type="video/mp4">
                                 </video>
                              </a>
                              <?php $docnum15 = $docnum15 +1;}} ?>    
                           </div>
                           <?php } ?>
                        </div>
                        <?php }}else{ 
                           $Title = $_GET['nm'];
                                                $query = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                           $rownums = mysqli_num_rows($query);
                                   if($rownums == '0'){
                                                   $query11 = mysqli_query($db,"SELECT * from others where DeletedStatus='0' AND Title = '$Title' ORDER BY Title"); 
                                                   $num11 = 0;
                                                      while($row11 = mysqli_fetch_array($query11)){
                                                         if($num11 == '0'){
                                                         ?>
                        <h3><?php echo $row11['Title']; ?></h3>
                        <p><?php echo $row11['Description']; ?></p>
                        <center>
                           <h4 style="color: red;">Record not found.</h4>
                        </center>
                        <?php $num11 = $num11 + 1;}}}
                           $num = 0;
                             while($row = mysqli_fetch_array($query)){
                                if($num == '0'){
                                ?>
                        <h3><?php echo $row['Title']; ?></h3>
                        <p><?php echo $row['Description']; ?></p>
                        <?php } $num = $num +1;  ?>
                        <div class="row">
                           <?php
                              $numdt = '0';
                                 $query22num = mysqli_query($db, "SELECT * from others_documents where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                 $numdt+= mysqli_num_rows($query22num);
                                 if ($numdt > 0) {
                                    ?>
                           <div class="col-md-4">
                              <h5>Document</h5>
                           </div>
                           <div class="col-md-4">
                              <h5>Description</h5>
                           </div>
                           <div class="col-md-4">
                              <h5>Document Source</h5>
                           </div>
                           <?php } 
                              $query1 = mysqli_query($db,"SELECT * from others_documents where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY documents_name");
                                 if($query1){
                                   $docnum2 = 1;
                                   while($row1 = mysqli_fetch_array($query1)){
                                    ?>
                           <div class="col-md-4">
                              <i class="fa text-primary me-2"><?php echo $docnum2;?>.</i>
                              <?php
                                 $allowed =  array('pdf');
                                 $ext = pathinfo($row1['documents_name'], PATHINFO_EXTENSION);
                                 if(in_array($ext,$allowed) ) {?>
                              <a href="other-option-pdf.php?doc=<?php echo $row1['others_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php }else{?>
                              <a href="Others/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php echo $row['Description']; ?>
                           </div>
                           <div class="col-md-4">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row['DocumentsSource']; ?>" target="_blank" ><?php echo $row['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <?php $docnum2 = $docnum2 +1;}} ?> 
                           <div class="col-md-12">
                              <?php
                                 $numdt1 = '0';
                                    $query22num1 = mysqli_query($db, "SELECT * from others_youtube where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !=''");
                                    $numdt1+= mysqli_num_rows($query22num1);
                                    if ($numdt1 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Youtube links</h5>
                              <?php }
                                 $query1 = mysqli_query($db,"SELECT * from others_youtube where DeletedStatus='0' and OthersId='$row[OthersId]' and YoutubeTitleLink !='' ORDER BY others_youtube_id ASC");
                                 if($query1){
                                    $docnum1 = 1;
                                    while($row1 = mysqli_fetch_array($query1)){
                                       ?>
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <a href="<?php echo $row1['YoutubeTitleLink']; ?>" target="_blank">
                                 <i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i>
                                 </a>
                              </p>
                              <?php $docnum1 = $docnum1 +1;}} ?>    
                           </div>
                           <div class="col-md-12">
                              <?php
                                 $numdt11 = '0';
                                    $query22num11 = mysqli_query($db, "SELECT * from others_videos where DeletedStatus='0' and OthersId='$row[OthersId]'");
                                    $numdt11+= mysqli_num_rows($query22num11);
                                    if ($numdt11 > 0) {
                                       ?>
                              <h5 style="padding-top: 8px;">Videos</h5>
                              <?php }
                                 $query15 = mysqli_query($db,"SELECT * from others_videos where DeletedStatus='0' and OthersId='$row[OthersId]' ORDER BY others_video_id ASC");
                                 if($query15){
                                    $docnum15 = 1;
                                    while($row15 = mysqli_fetch_array($query15)){
                                       ?>
                              <a href="OthersVideos/<?php echo $row15['VideoFile']; ?>" target="_blank">
                                 <video height="200" width="200" controls>
                                    <source src="OthersVideos/<?php echo $row15['VideoFile']; ?>" type="video/mp4">
                                 </video>
                              </a>
                              <?php $docnum15 = $docnum15 +1;}} ?>    
                           </div>
                        </div>
                        <?php }}} ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include "footer.php"; ?>
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>