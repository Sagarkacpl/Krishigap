<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
// include "most_visited_page.php";
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
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-1.4.2.js"></script>
   </head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <?php include "navbar.php";?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Digital Enablement</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Digital Enablement</li>
                        </ol>
                        <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">

                <h4 class="mb-4">Digital Platform Access</h4>
                <p class="mb-4">
                Providing a one-stop digital platform access for guidance on global food
safety and sustainable standards with ease and scalable implementation.
                </p>

                <h4 class="mb-4">Skill Development Programs</h4>
                <p class="mb-4">
                Conducting skill development programs for farmer’s organizations/ processors with the knowledge needed for implementation.
                </p>

                <h4 class="mb-4">On-Farm Experience Zones</h4>
                <p class="mb-4">
                Promoting on-farm experience zones that showcase the implementation of the on farm production standards- Practical learning hubs for farmers.
                </p>

                <h4 class="mb-4">Buyer Certification Connection</h4>
                <p class="mb-4">
                Connecting buyers to certified organizations.
                </p>

                <h4 class="mb-4">Information Repository</h4>
                <p class="mb-4">
                Creating a comprehensive repository of information on the standards implementation.
                </p>

                <h4 class="mb-4">Collaboration</h4>
                <p class="mb-4">
                Fostering collaboration with Startups in the agri supply chain
                </p>

                    <!-- <h4 class="mb-4">An Overview on Krishi GAP</h4>
                     <p class="mb-4">We bring global food safety standards to your doorstep. Facilitate, ease of implementation, and link you to the markets for certified produce. To make this possible, we have a one ‘Stop Solution’, which combines tools and advisories that are simple and easily implementable.</p> 
                     
                      <p class="mb-4">Through these, we equip crop production/food processing centers to empower farmer’s organizations and processing centers towards ease of implementation of global food safety standards.</p> 
                      
                       <p class="mb-4">With the export of agriculture products crossing USD 50 billion in 2021-22, the highest ever, the world is looking up to India for the supply of Agri commodities and processed foods, which will go a long way in realizing the Hon’ble Prime Minister’s vision of improving farmers income.</p> 
                       
                        <p class="mb-4">The demand for good quality and safe foods has also been growing in India with the rise in income levels and purchasing power of consumers. Consequently, the ability or willingness to pay a premium price for high-quality products too is increasing.</p> 
                        
                         <p class="mb-4">However, the biggest challenge in the implementation of global food safety standards is the lack of understanding of these standards and the non-availability of consultants in semi-urban and rural Areas.</p> 
                         
                      <h4 class="mb-4">What Krishi GAP does</h4>
                    <ul>
                        <li>Digital Enablement & Skill Development on Food Safety standards.</li>
                        <li>Connecting the buyers to the certified clients.</li>
                        <li>Digitization of the data and records involved in the certification process.</li>
                    </ul>
                    
                     <h4 class="mb-4">Standards Covered</h4>
                    <ol>
                        <li>ON-FARM PRODUCTION: IndG.A.P, GlobalG.A.P, Organic NOP/NPOP/ PGS.</li>
                        <li>POST HARVEST: ISO 22000, FSSC 22000, BRC Global, and BRC Packaging.</li>
                        <li>SUSTAINABLE: ISO 14001,ISO 50001,ISO 45001, SA 8000, Rainforest Alliance.</li>
                        <li>OTHERS: Pack Houses, Cold Storages, Dry Warehouses, Laboratories, Halal and others based on the market demand.</li>
                    </ol>
                    <p class="mb-4">Skill Development Module is an important component of Krish GAP platform.</p>  -->
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/waypoints/waypoints.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>