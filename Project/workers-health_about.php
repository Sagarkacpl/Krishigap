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
                  <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">About Workers health, safety & welfare (Post Harvest Processing)</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="home2.php">Post Harvest Processing</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Workers health, safety & welfare</li>
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
                 <p class="text-center" style="color: #0fb249;"><b>Workers health, safety & welfare</b></p>
                  <p style="text-align: justify;">These are integral to the successful implementation of food safety standards within an organization. Here are some reasons highlighting their importance:</p>
                  
                  <ol>
                      <li>Personnel Hygiene: Workers' health and hygiene directly impact food safety. Proper personal hygiene practices are essential to prevent the contamination of food. By prioritizing workers' health and hygiene, organizations can minimize the risk of pathogens or foreign substances entering the food production process.</li>
                      <li>Hazard Prevention. Workers’ awareness of safety protocols, such as proper equipment handling, chemical handling, and emergency response procedures, ensures that potential hazards are minimized and controlled.</li>
                      <li>Compliance with Regulations: Occupational health and safety regulations exist to protect workers from hazards in the workplace. Adhering to these regulations is not only a legal requirement but also a fundamental aspect of ethical and responsible business practices.</li>
                      <li>Employee Well-being and Productivity: Prioritizing workers' health, safety, and welfare contributes to employee well-being and job satisfaction. When employees feel safe, respected, and cared for, it positively impacts their morale and motivation. Healthy and satisfied workers are more likely to adhere to food safety protocols and maintain high standards in their work.</li>
                      <li>Continuous Improvement: Workers' health, safety, and welfare should be an ongoing focus of improvement efforts. Regularly assessing and addressing the work environment, implementing safety training programs, and engaging workers in safety initiatives foster a culture of continuous improvement.</li>
                      <li>In conclusion, workers' health, safety, and welfare are crucial in the implementation of food safety standards. By prioritizing these aspects, organizations can prevent hazards, comply with regulations, promote employee well-being and productivity, enhance their reputation, and foster a culture of continuous improvement, all of which contribute to the overall success of their food safety management systems.</li>
                      <li>Organizations must look for specific requirements as may be required by the standard in addition to the above.</li>
                  </ol>
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