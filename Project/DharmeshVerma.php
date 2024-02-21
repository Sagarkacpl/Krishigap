<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
  //  include "most_visited_page.php";
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
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container py-5">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                  <img style="width: 20%;" src="img/DharmeshVerma.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr Dharmesh Verma</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Independent Consultant</strong></p><br><br>
                  <li style="text-align: justify;">Domain Expert in Basmati Rice Pre-Harvest processes, regenerative agriculture and machine learning for geospatial technology with over 25years of experience across government, private, and international organizations</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Patanjali Organic Research Institute State Coordinator</strong></p><br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Global Head-Technical</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Sourced Internal Customers, Stream lined business development and agronomic recommendations.</li>
                  <li style="text-align: justify;">Liaised for regulatory affairs with concerned government departments to bring good products under FCO.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>UPL Ltd- India</strong></p><br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Senior Consultant–Remote Sensing & GIS Applications</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Managed Basmati rice production estimation project for BEDF(APEDA) in five Basmati growing states of India using field and satellite images; delivered yield modeling using meteorological data and satellite image-derived indices.</li>
                  <li style="text-align: justify;">Expertise with a conceptual understanding of climate change, climates mart agriculture, organic farming, carbon sequestration, farmer training and multiple project management.</li>
                  <li style="text-align: justify;">Executed and managed pioneer projects on Basmati cultivation, varietal discrimination, acreage estimation and yield forecast for 85 districts of JK, Punjab, Haryana, Western UP and Himachal Pradesh.</li>
                  <li style="text-align: justify;">Trained several farmer trainers in organic farming including Basmati rice in Haryana under the NSDC project. Surveyed 30,000+ Basmati growers in GI area over the span of a decade.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Professional Trainings/Courses</strong></p>
                  <br><br>
                  <li style="text-align: justify;">ERDAS-Imagine version 8.3 by Remote Sensing Instruments, Hyderabad at RSAC-UP, Lucknow.</li>
                  <li style="text-align: justify;">Statistical methods at the Institute of Applied Statistics & Development Studies, Lucknow.</li>
                  <li style="text-align: justify;">ERDAS Imagine 8.3 at Indian Institute of Remote Sensing, Dehradun.</li>
                  <li style="text-align: justify;">Crop modeling at Sugarcane Institute, Lucknow,  conducted by CSSRI, Karnal.</li>
                  <li style="text-align: justify;">Genesis of salt-affected soils at CSSRI, Karnal, sponsored by UPCAR.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Honors & Awards:</b></p>
                  <br><br>
                  <li style="text-align: justify;"><strong>Chair</strong>, Technical Session in 7th International Conf. on Desert,Desertification and Dry lands.</li>
                  <li style="text-align: justify;"><strong>Chair</strong>, Asian Soil Partnership for Pillar-1, Global Soil Partnership,Food and Agriculture Organization of the United Nations (FAO).</li>
                  <li style="text-align: justify;"><strong>Outstanding Contribution Scientist</strong>, Soil Conservation, Food and Agriculture Organization of the United Nations (FAO)</li>
                  <li style="text-align: justify;"><strong>Chair</strong>, Technical Session in 1st Global Cleanup Congress.</li>
                  <li style="text-align: justify;"><strong>Expert Panelist</strong>, NASA - South Asia Research Initiative Meeting.</li>
                  <li style="text-align: justify;"><strong>Chair</strong>, Technical Session - Climate Smart Agriculture & Soil.</li>
                  <li style="text-align: justify;"><strong>Outstanding Achievement Award - Private Sector</strong>, Agriculture & Innovation</li>
                  <li style="text-align: justify;"><strong>Chair</strong>, International Conf. on Agriculture & Applied Sciences - SAID</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Ph.D.(Agricultural Chemistry.</li>
                  <li style="text-align: justify;">M.Sc.(Soil Survey).</li>
                  <li style="text-align: justify;">B.Sc.(Agriculture & Animal Husbandry.</li>
                  <br>
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