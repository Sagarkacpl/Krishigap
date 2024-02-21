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
                  <img style="width: 20%;" src="img/Vijay-Singh-Thakur.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr Vijay Singh Thakur</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p><br><br>
                  <li style="text-align: justify;">An expert on Apple and Horticulture Value chain.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Past</strong></p><br><br>
                  <li style="text-align: justify;">Ex-Vice Chancellor, Dr. YS Parmar University of Horticulture and Forestry, Nauni, Solan in 2013-2016.</li>
                  <li style="text-align: justify;">An expert on temperate fruits, diseases and pest management, completed research work on 32 research projects funded internationally and nationally.</li>
                  <li style="text-align: justify;">Prepared and implemented Horticulture Development Project under World Bank for the state Himachal Pradesh.</li>
                  <li style="text-align: justify;">Handled Apple scab disease management in Himachal Pradesh.</li>
                  <li style="text-align: justify;">Chairman, ICAR Board Subject Matter Area (BSMA) Committee for Horticulture i.e. 12th September, 2018.</li>
                  <li style="text-align: justify;">Visiting scientist to Horticulture Research International, UK, Institute for Plant Protection of Hungarian Academy of Sciences, , Federal Centre for Breeding Research on Cultivated Plants, Germany, New York State Agricultural Experimental Station, USA, Northwest Sci-Tech University of Agriculture & Forestry, China.</li>
                  <br>
                 
                  <p class="text-bold" style="float: left;color: #000;"><strong>Professional Experience</strong></p>
                  <br><br>
                  <li style="text-align: justify;">An expert on temperate fruits, diseases and pest management, completed research work on 32 research projects funded internationally and nationally.</li>
                  <li style="text-align: justify;">Specialized in research on epidemiology, weather monitoring & disease forecasting methods, pesticides mode of action and application.</li>
                  <li style="text-align: justify;">Significant achievements in production of quality planting material of commercially important temperate fruits, medicinal plants, and floriculture have made.</li>
                  <li style="text-align: justify;">Established bud wood & Gene bank for fruits, integrated diseases, pests and nutrient management, use of bio-fertilizers & natural/organic farming, crop regulation and energy efficient canopy management.</li>
                  <br><br>
                  <p class="text-bold" style="float: left;color: #000;"><strong>Awards and Recognitions</strong></p>
                  <br><br>
                  <li style="text-align: justify;">Life time Achievements award  by Indian Academy of Horticulture Science, New Delhi for 2019.</li>
                  <li style="text-align: justify;">Awarded Indian National Science Academy visiting scientist fellowship under exchange program with Royal Society, London, UK.</li>
                  <li style="text-align: justify;">Life Time Achievement Award for overall development of Horticulture in general and Plant Diseases Management by YSPUHF, Himalayan Phytopathological Society of India.</li>
                  <li style="text-align: justify;">Recipient of Indian Horticulture Gold Medal in Fruit Science in the development of Horticulture.</li>
                  <li style="text-align: justify;">Received first European Commission collaborative research project on “Sustainable Production of Apple in Asia”. In the consortium UK, Germany, Hungry, France, China and India are partners.</li>
                  <br>

                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Post Doctorate from Horticulture research international East Malling of UK in Disease forecasting.</li>
                  <li style="text-align: justify;">Ph.D. on 1987 from Dr. YS Parmar University, Solan in Plant Pathology (Fruits).</li>
                  <li style="text-align: justify;">M.Sc. on 1983 from HPKV, Palampur in Plant Pathology.</li>
                  <li style="text-align: justify;">B.Sc. on 1981 from HPKV, Palampur in Specialization of Agriculture.</li>
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