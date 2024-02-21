<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_POP"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //  header("Location: login.php?page=OFP_POP"); 
     echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_POP'</script>";
   }
   include "most_visited_page.php";
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN package_of_practices ON crop.CropId = package_of_practices.CropId AND package_of_practices.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['sw'] != '' AND $_GET['crp'] != '' AND $_GET['ct'] != '' AND $_GET['st'] != '') {
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
       
       if ($_GET['crp'] == '00' AND $_GET['st'] == '00') {
           $query_edit = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
           $query_editnum = mysqli_num_rows($query_edit);
           $query_edit1 = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
           $query_edit1z = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
       } elseif ($_GET['crp'] == '00' AND $_GET['st'] != '00') {
           $query_edit = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
           $query_editnum = mysqli_num_rows($query_edit);
           $query_edit1 = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
           $query_edit1z = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
       } elseif ($_GET['crp'] != '00' AND $_GET['st'] == '00') {
           $query_edit = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
           $query_editnum = mysqli_num_rows($query_edit);
           $query_edit1 = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
           $query_edit1z = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
       } else {
           $query_edit = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
           $query_editnum = mysqli_num_rows($query_edit);
           $query_edit1 = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
           $query_edit1z = mysqli_query($db, "SELECT * from package_of_practices where GAPStandardWise = '$GETgsw' AND SeasonWiseID = '$_GET[sw]' AND CropId = '$_GET[crp]' AND CountryID = '$_GET[ct]' AND StateID = '$_GET[st]' AND DeletedStatus = '0'");
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
      <?php include "navbar.php";?>
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown">Package of practices</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Package of practices</li>-->
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
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
         <div class="container">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
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
                        <div class="col-md-4">
                           <h5>Season Wise</h5>
                           <div class="form-floating">
                              <select name="sw" class="form-control" required="">
                                 <option></option>
                                 <?php 
                                    $query112 = mysqli_query($db,"SELECT * from seasonwise ORDER BY SeasonWiseName");
                                            if($query112){
                                            while($row112 = mysqli_fetch_array($query112)){?>
                                 <option <?php if($_GET['sw'] == $row112['SeasonWiseID']){echo "selected";}  ?> value="<?php echo $row112['SeasonWiseID']; ?>"><?php echo $row112['SeasonWiseName']; ?></option>
                                 <?php }} ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>Country </h5>
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
                        <div class="col-md-4">
                           <h5>State </h5>
                           <div class="form-floating">
                              <select id="state" name="st" class="form-control" required>
                                 <?php 
                                    if($_GET['ct'] == '102'){?>
                                 <option <?php if($_GET['st'] == '00'){echo "selected";}  ?> value="00">Select ALL</option>
                                 
                                 <?php
                                    
                                    }else{
                                                                      echo '<option>State not available</option>';
                                                                      } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <h5>Crop </h5>
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
                        <div class="col-md-2">
                           <button style="margin-top: 30px;" class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="Package-of-Practices-About.pdf" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="Package-of-practices-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <div style="margin-top: 25px;">
                           <p><b>IMPORTANT POINTS TO BE KEPT IN MIND</b><br>1. Package of Practices ( POP ) broadly covers all the activities from site management to  harvesting stage. It may differ for Kharif and Rabi seasons and vary from region to region.<br>2. It is most important to obtain a copy of this document as applicable to the crop as many requirements of the GAP standards can be linked to these practices for compliance and demonstration by the implementer during internal inspections/internal audits and external inspections.<br>3. POPs developed by the Indian Council of Agricultural Research Institutions, Agricultural Universities and State Agricultural Departments are good references.<br>4. Krishi GAP  made efforts in  collecting the POPs for many crops and uploaded  and it will be a continuous process.</p>
                        </div>
                        <div id="IndGAP" class="gsww" style="display:none"><?php include ("Package-of-practices-IndG.A.P.php"); ?></div>
                        <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                        <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                        <div id="RainforestAlliance" class="gsww" style="display:none"></div>
                        <div class="clearfix"></div>
                        <?php if ($_GET['sw'] != '' AND $_GET['crp'] != '' AND $_GET['ct'] != '' AND $_GET['st'] != '') { ?>
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
                           $docnum1 = 1;
                           $PackageOfPracticesIds = array();
                           $PackageOfPracticesIdsz = array();
                           while ($rowedt1 = mysqli_fetch_array($query_edit1)) {
                           $PackageOfPracticesIds[] = $rowedt1['PackageOfPracticesId'];
                           }
                           $PackageOfPracticesId1 = "'" . implode ( "', '", $PackageOfPracticesIds ) . "'";
                            while ($rowedt1z = mysqli_fetch_array($query_edit1z)) {
                           $PackageOfPracticesIdsz[] = $rowedt1z['PackageOfPracticesId'];
                           }
                           $PackageOfPracticesId1z = implode ( ",", $PackageOfPracticesIdsz );
                           if($PackageOfPracticesId1z != ''){
                           $dicid = array();
                           $queryzz11 = mysqli_query($db, "SELECT * from package_of_practices_documents where PackageOfPracticesId IN ($PackageOfPracticesId1z) AND DeletedStatus='0' ORDER BY package_of_practices_documentsId ASC");
                            while($rowzz11 = mysqli_fetch_array($queryzz11)){
                           $dicid[] = $rowzz11['package_of_practices_documentsId'];
                           }
                           $dicid1 = implode ( ",", $dicid );
                           $queryzz111 = mysqli_query($db, "SELECT * from package_of_practices_documents where package_of_practices_documentsId IN ($dicid1) AND DeletedStatus='0'");
                           $rowzz111 = mysqli_num_rows($queryzz111);
                           $queryd1 = mysqli_query($db, "SELECT DISTINCT DocumentsSource,SourceLink from package_of_practices_documents WHERE PackageOfPracticesId  IN ($PackageOfPracticesId1) AND DeletedStatus='0' ORDER BY DocumentTitle");
                           if($rowzz111 > 0){?>
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
                        <?php }?>
                        <?php
                           $docnum1z = 1;
                              $array = explode(',', $PackageOfPracticesId1z); 
                              foreach($array as $value) {
                              $queryzz = mysqli_query($db, "SELECT * from package_of_practices_documents where PackageOfPracticesId='$value' AND DeletedStatus='0' ORDER BY package_of_practices_documentsId ASC");
                                while($rowzz = mysqli_fetch_array($queryzz)){
                               $queryzzz = mysqli_query($db, "SELECT * from package_of_practices_documents_videos where package_of_practices_documentsId='$rowzz[package_of_practices_documentsId]' AND DeletedStatus='0' ORDER BY package_of_practices_documents_video_id ASC");
                                              while($rowzzz = mysqli_fetch_array($queryzzz)){
                                if($rowzzz['VideoName'] != ''){
                                  $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($rowzzz['VideoName'], strpos($rowzzz['VideoName'], '-DOC-') + 1)), PATHINFO_FILENAME))); 
                                    $doc_name2 = str_replace("_"," ","$doc_name1");
                                    $doc_name3 = str_replace("-"," ","$doc_name2");
                              ?> 
                        <div class="row">
                           <div class="col-md-4">
                              <p class="mb-2">
                                 <i class="fa text-primary me-2"><?php echo $docnum1z;?>.</i>
                                 <?php echo $doc_name3; ?>
                              </p>
                           </div>
                           <div class="col-md-2">
                              <a href="Package-Of-Practices/<?php echo $rowzzz['VideoName']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>            
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($rowzz['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $rowzz['DocumentsSource']; ?>" target="_blank" ><?php echo $rowzz['DocumentsSource']; ?></a>
                                 <?php }else{?>
                                 <?php echo $rowzz['DocumentsSource']; ?>
                                 <?php } ?>
                              </p>
                           </div>
                           <div class="col-md-3">
                              <p style="overflow-y: auto;">
                                 <?php if (!filter_var($rowzz['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                 <a href="<?php echo $rowzz['SourceLink']; ?>" target="_blank" ><?php echo $rowzz['SourceLink']; ?></a>
                                 <?php }else{?>
                                 <a href='<?php echo $rowzz['SourceLink']; ?>' target='_blank'><?php echo $rowzz['SourceLink']; ?></a>
                                 <?php } ?>
                              </p>
                           </div>
                        </div>
                        <?php
                           $docnum1z = $docnum1z + 1; }}}}}?>
                        <?php } ?>
                        <?php if($query_editnum == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'RainforestAlliance')){?>
                        <center>
                           <p style="font-size: 35px;color: red;">Coming Soon...</p>
                        </center>
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
      <script src="js/jquery.min.js"></script>
      <script src="js/main.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
         $('#country').on('change',function(){
             var countryID = $(this).val();
             if(countryID){
                 $.ajax({
                     type:'POST',
                     url:'statelist.php',
                     data:'country_id='+countryID,
                     success:function(html){
                         $('#state').html(html); 
                     }
                 }); 
             }
         });  
         });
      </script>   
   </body>
</html>