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
   if (!in_array('Sustainable Initiatives', explode(',',$_SESSION["PlanDetails"]))) {
       header("Location: login.php");
   }
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
                  <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Standards (Sustainable Initiatives)</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="home3.php">Sustainable Initiatives</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Standards</li>
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
                  <p style="color: #0fb249;"><b></b></p>
                  <p style="text-align: justify;"></p>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                 <p style="color: #0fb249;"><b>Sustainable Initiatives</b></p>
                  <p style="text-align: justify;">The goal in developing sustainable business practices is to create strategies that preserve the long-term viability of People, Planet and Profit. Embedded in most definitions of sustainability we also find concerns for social equity and economic development.:</p><p style="text-align: justify;">Another reason for India to promote responsible business is the Sustainable Development Goals (SDGs), a set of 17 social, environmental, and economic targets that governments, businesses, and civil society organizations have agreed to meet by 2030.</p><p style="text-align: justify;">Following are the importance of sustainable development:.</p>
                  
                   <p style="text-align: justify;">1. Using the available resources judiciously and working towards maintaining the ecological balance.</p>
                   <p style="text-align: justify;">2. To prevent degradation of the environment and laying emphasis on protecting the environment.</p>
                   <p style="text-align: justify;">3. To prevent overexploitation of resources.</p><br>
                   <p style="color: #0fb249;float: left;"><b>Environment Sustainability</b></p><br><br>
                   <p style="text-align: justify;">Ecological integrity is maintained, all of earth’s environmental systems are kept in balance while natural resources within them are consumed by humans at a rate where they are able to replenish themselves.</p>
                   <p style="color: #0fb249;float: left;"><b>Social Sustainability</b></p><br><br>
                   <p style="text-align: justify;">Universal human rights and necessities are attainable by all people, who have access to enough resources in order to keep their families and communities healthy and secure.</p>
                   <p style="text-align: justify">Present Krishi GAP considered the following sustainable standards</p><br>
                   <ul style="text-align: justify;">
					<li>ISO 14001: Environmental Management Systems ( <a href="https://www.iso.org/" target="_blank">www.iso.org</a> )</li>
					<li>ISO 50001: Energy Management Systems ( <a href="https://www.iso.org/" target="_blank">www.iso.org</a> )</li>
					<li>ISO 45001: Occupational Health and safety Management Systems ( <a href="https://www.iso.org/" target="_blank">www.iso.org</a> )</li>
					<li>SA 8000:   Social Accountability ( <a href="https://sa-intl.org/" target="_blank">www.sa-intl.org</a> )</li>
					<li>Rain Forest Alliance ( <a href="https://rainforest-alliance.org/" target="_blank">www.rainforest-alliance.org</a> )</li>
					<li>Fair Trade International ( <a href="https://fairtrade.net/" target="_blank">www.fairtrade.net</a> )</li>
				</ul>
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