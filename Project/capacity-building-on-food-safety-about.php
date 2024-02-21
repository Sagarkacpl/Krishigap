<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }
   include "connection.php";
   // include "most_visited_page.php";
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
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-6 text-white animated slideInDown">Capacity Building on Food Safety Standard</h1>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                  <p style="color: #000;"><b>Food Safety Standards with Ease of Implementation</b></p>
                 
<p style="float: left;color: #0fb249;"><b>Preamble</b></p>
                  <br><br>
                  <li style="text-align: justify;">Food safety is a major determinant of health. It affects the survival, well-being, livelihood and productivity of individuals and eventually societies. Throughout the world, food borne diseases represent a considerable public health burden and challenge</li>
<li style="text-align: justify;">Food safety and quality management is rapidly gaining importance. There is a need to create enough human resources  in important crop production centers, which will create environment towards science based approach to assure safety which is essential for scaling up the implementation of the food safety standards at farm level  and simultaneously enhancing the environment ,sustainable agricultural production and income of the farmers.</li>
                  <br>



                  <p style="float: left;color: #0fb249;"><b>Need for Capacity Building</b></p>
                  <br><br>
                  <li style="text-align: justify;">Food borne diseases in India are expected to rise from 100 million in 2011 to 150-170 million in 2030 ( WHO)</li>
<li style="text-align: justify;">Crop production centers are located in rural areas. Hardly any trained consultant is available to support farmer’s organizations. If the trained person is sourced from cities, then it becomes very expensive including travel costs.</li>

<li style="text-align: justify;">Importers and retailers demand food safety compliances.</li>
<li style="text-align: justify;">Lack of awareness in rural areas on food safety standards related to on farm production and the income benefits  from implementation and certification.  </li>
<li style="text-align: justify;">Though there are approved certification bodies, they are not allowed to provide specific guidance on the implementation of the standards due to conflict of interest.</li>
<li style="text-align: justify;">Major confusion arises when the organization implements more than on standard. Most of these standards have common clauses of compliances. Therefore, it is most important to put integrated documentation in place for ease of implementation and certification.</li>
                  <br>

                  <p style="float: left;color: #0fb249;"><b>eFresh Initiative </b></p>
                  <br><br>
                  <li style="text-align: justify;">To develop and create   trainers with the objective of ensuring at least one trained and certified human resource in every important crop production center in India. To implement and to scale up, the only way is to do virtual enablement platform. The goal is to bring translated versions in local languages for ease of understanding and implementation </li>
<li style="text-align: justify;">The training will focus on compliances to the following Internationally recognized standards demanded by the retailers, processors  and importers</li>
<li style="text-align: justify;"> IndG.A.P, GlobalG.A.P, Organic –NPOP, Organic –NOP, Fair Trade International, Rain Forest Alliance.</li>
<p style="text-align: justify;"> With the core expertise of the founders of this platform and net working with the domain experts PAN India ,founders are confident that the capacity building programs will become enablement for scaling up of implementation of good agricultural practices in rural areas.</p>
                  <br>

                  <p style="float: left;color: #0fb249;"><b>Trainings </b></p>
                  <br><br>
                  <li style="text-align: justify;">Considering the continued presence of Covid19, the only way to create trainers is through digital means </li>
<li style="text-align: justify;">Most of the standards require only two days training on auditing principles( ISO 19011)  and one day training on food safety, hygiene, and crop specific training etc</li>
<li style="text-align: justify;">Transparency and integrity of the training process, trainers, trainees and feedback will be maintained. Training process and its outcome  will be   digitized </li>
<li style="text-align: justify;">Successful trainees will be provided certificates.</li>
                  <br>

                  <p style="float: left;color: #0fb249;"><b>Learning outcomes and Impact Creation </b></p>
                  <br><br>
                  <li style="text-align: justify;">Availability of trained persons in crop production centers. </li>
                  <li style="text-align: justify;">Farmers and farmers’organizations directly benefit from increase in income through  better market linkages.</li>

                  <li style="text-align: justify;">Increased  farm exports from India</li>
                  <li style="text-align: justify;">Sustainable agriculture production with focus on environment.</li>
                  <li style="text-align: justify;">Safe food to the consumers </li>
                  <li style="text-align: justify;">Gradual decrease in food borne diseases.</li>
                  <br>

                  <p style="float: left;color: #0fb249;"><b>We will strive to promote and contribute to the United Nations Sustainable Development Goals.</b></p>
                  <br><br>
                  <li style="text-align: justify;">1. Poverty, 3 Good Health and Well Being, 4 Quality Education, 8 Decent Work and Economic Growth 12 Responsible Production and Consumption, 13 Climate Action 15 Life on Land  </li>
                  <br>
                  <center><img src="img/capacity.jpg" style="width: 100%;"></center>
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