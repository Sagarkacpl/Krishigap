<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
       //header("Location: index.php");
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
   <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
      rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
   <link href="lib/animate/animate.min.css" rel="stylesheet">
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <script type="text/javascript"
      src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   <script type="text/javascript">
      function googleTranslateElementInit() {
         new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'hi,en,te' }, 'google_translate_element');
      }
   </script>
   <style>
      img.img-fluid {
         height: 400px !important;
      }
   </style>
</head>

<body>
   <div id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <?php include "navbar.php";?>
   <style>
   .carousel-control-next-icon, .carousel-control-prev-icon {
    border: 1px #00a039 solid;
    background-color: #00a039;
   }
   </style>
   <div class="heightlight-line">
      <div class="container">
         GLOBAL FOOD SAFETY STANDARDS AT YOUR DOOR STEP-A PRACTICAL GUIDE TOWARDS EASE OF IMPLEMENTATION
      </div>
   </div>
   <div class="container mb-5">
      <div class="row">

         <div class="col-md-9" style="padding:0px; margin:0px;">
            <div class="owl-carousel header-carousel position-relative">
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/pomegranatebanner.jpg" alt="">
               </div>
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/bananabanner.jpg" alt="">
               </div>
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/basmatiricebanner.jpg" alt="">
               </div>
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/vegetablebanner.jpg" alt="">
               </div>
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/mangotreebanner.jpg" alt="">
               </div>
               <div class="owl-carousel-item position-relative">
                  <img class="img-fluid" src="img/grapesbanner.jpg" alt="">
               </div>
            </div>
         </div>
         <div class="col-md-3" style="padding:0px; margin:0px; border-left:4px #fff solid">
         <!-- <h5 class="text-left title-m-2 p-3" style="text-align:center; color:#fff;">Advertisement</h5> -->
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
               data-bs-interval="5000">
               <ol class="carousel-indicators">
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                  <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <a href="https://www.cabi.org/" target="_blank">
                        <img class="d-block w-100" src="/img/Post1-test.jpg" alt="First slide">
                     </a>
                  </div>
                  <div class="carousel-item">
                     <a href="https://www.alsglobal.com/" target="_blank" rel="noopener noreferrer">
                        <img class="d-block w-100" src="/img/Post2-test.jpg" alt="Second slide">
                     </a>
                  </div>
                  <div class="carousel-item">
                     <a href="https://aditicert.net/" target="_blank" rel="noopener noreferrer">
                        <img class="d-block w-100" src="/img/Post3-test.jpg" alt="Third slide">
                     </a>
                  </div>
                  <div class="carousel-item">
                     <a href="https://apsopca.org/" target="_blank" rel="noopener noreferrer">
                        <img class="d-block w-100" src="/img/Post4-test.jpg" alt="Fouth slide">
                     </a>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators"
                  data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators"
                  data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
               </a>
            </div>
         </div>


      </div>
      <!-- <div class="news-section">
            <div class="background-green food-supply-box position-relative radius-10 min-height">
               <div class="">
                  <div class="box-title-1 news-text">News </div>
                  <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
                     <?php
                        $query = mysqli_query($db, "SELECT * from news where DeletedStatus='0' ORDER BY NewsID DESC LIMIT 2");
                        if($query){
                           $rownum = mysqli_num_rows($query);
                        while($row = mysqli_fetch_array($query)){
                        ?>
                     <div class="food-supply-box-inder-re" style="border-right: none;border-left: none;">
                        <a href="<?php echo $row['NewsLink']; ?>" target="_blank">
                           <h4><?php echo $row['NewsTitle']; ?>&nbsp;</h4>
                           <span><?php echo date_format(date_create($row['Date']),"d/m/Y"); ?>&nbsp;</span>
                        </a>
                     </div>
                     <?php }} ?>
                     <?php if($rownum > 2){?>
                     <a class="btn btn-primary btn-m news-readmore-btn" href="">View All</a>
                     <?php } ?>
                  </marquee>
               </div>
            </div>
         </div> -->
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
      <div class="container">
         <div class="row g-4">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-1 text-center position-relative">
                        <a href="food-safety-standards.php">
                           <div class="m-img">
                              <img src="img/foodsafetystandard.jpg">
                           </div>
                           <div class="service-item-title service-item-title-1">Food Safety Standards</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-2 text-center position-relative">
                        <a href="farmer-hand-book.php">
                           <div class="m-img">
                              <img src="img/farmerhandbook.jpg">
                           </div>
                           <div class="service-item-title service-item-title-2">Farmer Hand Book</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-3 text-center position-relative">
                        <a href="demo-farm.php">
                           <div class="m-img">
                              <img src="img/demofarm.jpg">
                           </div>
                           <div class="service-item-title service-item-title-3">DEMO FARM</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-3 text-center position-relative">
                        <a href="training-module.php">
                           <div class="m-img">
                              <img src="img/skills-development.jpg">
                           </div>
                           <div class="service-item-title service-item-title-3">SKILL DEVELOPMENT</div>
                        </a>
                     </div>
                  </div>
                  <!-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item service-item-box-3 text-center position-relative">
                           <a href="capacity-building-on-food-safety.php?page=home1">
                              <div class="m-img">
                                 <img src="img/capacity-building3.jpg">
                              </div>
                              <div style="padding-top: 0px;padding-bottom: 0px;" class="service-item-title service-item-title-3">Capacity Building on Food Safety Standard</div>
                           </a>
                        </div>
                     </div> -->
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-4 text-center position-relative">
                        <a href="internal-inspection.php">
                           <div class="m-img">
                              <img src="img/Internalinspection.jpg">
                           </div>
                           <div class="service-item-title service-item-title-4">Internal Inspection</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-5 text-center position-relative">
                        <a href="internal-audit.php">
                           <div class="m-img">
                              <img src="img/internalaudit.jpg">
                           </div>
                           <div class="service-item-title service-item-title-5">Internal Audit</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-6 text-center position-relative">
                        <a href="plant-protection.php">
                           <div class="m-img">
                              <img src="img/plantprotectionproduct.jpg">
                           </div>
                           <div class="service-item-title service-item-title-6">Plant Protection Products</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-1 text-center position-relative">
                        <a href="Package-of-practices.php">
                           <div class="m-img">
                              <img src="img/PackageofPractices.jpg">
                           </div>
                           <div class="service-item-title service-item-title-1">Package of Practices</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-2 text-center position-relative">
                        <a href="harvesting.php">
                           <div class="m-img">
                              <img src="img/harvesting.jpg">
                           </div>
                           <div class="service-item-title service-item-title-2">Harvest & Post Harvest</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-3 text-center position-relative">
                        <?php
                              $queryf = mysqli_query($db,"SELECT DISTINCT Title from others where DeletedStatus='0' ORDER BY Title LIMIT 1");
                              if($queryf){
                              while($rowf = mysqli_fetch_array($queryf)){
                              ?>
                        <a href="other-option.php?nm=<?php echo $rowf['Title']; ?>&type=search">
                           <?php }} ?>
                           <div class="m-img">
                              <img src="img/Others.jpg">
                           </div>
                           <div class="service-item-title service-item-title-3">Government Promoting Institutions</div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item service-item-box-4 text-center position-relative">
                        <a href="workers-health.php">
                           <div class="m-img">
                              <img src="img/workershealth.jpg">
                           </div>
                           <div class="service-item-title service-item-title-4">Workers Health, Safety & Welfare</div>
                        </a>
                     </div>
                  </div>

                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"
                     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                     <div class="service-item service-item-box-3 text-center position-relative">
                        <a href="crops-standards.php">
                           <div class="m-img">
                              <img src="img/plantnutritionalmanagement.jpg">
                           </div>
                           <div class="service-item-title service-item-title-3">Crops Standards</div>
                        </a>
                     </div>
                  </div>
               </div>
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