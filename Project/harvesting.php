<?php
   session_start();
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    if($_GET['page'] != ''){
       header("Location: login.php?page=$_GET[page]"); 
    }else{
      header("Location: login.php?page=OFP_H"); 
    }
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_H");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_H'</script>";
   }
  //  include "most_visited_page.php";
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN harvesting ON crop.CropId = harvesting.Crop AND harvesting.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['th1'] != '' AND $_GET['crp'] != '') {
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
    //   if ($_GET['gsw'] == 'FairtradeInternational') {
    //       $GETgsw = 'Fairtrade International';
    //   }
    //   if ($_GET['gsw'] == 'RainforestAlliance') {
    //       $GETgsw = 'Rainforest Alliance';
    //   }
       if ($_GET['crp'] == '00') {
           $query2 = mysqli_query($db, "SELECT * from harvesting WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND DeletedStatus='0' ORDER BY HarvestingId ASC");
           $query2num = mysqli_num_rows($query2);
           $query2dt = mysqli_query($db, "SELECT * from harvesting WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND DeletedStatus='0' ORDER BY HarvestingId ASC");
       } else {
           $query2 = mysqli_query($db, "SELECT * from harvesting WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND User = '$_GET[th1]' AND DeletedStatus='0' ORDER BY HarvestingId ASC");
           $query2num = mysqli_num_rows($query2);
           $query2dt = mysqli_query($db, "SELECT * from harvesting WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND User = '$_GET[th1]' AND DeletedStatus='0' ORDER BY HarvestingId ASC");
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
      <!--            <h1 class="display-3 text-white animated slideInDown">Harvest and Post Harvest</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Harvest and Post Harvest</li>-->
      <!--               </ol>-->
      <!--                <a class="btn btn-success btn-sm" href="home1.php">Go Back</a>-->
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
                        <div class="col-md-6">
                           <h5>Standard</h5>
                           <div class="form-floating">
                              <select id="gswselector" name="gsw" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNPOP'){echo "selected";} ?> value="OrganicNPOP">Organic NPOP</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNOP'){echo "selected";} ?> value="OrganicNOP">Organic NOP</option>
                                 <!--<option <?php if($_GET['gsw'] == 'FairtradeInternational'){echo "selected";} ?> value="FairtradeInternational">Fairtrade International</option>-->
                                 <!--<option <?php if($_GET['gsw'] == 'RainforestAlliance'){echo "selected";} ?> value="RainforestAlliance">Rainforest Alliance</option>-->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <h5>Standard Category</h5>
                           <div class="form-floating">
                              <select name="sc" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['sc'] == 'On Farm Production'){echo "selected";} ?> value="On Farm Production">On Farm Production</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <h5>Harvest and Post Harvest</h5>
                           <div class="form-floating">
                              <select name="crp" id="scselector" class="form-control" required="" id="lang">
                                 <option></option>
                                 <option <?php if($_GET['crp'] == 'Harvest'){echo "selected";} ?>  value="Harvest">Harvest</option>
                                 <option <?php if($_GET['crp'] == '00'){echo "selected";} ?> value="00">Post Harvest</option>
                                                                  <!--<option  value="20">Banana</option>-->
                                                                  <!--<option  value="62">Bengal Gram</option>-->
                                                                  <!--<option  value="32">Chilli</option>-->
                                                                  <!--<option  value="7">Cotton</option>-->
                                                                  <!--<option  value="1">Grape</option>-->
                                                                  <!--<option  value="65">Jowar</option>-->
                                                                  <!--<option  value="13">Maize</option>-->
                                                                  <!--<option  value="67">Mandarin</option>-->
                                                                  <!--<option  value="36">Mustard  </option>-->
                                                                  <!--<option  value="11">Paddy</option>-->
                                                                  <!--<option  value="16">Potato</option>-->
                                                                  <!--<option  value="26">Sesame</option>-->
                                                                  <!--<option  value="51">Soybean</option>-->
                                                                  <!--<option  value="29">Sunflower</option>-->
                                                                  <!--<option  value="25">Wheat</option>-->
                                                               </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>User</h5>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-check m-form-check">
                                    <input <?php if($_GET['th1'] == 'Farmer Producer Group/Exporter'){echo "checked";} ?> type="checkbox" class="form-check-input" name="th1" id="" value="Farmer Producer Group/Exporter" required="">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Farmer Producer Group/Exporter
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <button class="btn btn-primary w-100 py-3" type="submit" id="searchButton">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="harvesting-about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="harvesting-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                         <div style="margin-top: 25px;">
                      <p><b>HARVEST</b></p>
                           <p>1. Harvest of horticultural produce at right stage of maturity is very essential to maintain
quality ,r maximum returns and for attaining the longest post-harvest life</p>
 <p>2. Importance of maturity indices:</p>
 <li style="margin-left: 15px;">Ensure sensory quality (flavor, color, aroma, texture) and nutritional quality.</li>
  <li style="margin-left: 15px;">Ensure an adequate postharvest shelf life.</li>
   <li style="margin-left: 15px;margin-bottom: 10px;">Scheduling of harvest and packing operations</li>

  <p>3. Delayed harvesting of fruit and vegetables can increase higher susceptibility to decay,
