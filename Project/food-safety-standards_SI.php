<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php?page=SI_FSS");
   }
   include "connection.php";
   if (!in_array('Sustainable Initiatives', explode(',',$_SESSION["PlanDetails"]))) {
      
    //   header("Location: login.php?page=SI_FSS");
        echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=SI_FSS'</script>";
   }
   include "most_visited_page.php";
  

   if ($_GET['sc'] != '' AND $_GET['gsw'] != '' AND $_GET['th1'] != '' AND $_GET['od'] != '')
   {
    $gsw = $_GET['gsw'];
    $sc = $_GET['sc'];
    $th1 = $_GET['th1'];
    $od = $_GET['od'];
    $select = "SELECT D.* , S.* FROM food_safety_standards_si S INNER JOIN food_safety_standards_documents_si D ON S.FoodSafetyStandardsId = D.FoodSafetyStandardsId WHERE S.StandardCategory='$sc' AND S.GAPStandardWise='$gsw' AND S.Documents='$od' AND S.User='$th1' AND S.DeletedStatus='0'";
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
      <?php include "navbar.php"; ?>
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Standards (Sustainable Initiatives)</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="home3.php">Sustainable Initiatives</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Standards</li><br>-->
      <!--               </ol>-->
      <!--               <a href='home3.php' class="btn btn-success btn-sm">Go Back</a>-->
      <!--            </nav>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <div class="container-fluid p-0 mb-5">
          <img class="img-fluid" src="img/banner7-1.jpg" alt="" style="width:100%">
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
                                <option <?php if ($_GET['gsw'] == 'ISO 14001- Environment') {echo "selected";} ?> value="ISO 14001- Environment">ISO 14001- Environment</option>
                                <option <?php if ($_GET['gsw'] == 'ISO 50001- Energy Management') {echo "selected";} ?> value="ISO 50001- Energy Management">ISO 50001- Energy Management</option>
                                <option <?php if ($_GET['gsw'] == 'ISO 45001 OH&S Mgt Systems') {echo "selected";} ?> value="ISO 45001 OH&S Mgt Systems">ISO 45001 OH & S Mgt Systems</option>
                                <option <?php if ($_GET['gsw'] == 'SA 8000- Social Accountability') {echo "selected";} ?> value="SA 8000- Social Accountability">SA 8000- Social Accountability</option>
                                <option <?php if ($_GET['gsw'] == 'Rainforest Alliance') {echo "selected";} ?> value="Rainforest Alliance">Rainforest Alliance</option>
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
                                 <option <?php if ($_GET['sc'] == 'Sustainable Initiatives') {
                                    echo "selected";
                                    } ?> value="Sustainable Initiatives">Sustainable Initiatives</option>
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
                           <button class="btn btn-primary w-100 py-3" type="submit" name="show">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="food-safety-standards-about_SI.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="food-safety-standards-related-documents_SI.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <br>
                        <div class="gswww">
                        </div>
                        <div id="ISO22000" class="gsww" style="display:none"><?php include ("food-safety-standards-ISO22000.php"); ?></div>
                        <div id="FSSC22000" class="gsww" style="display:none"><?php include ("food-safety-standards-FSSC22000.php"); ?></div>
                        <div id="BRCGlobal" class="gsww" style="display:none"><?php include ("food-safety-standards-BRCGlobal.php"); ?></div>                    
                         <?php if ($_GET['gsw'] == 'ISO 14001 Environment') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>International Organization for Standardization: <a href="https://www.iso.org/home.html" target="_blank">www.iso.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'ISO 50001 Energy Management') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>International Organization for Standardization: <a href="https://www.iso.org/home.html" target="_blank">www.iso.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'ISO 45001 OH and S Mgt') { ?> 
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>International Organization for Standardization: <a href="https://www.iso.org/home.html" target="_blank">www.iso.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'SA 8000 Social Accounting') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Social Accountability International: <a href="https://sa-intl.org" target="_blank">www.sa-intl.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'Rainforest Alliance') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Rainforest Alliance: <a href="https://www.rainforest-alliance.org" target="_blank">www.rainforest-alliance.org</a></b></p> 
                        <?php }
                        if(mysqli_num_rows($exe) > 0){
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
                           $exe = mysqli_query($db,$select);
                           $count =1;
                           while ($read = mysqli_fetch_assoc($exe)) {
                              
                        ?>
                       <div class="col-md-4">
                           <p class="mb-2">
                              <i class="fa text-primary me-2"><?php echo $count; ?>.</i>
                              <?php 
                                 $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-", "", substr($read['documents_name'], strpos($read['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME)));
                                 $doc_name2 = str_replace("_", " ", "$doc_name1");
                                 echo $doc_name3 = str_replace("-", " ", "$doc_name2");
                              ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                        <?php
                              $allowed = array('pdf');
                              $ext = pathinfo($read['documents_name'], PATHINFO_EXTENSION);
                              if (in_array($ext, $allowed)) { ?>
                           <a href="food-safety-standards-pdf_SI.php?doc=<?php echo $read['food_safety_standards_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } else { ?>
                           <a href="Food-Safety-Standards_SI/<?php echo $read['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } ?>            
                        </div>
                        <div class="col-md-3">
                           <?php if (!filter_var($read['DocumentsSource'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $read['DocumentsSource']; ?>" target="_blank" ><?php echo $read['DocumentsSource']; ?></a>
                              <?php } else { echo $read['DocumentsSource']; } ?>
                        </div>
                        <div class="col-md-3">
                         <?php if (!filter_var($read['SourceLink'], FILTER_VALIDATE_URL) === false) { ?>
                              <a href="<?php echo $read['SourceLink']; ?>" target="_blank" ><?php echo $read['SourceLink']; ?></a>
                              <?php
                                 } else { echo $read['SourceLink']; } ?>
                        </div>
                        <?php $count++; } ?>
                     </div>
                  </form>
                  <?php 
                    if($_GET['gsw'] === 'SA 8000- Social Accountability' && $_GET['od'] === 'Records' )
                    {
                  ?>
                  <h3 class="text-center mt-2">Records are to be maintained based on the activities carried out</h3>
                  <?php } if($_GET['gsw'] === 'SA 8000- Social Accountability' && $_GET['od'] === 'Others' ) {?>
                  
                  <h3 class="text-center mt-2">Not Applicable</h3>
                  <?php } ?>
                  
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