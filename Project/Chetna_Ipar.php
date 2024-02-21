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
                  <img style="width: 20%;" src="img/Chetna_Ipar.jpg">
                  <p style="color: #000;font-size: 20px; margin-bottom:0px;"><b>Ms. Chetna Ipar</b></p>
                  <p>Food Safety,  Quality and Regulatory Compliances</p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <ul>
                    <li style="text-align: justify;">Food Safety, Quality and Regulatory Consultant and Trainer (On-site and Off-site).</li>
                    <li style="text-align: justify;">PCQI Lead Instructor (USFDA FSPCA Recognized).</li>
                    <li style="text-align: justify;">BRCGS Global Standard Food Safety Issue 9 Lead Auditor Training, Auditor Training and Sites Training, Conversion for Auditors, Conversion for Sites.</li>
                    <li style="text-align: justify;">FSSC Lead Auditor.</li>
                    <li style="text-align: justify;">BRCGS Product Safety Management Courses such as Hazard Analysis and Critical Control Points (HACCP), Hazard Analysis and Risk-Based Preventive Controls (HARPC), Hazard Analysis and Risk Assessment (HARA), Internal Auditor, Root Cause Analysis, Risk Assessment, Validation and Verification, Vulnerability Assessment for Food Fraud, Environmental Monitoring.</li>
                    <li style="text-align: justify;">BRCGS Global Standard Food Safety Issue 9 Conversion for Auditors, Conversion for Sites, Auditor Training, Lead Auditor Training and Sites Training.</li>
                    <li style="text-align: justify;">USFDA Preventive Control of Human Food (PCQI).</li>
                    <li style="text-align: justify;">FSSAI based Quality and Regulatory requirements.</li>
                  </ul>
                  <p style="float: left;color: #000;"><strong>Designing Factory Compliances with regards to Audit Requirements</strong></p><br><br>
                  <li style="text-align: justify;">Food Safety Management System (HACCP, VACCP, TACCP and relevant systems).</li>
                  <li style="text-align: justify;">Hazard Analysis and Risk Assessment Plan.</li>
                  <li style="text-align: justify;">Quality Compliance and Documentation Guidance.</li>
                  <li style="text-align: justify;">Quality Assurance, GMP, GHP.</li>
                  <br>
                  <p style="float: left;text-align: justify;"><strong>Conducting 2nd Party and 3rd Party Audits across the Food and Beverage Industry as per GFSI requirements, UNICEF, WHO and World Food Program (WFP).</strong></p> <br>
                  <p style="float: left;text-align: justify;"><strong>Regulatory Support as per USFDA, EFSA, Codex Alimentarius, FSSAI.</strong></p>  <br><br><br><br>
                  <li style="text-align: justify;">Label Declarations.</li>
                  <li style="text-align: justify;">Product Guidelines and Categorization.</li>
                  <li style="text-align: justify;">Import and Export Guidelines and Compliances.</li>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Worked with Nestle India and France; Ernst and Young; Hexagon Nutrition Private Limited in the departments of Product, Quality and Regulatory Compliance.</li>
                  <li style="text-align: justify;">Handled products in the categories of Chocolates and Confectionery, Dairy, Coffee and Beverages, Extruded Products and Snacks, Sauces and Seasonings, Functional Ingredients Nutraceuticals (Food for Special Dietary Uses; Food for Special Medical Purpose; Health Supplements; Ready to use Therapeutic Foods and Ready to Use Supplementary Foods; Fortified Rice Kernels, Vitamin and Mineral Premixes).</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Masters in Food Technology (Innovation and Management) - Wageningen University (The Netherlands).</li>
                  <li style="text-align: justify;">Bachelor of Technology (Food Engineering and Technology) – Institute of Chemical Technology, Mumbai (Formerly, U.D.C.T).</li>
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