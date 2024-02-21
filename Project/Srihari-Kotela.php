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
                  <img style="width: 20%;" src="img/shri-hari.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Srihari Kotela</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Founder -Krishigap Digital Solutions Pvt Ltd and  eFresh Agribusiness Solutions.
                  </li>
                  <li style="text-align: justify;">Chairperson for Certification Committee – India Good Agricultural Practices Certification Scheme, appointed by Quality Council of India (QCI), an autonomous body set up by Govt of India, CII, FICCI, ASSOCHAM.
                  </li>
                  <li style="text-align: justify;">ISO17065 Standard, technical expert for Spice Board Project -IndG.A.P certification for Spices, appointed by QCI.
                  </li>
                  <li style="text-align: justify;">ISO 17065 Standard,technical experts for Medicinal Plants Certification Scheme, appointed by QCI.
                  </li>
                  <li style="text-align: justify;">Received Lifetime Achievement Award from the President of the United States with a citation from the White House for lifelong commitment to building a stronger nation through volunteer service.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Founder Foodcert India Pvt Ltd in the year 2001 in collaboration with Foodcert BV, The Netherlands. First certification body (CB) in India to receive European Accreditation for inspection of farms under international standard ISO 17020.
                  </li>
                  <li style="text-align: justify;">Championed the introduction of European Retail Parties Good Agricultural Practices certification scheme in India for the first time in 2002 and more than 5000 farmers were covered under GAP certification and facilitated export of agricultural products. Introduced various Global Food Safety Standards covering entire food supply chain like organic certification (NPOP and NOP), HACCP, ISO 22000, BRC, International Food Standard (IFS) etc.  Foodcert is also the first CB granted recognition for India Good Agricultural Practices, Ayush Products and Medicinal Plants certification scheme.
                  </li>
                  <li style="text-align: justify;">Keeping the main focus on  innovative agricultural solutions and  scaling up the implementation of food safety and sustainable standards through a digital platform , parted   Foodcert India to  TATA Projects Ltd, a TATA Group company, which is renamed it TQ Cert  Services Pvt Ltd.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>MEMBERSHIP OF COMMITTIES: Ex</b></p>
                  <br><br>
                  <li style="text-align: justify;">Recognizing his contribution to Global Food Safety and SustainableStandards, wasappointed on various expert committees,by various government and other institutions such as <a href='https://www.bis.gov.in/' target='_blank'>Bureau of Indian Standards</a>, <a href='https://qcin.org/' target='_blank'>Quality Council of India</a>, <a href='https://www.fssai.gov.in/' target='_blank'>Food Safety & Standards)Authority of India</a>, <a href='https://www.cii.in/' target='_blank'>Confederation of Indian Industry</a>, <a href='https://ayush.gov.in' target='_blank'>Department of Ayush, Govt. of India</a>, etc.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>SCOPE OF WORK COVERED UNDER THE COMMITTIES:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Development of Standards on  National Agricultural Code on India Good Agricultural Practices, Good Hygiene Practices, Good retail Practices, Good Animal Husbandry Practices, Voluntary Certification Mark for the food processing sector, Basic Food safety  management system for food establishments, Procedure for certification of  professionals to certify compliance to food safety system, Voluntary certification Scheme for Medicinal Plants, Globally Competitive  horticulture value chain.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Educational Qualifications:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Chartered Accountant.</li>
                  <li style="text-align: justify;">Qualified Lead Auditor- QMS,  EMS, OH&SMS.</li>
                  <li style="text-align: justify;">Trained on Global Food Safety and Sustainable Standards.</li>
                  <li style="text-align: justify;">Introduction to Capability Maturity Model, by Carnegie Mellon University.</li>
                  <li style="text-align: justify;">Trained on Business planning for Indian SMEs- Japan.</li>
                  <br>
                  <div>
                      
                  <p style="float: left;color: #000;"><b>Date: August 2023:</b></p>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Place: Hyderabad, India</b></p>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Email: srihari@krishigap.com</b></p>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Mobile: +91-98480 34740</b></p>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Website: <a href='https://krishigap.com/' target='_blank'>https://krishigap.com/</a></b></p>
                  <br><br>
                  
                  </div>
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