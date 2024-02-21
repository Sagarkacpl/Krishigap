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
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
       header("Location: login.php");
   }
//    include "most_visited_page.php";
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
                  <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">About Internal Audit (Post Harvest Processing)</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="home2.php">Post Harvest Processing</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Internal Audit</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
         <div class="container">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                 <p class="text-center" style="color: #0fb249;"><b>Internal Audit</b></p>
                  <p style="text-align: justify;">Internal audit plays a crucial role in the implementation of food safety standards within an organization.</p>
                  <ol>
                      <li>Compliance Verification: Internal audits help verify compliance with food safety standards. By conducting regular audits, organizations can identify any non-compliance issues and take corrective actions to address them promptly.</li>
                      <li>Risk Identification and Mitigation: Internal audits help identify potential risks and hazards within the food production processes this proactive approach enhances food safety and minimizes the likelihood of incidents such as foodborne illnesses or product recalls.</li>
                      <li>Process Improvement: Internal audits provide opportunities for process improvement by evaluating the efficiency and effectiveness of existing food safety procedures.</li>
                      <li>Verification of Corrective Actions: Internal auditors play a crucial role in verifying the implementation and effectiveness of these corrective actions. By ensuring that corrective actions are properly executed, an internal audit helps maintain the integrity of food safety standards.</li>
                  </ol>
                  

                   <p style="text-align: justify;">In summary, internal audit plays a vital role in the implementation of food safety standards by verifying compliance, identifying, and mitigating risks, driving process improvement, verifying corrective actions, assessing training needs, and contributing to management reviews. By leveraging internal audit effectively, organizations can maintain high levels of food safety, protect consumer health, and enhance overall operational performance.</p>
                   
                   <p style="text-align: justify;">2Identification, evaluation, and qualification of internal auditors are done by meeting the requirements of the specific standard. <strong>A completed internal audit will become void if it was done by internal auditors who are not qualified as per the requirements of the standard.</strong></p>
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