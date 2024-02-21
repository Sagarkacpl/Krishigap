<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
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
                  <img style="width: 20%;" src="img/kapse_bhagwan.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr. Kapse Bhagwan </b></p>
                  <p style="text-align: justify; color: #000;text-align:center;">Mango, Sweet Orange & Banana Supply Chain Expert</p>
                  <p style="text-align: justify; color: #000;text-align:center;">Former Director, National Institute of Post-Harvest Technology  </p>  
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">Technical Director, Maharashtra Mango Bagayatdar Sangh for promotion of quality, production of mango as well as processing and expert of Mango from Maharashtra state.</p>
                  <!-- <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align: justify;">Former Director, National Institute of Post-Harvest Technology (NIPHT) MSAMB, Pune.</p> 
                   <li style="text-align: justify;">Promoted Sweet orange and lime on farmers fields under high tech cultivation in Maharashtra State after study visit to South Africa. Resulted higher yield by 2 to 3 times.</li>
                  <li style="text-align: justify;">The post harvest technology for Mango, Banana for export through CA container by sea to EU, USA and standardized for the first time with the help of APEDA.</li>
                  <li style="text-align: justify;">Established various export oriented Mango orchards at many farmers fields with South Africa & Israel Technology.</li>
                  <li style="text-align: justify;">Established NIPHT for export of Fruits & Vegetables.</li>
                  <li style="text-align: justify;">Developed technology for export of Mango by sea.</li>
                  <li style="text-align: justify;">Developed technology for export of Mango by sea.</li>
                  <li style="text-align: justify;">Hon’ble Advisor to Paithan Mega Food Park, Aurangabad.</li>
                  <li style="text-align: justify;">Member of Mango & Cashew Board Study group – Maharashtra.</li>
                  <li style="text-align: justify;">Attended and presented research papers in International Mango symposium held t in Israel, South Africa.</li>
                  <li style="text-align: justify;">Visited various countries for Marketing of Mangos - Hong Kong, Singapore, Malaysia, Thailand, Dubai and Canada.</li>
                  <li style="text-align: justify;">Standardized the scientific method of Mango Ripening.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>AWARDS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">International watsave award. 2015 in France.</li>
                  <li style="text-align: justify;">Marathwada Ratna Award</li>
                  <li style="text-align: justify;">Pinnaclers of Maharashtra.</li>
                  <li style="text-align:justify;">“INSID" Award for irrigation Management.</li>
                  <br>
                  <!-- <p style="float: left;color: #000;"><b>INTERNATIONAL EXPOSURE:</b></p> 
                  <br><br>
                  <p style="text-align: justify;">Has worked and collaborated with 16 different countries through the Chem -Tech Foundation on Technology transfer for Enviro and clean Tech. Has worked in Singapore, Malaysia, Vietnam, Germany and the US in different ca[pacities.</p> 
                  <li style="text-align: justify;">ICAR-IISR award for significant contributions in Seed Science & Technology and NSP (Crops).</li>
                  <li style="text-align: justify;">Legume Research Editorial Award.</li>
                  <li style="text-align: justify;">ICAR award for Centre of Excellence in Seed Production.</li>
                  <li style="text-align: justify;">Two awards- One as best DUS centre and one for capacity building in PPV&FR.</li>
                  <li style="text-align: justify;">Seeds men Association medal and Award for service to seed industry.</li>
                  <li style="text-align: justify;">Best Scientist award of Directorate of Sorghum Research, Hyderabad.</li>
                  <li style="text-align: justify;">J.N.TATA Endowment award, GRDC, Australia & USDA scholarships for PDF.</li>
                  <li style="text-align: justify;">Kirloskar Vasundhara Mitra Award.</li>
                  <li style="text-align: justify;">Best AICRP Award for Sorghum-2019 as Project Coordinator Sorghum and Small Millets.</li>
                  <li style="text-align: justify;">Outstanding Institute Award -2018 as Director of ICAR-IIMR.</li> 
                  <br>
                  <p style="float: left;color: #000;"><b>PUBLICATIONS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">20 research publications are in diffrent journals like The Hindu Business Line, The National News (UAE) and The Pioneer, Entrepreneur India, Your story etc.</li>
                  <li style="text-align: justify;">Several research publications and technical /Extension bulletins, brochure and videos for the benefit of farmers in English and Hindi.</li> -->
                  <p style="float: left;color: #000;"><b>EDUCATION</b></p>
                  <br><br>
                  <li style="text-align: justify;">Ph.D. (Horticulture).</li>
                  <li style="text-align: justify;">MSC. (Agriculture).</li>
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