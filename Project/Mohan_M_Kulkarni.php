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
                  <img style="width: 20%;" src="img/Mohan_M_Kulkarni.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Mr. Mohan M. Kulkarni</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Consulting and training on Quality and Environment and Energy Management Systems.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Audit and Consultancy in ISO-14001 and 45001, EnMs 50001, PAS99, ISO14064 (Carbon Footprint), ISO14046 (Water Footprint).</li>
                  <li style="text-align: justify;">Leading the AIM ENVIRO group, having foot hold in Energy, Environment, Occupational Health & Safety.</li>
                  <li style="text-align: justify;">Bio-Medical Waste Management and “Green Audit” A novel program for waste reduction. Ozone depletion and Climate Change (Global warming, CDM & Carbon Trading).</li>
                  <li style="text-align: justify;">EHS Legal compliance audit and training, Environmental liability assessment, Environmental Due diligence, ‘Environment Knowledge Centre’– Acknowledge based environmental social initiative.</li>
                  <li style="text-align: justify;">Over 30 years of industrial and consulting experience including reputed industrial organizations in various responsible capacities, viz. Kirloskar, Birla, Bosch.</li>
                  <li style="text-align: justify;">Working as Consultant in various fields for over 30years.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Areas OF Special Interest:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Environment Impact Assessment studies & Environmental Risk Assessment Mathematical modeling & Computer simulation for Environmental Assessment.</li>
                  <li style="text-align: justify;">Design of Water, Air & Noise Pollution Control Systems.</li>
                  <li style="text-align: justify;">Reduction in Green House Gas emissions (including Energy & Natural resources conservation), Carbon Footprint, Water footprint, Carbon credits & Carbon trading.</li>
                  <li style="text-align: justify;">Reduction in Green House Gas emissions (including Energy & Natural resources conservation), Carbon Footprint, Water footprint, Carbon credits & Carbon trading.</li>
                  <li style="text-align: justify;">Waste minimization (including Hazardous Waste Audit),Bio-medical waste & Municipal solid waste management and Application of Biotechnology.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Professional Qualifications</b></p>
                  <br><br>
                  <li style="text-align: justify;">Lead Auditor: ISO14001, OHSAS18001, EnMS, HACCP.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Professional Memberships</b></p>
                  <br><br>
                  <li style="text-align: justify;">Member, The Institution of Engineers (India).</li>
                  <li style="text-align: justify;">Fellow, Institution of Valuers.</li>
                  <li style="text-align: justify;">Founder Member, Practicing Valuers Association (India) Member, Indian Institute of Metals: M.I.I.M.</li>
                  <li style="text-align: justify;">Member, Indian Council of Arbitration :M.I.C.A. ;Panel Arbitrator.</li>
                  <li style="text-align: justify;">Member, Action Committee, Upper Godavari Global Water Partnership.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Educational Qualifications</b></p>
                  <br><br>
                  <li style="text-align: justify;">B.E., M.M.S., C. Eng. (I), M.I.E., F.I.V., M.I..I.M., M.I.C.A., S.L.A.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>ISO & Other Management Systems</b></p>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Visiting Faculty/ Lectures</b></p>
                  <br><br>
                  <li  style="text-align: justify;">Visiting faculty to many educational, professional and training institutions viz;</li>
                  <li  style="text-align: justify;">Various institutes of Engineering & Technology and Management, Symbiosis–SIOM and SCMHRD, Mahindra Institute of Quality (MIQ & MMDC), Maharashtra Jeevan Pradhikaran, Upper Godavari Water Partnership (Global Water Partnership),India Security Press.</li>
                  <li  style="text-align: justify;">The Institution of Engineers, Industries & Manufacturers ’Association (NIMA), The Indian Institute of Architects, Practicing Valuers Association (India), Institution of Valuers</li>
                  <br><br>
                  <p style="float: left;color: #000;"><b>Propagation OF Innovative Concepts</b></p>
                  <br><br>
                  <li  style="text-align: justify;">ELV, WEEE & RoHS, REACH, Carbon foot print, Carbon neutrality, Water Footprint & Inventory of Green House Gases (GWP), Environmental Product Declaration (EPD).</li>
                  <li  style="text-align: justify;">Green building: IGBC-LEED & GRIHA, Green concepts for developmental projects, Environmental Site Assessment, Due Diligence, Environmental liability assessment.</li>
                  <li  style="text-align: justify;">‘HRTS’– High Rate Transpiration System for disposal of treated effluent ‘CTW’ Constructed Wet land and ‘Bio Filter’ for treatment of canteen/ domestic waste water.</li>
                  <li  style="text-align: justify;">Water audit, Energy audit & Waste Audit, Zero waste to landfill, Industrial Ecology & Circular economy, Extended Producer responsibility (EPR), GRS, Ocean Bound Plastic (OBP).</li>
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