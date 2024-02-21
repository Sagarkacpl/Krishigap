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
 //   include "most_visited_page.php";
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
   <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
      rel="stylesheet">
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
   <div id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <?php include "navbar.php";?>
   <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
               <h1 class="display-3 text-white animated slideInDown">Food Safety Standards</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                     <li class="breadcrumb-item text-white active" aria-current="page">Food Safety Standards</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
      <div class="container">
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="page-detail-line" style="padding-bottom: 0px;">
               <h4 style="color: #0fb249;"><b>PALANIVEL RAJ SIVAMANI VEDACHALAM</b></h4>
               <p style="color: #0fb249;">B. Tech (Food Process Eng..,), MBA (Marketing Management).</p>
               <p style="color: #0fb249; margin-top:-15px;">Manager – Certification & Training Services.</p>
               <p style="color: #0fb249; margin-top:-15px;">Lead Auditor – Food Safety Management Systems.</p>
               <p style="color: #0fb249; margin-top:-15px;">Bangalore – India.</p>
               <p style="color: #0fb249; margin-top:-15px;">+91- 63649 – 27545</p>
               <p style="color: #0fb249; margin-top:-15px;">p.vedhachalam@alsglobal.com</p>
               <h5 style="float: left;color: #0fb249;">Professional Summary:</h5>
               <br><br>
               <p style="text-align: justify;">A very qualified food process engineer with experience of 14 years in food industry management, new product development, second- and third-party certification audits of quality, food safety management & hygiene systems and accreditation management for ISO Conformity Assessment Bodies.</p>
               <p style="text-align: justify;">Constantly endeavor to ensure compliance in food safety requirements, processes, management systems and legal across all food businesses, consultative and conformity assessment sectors.</p>

               <br>

               <h5 style="float: left;color: #0fb249;">Professional Trainings & Courses (Continuing Professional Development):</h5>
               <br><br>
               <ul>
                  <li style="float: left;"><b>ISO 22000:2018 & FSSC V5 Lead Auditor (IRCA Approved).</b></li><br>
                  <small style="float: left;">SGS Academy, India. (2020)</small> <br>

                  <li style="float: left;"><b>ISO 17021-1:2015.</b></li><br>
                  <small style="float: left;">Dubai Accreditation Centre, Government of Dubai, United Arab Emirates. (2017) </small> <br>

                  <li style="float: left;"><b>Person in Charge Level 3 Award in Supervising Food Safety in Catering.</b></li><br>
                  <small class="text-left" style="float: left;">Highfield Awarding Body for Compliance – UK & Middle East (2014); Approved by Food Control Department of Dubai Municipality, Dubai – United Arab Emirates.</small><br>
                  <li style="float: left;"><b>Sharjah Food Safety Program HACCP Professional Award.</b></li><br>
                  <small class="text-left" style="float: left;">Approved by United Arab Emirates – Sharjah Government for HACCP Auditing, Sharjah City Municipality, Sharjah – United Arab Emirates. (2014)</small><br>
                  <li style="float: left;"><b>BRC V8 Lead Auditor. (attended).</b></li> <br><br><br>
                  <small class="text-left" style="float: left;margin-top: -10px;">Intertek India (2020).</small><br>

                  <li style="float: left;"><b>ISO 9001:2015 Lead Auditor.</b></li><br>
                  <small style="float: left;">Gabriel Registrar Certificate Issuing Services LLC, Dubai – UAE. (2018)</small>
               </ul>
               <br>



               <h5 style="float: left;color: #0fb249;">Research Experiences</h5>
               <br><br>
               <p style="text-align: justify;"><b>“Studies on maturity indices and quality evaluation of Noni fruit, (Morinda citrifolia L.)” </b>SRM University – Chennai, India. (Sep 2008 – April 2009). </p>
               <p  style="text-align: justify;">The objective of this research was to optimize the harvest stage of selected varieties of noni fruit for the effective utilization of nutritional and functional elements present in noni during industrial processing.</p>

               <br>


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