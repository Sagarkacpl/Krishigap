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
                  <img style="width: 20%;" src="img/MohinderKumarSalooja.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr Mohinder Kumar Salooja</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p><br><br>
                  <li style="text-align: justify;">Member Scientific Panel of FSSAI: Labelling and Claim/ Advertisement- from 1.3.2023.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Past</strong></p><br><br>
                  <li style="text-align: justify;">Retired Professor (Dairy Technology) & Former Director, School of Agriculture, IGNOU, New Delhi.</li>
                  <li style="text-align: justify;">Capacity Building in the areas of: Dairy Technology, Food Safety &    Entrepreneurial programs.</li>
                  <li style="text-align: justify;">Design, Development and Delivery of Online and Open and Distance Learning Programs.</li>
                  <li style="text-align: justify;">Senior research officer on deputation at Planning Commission Govt. of India as Educational planning and research.</li>
                  <li style="text-align: justify;">Program Coordinator for Four Programs  (I ) Diploma in Dairy Technology; (ii) Diploma in Value Added Products from Fruits & Vegetables; (iii) Post Graduate Diploma in Food Safety & Quality Management; and (iv) Ph.D. in Dairy Science & Technology.</li>
                  <li style="text-align: justify;">Chairman Horticulture Cell, IGNOU in 2009 and 2018 to June, 2019.</li>
                  <br>
                 
                  <p class="text-bold" style="float: left;color: #000;"><strong>Professional Experience</strong></p>
                  <br><br>
                  <li style="text-align: justify;">An expert on temperate fruits, diseases and pest management, completed research work on 32 research projects funded internationally and nationally.</li>
                  <li style="text-align: justify;">Specialized in research on epidemiology, weather monitoring & disease forecasting methods, pesticides mode of action and application.</li>
                  <li style="text-align: justify;">Significant achievements in production of quality planting material of commercially important temperate fruits, medicinal plants, and floriculture have made.</li>
                  <li style="text-align: justify;">Established bud wood & Gene bank for fruits, integrated diseases, pests and nutrient management, use of bio-fertilizers & natural/organic farming, crop regulation and energy efficient canopy management.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Acadamic Acheivments</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Programs Designed/Developed/Coordinated/Associated under Open and Distance Learning (ODL) in Agriculture and Food Processing - 11 programs.</li>
                  <li style="text-align: justify;">Developed  online programs: PG Diplomas: Food safety and Quality Management and Food Science and Technology. Creation of Online “Safe and Assured Food E-learning” (SAFE) Platform for running PG Diploma in Food Safety and Quality Management and PG Diploma in Food Science and Technology.</li>
                  <br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Awards and Recognitions</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Jawaharlal Nehru Award  (ICAR Young Scientist Award for Ph.D).</li>
                  <li style="text-align: justify;">Commonwealth Scholarship, Australia Plan, during Post-Doctorate.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Post Doctorate  from Dairy Research Laboratory, CSIRO, Australia.</li>
                  <li style="text-align: justify;">Ph.D. Dairy Technology in 1983 from National Dairy Research Institute (NDRI).</li>
                  <li style="text-align: justify;">M.Sc. Dairy Technology.</li>
                  <li style="text-align: justify;">B.Sc. Dairy Technology.</li>
                  <li style="text-align: justify;">ISO 22000:2018 Lead Auditor course in 2020 from CQI-IRCA certified course.</li>
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