resulting in higher postharvest loss.</p>
<p><b>Post-Harvest</b></p>
                           <p>1. Proper post-harvest care can add value and provide benefit to the producers and
consumers and maintain freshness, nutrient content, taste and quality.</p>
 <p>2. Both quantitative and qualitative losses occur at all stages in the post-harvest handling
system of perishables (harvesting, handling, packing, storage and transportation).</p>
                        </div>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>
                        <p style="text-align:center;margin-top: 0px !important;"><b>USDA Agricultural Marketing Service: <a href="https://www.ams.usda.gov" target="_blank">www.ams.usda.gov</a></b></p>
                        <div id="IndGAP" class="gsww" style="display:none"><?php include ("harvesting-IndG.A.P.php"); ?></div>
                        <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                        <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                        <div id="RainforestAlliance" class="gsww" style="display:none"></div>
                        <div class="clearfix"></div>
                        <?php if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['th1'] != '' AND $_GET['crp'] != '') {?>             <?php
                           $HarvestingIds = array();
                           while ($row2 = mysqli_fetch_array($query2)) {
                           $HarvestingIds[] = $row2['HarvestingId'];
                           }
                           $HarvestingIdss = "'" . implode ( "', '", $HarvestingIds ) . "'";
                           if($HarvestingIdss != ''){
                           $query3s = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `harvesting_documents`  WHERE HarvestingId IN ($HarvestingIdss) AND DeletedStatus='0' GROUP BY documents_name1;");
                           $num3s = mysqli_num_rows($query3s);  
                           if ($num3s > 0) {
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
                        <?php
                           }
                           $docnum = 1;
                               $query3 = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `harvesting_documents`  WHERE HarvestingId IN ($HarvestingIdss) AND DeletedStatus='0' GROUP BY documents_name1;");
                               while ($row3 = mysqli_fetch_array($query3)) {
                           $documents_name1 = $row3['documents_name1'];
                            $query311 = mysqli_query($db, "SELECT * FROM `harvesting_documents` WHERE documents_name  LIKE '%$documents_name1%' AND DeletedStatus='0' AND HarvestingId IN ($HarvestingIdss)");
                                 $row311 = mysqli_fetch_assoc($query311);
                                 $harvesting_documents_id1 = $row311['harvesting_documents_id'];
                                 $harvesting_documentsid1 = $row311['HarvestingId'];
                                 $query31 = mysqli_query($db, "SELECT * FROM `harvesting_documents` WHERE harvesting_documents_id = '$harvesting_documents_id1' AND DeletedStatus='0'");
                                 $row31 = mysqli_fetch_assoc($query31);
                                 $query32 = mysqli_query($db, "SELECT * FROM `harvesting` WHERE HarvestingId = '$harvesting_documentsid1' AND DeletedStatus='0'");
                                 $row32 = mysqli_fetch_assoc($query32);
                                 if($row31['documents_name'] != ''){
                           ?>
                        <div class="col-md-4">
                           <p class="mb-2">
                              <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                           <?php 
                           $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row31['documents_name'], strpos($row31['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); 
                           $doc_name2 = str_replace("_"," ","$doc_name1");
                           echo $doc_name3 = str_replace("-"," ","$doc_name2");
                           ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <?php
                              $allowed =  array('pdf');
                              $ext = pathinfo($row31['documents_name'], PATHINFO_EXTENSION);
                              if(in_array($ext,$allowed) ) {?>
                           <a href="harvesting-pdf.php?doc=<?php echo $row31['harvesting_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php }else{?>
                           <a href="Harvesting/<?php echo $row31['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } ?>             
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row32['DocumentsSource']; ?>" target="_blank" ><?php echo $row32['DocumentsSource']; ?></a>
                              <?php }else{?>
                              <?php echo $row32['DocumentsSource']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row32['SourceLink']; ?>" target="_blank" ><?php echo $row32['SourceLink']; ?></a>
                              <?php }else{?>
                              <?php echo $row32['SourceLink']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <?php $docnum = $docnum + 1;}}}}?>
                        <!-- <?php if($query2num == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'RainforestAlliance')){?>
                        <center>
                           <p style="font-size: 35px;color: red;">Coming Soon...</p>
                        </center>
                        <?php } ?> -->
                     </div>
                  </form>
               </div>
               <div id="messageContainer"></div>
                <?php if($_GET['crp'] == 'Harvest') {?>
                <h3 class="text-center"><a href="Package-of-practices.php" target="_blank">Refer to Package of Practices</a></h3>
               <?php } ?>
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
      <script>
          $(document).ready(function() {
  $('#searchButton').click(function() {
    var selectedValue = $('#scselector').val();
    
    if (selectedValue === 'Harvest') {
      var message = '<h3 class="text-center"><a href="Package-of-practices.php" target="_blank">Refer to Package of Practices</a></h3>';
      $('#messageContainer').html(message);
    } else {
      $('#messageContainer').empty();
    }
  });
});

      </script>
   </body>
</html>