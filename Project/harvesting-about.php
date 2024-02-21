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
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
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
                  <h1 class="display-3 text-white animated slideInDown">Harvesting</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Harvesting</li>
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
                  <p style="color: #0fb249;"><b>HARVESTING</b></p>
                  <p style="text-align: justify;">Harvest of horticultural and other produce .at right stage of maturity is very essential to maintain quality, maximum returns and for attaining the longest post-harvest life.
                  </p>
                   <p style="text-align: left;"><strong>Importance of maturity indices:</strong></p>
                   <ul style="text-align: justify;">
                       <li>Ensure sensory quality (flavor, color, aroma, texture) and nutritional quality.</li>
                       <li>Ensure an adequate postharvest shelf life.</li>
                       <li>Scheduling of harvest and packing operations.</li>
                   </ul>
                   <p style="text-align: left;"><strong>Delayed harvesting of fruits, vegetables and other agricultural products can increase higher susceptibility to decay, resulting in higher postharvest loss</strong></p>
                  <p style="text-align: left;"> Minimum quality specifications for fruits and vegetables are specified by the Directorate of Marketing & Inspection, Ministry of Agriculture, Govt of India Refer to Harvest and post-harvest profiles of the crops and also by United Nations Economic Commission for Europe</p>
                  <p style="text-align: justify;">Basic harvest and post-harvest handling consideration for fresh fruits and vegetables specified by FAO.
                  </p>
                  <p style="text-align: left;"><strong>Post-Harvest :</strong></p>
                   <ol style="text-align: justify;">
                       <li>Proper post-harvest care can add value and provide benefit to the producers and consumers and maintain freshness, nutrient content, taste, and quality.</li>
                       <li>Both quantitative and qualitative losses occur at all stages in the post-harvest handling system of perishables (harvesting, handling, packing, storage, and transportation).</li>
                   </ol>
                  <p style="text-align: justify;"> You are advised to visit the websites of ICAR institutions, Agricultural universities, and agricultural departments for updates on Crops Standards
                  </p>
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