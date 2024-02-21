<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php?page=PHP_FSS");
   }
   include "connection.php";
   if (!in_array('Post Harvest Processing', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=PHP_FSS");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=PHP_FSS'</script>";
   }
   if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['th1'] != '' AND $_GET['od'] != '') {
       if ($_GET['gsw'] == 'ISO22000') {
           $GETgsw = 'ISO 22000';
       }
       if ($_GET['gsw'] == 'FSSC22000') {
           $GETgsw = 'FSSC 22000';
       }
       if ($_GET['gsw'] == 'BRCGlobalStandardPackaging6') {
           $GETgsw = 'BRC Global Standard Packaging 6';
       }
       if ($_GET['gsw'] == 'BRCGlobalStandardFoodSafety9') {
           $GETgsw = 'BRC Global Standard Food Safety 9';
       }
      
       $query2 = mysqli_query($db, "SELECT * from food_safety_standards_php WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND Documents = '$_GET[od]' AND DeletedStatus='0' AND sort != '0' ORDER BY sort ASC");
       $query2num = mysqli_num_rows($query2);
       $query2z = mysqli_query($db, "SELECT * from food_safety_standards_php WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND Documents = '$_GET[od]' AND DeletedStatus='0' AND sort = '0' ORDER BY sort ASC");
       $query2z1 = mysqli_query($db, "SELECT * from food_safety_standards_php WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND Documents = '$_GET[od]' AND DeletedStatus='0' AND sort = '0' ORDER BY sort ASC");
       $query2dt = mysqli_query($db, "SELECT * from food_safety_standards_php WHERE StandardCategory = '$_GET[sc]' AND GAPStandardWise = '$GETgsw'  AND User = '$_GET[th1]' AND Documents = '$_GET[od]' AND DeletedStatus='0' ORDER BY sort ASC");
         
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
      <?php include "navbar.php"; ?>
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Food Safety Standards (Post Harvest Processing)</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="home2.php">Post Harvest Processing</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Food Safety Standards</li>-->
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
                                 <option <?php if ($_GET['gsw'] == 'ISO22000') {echo "selected";} ?> value="ISO22000">ISO 22000</option>
                                 <option <?php if ($_GET['gsw'] == 'FSSC22000') {echo "selected";} ?> value="FSSC22000">FSSC 22000</option>
                                 <option <?php if ($_GET['gsw'] == 'BRCGlobalStandardPackaging6') {echo "selected";} ?> value="BRCGlobalStandardPackaging6">BRC Global Standard Packaging 6</option>
                                 <option <?php if ($_GET['gsw'] == 'BRCGlobalStandardFoodSafety9') {echo "selected";} ?> value="BRCGlobalStandardFoodSafety9">BRC Global Standard Food Safety 9</option>
                              </select>
                           </div>
                        </div>
                        <script type="text/javascript">          
                           $(function() {
                                 $('#gswselector').change(function(){
                                 $('.gsww').hide();
                                 $('.gswww').hide();
                                 $('#' + $(this).val()).show();
                                 });
                             });
                        </script>   
                        <div class="col-md-6">
                           <h5>Standard Category</h5>
                           <div class="form-floating">
                              <select name="sc" class="form-control" required="">
                                 <option></option>
                                 <option <?php if ($_GET['sc'] == 'Post Harvest Processing') {
                                    echo "selected";
                                    } ?> value="Post Harvest Processing">Post Harvest Processing</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>User</h5>
                           <div class="row">
                              <div class="col-md-14">
                                 <div class="form-check m-form-check">
                                    <input <?php if ($_GET['th1'] == 'Farmer Producer Group/Exporter/Processor') {
                                       echo "checked";
                                       } ?> type="checkbox" class="form-check-input" name="th1" id="" value="Farmer Producer Group/Exporter/Processor">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    Farmer Producer Group/Exporter/Processor
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>Documents</h5>
                           <div class="form-floating">
                              <select name="od" class="form-control" required="">
                                 <option></option>
                                 <option <?php if ($_GET['od'] == 'Standard') {
                                    echo "selected";
                                    } ?> value="Standard">Standard</option>
                                 <option <?php if ($_GET['od'] == 'Quality Manual') {
                                    echo "selected";
                                    } ?> value="Quality Manual">Quality Manual</option>
                                 <option <?php if ($_GET['od'] == 'Procedures') {
                                    echo "selected";
                                    } ?> value="Procedures">Procedures</option>
                                 <!--<option  <?php if ($_GET['od'] == 'Work Instructions') { echo "selected"; } ?> value="Work Instructions">Work Instructions</option>-->
                                 <option <?php if ($_GET['od'] == 'Records') {
                                    echo "selected";
                                    } ?> value="Records">Records</option>
                                 <option <?php if ($_GET['od'] == 'Others') {
                                    echo "selected";
                                    } ?> value="Others">Others</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>&nbsp;</h5>
                           <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="food-safety-standards-about_PHP.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="food-safety-standards-related-documents_PHP.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <br>
                        <div class="gswww">
                        </div>
                        <div id="ISO22000" class="gsww" style="display:none"><?php include ("food-safety-standards-ISO22000.php"); ?></div>
                        <div id="FSSC22000" class="gsww" style="display:none"><?php include ("food-safety-standards-FSSC22000.php"); ?></div>
                        <div id="BRCGlobalStandardPackaging6" class="gsww" style="display:none"><?php include ("food-safety-standards-BRCGlobal.php"); ?></div>
                        <div id="BRCGlobalStandardFoodSafety9" class="gsww" style="display:none"><?php include ("food-safety-standards-BRCGlobal.php"); ?></div>
                        <?php if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['th1'] != '' AND $_GET['od'] != '') { ?> 
                         <?php if ($_GET['gsw'] == 'ISO22000') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>International Organization for Standardization: <a href="https://www.iso.org/home.html" target="_blank">www.iso.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'FSSC22000') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Global Food Safety Initiative: <a href="https://mygfsi.com" target="_blank">www.mygfsi.com</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'BRCGlobalStandardPackaging6') { ?> 
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>BRC Global Standards: <a href="https://www.brcgs.com" target="_blank">www.brcgs.com</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'BRCGlobalStandardFoodSafety9') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>BRC Global Standards: <a href="https://www.brcgs.com" target="_blank">www.brcgs.com</a></b></p> 
                        <?php } ?>
                        <?php
                           $FoodSafetyStandardsIds = array();
                           while ($row2 = mysqli_fetch_array($query2)) {
                               $FoodSafetyStandardsIds[] = $row2['FoodSafetyStandardsId'];
                           }
                           $FoodSafetyStandardsIdss = implode(",", $FoodSafetyStandardsIds);
                           $FoodSafetyStandardsIdsz = array();
                           while ($row2z = mysqli_fetch_array($query2z)) {
                               $FoodSafetyStandardsIdsz[] = $row2z['FoodSafetyStandardsId'];
                           }
                           $FoodSafetyStandardsIdssz = implode(",", $FoodSafetyStandardsIdsz);
                           if ($FoodSafetyStandardsIdss != '') {
                               $query3s = mysqli_query($db, "SELECT FoodSafetyStandardsId FROM `food_safety_standards_documents_php`  WHERE FoodSafetyStandardsId IN ($FoodSafetyStandardsIdss) AND DeletedStatus='0'");
                               $num3s = mysqli_num_rows($query3s);
                           }
                           $FoodSafetyStandardsIdsa = array();
                           while ($row2a = mysqli_fetch_array($query2z1)) {
                               $FoodSafetyStandardsIdsa[] = $row2a['FoodSafetyStandardsId'];
                           }
                           $FoodSafetyStandardsIdssa = implode(",", $FoodSafetyStandardsIdsa);
                           if ($FoodSafetyStandardsIdssa != '') {
                               $query3sa = mysqli_query($db, "SELECT FoodSafetyStandardsId FROM `food_safety_standards_documents_php`  WHERE FoodSafetyStandardsId IN ($FoodSafetyStandardsIdssa) AND DeletedStatus='0'");
                               $num3sz = mysqli_num_rows($query3sa);
                           }
                           $num3sall = $num3s + $num3sz;
                           if ($num3sall > 0) {
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
                           $docnum = 1;
                           $array = explode(',', $FoodSafetyStandardsIdss);
                           if ($FoodSafetyStandardsIdss != '') {
                               $documents_namezz = array();
                               foreach ($array as $value) {
                                 $queryzz = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `food_safety_standards_documents_php`  WHERE FoodSafetyStandardsId ='$value' AND DeletedStatus='0' GROUP BY documents_name1");
                                   while ($rowzz = mysqli_fetch_array($queryzz)) {
                                       $documents_namezz[] = $rowzz['documents_name1'];
                                   }
                               }
                               $documents_namezzz = implode(",", $documents_namezz);
                               $array1 = array_unique(explode(',', $documents_namezzz));
                               foreach ($array1 as $value1) {
                                 $query311 = mysqli_query($db, "SELECT * FROM `food_safety_standards_documents_php` WHERE documents_name  LIKE '%$value1%' AND DeletedStatus='0' AND FoodSafetyStandardsId IN ($FoodSafetyStandardsIdss)");
                                   $row311 = mysqli_fetch_assoc($query311);
                                   $food_safety_standards_documents_id1 = $row311['food_safety_standards_documents_id'];
                                   $FoodSafetyStandardsId1 = $row311['FoodSafetyStandardsId'];
                                    $query31 = mysqli_query($db, "SELECT * FROM `food_safety_standards_documents_php` WHERE food_safety_standards_documents_id = '$food_safety_standards_documents_id1' AND DeletedStatus='0'");
                                   $row31 = mysqli_fetch_assoc($query31);
                                   $query32 = mysqli_query($db, "SELECT * FROM `food_safety_standards_php` WHERE FoodSafetyStandardsId = '$FoodSafetyStandardsId1' AND DeletedStatus='0' ORDER BY sort ASC");
                                   $row32 = mysqli_fetch_assoc($query32);
                                   if ($row31['documents_name'] != '') {
                           ?>
                        <div class="col-md-4">
                           <p class="mb-2">
                              <i class="fa text-primary me-2"><?php echo $docnum; ?>.</i>
                              <?php
                                 $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-", "", substr($row31['documents_name'], strpos($row31['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME)));
                                 $doc_name2 = str_replace("_", " ", "$doc_name1");
                                 echo $doc_name3 = str_replace("-", " ", "$doc_name2");
                                 ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <?php
                              $allowed = array('pdf');
                              $ext = pathinfo($row31['documents_name'], PATHINFO_EXTENSION);
                              if (in_array($ext, $allowed)) { ?>
                           <a href="food-safety-standards-pdf_PHP.php?doc=<?php echo $row31['food_safety_standards_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } else { ?>
                           <a href="Food-Safety-Standards_PHP/<?php echo $row31['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } ?>             
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['DocumentsSource'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $row32['DocumentsSource']; ?>" target="_blank" ><?php echo $row32['DocumentsSource']; ?></a>
                              <?php } else { echo $row32['DocumentsSource']; } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['SourceLink'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $row32['SourceLink']; ?>" target="_blank" ><?php echo $row32['SourceLink']; ?></a>
                              <?php
                                 } else { echo $row32['SourceLink']; } ?>
                           </p>
                        </div>
                        <?php $docnum = $docnum + 1; }}} 
                        $arrayz = explode(',', $FoodSafetyStandardsIdssz);
                           if ($FoodSafetyStandardsIdssz != '') {
                               $docnumz = $docnum;
                               $documents_namezz = array();
                               foreach ($arrayz as $valuez) {
                                   $queryzz = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `food_safety_standards_documents_php`  WHERE FoodSafetyStandardsId ='$valuez' AND DeletedStatus='0' GROUP BY documents_name1");
                                   while ($rowzz = mysqli_fetch_array($queryzz)) {
                                       $documents_namezz[] = $rowzz['documents_name1'];
                                   }
                               }
                               $documents_namezzz = implode(",", $documents_namezz);
                               $array1 = array_unique(explode(',', $documents_namezzz));
                               foreach ($array1 as $value1) {
                                   $query311 = mysqli_query($db, "SELECT * FROM `food_safety_standards_documents_php` WHERE documents_name  LIKE '%$value1%' AND DeletedStatus='0' AND FoodSafetyStandardsId IN ($FoodSafetyStandardsIdssz)");
                                   $row311 = mysqli_fetch_assoc($query311);
                                   $food_safety_standards_documents_id1 = $row311['food_safety_standards_documents_id'];
                                   $FoodSafetyStandardsId1 = $row311['FoodSafetyStandardsId'];
                                   $query31 = mysqli_query($db, "SELECT * FROM `food_safety_standards_documents_php` WHERE food_safety_standards_documents_id = '$food_safety_standards_documents_id1' AND DeletedStatus='0'");
                                   $row31 = mysqli_fetch_assoc($query31);
                                   $query32 = mysqli_query($db, "SELECT * FROM `food_safety_standards_php` WHERE FoodSafetyStandardsId = '$FoodSafetyStandardsId1' AND DeletedStatus='0' ORDER BY sort ASC");
                                   $row32 = mysqli_fetch_assoc($query32);
                                   if ($row31['documents_name'] != '') {
                           ?>
                        <div class="col-md-4">
                           <p class="mb-2">
                              <i class="fa text-primary me-2"><?php echo $docnumz; ?>.</i>
                              <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-", "", substr($row31['documents_name'], strpos($row31['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <?php
                              $allowed = array('pdf');
                              $ext = pathinfo($row31['documents_name'], PATHINFO_EXTENSION);
                              if (in_array($ext, $allowed)) { ?>
                           <a href="food-safety-standards-pdf_PHP.php?doc=<?php echo $row31['food_safety_standards_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } else { ?>
                           <a href="Food-Safety-Standards_PHP/<?php echo $row31['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } ?>             
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['DocumentsSource'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $row32['DocumentsSource']; ?>" target="_blank" ><?php echo $row32['DocumentsSource']; ?></a>
                              <?php } else { echo $row32['DocumentsSource']; } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;">
                              <?php if (!filter_var($row32['SourceLink'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $row32['SourceLink']; ?>" target="_blank" ><?php echo $row32['SourceLink']; ?></a>
                              <?php } else { echo $row32['SourceLink']; } ?>
                           </p>
                        </div>
                        <?php $docnumz = $docnumz + 1; }}}} ?>
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