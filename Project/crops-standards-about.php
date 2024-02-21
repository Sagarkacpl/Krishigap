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
                  <h1 class="display-3 text-white animated slideInDown">Crops Standards</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Crops Standards</li>
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
                  <p style="color: #0fb249;"><b>CROPS STANDARDS</b></p>
                  <p style="text-align: justify;">It is important to follow the crops standards released by various government institutions in the Agri domain.
                  </p>
                  <p style="text-align: justify;">An organization or person implementing the good agricultural practices, must have a copy of the standard related to the crop cultivated by him.
                  </p>
                   <p style="text-align: left;"><strong>NATIONAL</strong></p>
                   <ol style="text-align: justify;">
                       <li>Bureau of Indian Standards (BIS) is the National Standard Body of India, which is responsible for the harmonious development of the National Standards. Prescribed quality standards for 16 Spices & Condiments, Spice Powders, Concentrates and Oleoresins, and Cereals, Pulses and Millet Products</li><br>
                       <li>AGMARK is a certification mark for agricultural produce under Agricultural Produce (Grading Marking) Act, 1937, assuring that they conform to a grade standard notified by Directorate of Marketing & Inspection, Ministry of Agriculture & Farmers Welfare, Govt of India. It Published Grading and Marking Rules for Pulses, Cereals, Fruits & Vegetables and Vegetable Oils, Fiber Crops, Edible Nuts, Spices etc</li><br>
                       <li>Indian minimum Seed Certification Standards were released by Central Seed Certification Board, Dept of Agriculture, Govt of India.</li>
                   </ol>
                   <p style="text-align: left;"><strong>B INTERNATIONAL</strong></p>
                   <ol style="text-align: justify;">
                       <li>United Nations Economic Commission for Europe through its Working Party on Agricultural Quality Standards developed internationally agreed commercial quality standards for agricultural produce. The standards are based on existing national standards, industry, and trade practices.
                       </li>
                   </ol>
                  <p style="text-align: justify;">You are advised to visit the websites of ICAR institutions, Agricultural universities and agricultural departments for updates on Crops Standards.
                  </p>
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