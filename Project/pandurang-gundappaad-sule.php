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
                  <img style="width: 20%;" src="img/pandurang-gundappaad-sule.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr. Pandurang Gundappa Adsule</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Presently working as international consultant for Post-Harvest Technology for ADB for Government of Bangladesh.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Monitoring of pesticide residues in exportable table grapes to EU countries, funded by APEDA.</li>
                  <li style="text-align: justify;">Worked as Post-Doctoral Fellow-cum-Visiting Scientist at Citrus Research and Education Centre of IFAS under University of Florida in USA in 1982-83.</li>
                  <li style="text-align: justify;">Underwent UNIDO’s training programme in export from Small and Medium Enterprises at Phuket in Thailand in 1988 and Grain Milling Technology in Moscow in the former USSR (1989).</li>
                  <li style="text-align: justify;">Organized pilot trial of export of Indian banana shipment, a research trial to Dubai and studied marketing of these banana in Dubai market to decide technical feasibility and economic viability.</li>
                  <li style="text-align: justify;">Carried various programmes for the promotion and development of Small Scale Agro Rural Food Processing units  as Regional Deputy Director (Food Industry), Southern states.</li>
                  <li style="text-align: justify;">Worked on evaluation of fruits and vegetable varieties for their suitability to processing purpose like canning, freezing, dehydration as Scientist at CISH, Lucknow.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>INTERNATIONAL EXPOSURE:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Participated in several international workshops on monitoring of agro chemical residues in fruits and vegetables- USSR, Italy, Germany, France, Austria, USA etc.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>PUBLICATIONS:</b></p>
                  <br><br>
                  <li style="text-align: justify;">120 research publications out of which 40 publications are in foreign journals like Journal of Food Science and Technology, Journal of Chromatography, AOAC, Journal of Food and Agriculture etc.
                  </li>
                  <li style="text-align: justify;">Several research publications and technical /Extension bulletins, brochure and videos for the benefit of farmers in English, Marathi, and Hindi. </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">BSc Agriculture.</li>
                  <li style="text-align: justify;">MSc Horticulture, PG School, IARI, New. Delhi.
                  </li>
                  <li style="text-align: justify;">Ph.D., in First Class with Distinction in Horticulture at PG School, IARI, New. Delhi.</li>
                  <li style="text-align: justify;">Received G.J. Award for  highest C.G.P.A. among successful candidates in    IARI.</li>
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