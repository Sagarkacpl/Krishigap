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
//    include "most_visited_page.php";
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
                  <h1 class="display-3 text-white animated slideInDown">Food Safety Standards</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Food Safety Standards</li>
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
                  <p style="color: #0fb249;"><b>Food Safety Standards</b></p>
                  <p style="text-align: justify;">We have covered important standards related to agriculture production that are popular globally and demanded by the Whole sellers, Retailers, Food processors and Consumers. These are Global G.A.P, Organic NOP, Organic NOP. We have also covered Ind G.A.P which is under bench marking process with Global G.A.P.
                  </p>
                  <p style="text-align: justify;">These standards are accredited under International Standard ISO 17065 and apply to all farming operations, whether large or small.
                  </p>
                  <p style="text-align: justify;">These standards contain requirements for food aimed at ensuring for the consumer a safe, wholesome food product free from residues, correctly labelled and presented.
                  </p>
                   <p style="text-align: justify;"><strong>
                       Key challenge faced by the organizations in implementation of these standards, is preparing documentation/records in meeting the requirements of the standards.
                   </strong></p>
                   <p style="text-align: justify;">
                      Krishi GAP made efforts in developing the documentation (Quality Manual, Procedures, Risk Assessments, , Records etc)  as per the standard requirement. You must keep in mind that these documents or records are generic in nature and to be used only for guidance. Each organization must modify the documentation /records according to the requirements of crops, its customers, regulatory compliances, and local conditions.
                   </p>
                   <p style="text-align: justify;">
                      For the sake of convenience, the requirements are presented section wise for better understanding.  Food Safety Standard Wise, Farmer Handbook, Demo Farm, Internal Inspections, Internal Audit, Plant Protection Products, Package of Practices, Harvesting, Workers Health & safety, Crops Standards and Others.
                   </p>
                   <p style="text-align: justify;">
                      Always visit the respective websites of the standard owners, regulatory agencies and related compliances departments for correct information, updates and obtain latest standard copy.
                   </p>
 
                <p style="text-align: left;"><strong>Refer to our Disclaimer Policy</strong></p>




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