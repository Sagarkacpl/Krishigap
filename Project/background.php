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
                  <h1 class="display-3 text-white animated slideInDown">Background</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Background</li>
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
                  <p style="color: #0fb249;"><b>Digital Enablement on Food Safety & Quality Standards</b></p>
                  <p style="text-align: justify;">Ensuring a safe food supply is critical for consumers, farmers, and food businesses and it must start with education and training from field to fork.</p>
                  <p style="text-align: justify;">Farmers and consumers alike have a shared interest in growing and eating safe food.</p>
                  <p style="text-align: justify;">Keeping food, free of chemical, physical, and microbial contaminants during planting season all the way through harvest is a top priority for all the countries to reduce potential safety risks. Each year millions of people are medically treated for foodborne illnesses as a result of poor food safety practices</p>
                  <p style="text-align: justify;">In order to address the challenges in the implementation of on farm food safety systems in rural areas, a new approach is needed that combine innovative interventions and practices through Digital Empowerment</p>
                  <p style="text-align: justify;">Biggest challenge in rural areas in the implementation of good agricultural practices & food safety programs is lack of awareness and understanding of the requirements and non-availability of consultants </p>
                  <p style="text-align: justify;"><b>Our goal is to digitally reach all the important crop production centers in rural areas  and to create large pool of skilled persons ( Food Safety bearers)  who will become enablers in promoting food safety across food supply chain and to create impact on:</b></p>
                  <li style="text-align: justify;">Safety, Health and Welfare of the Farmers & Farm workers</li>
                  <li style="text-align: justify;">Sustainable and profitable agricultural operations</li>
                  <li style="text-align: justify;">Positive effect on Climate Change</li>
                  <li style="text-align: justify;">Reduce foodborne illnesses through safe and healthy food</li><br>
                  <p style="text-align: justify;"><img src="img/bg.png" width="100%"></p>
                  <p><b>SEE HOW FOOD SAFETY IS EVOLVED AROUND THE WORLD</b></p>
                  <p style="color: #0fb249;"><b>UNITED STATES</b></p>
                  <li style="text-align: justify;">The first U.S. laws addressing the safety of food supply was passed – the Pure Food and Drug Act and the Federal Meat Inspection Act. 1962</li>
                  <li style="text-align: justify;">President John F. Kennedy proclaimed the Consumer Bill of Rights, which stated that consumers have a right to safety, to be informed, to choose, and to be heard. These rights have a direct correlation to the many food safety acts</li>
                  <p style="color: #0fb249;"><b>GLOBAL GOOD AGRICULTURAL PRACTICES -1997</b></p>
                  <li style="text-align: justify;">GLOBALG.A.P.’s roots began in 1997 as EUREPGAP, an initiative by retailers belonging to the Euro-Retailer Produce Working Group. British retailers working together with supermarkets in continental Europe become aware of consumers’ growing concerns regarding product safety, environmental impact and the health, safety and welfare of workers and animals.</li>
                  <p style="color: #0fb249;"><b>GLOBAL FOOD SAFETY INITIATIVE (GFSI) -2000</b></p>
                  <li style="text-align: justify;">Food industry leaders created the Global Food Safety Initiative (GFSI) to collaboratively drive industry improvement to reduce food safety risks and increase consumer confidence in the delivery of safe food.</li>
                  <p style="color: #0fb249;"><b>THE EUROPEAN UNION- 2002</b></p>
                  <li style="text-align: justify;">The E.U. has proactively adopted food laws for its 28 member countries that are applicable to other countries (i.e., third countries) that trade with member nations to the E.U. The European Food Safety Authority was established in 2002 and is responsible for risk assessment</li>
                  <p style="color: #0fb249;"><b>INDIA</b></p>
                  <li style="text-align: justify;">The Food Safety and Standards Act, 2006 came into effect from 23rd August 2006.</li>
                  <li style="text-align: justify;">It has been created for laying down science based standards for articles of food and to regulate their manufacture, storage, distribution, sale and import to ensure availability of safe and wholesome food for human consumption.</li>
                  <li style="text-align: justify;">India Good Agricultural Practices launched by Quality Council of India, latest version 2021 with the intent that the retailers and the buyers recognize that if farmers in the region opt for hygiene and food safety in their production system, they will enjoy access to guaranteed new markets, have reliable quality inputs, will increase farm value and increase farmer’s skill in farming operations in domestic as well as in the global markets.</li>
                  <p style="color: #0fb249;"><b>WHO</b></p>
                  <li style="text-align: justify;">Today, the 164 member countries of the World Trade Organization (WTO) recognize the CAC standards as food safety policy that meets international expectations for food safety management.</li><br>
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