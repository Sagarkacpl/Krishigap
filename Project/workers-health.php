<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_WH"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_WH");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_WH'</script>";
   }
   include "most_visited_page.php";
   $query11 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN workers_health_safety_welfare_main ON crop.CropId = workers_health_safety_welfare_main.CropId AND workers_health_safety_welfare_main.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['cid'] != '') {
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
     
       if ($_GET['cid'] == '00') {
           $query21 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND DeletedStatus='0'");
           $query21num = mysqli_num_rows($query21);
           $query211 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND DeletedStatus='0'");
           $query2111 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND DeletedStatus='0'");
           $query21num = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND DeletedStatus='0'");
       } else {
           $query21 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND CropId = '$_GET[cid]' AND DeletedStatus='0'");
           $query21num = mysqli_num_rows($query21);
           $query211 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND CropId = '$_GET[cid]' AND DeletedStatus='0'");
           $query2111 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND CropId = '$_GET[cid]' AND DeletedStatus='0'");
           $query21num = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND CropId = '$_GET[cid]' AND DeletedStatus='0'");
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
      <!--            <h1 class="display-3 text-white animated slideInDown">Workers health, safety & welfare</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Workers health, safety & welfare</li>-->
      <!--               </ol>-->
      <!--                <a href='home1.php' class="btn btn-success btn-sm">Go Back</a>-->
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
            <form action="" method="GET">
               <div class="row g-3">
                  <div class="col-md-4">
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
                  <div class="col-md-3">
                     <h5>Standard Category</h5>
                     <div class="form-floating">
                        <select name="sc" class="form-control" required="">
                           <option></option>
                           <option <?php if($_GET['sc'] == 'On Farm Production'){echo "selected";} ?> value="On Farm Production">On Farm Production</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <h5>Crop</h5>
                        <div class="form-floating">
                           <select name="cid" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['cid'] == '00'){echo "selected";} ?> value="00">ALL</option>
                              <?php 
                                 if($query11){
                                 while($row11 = mysqli_fetch_array($query11)){?>
                              <option <?php if($_GET['cid'] == $row11['CropId']){echo "selected";} ?> value="<?php echo $row11['CropId']; ?>"><?php echo $row11['CropName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2" style="margin-top: 15px;">
                     <h5>&nbsp;</h5>
                     <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                  </div>
                  <div class="row g-3" style="margin-top: 0px;">
                     <div class="col-md-2">
                        <h5>&nbsp;</h5>
                        <a href="Workers-Health-Safety-&-Welfare-About.pdf" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                     </div>
                     <!--<div class="col-md-2">-->
                     <!--   <h5>&nbsp;</h5>-->
                     <!--   <a href="workers-health-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                     <!--</div>-->
                  </div>
                  <br>
                  <div id="IndGAP" class="gsww" style="display:none"><?php include ("workers-health-IndG.A.P.php"); ?></div>
                  <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                  <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                  <div id="RainforestAlliance" class="gsww" style="display:none"></div>
               </div>
               <br>
            </form>
            <?php
               if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['cid'] != '') {?>
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
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="row g-3 m-tab">
                     <?php
                        while ($row21num = mysqli_fetch_array($query21num)) {
                            $query3num = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare`  WHERE workers_health_safety_welfare_main_id = '$row21num[workers_health_safety_welfare_main_id]' AND DeletedStatus='0'");
                            while ($row3num = mysqli_fetch_array($query3num)) {
                                $query4num = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare_documents`  WHERE WorkersHealthSafetyWelfareId = '$row3num[WorkersHealthSafetyWelfareId]' AND DeletedStatus='0'");
                                $num = 0;
                                while ($row4num = mysqli_fetch_array($query4num)) {
                                    $num = $num + 1;
                                }
                            }
                        }
                        if ($num > 0) { ?>
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
                     <?php } $docnum = 1;
                        while ($row21 = mysqli_fetch_array($query21)) {
                        $query3 = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare`  WHERE workers_health_safety_welfare_main_id = '$row21[workers_health_safety_welfare_main_id]' AND DeletedStatus='0'");
                                 while ($row3 = mysqli_fetch_array($query3)) {
                        $query4 = mysqli_query($db, "SELECT * FROM `workers_health_safety_welfare_documents`  WHERE WorkersHealthSafetyWelfareId = '$row3[WorkersHealthSafetyWelfareId]' AND DeletedStatus='0'");
                                 while ($row4 = mysqli_fetch_array($query4)) {
                                  if($row4['documents_name'] != ''){
                        ?>
                     <div class="col-md-4">
                        <p class="mb-2" style="overflow-y: auto;">
                           <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                           <?php 
                           $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row4['documents_name'], strpos($row4['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); 
                           $doc_name2 = str_replace("_"," ","$doc_name1");
                           echo $doc_name3 = str_replace("-"," ","$doc_name2");
                           ?>
                        </p>
                     </div>
                     <div class="col-md-2">
                        <?php
                           $allowed =  array('pdf');
                           $ext = pathinfo($row4['documents_name'], PATHINFO_EXTENSION);
                           if(in_array($ext,$allowed) ) {?>
                        <a href="workers-health-pdf.php?doc=<?php echo $row4['workers_health_safety_welfare_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php }else{?>
                        <a href="Workers-Health/<?php echo $row4['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php } ?>              
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row3['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row3['DocumentsSource']; ?>" target="_blank" ><?php echo $row3['DocumentsSource']; ?></a>
                           <?php }else{?>
                           <?php echo $row3['DocumentsSource']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row3['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row3['SourceLink']; ?>" target="_blank" ><?php echo $row3['SourceLink']; ?></a>
                           <?php }else{?>
                           <?php echo $row3['SourceLink']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <?php $docnum = $docnum + 1;}}}} ?>
                  </div>
               </div>
            </div>
            <?php } ?> 
            <?php if($query21num == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'RainforestAlliance')){?>
            <center>
               <p style="font-size: 35px;color: red;">Coming Soon...</p>
            </center>
            <?php } ?>
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