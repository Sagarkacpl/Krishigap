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
 //   include "most_visited_page.php";
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
      <div class="container-fluid bg-primary py-5 mb-5 page-header">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Farmer Hand Book</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Farmer Hand Book</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                  <p style="color: #0fb249;text-align: left;"><b>Objective</b></p>
                  <p style="text-align: justify;">The production of safe food is essential for protecting consumers from the hazards of foodborne illnesses and is important both in the domestic food business as well as for increasing competitiveness in export markets<br><br>
Farmer Hand Book  with records on critical areas of operations will facilitate skills enhancement, understanding of the requirements, enabling the farmers to implement the standard requirements and as a way to introduce farmers to innovation and earn enhanced and sustainable income  Seeing and Believing Concept
</p>
  <br>


   <p style="color: #0fb249;text-align: left;"><b>Identification of Records to be maintained </b></p>
                  <p style="text-align: justify;">Standard requirements will provide inputs for identification of records to be kept and updated in the Farmers Hand Book.<br><br>
It is advisable to have a separate hand book crop cycle wise. Historical data will assist the farmer or the producer group on the status of viability of farming operations , areas of operations which need improvement and help in compliance with standard requirements. 
</p>
  <br>

   <p style="color: #0fb249;text-align: left;"><b>Examples of Some Records/Documents</b></p>
                  <p style="text-align: justify;">Farm layout, Soil analysis report  , Water analysis report ( not applicable in case of rain fed crops)Seed planting, Application of fertilizers ,Plant protection products ,Water management, Sub contractor activities if any on the farm, Farm workers list ,Farm equipment list, Current applicable MRLs for the crop, List of permitted plant protection products for the crop, Trainings to the producer and other  farm workers, Energy used for farming operations,  Instructions on workers’ health, safety and welfare .Harvest details and Mass Balance record with sales details of certified and non-certified products etc 
</p>
  <br>
  
<p style="float: left;color: #0fb249;"><b>Notes:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Any noncompliance with the maintenance of standard requirements will result in either nonconformance to a Major or Minor Clause </li>
                  <li style="text-align: justify;">Any noncompliance with the maintenance of standard requirements will result in either nonconformance to a Major or Minor Clause  </li>
                  <li style="text-align: justify;">Similarly certificate will not be granted by the certification body for any noncompliance’s which accounts more than 5% of the applicable Minor Clauses   </li>
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