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
   include "most_visited_page.php";
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
                  <h1 class="display-3 text-white animated slideInDown">Workers Health, Safety & Welfares</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Workers Health, Safety & Welfare</li>
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
                  <p style="color: #0fb249;"><b>Workers Health, Safety & Welfare</b></p>
                  <p style="color: #000;"><b>INTRODUCTION</b></p>
                  <p style="color: #000;"><b>IndG.A.P</b></p>
                  <p style="float: left;color: #0fb249;"><b>People are key to the farm operations:</b></p>
                  <br><br>
                  <p style="text-align: justify;">People are key to the safe and efficient operation of any farm. Farm staff as well as the
producers themselves stand for the quality of the produce and for environment protection.
Education and training will help progress towards sustainability and build on social capital .This
section is intended to ensure safe practices in the work place and that all workers both
understand and competent to perform their duties and in the event of accident ,can obtain
proper and timely assistance.<br><br>In this section, standard requirements related to Workers Health, Safety and Welfare are
covered

                  </p>
                 
                  <br>

<p style="float: left;color: #0fb249;"><b>Brief About the Requirements:
</b></p>
                  <br><br>
                  <li style="text-align: justify;">Risk assessment for hazards to workers health and safety, Provision of training to
workers on health and safety ,handling of hazardous chemicals , operation of complex
equipment , hygiene instructions and welfare policy to be documented and implemented
covering farm workers, sub-contractors if any working on the farm and the visitors to the
farm.

                  </li><br>
                  <li style="text-align: justify;">Evidence of training provided to the farm operators on handling of chemicals, farm
equipment, first aid application, use of protective cloth to be demonstrated.
                  </li><br>
                  <li style="text-align: justify;">Others include, (1) access to designated areas of food storage, eating, drinking water
facility,(2) Identification of the responsible at the group level for handling workers welfare
and safety,(3) Prevention of accidents,accident and emergency procedures and
communication mechanisms,(4) Potential identification of hazards on farm like electrical
installations, open wells etc.
                  </li><br>
                  <li style="text-align: justify;">Trainings to workers always to be provided by the competent person and training
records to be maintained.
                  </li>
                  <br>
<p style="float: left;color: #0fb249;"><b>Notes:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Certificate will not be granted by the certification body for any noncompliance to a Major
clause 
                  </li><br>
                  <li style="text-align: justify;">Similarly certificate will not be granted by the certification body for any noncompliance’s
which accounts more than 5% of the applicable Minor Clauses to a Major clause.
                  </li>
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