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
                  <img style="width: 20%;" src="img/Joginder-Singh-Minhas.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Joginder Singh Minhas</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Chief Executive Officer, Jalandhar Potato Growers Biotech Producer Company Ltd, Lead a group of potato seed producers for quality seed production through geoponics technology and through good agricultural practices. Helped potato seed farmers in establishing a 2 million tuber capacity aeroponics facility in Jalandhar, Punjab, India</li>
                  <li style="text-align: justify;">Head, Central Potato Research Station, Jalandhar, Punjab State</li>
                  <li style="text-align: justify;">Principle Scientist, Agricultural Research Service of the Indian Council of Agricultural Research (ICAR), Central Potato Research Institute (CPRI) Shimla</li>
                  <li style="text-align: justify;">Scientist S2, Agricultural Research Service of the Indian Council of Agricultural Research (ICAR), Tribal Area Development Scheme Waghai</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Membership in Professional Associations:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Distinguished fellow, Indian Potato Association.
                  </li>
                  <li style="text-align: justify;">Secretary, Indian Potato Association, 2004-2007.
                  </li>
                  <li style="text-align: justify;">Vice President, Indian Potato Association, 2007-09.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Awards</b></p>
                  <br><br>
                  <li style="text-align: justify;">“ICAR Outstanding Multi-disciplinary Team Research Award 2010” for development of  heat tolerant variety Kufri Surya (Team leader)</li>
                  <li style="text-align: justify;">Merit Certificate (2004) by CPRI Shimla for significant contribution to potato research</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Ph.D., Plant Physiology and Molecular Biology, Himachal Pradesh University, Shimla, India, 1999 
                  </li>
                  <li style="text-align: justify;">Master of Science (Hons.), Plant physiology, Punjab Agricultural University, Ludhiana, India, 1977
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