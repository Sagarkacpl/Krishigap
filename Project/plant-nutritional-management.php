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
   include "most_visited_page.php";
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN plant_nutritional_management ON crop.CropId = plant_nutritional_management.CropId AND plant_nutritional_management.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['ct'] != '' AND $_GET['crp'] != '' AND $_GET['cid'] != '') {
       if ($_GET['crp'] == '00' AND $_GET['cid'] == '00') {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where CountryID = '$_GET[ct]' AND TitleHere1 = '$_GET[t1]' AND TitleHere2 = '$_GET[t2]' AND TitleHere3 = '$_GET[t3]' AND DeletedStatus = '0'");
       } elseif ($_GET['crp'] == '00' AND $_GET['cid'] != '00') {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND TitleHere1 = '$_GET[t1]' AND TitleHere2 = '$_GET[t2]' AND TitleHere3 = '$_GET[t3]' AND DeletedStatus = '0'");
       } elseif ($_GET['crp'] != '00' AND $_GET['cid'] == '00') {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND TitleHere1 = '$_GET[t1]' AND TitleHere2 = '$_GET[t2]' AND TitleHere3 = '$_GET[t3]' AND DeletedStatus = '0'");
       } else {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND CategoryId = '$_GET[cid]' AND TitleHere1 = '$_GET[t1]' AND TitleHere2 = '$_GET[t2]' AND TitleHere3 = '$_GET[t3]' AND DeletedStatus = '0'");
       }
   }
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
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <style>
         .m-tab .nav {
         border: 10px #ffffff solid;
         background: #ffffff;
         }
      </style>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Plant Nutrition Management</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Plant Nutrition Management</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container">
            <div class="row g-4">
               <form action="" method="GET">
                  <div class="row g-3">
                     <div class="col-md-3">
                        <h5>Standard</h5>
                        <div class="form-floating">
                           <select id="gswselector" name="gsw" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                              <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                              <option <?php if($_GET['gsw'] == 'OrganicNPOP'){echo "selected";} ?> value="OrganicNPOP">Organic NPOP</option>
                              <option <?php if($_GET['gsw'] == 'OrganicNOP'){echo "selected";} ?> value="OrganicNOP">Organic NOP</option>
                              <option <?php if($_GET['gsw'] == 'FairtradeInternational'){echo "selected";} ?> value="FairtradeInternational">Fairtrade International</option>
                              <option <?php if($_GET['gsw'] == 'RainforestAlliance'){echo "selected";} ?> value="RainforestAlliance">Rainforest Alliance</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <h5>Standard Category</h5>
                        <div class="form-floating">
                           <select name="cid" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['cid'] == '00'){echo "selected";}  ?> value="00">ALL</option>
                              <?php 
                                 $queryc = mysqli_query($db,"SELECT * from category where DeletedStatus='0' ORDER BY CategoryName");
                                         if($queryc){
                                         while($rowc = mysqli_fetch_array($queryc)){?>
                              <option <?php if($_GET['cid'] == $rowc['CategoryId']){echo "selected";}  ?> value="<?php echo $rowc['CategoryId']; ?>"><?php echo $rowc['CategoryName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <h5>Country</h5>
                        <div class="form-floating">
                           <select id="country" name="ct" class="form-control" required="">
                              <option></option>
                              <?php 
                                 $query113 = mysqli_query($db,"SELECT * from countries ORDER BY CountryName");
                                        if($query113){
                                        while($row113 = mysqli_fetch_array($query113)){?>
                              <option <?php if($_GET['ct'] == $row113['CountryID']){echo "selected";}  ?> value="<?php echo $row113['CountryID']; ?>"><?php echo $row113['CountryName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <h5>Crop</h5>
                        <div class="form-floating">
                           <select name="crp" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['crp'] == '00'){echo "selected";}  ?> value="00">ALL</option>
                              <?php 
                                 if($query1){
                                 while($row11 = mysqli_fetch_array($query1)){?>
                              <option <?php if($_GET['crp'] == $row11['CropId']){echo "selected";}  ?> value="<?php echo $row11['CropId']; ?>"><?php echo $row11['CropName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <h5>Status</h5>
                     <div class="col-md-4">
                        <div class="form-check m-form-check">
                           <input <?php if($_GET['t1'] == 'Banned'){echo "checked";}  ?> name="t1" type="checkbox" class="form-check-input" id="" value="Banned">
                           <label class="form-check-label" for="flexRadioDefault1">
                           Banned
                           </label>
                        </div>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-2">
                        <h5>&nbsp;</h5>
                        <a href="plant-nutritional-management-about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                     </div>
                     <div class="col-md-3">
                        <h5>&nbsp;</h5>
                        <div class="form-check m-form-check" style="padding-top: 15px;padding-bottom: 15px;">
                           <input <?php if($_GET['rd'] == '1'){echo "checked";}  ?> name="rd" type="checkbox" class="form-check-input" id="" value="1">
                           <label class="form-check-label" for="flexRadioDefault1">
                              <h5 style="margin-bottom: 0rem;">Related Documents</h5>
                           </label>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button style="margin-top: 30px;" class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </form>
               <?php if ($_GET['ct'] != '' AND $_GET['crp'] != '' AND $_GET['cid'] != '') {?>
               <div class="container">
                  <?php
                     while ($row = mysqli_fetch_array($query)) {
                          $plant_nutritional_management_id = $row['plant_nutritional_management_id'];
                      ?>
                  <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="row g-3 m-tab">
                        <div class="col-md-4">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <?php $docnum1 = 1;
                                 $query2t = mysqli_query($db, "SELECT * from plant_nutritional_management_tabs where plant_nutritional_management_id='$plant_nutritional_management_id' AND DeletedStatus='0'");
                                 if (mysqli_num_rows($query2t) > 0) {
                                     $active1 = 'active';
                                     $queryt = mysqli_query($db, "SELECT * from plant_nutritional_management_tabs where plant_nutritional_management_id='$plant_nutritional_management_id' AND DeletedStatus='0' ORDER BY Title");
                                     if ($queryt) {
                                         while ($rowt = mysqli_fetch_array($queryt)) {
                                 ?>
                              <li class="nav-item" role="presentation">
                                 <a class="nav-link <?php if($docnum1 == '1'){echo $active1;} ?>" id="<?php echo $rowt['plant_nutritional_management_tab_id']; ?>" data-bs-toggle="tab" href="#tab-<?php echo $rowt['plant_nutritional_management_tab_id']; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo $rowt['Title']; ?></a>
                              </li>
                              <?php $active1 ='';
                                 $docnum1 = $docnum1 + 1;
                                 }}} ?>  
                           </ul>
                        </div>
                        <div class="col-md-8">
                           <div class="tab-content" id="myTabContent">
                              <?php
                                 $active2 = 'show active';
                                 $docnum2 = 1;
                                 $queryh = mysqli_query($db, "SELECT * from plant_nutritional_management_tabs where plant_nutritional_management_id='$plant_nutritional_management_id' AND DeletedStatus='0' ORDER BY Title");
                                 if ($queryh) {
                                     while ($rowh = mysqli_fetch_array($queryh)) {
                                         $plant_nutritional_management_tab_id = $rowh['plant_nutritional_management_tab_id'];
                                 ?>
                              <div class="tab-pane fade  <?php if($docnum2 == '1'){echo $active2;} ?>" id="tab-<?php echo $rowh['plant_nutritional_management_tab_id']; ?>" role="tabpanel" aria-labelledby="<?php echo $rowh['plant_nutritional_management_tab_id']; ?>">
                                 <h3><?php echo $rowh['Title']; ?></h3>
                                 <p><?php echo $rowh['Description']; ?></p>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <?php
                                          $queryctyt = mysqli_query($db, "SELECT * from plant_nutritional_management_youtube where DeletedStatus='0' AND plant_nutritional_management_tab_id='$plant_nutritional_management_tab_id'");
                                          if (mysqli_num_rows($queryctyt) > 0) { ?>
                                       <h5>You tube links</h5>
                                       <?php } ?>  
                                       <?php
                                          $query1y = mysqli_query($db, "SELECT * from plant_nutritional_management_youtube where DeletedStatus='0' AND plant_nutritional_management_tab_id='$plant_nutritional_management_tab_id'");
                                          if ($query1y) {
                                              while ($row1y = mysqli_fetch_array($query1y)) {
                                          ?>
                                       <p class="mb-2">
                                          <a href="<?php echo $row1y['YoutubeTitleLink']; ?>" target="_blank">
                                          <i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i>
                                          </a>
                                       </p>
                                       <?php }} ?>    
                                    </div>
                                    <div class="col-md-12">
                                       <?php
                                          $queryctdt = mysqli_query($db, "SELECT * from plant_nutritional_management_documents where DeletedStatus='0' and plant_nutritional_management_tab_id='$rowh[plant_nutritional_management_tab_id]'");
                                          if (mysqli_num_rows($queryctdt) > 0) { ?>
                                       <h5>Documents</h5>
                                       <?php } 
                                          $query1 = mysqli_query($db, "SELECT * from plant_nutritional_management_documents where DeletedStatus='0' and plant_nutritional_management_tab_id='$rowh[plant_nutritional_management_tab_id]' ORDER BY documents_name");
                                          if ($query1) {
                                              while ($row1 = mysqli_fetch_array($query1)) {
                                          ?>
                                       <div class="col-md-12">
                                          <a href="Plant-Protection-Products/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                       </div>
                                       <?php }} ?>    
                                    </div>
                                    <?php if(isset($_GET['rd'])){?>
                                    <div class="row">
                                       <?php
                                          $queryctdt = mysqli_query($db, "SELECT * from rel_plant_nutritional_management_documents where DeletedStatus='0' and plant_nutritional_management_id='$plant_nutritional_management_id'");
                                          if (mysqli_num_rows($queryctdt) > 0) { ?>
                                       <div class="col-md-4">
                                          <h5>Related Documents</h5>
                                       </div>
                                       <div class="col-md-4">
                                          <h5>Description</h5>
                                       </div>
                                       <div class="col-md-4">
                                          <h5>Documents Source</h5>
                                       </div>
                                       <?php } ?>
                                       <?php  
                                          $query1 = mysqli_query($db, "SELECT * from rel_plant_nutritional_management_documents where DeletedStatus='0' and plant_nutritional_management_id='$plant_nutritional_management_id' ORDER BY documents_name");
                                          if ($query1) {
                                              while ($row1 = mysqli_fetch_array($query1)) {
                                          ?>
                                       <div class="col-md-4">
                                          <?php
                                             $allowed =  array('pdf');
                                             $ext = pathinfo($row1['documents_name'], PATHINFO_EXTENSION);
                                             if(in_array($ext,$allowed) ) {?>
                                          <a href="rplant-nutritional-management-pdf.php?doc=<?php echo $row1['rel_plant_nutritional_management_document_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                          <?php }else{?>
                                          <a href="RPlant-Nutritional-Management/<?php echo $row1['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                          <?php } ?>  
                                       </div>
                                       <div class="col-md-4">
                                          <p><?php echo $row1['Description']; ?></p>
                                       </div>
                                       <div class="col-md-4">
                                          <p><?php echo $row1['DocumentsSource']; ?></p>
                                       </div>
                                       <?php }} ?>  
                                    </div>
                                    <?php } ?> 
                                 </div>
                              </div>
                              <?php $active2 ='';}} ?>    
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php }} ?>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <?php include "footer.php"; ?>
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>