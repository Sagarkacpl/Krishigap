<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
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
                  <img style="width: 20%;" src="img/Dr.-P-V-S-M-Gouri.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr. P V S M Gouri</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Executive Director & CEO , Association of Indian Organic Industry, New Delhi
                  </li>
                  
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">A professional with over 25 years of experience spanning Corporate, Academic and Regulatory sectors.
                  </li>
                  <li style="text-align: justify;">Technical Advisor, Suminter Organics (India) Pvt Limited)    2018- 2019).Responsible for strategic advisory      assignments for agribusiness in the area of certification   agriculture export  and  R&D etc.
                  </li>
                  <li style="text-align: justify;">Vice President, Food & Organics, Round Glass H2O) Pvt Ltd (2016-2018). Responsible for implementation of Quality Management System in the organic food vertical.
                  </li>
                  <li style="text-align: justify;">Advisor, APEDA and National Accreditation Body (NAB)  2003-2015. Overall development of the National Organic Program  for Production (NPOP) implemented by Agricultural & Processed Food Export Development Authority (APEDA) under the Ministry of Commerce and Industry, Govt of India for development of exports. Framing of National Standards under NPOP and Capacity building. Establishment and implementation of the Quality Management System (QMS) for accreditation of Certification Bodies (CBs), assessment & audits of the Certification Bodies.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Acadamic and Membership Expereince</b></p>
                  <br><br>
                  <li style="text-align: justify;">Assessor with National Body for Accreditation of Certification Bodies (NABCB)since September 2018.
                  </li>
                  <li style="text-align: justify;">Represented APEDA in Codex Alimentarius (2004-2015)
                  </li>
                  <li style="text-align: justify;">Represented APEDA as an Expert in several  National Committees of Ministry of Agriculture, Bureau of Indian Standards (BIS), Food Standards and Safety Authority (FSSAI), Ministry of Environment and Forests (2009-10), Ministry of Textiles, Government of India (2009-10) and Planning Commission.
                  </li>
                  <li style="text-align: justify;">The International Task Force on Harmonization and Equivalence in Organic Agriculture (IFOAM/UNCTAD/FAO) (2003-2008).
                  </li>
                  <li style="text-align: justify;">Working group member of The Criteria Committee of The International Federation for Organic Agricultural Movements (IFOAM), Germany (2001-2002).
                  </li>
                  <li style="text-align: justify;">Indira Gandhi National Open University (IGNOU) (2003-2006), New Delhi Visiting Faculty on Organic Agriculture Developed the curriculum and course material for the certificate course in organic farming.
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Ph.D. in Life Sciences & Post Doctorate in Tissue culture.
                  </li>
                  
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