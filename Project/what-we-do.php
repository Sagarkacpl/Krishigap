<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UserID'] != '') {
       //header("Location: price-page.php");
   }
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
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
                  <h1 class="display-3 text-white animated slideInDown">What We Do</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">What We Do</li>
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
                  <p style="text-align: justify;"><b>Digital Enablement on Food Safety & Quality Standards as a One Stop Solution for Implementation</b></p>
                  <p style="text-align: justify;">1. Guidance on implementation includes virtual access to templates on Quality Manual, Procedures, Work Instructions, Risk Assessments, Management Plans, and Records etc. in generic form for the respective standards.  The organization or the implementing agency can use these for guidance and incorporate its own requirements basing on its business operations, standard requirements  and local conditions.</p>
                  <p style="text-align: justify;">2. Training Module will be introduced soon with the objective of creating large pool of skilled persons towards ease of implementation of the standards. Virtual training programs will be organized on key areas of activities demanded in the respective standards, which will facilitate compliance and objective evidence of demonstration during CB audits (Training on audit principles as per ISO 19011, Internal Inspectors, Internal Auditors, Food Safety, Hygiene, Crop specific, Workers health, welfare, safety. Online certificates will be provided to the participant’s .Transparency and Integrity of the training process will be maintained. Domain experts in respective standards will impart the training.</p>
                  <p style="text-align: justify;">3. Krishi GAP platform shall not involve in the certification activities, which will be provided by Accredited Certification Bodies, approved by National Accreditation Bodies and selected independently by the implementers.</p>
                  <p style="text-align: justify;"><b>4. Impact Creation</b></p>
                  <li style="text-align: justify;">Environment friendly and sustainable agriculture</li>
                  <li style="text-align: justify;">Farmers’ organizations directly benefit from increase in income through better market linkages.</li>
                  <li style="text-align: justify;">Availability of trained persons in rural areas</li>
                  <li style="text-align: justify;">Increased farm exports from India</li>
                  <li style="text-align: justify;">Availability of safe food to the consumers</li>
                  <li style="text-align: justify;">Gradual decrease in food borne diseases.</li><br>
                  <p style="text-align: justify;"><b>5. DETAILS ABOUT THE STANDARDS IN THE FIRST PHASE</b></p>
                  <li style="text-align: justify;">IndG.A.P ( India Good Agricultural Practices) launched by Quality Council of India (www.qcin.org) , an Autonomous Body , set up by Govt of India, Confederation of Indian Industry (CII), Federation of Indian Chambers of Commerce (FICCI) and ASSOCHEM.</li>
                  <li style="text-align: justify;">GlobalG.A.P launched by Food PLUS GmbH, Germany (www.globalgap.org). GLOBALG.A.P. today is the world's leading farm assurance program. Present in more than 135 countries.</li>
                  <li style="text-align: justify;">National Program for Organic Production (NPOP) launched by Govt of India. APEDA (www.apeda.gov.in) is the implementing agency.</li>
                  <li style="text-align: justify;">National Organic Production (NOP) launched by US Department of Agriculture(www.usda.gov).</li>
                  <li style="text-align: justify;">Fair Trade International (www.fairtrade.net). Fair trade is the most recognized and trusted sustainable label in the world and demanded by many retailers. Present in 71 countries.</li>
                  <li style="text-align: justify;">Rain Forest Alliance (www.rainforest-alliance.org). It is an international nongovernmental organization working at the intersection of business, agriculture and forests to make responsible business. Compliance is demanded by many retailers. Present in 70 countries.</li>
                  <p style="text-align: justify;"><b>6. We will strive to promote and contribute to the United Nations Sustainable Development Goals.</b></p>
                  <p style="text-align: justify;">1. Poverty, 3 Good Health and well Being, 4 Quality Education, 8 Decent Work and Economic Growth 12 Responsible Production and Consumption, 13 Climate Action 15 Life on Land</p>
                  <p style="text-align: justify;"><img src="img/wwd.png" width="100%"></p>
                  <p style="text-align: justify;"><b>7. Continual Improvement </b></p>
                  <p style="text-align: justify;">With the core expertise of the founders of this platform and net working with the domain experts, we are confident that Krishi GAP Platform will be enabler in scaling up food safety initiatives in rural areas and meet the expectations of the users. We request your feedback and inputs for continual improvement.</p>
                  <p style="text-align: justify;"><b>8. Disclaimer</b></p>
                  <p style="text-align: justify;">Please note that the information, templates, and documents uploaded in KRISHI GAP Site for the respective standards are only generic and prepared for your guidance to the best of our knowledge.  You are advised to visit the websites of respective standard owners , related regulatory authorities/ government institutions for correct information and updates .The user need to prepare Quality Manual , Procedures , Records, Risk Assessments, etc. as applicable to their specific crop needs , scope of operations , standard requirements and geographical conditions. . We are not responsible for any consequences that may arise out of use of information/documents uploaded into Krishi GAP.</p><br>
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