<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_IA"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_IA"); 
      echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_IA'</script>";
   }
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN internal_audit ON crop.CropId = internal_audit.Crop AND internal_audit.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['gsw'] != '' AND $_GET['crp'] != '') {
        if ($_GET['gsw'] == 'IndGAP') {
              $GETgsw = 'IndG.A.P';
          }
          if ($_GET['gsw'] == 'GLOBALGAP') {
              $GETgsw = 'GLOBALG.A.P';
          }
          if ($_GET['gsw'] == 'OrganicNPOP') {
              $GETgsw = 'Organic NPOP';
          }
          if ($_GET['gsw'] == 'OrganicNOP') {
              $GETgsw = 'Organic NOP';
          }
       
       if ($_GET['crp'] == '00') {
           $query2 = "SELECT DISTINCT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND sort != '0' ORDER BY sort ASC";
           $query2z = "SELECT DISTINCT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND sort = '0' ORDER BY sort ASC";
           $query2d1 = "SELECT DISTINCT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND DocumentsTitle != '' ORDER BY sort ASC";
           $query2y1 = "SELECT DISTINCT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND VideoTitle != '' ORDER BY sort ASC";
           $query2t1 = "SELECT DISTINCT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND TrainingModulesTitle != '' ORDER BY sort ASC";
       } else {
           $query2 = "SELECT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND sort != '0' ORDER BY sort ASC";
           $query2z = "SELECT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND sort = '0' ORDER BY sort ASC";
           $query2d1 = "SELECT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND DocumentsTitle != '' ORDER BY sort ASC";
           $query2y1 = "SELECT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND VideoTitle != '' ORDER BY sort ASC";
           $query2t1 = "SELECT * from internal_audit WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND TrainingModulesTitle != '' ORDER BY sort ASC";
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
      <!--            <h1 class="display-3 text-white animated slideInDown">Internal Audit</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Internal Audit</li>-->
      <!--               </ol>-->
      <!--               <a href='home1.php' class="btn btn-success btn-sm">Go Back</a>-->
      <!--            </nav>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <div class="container-fluid p-0 mb-5">
          <img class="img-fluid" src="img/banner5.jpg" alt="" style="width:100%">
        </div>
      <div class="container-xxl py-5" style="padding-top: 3rem !important;padding-bottom: 6rem !important;">
         <div class="container">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="" method="GET">
                     <div class="row g-3">
                        <div class="col-md-5">
                           <h5>Standard</h5>
                           <div class="form-floating">
                              <select id="gswselector" name="gsw" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNPOP'){echo "selected";} ?> value="OrganicNPOP">Organic NPOP</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNOP'){echo "selected";} ?> value="OrganicNOP">Organic NOP</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <h5>Crop</h5>
                           <div class="form-floating">
                              <select name="crp" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['crp'] == '00'){echo "selected";} ?> value="00">ALL</option>
                                 <?php 
                                    if($query1){
                                    while($row1 = mysqli_fetch_array($query1)){?>
                                 <option <?php if($_GET['crp'] == $row1['CropId']){echo "selected";} ?> value="<?php echo $row1['CropId']; ?>"><?php echo $row1['CropName']; ?></option>
                                 <?php }} ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="Internal-Audit-About.pdf" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="internal-audit-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <div style="margin-top: 25px;">
                           <p><b>Note:</b> Internal Audit requirements are generic and apply to Producer Group for  all  types of crops-Whether Grape or Mango or Vegetables etc .You need to use the  Quality Management Systems checkList  for auditing   the Producer  Group.</p>
                        </div>
                        <div id="IndGAP" class="gsww" style="display:none"><?php include ("internal-audit-IndG.A.P.php"); ?></div>
                        <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                        <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                        <div id="RainforestAlliance" class="gsww" style="display:none"></div>
                        <?php if ($_GET['gsw'] != '' AND $_GET['crp'] != '') { ?>
                        <?php if ($_GET['gsw'] == 'IndGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Quality Council of India: <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'GLOBALGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>GlobalG.A.P: <a href="https://www.globalgap.org/uk_en" target="_blank">www.globalgap.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'OrganicNPOP') { ?> 
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>APEDA: <a href="https://apeda.gov.in/apedawebsite" target="_blank">www.apeda.gov.in</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'OrganicNOP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>USDA Agricultural Marketing Service: <a href="https://www.ams.usda.gov" target="_blank">www.ams.usda.gov</a></b></p> 
                        <?php } ?>
                        <?php 
                           $numdt += mysqli_num_rows(mysqli_query($db, "$query2d1"));
                           if ($numdt > 0) {
                           ?>
                        <div class="row">
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
                        </div>
                        <?php } ?>
                        <?php
                           $query21 = mysqli_query($db,$query2);
                           $docnum1 = 1;
                              while($row21 = mysqli_fetch_array($query21)){
                               if($row21['DocumentsTitle'] != '' OR $row21['DocumentsLink'] != ''){
                           ?>
                        <div class="row">
                           <div class="col-md-4">
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <?php echo $row21['DocumentsTitle']; ?>
                              </p>
                           </div>
                           <div class="col-md-2">
                              <?php
                                    $allowed =  array('pdf');
                                    $ext = substr(strrchr($row21['Document'], "."), 1);
                                    if(in_array($ext,$allowed) ) {?>
                                    <a href="internal-audit-pdf.php?doc=<?php echo $row21['InternalAuditID']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                    <?php } ?>          
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row21['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row21['DocumentsSource']; ?>" target="_blank" ><?php echo $row21['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row21['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row21['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row21['SourceLink']; ?>" target="_blank" ><?php echo $row21['SourceLink']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row21['SourceLink']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                        </div>
                        <?php $docnum1 = $docnum1 +1;}} ?>
                        <?php
                           $query21z = mysqli_query($db,$query2z);
                           $docnum1z = $docnum1;
                              while($row21 = mysqli_fetch_array($query21z)){
                               if($row21['DocumentsTitle'] != '' OR $row21['DocumentsLink'] != ''){
                           ?>
                        <div class="row">
                           <div class="col-md-4">
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1z;?>.</i>
                                 <?php echo $row21['DocumentsTitle']; ?>
                              </p>
                           </div>
                           <div class="col-md-2">
                              <?php
                                    $allowed =  array('pdf');
                                    $ext = substr(strrchr($row21['Document'], "."), 1);
                                    if(in_array($ext,$allowed) ) {?>
                                    <a href="internal-audit-pdf.php?doc=<?php echo $row21['InternalAuditID']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                    <?php } ?>            
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row21['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row21['DocumentsSource']; ?>" target="_blank" ><?php echo $row21['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row21['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($row21['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $row21['SourceLink']; ?>" target="_blank" ><?php echo $row21['SourceLink']; ?></a>
                                 <?php }else{?>
                                 <?php echo $row21['SourceLink']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                        </div>
                        <?php $docnum1z = $docnum1z +1;}} ?>
                        <div class="col-md-3">
                           <?php 
                              $numdt1 += mysqli_num_rows(mysqli_query($db, "$query2y1"));
                              if ($numdt1 > 0) {
                              ?>
                           <h5>Youtube Links</h5>
                           <?php }
                              $query21 = mysqli_query($db,$query2);
                              $docnum2 = 1;
                                 while($row21 = mysqli_fetch_array($query21)){
                              ?>
                           <?php if($row21['YoutubeVideoLink'] != ''){?>
                           <p class="mb-2">
                              <a href="<?php echo $row21['YoutubeVideoLink']; ?>" target="_blank">
                              <i class="fa text-primary me-2"><?php if($row21['VideoTitle'] != ''){echo $docnum2.'.';} ?></i>
                              <?php echo $row21['VideoTitle']; ?>
                              </a>
                           </p>
                           <?php } ?>
                           <?php $docnum2 = $docnum2 +1;} ?>
                        </div>
                        <div class="col-md-4">
                           <?php 
                              $numdt3 += mysqli_num_rows(mysqli_query($db, "$query2t1"));
                              if ($numdt3 > 0) {
                              ?>
                           <h5>Training Modules</h5>
                           <?php } 
                              $query21 = mysqli_query($db,$query2);
                              $docnum3 = 1;
                                 while($row21 = mysqli_fetch_array($query21)){
                              ?>
                           <?php if($row21['TrainingModulesLink'] != ''){?>
                           <p class="mb-2">
                              <a href="<?php echo $row21['TrainingModulesLink']; ?>" target="_blank">
                              <i class="fa text-primary me-2"><?php if($row21['TrainingModulesTitle'] != ''){echo $docnum3.'.';} ?></i>
                              <?php echo $row21['TrainingModulesTitle']; ?>
                              </a>
                           </p>
                           <?php } ?>
                           <?php $docnum3 = $docnum3 +1;} ?>
                        </div>
                        <?php if( mysqli_num_rows(mysqli_query($db,$query2)) == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'OrganicNPOP')){?>
                           <h4 class="text-center"><a href="internal-inspection.php" target="_blank">Refer to Internal Inspection</a></h4>
                        <?php } ?>
                        <?php } ?>
                     </div>
                  </form>
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