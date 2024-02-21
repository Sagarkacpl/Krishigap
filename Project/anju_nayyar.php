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
                  <img style="width: 20%;" src="img/anju_nayyar.png">
                  <p style="color: #000;font-size: 20px;"><b>Anju Nayyar </b></p>
                  <p style="text-align: justify; color: #000;text-align:center;">Senior Advisor – Business Development & Alliances, YARA International</p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">Anju Nayyar is currently in a senior advisory role cutting across public affairs and business development for the Growth and Commercial Division at Yara in the Asia-Africa region, where she has developed a passion for emerging markets, farming, and digital solutions. She leads relationships and business development across these regions positioning Yara for success with customers and cross-sector stakeholders in Asia and Africa.</p>
                  <!-- <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align:justify;">Anju Nayyar is a versatile senior executive leader and a board member specializing in public affairs, high-value sales, and business development, creating win-win scenarios with measurable social impact. With over 23 years of leadership experience, Anju's work spans agriculture, healthcare and nutrition, technology, sustainability, finance, and media sectors. She is registered with the MCCIA. Talks about , CSR, ESG and statutory compliance.</p>
                  <!-- <li style="text-align: justify;">Director .Indian Institute of Millets Research ,a premier agricultural research institute engaged in basic and strategic research on sorghum and other Millets under Indian Council of Agricultural Research (ICAR).</li>
                  <li style="text-align: justify;">Served as Head, Division of Seed Science and Technology, IARI, New Delhi.</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>SIGNIFICANT ACHIEVEMENTS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Grew to a profit Centre head while developing strategic alliances, tech transfer strategy, and partnering with countries to participate in technical trade shows.</li>
                  <li style="text-align: justify;">Worked on 4 agtech applications from conception to implementation.
                    <ol>
                        <li>Farmcare</li>
                        <li>Farmgo</li>
                        <li>Farm Forward</li>
                        <li>Yara Bodega</li>
                    </ol>
                  </li>
                  <li style="text-align: justify;">Through these applications aere able to connect 13 million farmers and actually enhance the farmer’s income.
                  </li>
                  <li style="text-align:justify;">She has been a pioneer in setting up systems to digitize the KCC and has tried to impress upon the farming community the significance and need for a healthy credit.</li>
                  <li style="text-align:justify;">Has stood up for the unrepresented and collaborated with 8 banks to make this possible on the ground.</li>
                  <li style="text-align:justify;">Has addressed and brought about several strategic alliances to make sure the message of collaboration is spread and thus bringing about increase in yield.</li>
                  <li style="text-align:justify;">She is currently working on several collaborations to digitize the supply chain.</li>
                  <li style="text-align:justify;">Explained to the stakeholders the value of FPOS and how can we leverage this Network.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>INTERNATIONAL EXPOSURE:</b></p>
                  <br><br>
                  <p style="text-align: justify;">Has worked and collaborated with 16 different countries through the Chem -Tech Foundation on Technology transfer for Enviro and clean Tech. Has worked in Singapore, Malaysia, Vietnam, Germany and the US in different ca[pacities.</p>
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
                  <p style="float: left;color: #000;"><b>PUBLICATIONS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">20 research publications are in diffrent journals like The Hindu Business Line, The National News (UAE) and The Pioneer, Entrepreneur India, Your story etc.</li>
                  <li style="text-align: justify;">Several research publications and technical /Extension bulletins, brochure and videos for the benefit of farmers in English and Hindi.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>EDUCATION</b></p>
                  <br><br>
                  <li style="text-align: justify;">University of Cambridge, Sustainability Leadership (Pursuing)</li>
                  <li style="text-align: justify;"><b>University of Zambia.</b>
                    <p style="text-align: justify;">Master of Business Administration, Marketing</p>
                    </li>
                    <li style="text-align: justify;"><b>University of Zambia.</b>
                    <p style="text-align: justify;">BSC, Botany</p>
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