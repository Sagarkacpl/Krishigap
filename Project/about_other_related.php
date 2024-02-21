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
                  <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Others</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="home4.php">Others</a></li>
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
            <div class="wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                 <p class="text-center" style="color: #0fb249;"><b>OTHER INITIATIVES</b></p>
                  <p style="text-align: justify;">The cold chain, pack houses, and dry warehouses play crucial roles in the food supply chain, ensuring the quality, safety, and availability of perishable/nonperishable goods from production to consumption.</p>
                  <p class="text-left" style="color: #0fb249;"><b>Cold Storages</b></p>
                  <ol style="text-align: justify;">
					<li>Preservation of Quality: Cold chain refers to the temperature-controlled supply chain, starting from the point of harvest or production to storage, transportation, and distribution. Maintaining specific temperature ranges throughout the cold chain helps preserve the quality and freshness of perishable foods like fruits, vegetables, meat, dairy products, and seafood.</li>
					<li>Food Safety: By keeping products at appropriate temperatures, the cold chain minimizes the risk of microbial contamination, maintaining the safety of the food products throughout the supply chain.</li>
					<li>Extended Shelf Life: Controlled temperature and humidity conditions within the cold chain can significantly extend the shelf life of perishable goods.</li>
				</ol>
				
				<p class="text-left" style="color: #0fb249;"><b>Packhouses</b></p>
                  <ol style="text-align: justify;">
					<li>Pack houses are specialized facilities where produce is sorted, graded, washed, packed, and often pre-cooled before distribution. These operations ensure uniformity, standardization, and quality control of the products. Pack houses allow for the removal of damaged or defective items, sorting based on size and quality, and packaging according to specific market requirements.</li>
				</ol>
                  <p class="text-left" style="color: #0fb249;"><b>Food testing laboratories</b></p>
                   <p style="text-align: justify;">Food testing laboratories play a critical role in the food supply chain by conducting various tests and analyses to ensure the safety, quality, and compliance of food products.</p>
                   
                  <p class="text-left" style="color: #0fb249;"><b>Dry Warehouses</b></p> 
                   
                   <p style="text-align: justify;">Dry warehouses play a crucial role in the food supply chain by providing storage and logistical support for a wide range of non-perishable food products.</p>
                   <p style="text-align: justify;">These warehouses provide ample space and appropriate conditions, including controlled temperature and humidity levels, to preserve the quality and integrity of the stored products.</p><br>

                   <p style="text-align: justify;">Dry warehouses serve as distribution hubs within the food supply chain. 
 Dry warehouses provide an environment where proper quality control measures can be implemented.
</p>
                   <p style="text-align: justify;">Dry warehouses serve as distribution hubs within the food supply chain. 
 Dry warehouses provide an environment where proper quality control measures can be implemented.
</a></p>
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