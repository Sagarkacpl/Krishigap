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
                  <img style="width: 20%;" src="img/amar-nath-sharma.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr Amar Nath Sharma</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p><br><br>
                  <li style="text-align: justify;">Founder member and General Secretary of Society for Soybean Research and Development at ICAR-Indian Institute of Soybean Research, Indore, India.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Past</strong></p><br><br>
                  <li style="text-align: justify;">Worked as a Consultant with Solidaridad Regional Expertise Center (SREC) under Solidaridad Asia Network, New Delhi (From July 2020 to March 2023) to provide technical support to strengthen ongoing Smart Agri Project (SAP) in Soybean which is based on LOT, sensors and development of advisory based on the parameters and information received through SAP platform etc.</li>
                  <li style="text-align: justify;">Head, Crop Protection and I/C AICRP on Soybean.</li>
                  <li style="text-align: justify;">Principal Investigator of AICRP on Soybean (Entomology).</li>
                  <br>
                 
                  <p class="text-bold" style="float: left;color: #000;"><strong>Recognitions</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Life Member of Indian Society of Oilseeds Research, Directorate of Oilseed Research, Hyderabad, India.</li>
                  <li style="text-align: justify;">Member of a high-level team constituted by the ICAR, Govt. of India, for surveying the soybean areas in the States of Rajasthan (2000), Madhya Pradesh (2003) and Maharashtra (2008) affected by Spodoptera lituradamage.</li>
                  <li style="text-align: justify;">Expert-member in the State level Steering Committee of “Awareness-cum-surveillance program for major pests of soybean in soybean-cotton based cropping system in Maharashtra.</li>
                  <li style="text-align: justify;">Member of Technical Committee to formulate Indian Standards for Sustainable Soybean (ISSS).</li>
                  <br>

                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">M.Sc. (Zoology),Barkatulla University, Bhopal, MP.</li>
                  <li style="text-align: justify;">Ph.D. (Agricultural Entomology), GB Pant University, Pantnagar.</li>
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