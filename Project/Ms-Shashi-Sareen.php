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
                  <img style="width: 20%;" src="img/Ms-Shashi-Sareen.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Ms Shashi Sareen</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">International Advisor/ Consultant in the areas of food safety , quality, nutrition and one-health associated with various international organizations (STDF, World Bank, FAO, UNESCWA, UNESCAP, WHO, IFC, etc.) and national (NABCB, India for Accreditation).
                  </p>
                  
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align: justify;color: #000;"><strong>CEO and Director, Export Inspection Council of India for 8 yrs.</strong></p>
                  <ul>
                     <li style="text-align: justify;">Responsible for entire administration, technical, manpower aspects, assuring quality for exports of all products notified by Govt of India based on requirements of importing governments covering marine, poultry, egg, dairy, honey, spices, rice, etc.  A major area addressed was establishing and implementing food control systems in these sectors including contaminant and residue monitoring and control programs to meet SPS requirements of importing countries like EU, US, Japan, Australia, etc. Strengthened labs to bring them up to world class with accreditation of these</li>
                  </ul>
                  <p style="text-align: justify;color: #000;"><strong>Director, Bureau of Indian Standards,</strong></p>
                  <ul>
                     <li style="text-align: justify;">Developing standards and implementing certification schemes</li>
                  </ul>
                  <p style="text-align: justify;color: #000;"><strong>Senior Food Safety and Nutrition Officer, FAO Regional Office for Asia and the Pacific, United Nations.</strong></p>
                  <ul>
                     <li style="text-align: justify;">International experience of more than 7 years with FAO as responsible for capacity development and advise to governments and support country capacity strengthening in the area of food safety/quality/ nutrition; responsible for 24 countries. Assessed countries capacity on various aspects of food control system and supported them to meet their SPS compliance under WTO Agreement. Developed and implemented cooperation programmes in the area of food safety, quality and nutrition over the last 7-8 years with international organizations namely FAO in collaboration with EU, UNICEF, World Bank, WHO, etc.</li>
                  </ul>
                  <p style="text-align: justify;color: #000;"><strong>Developing Quality Control & Certification Schemes for export.</strong></p>
                  <ul>
                     <li style="text-align: justify;">Designed, developed and implemented quality control and certification schemes at the national level for various sectors (Fish & fishery products, Dairy products, Poultry & egg products, Honey, Basmati rice, Black pepper, Coffee, Instant foods, Cold storages, animal feeds) for the purpose of export incorporating the international requirements in terms of GMP/GHP/HACCP, traceability, raw material controls, recall systems, etc.</li>
                  </ul>
                  <p style="text-align: justify;color: #000;"><strong>Good Agricultural Practices.</strong></p>
                  <ul>
                     <li style="text-align: justify;">Supported SAARC, ASEAN and Arab regions to implement GAP in fruits and vegetables sector. Also developed and trained countries on implementing, a scheme and training manual on GAP for fruits and vegetables, a training manual on GAP for fruit and vegetable sector for Arab region and training manual for implementing ASEANGAP.</li>
                  </ul>
                  <p style="text-align: justify;color: #000;"><strong>Vice President Quality, Aditya Birla Retail Limited.</strong></p>
                  <ul>
                     <li style="text-align: justify;">Overall in charge of quality in one of the largest retail chains in India, having more than 600 retail outlets in the form of Super markets and Hyper-markets.</li>
                  </ul>
                  <br>
                  <p style="float: left;color: #000;"><b>PROFESSIONAL QUALIFICATIONS</b></p>
                  <br><br>
                  <ul>
                     <li style="text-align: justify;">Quality Management Systems auditor and trainer as per ISO 9000.</li>
                     <li style="text-align: justify;">Lead auditors Course on ISO 14001 Environmental Management Systems.</li>
                     <li style="text-align: justify;">Auditor for HACCP (QAS, Australia; NSF, USA).</li>
                     <li style="text-align: justify;">IRCA certified ISO 22000 FSMS Lead Auditor.</li>
                     <li style="text-align: justify;">Trainings on ISO 17065 and ISO 17021.</li>
                  </ul>
                  <!-- <li style="text-align: justify;">Director & CEO, Export Inspection Council of India for  8 yrs  . Responsible for Statutory function  for assuring Quality for exports of all products notified by Govt of India based on requirements of importing governments covering marine, poultry, egg, dairy, honey, spices, rice, etc. Also responsible for negotiating equivalence & Mutual Recognition Agreements on standards & quality (food & nonfood) with overseas governments.</li>
                  <li style="text-align: justify;">Worked with the government of India in the area of standardization and Quality Control for a period of around 30 years in various capacities including Director and Chief Executive of Export Inspection Council of India, Director with Bureau of Indian Standards, Advisor with APEDA, etc</li>
                  <li style="text-align: justify;">Senior Food Safety and Nutrition Officer ,FAO Regional Office for Asia and the Pacific, United Nations .Responsible for food safety, quality and nutrition related programs of FAO in Asia in relation to capacity building and advise to governments on capacity strengthening to cover food controls, legislation, enforcement/ inspections, policies, development of national food standards, strengthening capacity for participation in Codex, certification and accreditation infrastructures in countries, street food programs,  programs for implementing food safety in various agro food supply chains such as GAPs/ GAHPs/ GHP/ HACCP/ GIs, etc. Responsibility for 24 countries; managing programs/ projects and ensure timely project delivery and technical management.</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>EDUCATION:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Master’s Degree in Foods and Nutrition from Delhi University with first division and second position in Delhi University.
                  </li>
                  <li style="text-align: justify;">Master’s Degree in Human Resource and Organizational Development from Delhi University (Delhi School of Economics) with first division.
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