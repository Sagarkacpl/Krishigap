<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
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
                  <img style="width: 20%;" src="img/venkat-pindipolu.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Venkat Pindipolu </b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">Presently working as a co-founder for CarbonMint. CarbonMint is a web3 system that rewards the natural farming ecosystem, and helps people transition to it with incentives, better market access and evidence-based certification of natural farming operations</p>
                  <!-- <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align:justify;">SAP Technical Architect/Consultant (IBM, CSC, Lemongrass, Agility Works, SAP Hybris), UK</p>
                  <!-- <li style="text-align: justify;">Director .Indian Institute of Millets Research ,a premier agricultural research institute engaged in basic and strategic research on sorghum and other Millets under Indian Council of Agricultural Research (ICAR).</li>
                  <li style="text-align: justify;">Served as Head, Division of Seed Science and Technology, IARI, New Delhi.</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>TECHNOLOGY BACKGROUND:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Over 20 years of experience in technical project management, architecture, infrastructure, managing & leading SAP BASIS team, client service delivery & engagement in a multi-client hosting environment, SAP Basis/Netweaver administration with migration & upgrades and software design.
                  </li>
                  <li style="text-align: justify;">Domain and business knowledge of the following sectors – Public Sector, Utilities & Energy, Logistics, Manufacturing, Automotive, Hosting, Transport and Telecommunications.
                  </li>
                  <li style="text-align: justify;">Several full life-cycle SAP implementations and OS/DB migrations.
                  </li>
                  <li style="text-align:justify;">Database Administration - DB2, HANA, Oracle, & SQL Server.</li>
                  <!-- <li style="text-align:justify;">Developmental initiatives in seed Technology, seed quality assurance, new seed policy and development of sustainable Community seed systems.</li>
                  <li style="text-align:justify;">Farmer participatory seed production, DUS Testing, and seed quality control.</li>
                  <li style="text-align:justify;">National and international capacity building initiatives in plant breeding and seed production practices.</li>
                  <li style="text-align:justify;">Research on physiological, biochemical and molecular basis of seed vigour/longevity.</li>
                  <li style="text-align:justify;">International visit to seven US universities to study crop improvement programs, seed systems, biotechnology and IPR management.</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>INTERNATIONAL EXPOSURE:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Worked in UK for almost 16 years at different levels in technology domain.</li>
                  <!-- <li style="text-align: justify;">ICAR-IISR award for significant contributions in Seed Science & Technology and NSP (Crops).</li>
                  <li style="text-align: justify;">Legume Research Editorial Award.</li>
                  <li style="text-align: justify;">ICAR award for Centre of Excellence in Seed Production.</li>
                  <li style="text-align: justify;">Two awards- One as best DUS centre and one for capacity building in PPV&FR.</li>
                  <li style="text-align: justify;">Seeds men Association medal and Award for service to seed industry.</li>
                  <li style="text-align: justify;">Best Scientist award of Directorate of Sorghum Research, Hyderabad.</li>
                  <li style="text-align: justify;">J.N.TATA Endowment award, GRDC, Australia & USDA scholarships for PDF.</li>
                  <li style="text-align: justify;">Kirloskar Vasundhara Mitra Award.</li>
                  <li style="text-align: justify;">Best AICRP Award for Sorghum-2019 as Project Coordinator Sorghum and Small Millets.</li>
                  <li style="text-align: justify;">Outstanding Institute Award -2018 as Director of ICAR-IIMR.</li> -->
                  <br>
                  <!-- <p style="float: left;color: #000;"><b>PROFESSIONAL MEMBERSHIPS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Member, Society for Millet Research, Hyderabad.</li>

                  <li style="text-align: justify;">Treasurer, Society for Millets Research.</li>
                  <li style="text-align: justify;">President, UAS-AGRICOs Association.</li>
                  <li style="text-align: justify;">Member, Indian Society of Seed Technology, New Delhi.</li>
                  <li style="text-align: justify;">Member, Indian Society of Plant Physiology.</li>
                  <li style="text-align: justify;">Member, Indian society of Agronomy, Hyderabad.</li>
                  <br> -->
                  <p style="float: left;color: #000;"><b>EDUCATION</b></p>
                  <br><br>
                  <li style="text-align: justify;">M.Tech, Production Engineering (Indian Institute of Technology, Delhi, India).</li>
                  <li style="text-align: justify;">B.Tech, Mechanical Engineering (Kakatiya University, Warangal, India).</li>
                  <li style="text-align: justify;">Diploma, Mechanical Engineering (Government Polytechnic, Mahaboob Nagar, India)</li>
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