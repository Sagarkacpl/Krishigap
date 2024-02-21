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
                  <img style="width: 20%;" src="img/T_Appaji_Rao.jpg">
                  <p style="color: #000;font-size: 20px;"><b>T. Appaji Rao</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Registered Principle Consultant –FSMS,  HACCP with NBQP- Quality Council of India.</li>
                  <li style="text-align: justify;">Approved Trainer for HACCP by DNV– Norway.</li>
                  <li style="text-align: justify;">Approved FoSTaC Trainer.</li>
                  <li style="text-align: justify;">FSMS Lead Auditor Trainer.</li>
                  <li style="text-align: justify;">Qualified FSSAI Food Hygiene Auditor in from FSSAI2021.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">15 Years of work and over 20 years of consultancy and training experience in Dairy Value Chain.</li>
                  <li style="text-align: justify;">Consultant; Trainer; Auditor For Food Safety (Including BRC Food), QMS, EMS & OHSAS.</li>
                  <li style="text-align: justify;">Adl. G.M.(Production) of UHT Treated Milk and Aseptic Packing of Milk and Milk Products at AMRIT FOODS.</li>
                  <li style="text-align: justify;">Manager in Production ,Procurement & Sales of Milk and Milk Products (including packing of UHT Treated Milk and Milk.</li>
                  <li style="text-align: justify;">Conducted over 700 Audits as Specialist , Auditor and  Lead Auditor for Certification Bodies.</li>
                  <li style="text-align: justify;">Provided Consultation to more than 250 organizations in attaining certifications towards ISO9001, ISO 14001, OHSAS 18001 and HACCP  & ISO22000, FSSC22000.</li>
                  <li style="text-align: justify;">Provided Consultation for developing FSSAI Schedule 4 Requirements of GMP &GHP for Dairy industries for successful III Party Audits.</li>
                  <li style="text-align: justify;">Training on GMP, GHP & HACCP and auditing to the Auditors of Bangladesh Standards Institute, Dhaka to attain NABCB accreditation.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Professional Qualifications:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Certified Lead Auditor for Quality Management Systems.</li>
                  <li style="text-align: justify;">Certified Lead Auditor for Food Safety Systems-HACCP.</li>
                  <li style="text-align: justify;">Certified Lead Auditor for EMS 14001,OHSAS18001.</li>
                  <li style="text-align: justify;">Lead Auditor –Energy Management System.</li>
                  <li style="text-align: justify;">Certified Assessor for Laboratory Accreditation–ISO17025:2017& ILAC-G3.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Bachelor of Science Dairy Technology– 1983 from National Dairy Research Institute.</li>
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