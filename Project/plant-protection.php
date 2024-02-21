<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_PPP");
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_PPP");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_PPP'</script>";
   }
   include "most_visited_page.php";
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN plant_protection_products ON crop.CropId = plant_protection_products.CropId AND plant_protection_products.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['gsw'] == 'IndGAP') {
       $GETgsw = 'IndG.A.P';
   }
   if ($_GET['gsw'] == 'GLOBALGAP') {
       $GETgsw = 'GLOBALG.A.P';
   }
   
   if ($_GET['stype'] == 'second' AND $_GET['ct2'] != '' AND $_GET['ps'] != '') {
       if ($_GET['ps'] == '00') {
           $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID1 = '$_GET[ct2]' AND DeletedStatus = '0'");
           $querynu = mysqli_num_rows($query);
           $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID1 = '$_GET[ct2]' AND DeletedStatus = '0'");
       } else {
           $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID1 = '$_GET[ct2]' AND PesticideStatus = '$_GET[ps]' AND DeletedStatus = '0'");
           $querynu = mysqli_num_rows($query);
           $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID1 = '$_GET[ct2]' AND PesticideStatus = '$_GET[ps]' AND DeletedStatus = '0'");
       }
   }
   if ($_GET['stype'] == 'first' AND $_GET['gsw'] != '' AND $_GET['ct'] != '' AND $_GET['crp'] != '' AND $_GET['cid'] != '') {
      
       if ($_GET['pmt'] == 'Permitted') {
           if ($_GET['crp'] == '00' AND $_GET['cid'] == '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
           } elseif ($_GET['crp'] == '00' AND $_GET['cid'] != '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
           } elseif ($_GET['crp'] != '00' AND $_GET['cid'] == '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
           } else {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND Permitted = '$_GET[pmt]' AND GAPStandardWise = '$GETgsw'");
           }
       } else {
           if ($_GET['crp'] == '00' AND $_GET['cid'] == '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
           } elseif ($_GET['crp'] == '00' AND $_GET['cid'] != '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
           } elseif ($_GET['crp'] != '00' AND $_GET['cid'] == '00') {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
           } else {
               $query = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
               $querynu = mysqli_num_rows($query);
               $querynum = mysqli_query($db, "SELECT * from plant_protection_products where CountryID = '$_GET[ct]' AND CropId = '$_GET[crp]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0' AND GAPStandardWise = '$GETgsw'");
           }
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
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown">Plant protection products</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Plant protection products</li>-->
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
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container">
            <div class="row g-4">
               <form action="" method="GET">
                  <input type="hidden" name="stype" value="first">
                  <div class="row g-3" style="border: 1px solid #6c757dad;padding: 10px;">
                     <div class="col-md-4">
                        <h5>Standard</h5>
                        <div class="form-floating">
                           <select id="gswselector" name="gsw" class="form-control" required="">
                              <option></option>
                                 <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
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
                     <div class="col-md-4">
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
                     <div class="col-md-4">
                        <h5>Category</h5>
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
                     <div class="col-md-4">
                        <h5>&nbsp;</h5>
                        <div class="form-check m-form-check">
                           <input <?php if($_GET['pmt'] == 'Permitted'){echo "checked";}  ?> name="pmt" type="checkbox" class="form-check-input" id="" value="Permitted">
                           <label class="form-check-label" for="flexRadioDefault3">
                           Permitted 
                           </label>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button style="margin-top: 31px;" class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                     </div>
                  </div>
               </form>
               <br><br>
               <form action="" method="GET">
                  <div class="row g-3" style="border: 1px solid #6c757dad;padding: 10px;">
                     <input type="hidden" name="stype" value="second">
                     <div class="col-md-4">
                        <h5>Country</h5>
                        <div class="form-floating">
                           <select id="country" name="ct2" class="form-control" required="">
                              <option></option>
                              <?php 
                                 $query113 = mysqli_query($db,"SELECT * from countries ORDER BY CountryName");
                                        if($query113){
                                        while($row113 = mysqli_fetch_array($query113)){?>
                              <option <?php if($_GET['ct2'] == $row113['CountryID']){echo "selected";}  ?> value="<?php echo $row113['CountryID']; ?>"><?php echo $row113['CountryName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <h5>Pesticide Status</h5>
                        <div class="form-floating">
                           <select name="ps" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['ps'] == '00'){echo "selected";}  ?> value="00">ALL</option>
                              <option <?php if($_GET['ps'] == 'Banned'){echo "selected";}  ?> value="Banned">Banned</option>
                              <option <?php if($_GET['ps'] == 'Restricted'){echo "selected";}  ?> value="Restricted">Restricted</option>
                              <option <?php if($_GET['ps'] == 'Registered'){echo "selected";}  ?> value="Registered">Registered</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <button style="margin-top: 31px;" class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                     </div>
                  </div>
               </form>
               <br>
               <div class="row g-3">
                  <div class="col-md-2">
                     <a href="Plant-Protection-Products-About.pdf" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                  </div>
                  <div class="col-md-2">
                     <a href="plant-protection-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>
                  </div>
                  <div class="col-md-2">
                     <a href="plant-protection-mrls-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">MRLs Documents</a>
                  </div>
                  <div class="col-md-3">
                     <a href="plant-protection-laboratories-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Laboratories Documents</a>
                  </div>
               </div>
               <div style="margin-top: 25px;">
                           <p><b>IMPORTANT POINTS TO BE KEPT IN MIND</b><br>This is very important section to be carefully reviewed, understood and implemented by the farmers and farmer groups<br>1. Key compliances include using permitted crop protection products (CPPs,), following label recommendations and MRLs both in the domestic market and also country of export destination.<br>2. Central Insecticide Board, Ministry of Agriculture & Farmers welfare, Govt of India, is the registering authority in India and publishes registered, permitted, banned and restricted list of products.<br>3. For additional guidance also go through the package of practices published by Institutions under Indian Council of Agricultural Research and Agricultural Universities and State agricultural departments.<br>4. In case you are exporting to another country, then you need to find out the details of regulatory agency which handles plant protection activity and comply with those regulations.<br>5. Selection of NABL accredited  lab for the related scope for residue analysis is to be kept in mind.<br>6. Workers to be trained  and protective gear to be ensured while handling the PPPs.<br>7. Storage conditions and disposal of surplus mix and containers to be handled as per label recommendations.<br>8. Krishi GAP made efforts in collecting the information to the extent available and uploaded into the platform. Always refer to the Central Insecticides Board for updates, correct information for India and relevant institutions for the countries of export .  Refer to our Disclaimer Policy.</p>
                        </div>
               </form>
               <?php if ($_GET['stype'] == 'first' AND $_GET['ct'] != '' AND $_GET['crp'] != '' AND $_GET['cid'] != '') { ?>
                <?php if ($_GET['gsw'] == 'IndGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Quality Council of India: <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'GLOBALGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>GlobalG.A.P: <a href="https://www.globalgap.org/uk_en" target="_blank">www.globalgap.org</a></b></p> 
                        <?php } ?> 
               <div class="row g-4">
                  <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="row g-3 m-tab">
                        <?php
                           while ($rownum = mysqli_fetch_array($querynum)) {
                                       $num = $num + 1;
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
                        <?php } 
                           $docnum = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                      if($row['DocumentName'] != ''){
                           ?>
                        <div class="col-md-4">
                           <p class="mb-2" style="overflow-y: auto;">
                              <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                              <?php
                              $doc_name22 = str_replace("_"," ","$row[DocumentName]");
                              echo $doc_name33 = str_replace("-"," ","$doc_name22");
                           ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <a href="plant-protection-pdfs.php?doc=<?php echo $row['plant_protection_product_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>             
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row['DocumentSource'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row['DocumentSource']; ?>" target="_blank" ><?php echo $row['DocumentSource']; ?></a>
                              <?php }else{?>
                              <?php echo $row['DocumentSource']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row['DocumentLink'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row['DocumentLink']; ?>" target="_blank" ><?php echo $row['DocumentLink']; ?></a>
                              <?php }else{?>
                              <?php echo $row['DocumentLink']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <?php $docnum = $docnum + 1;}} ?>
                     </div>
                  </div>
               </div>
               <?php } ?> 
               <?php if ($_GET['stype'] == 'second' AND $_GET['ct2'] != '' AND $_GET['ps'] != '') { ?>
               <div class="row g-4">
                  <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="row g-3 m-tab">
                        <?php
                           while ($rownum = mysqli_fetch_array($querynum)) {
                                       $num = $num + 1;
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
                        <?php } 
                           $docnum = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    if($row['DocumentName1'] != ''){
                           ?>
                        <div class="col-md-4">
                           <p class="mb-2" style="overflow-y: auto;">
                              <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                              <?php
                              $doc_name2 = str_replace("_"," ","$row[DocumentName1]");
                              echo $doc_name3 = str_replace("-"," ","$doc_name2");
                           ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <a href="plant-protection-pdf.php?doc=<?php echo $row['plant_protection_product_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>             
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row['DocumentSource1'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row['DocumentSource1']; ?>" target="_blank" ><?php echo $row['DocumentSource1']; ?></a>
                              <?php }else{?>
                              <?php echo $row['DocumentSource1']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row['DocumentLink1'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row['DocumentLink1']; ?>" target="_blank" ><?php echo $row['DocumentLink1']; ?></a>
                              <?php }else{?>
                              <?php echo $row['DocumentLink1']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <?php $docnum = $docnum + 1;}} ?>
                     </div>
                  </div>
               </div>
               <?php } ?> 
               <?php if($querynu == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'RainforestAlliance')){?>
               <center>
                  <p style="font-size: 35px;color: red;">Coming Soon...</p>
               </center>
               <?php } ?>
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