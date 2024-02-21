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
                  <img style="width: 20%;" src="img/Prathap_Chandra_Shetty.jpg">
                  <p style="color: #000;font-size: 20px; margin-bottom:0px;"><b>Mr Prathap Chandra Shetty</b></p>
                  <p>Fisheries and Aquaculture Value Chain Expert</p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Fisheries and Aquaculture Sector Management Expert for FAO of the United Nations.</li>
                  <li style="text-align: justify;">Assessor BAP & Global GAP, National Accreditation Board for Certification Bodies (NABCB).</li>
                  <li style="text-align: justify;">TWG Member, Global Food Safety Initiative (GFSI). Post-Harvest Handling of Terrestrial Animals and Farmed Seafood ( Consultant / member).</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Thirty five years of professional activity in International seafood trade, processing practices, Sustainable Aquaculture Operations, International Food Standards, Seafood Trading, Trade capacity Building, Quality control, Sustainability, Social responsibility and Certification.</li>
                  <li style="text-align: justify;">Standard writing with 150+ training manuals in HACCP, Management, Projects, and Training programs for the trainers- for all category of Fisheries operation and Aquaculture. Multilingual.</li>
                  <li style="text-align: justify;"><strong>Technical Director</strong>, The Fish in Company, USA. One among the leading seafood supplier in the world, having retail outlets in all of the 50 states in the USA.</li>
                  <li style="text-align: justify;">Executive Director, Emirates Star Fisheries, Dubai, UAE.</li>
                  <li style="text-align: justify;">Director, Shui Aqua Bios Exports Pvt. Ltd., Karnataka, India.</li>
                  <li style="text-align: justify;">Chief General Manager, Trimarine Food Pvt. Ltd., Cochin, Kerala, India.</li>
                  <li style="text-align: justify;">Quality Control Manager – Training and Development, Saudi Fisheries Company, Dammam, K.S.A.</li>
                  <li style="text-align: justify;">Travelled approximately 100 countries.</li>
                  <li style="text-align: justify;">Developed general regulations and operating guidelines to enable Public Sector´s effective marine aquaculture zoning and area management, as well as and make recommendations on models of services.</li>
                  <li style="text-align: justify;"><strong>The International Fisheries Infrastructure Expert</strong>, UNIDO Project on <i>“Technical and Institutional Capacity Building for increase in production and development of the aquaculture and fisheries value chains in Ethiopia”</i>.</li>
                  <li style="text-align: justify;"><strong>HACCP Advisor</strong>, Phase  1 &2, CTG for FAO/UNDP of the United Nations HACCP Certification Study and Local Capacity Development in Fishery Sector,  a joint project , to implement the HACCP, Food Safety issues and Fisheries, Procedures for the Safe and Sanitary Processing and Importing of Fish and Fishery Products.</li>
                  <li style="text-align: justify;">FAO ( 2019) - HACCP Certification Study and Local Capacity Development in Fisheries Industry , BOSASO SOMALIA, January 2019 , total pages 137.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Membership and Affiliations:</b></p>
                  <br><br>
                  <li style="text-align: justify;">The World Aquaculture Society & Asian-Pacific Chapter.</li>
                  <li style="text-align: justify;">Global Aquaculture Alliance .</li>
                  <li style="text-align: justify;">Best Aquaculture Practices -Aquaculture Certification Council .</li>
                  <br>
                  <p style="float: left;color: #000;"><b>PROFESSIONAL COURSES:</b></p>
                  <br><br>
                  <li style="text-align: justify;">“ISO 22000 and SA 8000”  five days completed courses  by The Food School,</li>
                  <li style="text-align: justify;">HACCP Auditor, by SURE FISH, 413-3rd Ave., West SEATTLE, WA 98119.</li>
                  <li style="text-align: justify;">Accredited Certifier, training By ACC (Aquaculture Certification Council, USA.</li>
                  <li style="text-align: justify;">Project evaluation expert : AAAID (Arab Authority for Agricultural Investment and Development) Khartoum, SUDAN, Certifier for evaluation of Aquaculture projects in the Middle East.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Masters in Fisheries Science, University of Agriculture Science, Bangalore.</li>
                  <li style="text-align: justify;">Bachelors of Fisheries Science with emphasis on Aquaculture.</li>
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