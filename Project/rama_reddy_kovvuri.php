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
                  <img style="width: 20%;" src="img/rama_reddy_kovvuri.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Rama Reddy Kovvuri </b></p>
                  <p style="text-align: justify; color: #000;text-align:center;">Technology Expert</p>
                  <p style="text-align: justify; color: #000;text-align:center;">Vice President Tyisha Technologies</p>  
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">Presently working in capacity of a Vice President for Tvisha Technologies Incorporation, Hyderabad.</p>
                  <!-- <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align:justify;">CEO, Vihaan Digital Marketing, Hyderabad, Telangana.</p>
                  <p style="text-align:justify;">Mr. Rama Reddy is currently serving as CEO of Vihaan Digital Marketing. He is featured in the CEO Story and Economic Times for his thought leadership and industry expertise. He is a visionary and has broad experience in business strategy, digital marketing, technology, operations, client engagement, partner development, and people management to name a few.</p>
                  <p style="text-align:justify;">Earlier he was serving as Vice President at eFresh India, leading IT and Agritech Solutions from envisioning "Digital Platform for Agribusiness (DPA)" to setting up Command Hubs to monitor Farmer Development Centers (FDC) and Marketplace integration. Mr. Rama Reddy technical expertise in choosing and building robust IT infrastructure has helped the company lower its capital and operating cost and increase its savings.</p>
                  <!-- <li style="text-align: justify;">Director .Indian Institute of Millets Research ,a premier agricultural research institute engaged in basic and strategic research on sorghum and other Millets under Indian Council of Agricultural Research (ICAR).</li>
                  <li style="text-align: justify;">Served as Head, Division of Seed Science and Technology, IARI, New Delhi.</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>SIGNIFICANT ACHIEVEMENTS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Mr. Rama Reddy is a Certified Lean Six Sigma Green Belt holder and Certified Lead Auditor ISO QMS 9001:2008, trained & certified on Official Course for ‘Capability Maturity Model Integration’ (SEI-CMMI) and also holds ITIL V3 Foundation Certificate in IT Service Management.</li>
                  <li style="text-align: justify;">Prior to joining Tvisha Technologies Incorporation, Mr.Rama Reddy has held a variety of IT management positions including Project Management, Head of Information Security and Quality Assurance for BSE listed IT services company AJEL Limited and brings 20 years of vast experience.</li>
                  <li style="text-align: justify;">His expertise is in Digital Transformation, PMO, IT modernization, Projects Automation, Client Expertise, Business Consulting, Program Management and KPI Management.</li>
                  <li style="text-align:justify;">Leadership and Process Excellence: Act as a thought leader in defining success criteria and understand business needs of customers in an ever-changing business environment. Contribute to and leads strategic plans and documents for Organization.</li>
                  <li style="text-align:justify;">Instrumental in implementing technology initiatives at eFresh Agribusiness Solutions.</li>
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
                  <br>
                  <p style="float: left;color: #000;"><b>EDUCATION</b></p>
                  <br><br>
                  <li style="text-align: justify;">B.Sc Computer Sciences</li>
                  <li style="text-align: justify;">Microsoft Certified Professional.</li>
                  <li style="text-align: justify;">Certified Lead Auditor ISO QMS</li>
                  <li style="text-align: justify;">ITIL V3 in IT Service Management</li>
                  <li style="text-align: justify;">Lean Sigma Green Belt</li>
                  <li style="text-align: justify;">Trained and Certified on SEI-CMMI</li>
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