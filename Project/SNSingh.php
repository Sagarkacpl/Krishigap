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
                  <img style="width: 20%;" src="img/S-N-Singh.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr S.N. Singh</b></p>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Past</strong></p><br><br>
                  <li style="text-align: justify;">Ex-Principal Scientist (Agronomy), ICAR-Indian Institute of Sugarcane Research, Lucknow, India.</li>
                  <li style="text-align: justify;">Worked with CIMMYT sponsored USAID project on“Accelerating the tillage revolution in the Indus-Gangesbasin: Fostering Resource Conservation Technologies topromote economic growth, resource conservation, andfoodsecurity.”.</li>
                  <li style="text-align: justify;">Worked as Co-coordinator with respect to the sugarcane training program for the scientists from Bangladesh.</li>
                 
                  <br>
                 
                  <p class="text-bold" style="float: left;color: #000;"><strong>Recognitions</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Conferred with Lifetime Contribution Award by  Society for Sugar Research & Promotion , Lucknow - Year 2022.</li>
                  <li style="text-align: justify;">Conferred Best KVK Award, Pandit Deendaya lUpadhyay Krishi Vigyan Protsahan Puraskar by the Hon’ble Prime Minister of India New Delhi -  Year 2018 on behalf of ICAR, New Delhi.</li>
                  <li style="text-align: justify;">Conferred Award of Excellence during International conference on “Green Technologies for Sustainable Development of Sugar and Related Industries - ICAR-IISR: Year 2019.</li>
                  <li style="text-align: justify;">Conferred Dr. O. P. GautamVishisht KrishiVaigyanikPuraskar2015 by the Hon’ble Governor ofUttarPradeshat CSAU&T, Kanpur -2016.</li>
                  <br>

                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Post Graduation in M.Sc. Agronomy (71.52%) at C.S.A.U of Kanpur in 1983.</li>
                  <li style="text-align: justify;">Doctorate in Ph.D. Agronomy at Agra University of Agra in 1993.</li>
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