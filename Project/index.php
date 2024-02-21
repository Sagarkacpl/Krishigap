<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
   include "most_visited_page.php";
   
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
         height: auto !important;
      }

      .service-item-box-1 {
         border-radius: 30px;
         border: 0px;
      }

      .m-img {
         padding-top: 100px;
         padding-bottom: 100px;
      }

      .green-bg {
         background: #00a652;
      }

      .six-box-re {
         text-align: center;
         border-radius: 15px;
         padding: 40px;
         min-height: 257px;
      }

      .same-height-box .six-box-re {
         min-height: 195px !important;
      }
      

      .six-box-title {
         font-size: 15px;
         color: #fff;
         line-height: 34px;
      }

      .t-card {
         padding: 1.8125rem 1.125rem;
         border-radius: 1.25rem;
         color: $white;
         height: 190px !important;
         overflow: auto;
      }
      #carouselExampleIndicators01, .d-block, #carouselExampleIndicators02 .d-block, #carouselExampleIndicators03 .d-block {
         height: 280px;
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
   <div class="heightlight-line">
      <div class="container">

         GLOBAL FOOD SAFETY AND SUSTAINABILITY STANDARDS AT YOUR DOORSTEP: A PRACTICAL GUIDE TOWARDS EASE AND SCALE IN
         IMPLEMENTATION
         <!-- GLOBAL FOOD SAFETY STANDARDS AT YOUR DOOR STEP-A PRACTICAL GUIDE TOWARDS EASE OF IMPLEMENTATION -->
      </div>
   </div>
   <div class="container-fluid p-0 mb-5">

      <div class="owl-carousel header-carousel position-relative">


         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/banner5.jpg" alt="">
         </div>

         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/post_harvest2.png" alt="">
            <!--<img class="img-fluid" src="img/post_harvest.png" alt="" style="height: 385px;">-->
         </div>

         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/banner7-1.jpg" alt="">
         </div>

         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/pomegranatebanner.jpg" alt="">
         </div>
         <!-- <div class="owl-carousel-item position-relative">
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
         </div> -->
      </div>
      <!--
      <div class="news-section">
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
                        <h4>
                           <?php echo $row['NewsTitle']; ?>&nbsp;
                        </h4>
                        <span>
                           <?php echo date_format(date_create($row['Date']),"d/m/Y"); ?>&nbsp;
                        </span>
                     </a>
                  </div>
                  <?php }} ?>
                  <?php if($rownum > 2){?>
                  <a class="btn btn-primary btn-m news-readmore-btn" href="">View All</a>
                  <?php } ?>
               </marquee>
            </div>
         </div>
      </div>
-->
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
      <div class="container">
         <?php if($_SESSION["EmailId"] != 'kgap.2020@gmail.com'){?>
         <div id="liveAlertPlaceholder"></div>
         <?php } ?>
         <div class="row g-4">

            <div class="col-md-8">
               <h3 class="text-left mb-2 title-m-2">An Overview on Krishi GAP</h3>
               <p class="text-justify">
                  The major challenge faced by farmers' organizations and food processors is the lack of understanding
                  of the standards and guidance necessary for implementation, particularly in crop production clusters.
               </p>
               <p class="text-justify">
                  Krishigap platform provides comprehensive guidance in the form of Quality Manuals, Procedures, Records
                  templates, and other essential information required for certification, facilitating ease in
                  implementation on a scale. The standards covered by Krishigap Digital Platform include. <span
                     id="dots">...</span>
               </p>

               <span id="more">
                  <!--<p class="text-justify">-->
                  <!--   Through these, we equip crop production/food processing centers to empower farmer’s organizations-->
                  <!--   and processing centers towards ease of-->
                  <!--   implementation of global food safety standards.-->
                  <!--</p>-->
                  <!--<p class="text-justify">-->
                  <!--   With the export of agriculture products crossing USD 50 billion in 2021-22, the highest ever, the-->
                  <!--   world is looking up to India for the-->
                  <!--   supply of Agri commodities and processed foods, which will go a long way in realizing the Hon’ble-->
                  <!--   Prime Minister’s vision of improving-->
                  <!--   farmers income.-->
                  <!--</p>-->
                  <!--<p class="text-justify">-->
                  <!--   The demand for good quality and safe foods has also been growing in India with the rise in income-->
                  <!--   levels and purchasing power of consumers.-->
                  <!--   Consequently, the ability or willingness to pay a premium price for high-quality products too is-->
                  <!--   increasing.-->
                  <!--</p>-->
                  <!--<p class="text-justify">-->
                  <!--   However, the biggest challenge in the implementation of global food safety standards is the lack of-->
                  <!--   understanding of these standards and the-->
                  <!--   non-availability of consultants in semi-urban and rural Areas.-->
                  <!--</p>-->
                  <div class="row">
                     <div class="col-md-12">
                        <ul>
                           <li>Standard copies are not available on the Krishigap website, due to copyright Issues.</li>
                           <li>You can purchase standard copies from the respective scheme owners as mentioned below by
                              visiting their websites.</li>
                        </ul>
                     </div>
                     <div class="col-md-6">
                        <strong>On Farm Production:</strong>
                        <ul>
                           <li>India's Good Agricultural Practices &nbsp;&nbsp;&nbsp; <span><a
                                    href='https://www.qcin.org/' target='_blank'>www.qcin.org</a></span> </li>
                           <li>Global G.A.P &nbsp;&nbsp;&nbsp; <span><a href='https://www.globalgap.org/'
                                    target='_blank'>www.globalgap.org</a></span> </li>
                           <li>Organic NOP &nbsp;&nbsp;&nbsp; <span><a href='https://www.ams.usda.gov/'
                                    target='_blank'>www.ams.usda.gov</a></span> </li>
                           <li>Organic NPOP &nbsp;&nbsp;&nbsp; <span><a href='https://apeda.gov.in/apedawebsite/'
                                    target='_blank'>www.apeda.gov.in</a></span> </li>
                        </ul>
                     </div>
                     <div class="col-md-6">
                        <strong>Post Harvest:</strong>
                        <ul>
                           <li>ISO 22000 &nbsp;&nbsp;&nbsp; <span><a href='https://www.iso.org/'
                                    target='_blank'>www.iso.org</a></span> </li>
                           <li>FSSC 22000 &nbsp;&nbsp;&nbsp; <span><a href='https://www.fssc.com/'
                                    target='_blank'>www.fssc.com</a></span> </li>
                           <li>BRCGS Global Food Safety &nbsp;&nbsp;&nbsp; <span><a href='https://www.brcgs.com/'
                                    target='_blank'>www.brcgs.com</a></span> </li>
                           <li>BRC Packaging &nbsp;&nbsp;&nbsp; <span><a href='https://www.brcgs.com/'
                                    target='_blank'>www.brcgs.com</a></span> </li>
                        </ul>
                     </div>
                     <div class="col-md-6">
                        <strong>Sustainable Standards:</strong>
                        <ul>
                           <li>ISO 14001 &nbsp;&nbsp;&nbsp; <span><a href='https://www.iso.org/'
                                    target='_blank'>www.iso.org</a></span> </li>
                           <li>ISO 50001 &nbsp;&nbsp;&nbsp; <span><a href='https://www.iso.org/'
                                    target='_blank'>www.iso.org</a></span> </li>
                           <li>ISO 45001 &nbsp;&nbsp;&nbsp; <span><a href='https://www.iso.org/'
                                    target='_blank'>www.iso.org</a></span> </li>
                           <li>SA 8000 &nbsp;&nbsp;&nbsp; <span><a href='https://sa-intl.org/'
                                    target='_blank'>www.sa-intl.org</a></span> </li>
                           <li>Rainforest Alliance &nbsp;&nbsp;&nbsp; <span><a
                                    href='https://www.rainforest-alliance.org/'
                                    target='_blank'>www.rainforest-alliance.org</a></span> </li>
                        </ul>
                     </div>
                     <div class="col-md-6">
                        <strong>Other Schemes:</strong>
                        <ul>
                           <li>Packhouses &nbsp;&nbsp;&nbsp; <span><a href='' target='_blank'></a></span> </li>
                           <li>Cold Storages &nbsp;&nbsp;&nbsp; <span><a href='' target='_blank'></a></span> </li>
                           <li>Dry Warehouses &nbsp;&nbsp;&nbsp; <span><a href='' target='_blank'></a></span> </li>
                           <li>Laboratories &nbsp;&nbsp;&nbsp; <span><a href='' target='_blank'></a></span> </li>
                        </ul>
                     </div>
                  </div>


               </span>
               <div class="text-left">
                  <button onclick="TextReadMore()" id="myBtn" class="btn-sm btn-primary"
                     style="border:0px; outline:none; color:#fff;">Read more</button>
               </div>

               <div class="text-left mt-4" style="text-align: center;">
                  <!--<a href="price-page.php" class="btn-sm btn-primary p-2" style="color:#fff;">Contact us for subscription</a>-->
                  <a href="pdfs/krishigap PPT 2-12-23-.pdf" target="_blank" class="btn-sm btn-primary p-2" style="color:#fff;">Krishi GAP PPT</a>
                  <a href="subscription-person-information.php" class="btn-sm btn-primary p-2"
                     style="color:#fff;">Contact us for subscription</a>
               </div>



               <style>
                  #more {
                     display: none;
                  }
               </style>
            </div>

            <div class="col-md-4">
            <iframe width="100%" height="215" src="https://www.youtube.com/embed/mzLiWviehso?si=Ym8mO7FXVnTGmUY7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
               <!-- <video width="100%" controls>
                  <source src="https://www.krishigap.com/video/VIDEO-2023.mp4" type="video/mp4">
                  <source src="https://www.krishigap.com/video/VIDEO-2023.mp4" type="video/ogg">
                  Your browser does not support HTML video.
               </video> -->
            </div>

            <!-------<div class="col-md-3">
               <div class="m-news-ticker">
                  <div class="holder">
                     <h4 class="text-left title-m-2">Advertisement</h4>

                     <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item">
                              <a href="https://www.cabi.org/" target="_blank">
                                 <img class="d-block w-100" src="/img/Post1.jpg" alt="First slide">
                              </a>
                           </div> 
                           <div class="carousel-item active">
                              <a href="https://www.alsglobal.com/" target="_blank" rel="noopener noreferrer">
                                 <img class="d-block w-100" src="/img/Post2.jpg" alt="Second slide">
                              </a>
                           </div>
                           <div class="carousel-item">
                              <a href="https://aditicert.net/" target="_blank" rel="noopener noreferrer">
                                 <img class="d-block w-100" src="/img/Post3.jpg" alt="Third slide">
                              </a>
                           </div>
                           <div class="carousel-item">
                              <a href="https://apsopca.org/" target="_blank" rel="noopener noreferrer">
                                 <img class="d-block w-100" src="/img/Post4.jpg" alt="Fouth slide">
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
            </div>------->

            <div class="col-md-12">
               <h3 class="text-center mb-5 mt-4 title-m-1">What Krishi GAP does</h3>
            </div>

            <!-- <div class="row mb-5">

               <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">
                        Skill Development on Global Food Safety and Sustainable Standards
                     </div>
                  </div>
               </div>

               <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">Connecting the buyers to the certified organizations.</div>
                  </div>
               </div>

               <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">Digitization of the data and records involved in the certification
                        process. </div>
                  </div>
               </div>

            </div> -->


            <div class="row mb-5 same-height-box">
               
               <div class="col-lg-4 mb-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">
                        Digital Platform Access
                     </div>
                     <p>Providing a one-stop digital platform access for guidance on global food safety and sustainable standards with ease and scalable implementation.</p>
                  </div>
               </div>

               <div class="col-lg-4 mb-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">
                     Skill Development Programs
                     </div>
                     <p>Conducting skill development programs for farmer’s organizations/ processors with the knowledge needed for implementation.</p>
                  </div>
               </div>

               <div class="col-lg-4 mb-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">
                     On-Farm Experience Zones
                     </div>
                     <p>Promoting on-farm experience zones that showcase the implementation of the on farm production standards- Practical learning hubs for farmers.</p>
                  </div>
               </div>

               <div class="col-lg-4 mb-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">
                      Buyer Certification Connection
                     </div>
                     <p>Connecting buyers to certified organizations.</p>
                  </div>
               </div>

               <div class="col-lg-4 mb-4 wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">Information Repository</div>
                     <p>Creating a comprehensive repository of information on the standards implementation.</p>
                  </div>
               </div>

               <div class="col-lg-4 mb-4 wow fadeInRight" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                  <div class="six-box-re border-gray-1">
                     <div class="six-box-title01">Collaboration</div>
                     <p>Fostering collaboration with Startups in the agri supply chain</p>
                  </div>
               </div>

            </div>


            <div class="col-md-12">
               <div class="row">
                  <h3 class="text-center mb-5 title-m-1">Future of skill development in the digital age</h3>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-1">
                        <a href="home1.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">ON FARM PRODUCTION
                                 STANDARDS</h5>
                              <ul>
                                 <li>IndG.A.P</li>
                                 <li>GlobalG.A.P</li>
                                 <li>Organic NOP/NPOP</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-2">
                        <a href="home2.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">POST HARVEST STANDARDS</h5>
                              <ul>
                                 <li>ISO 22000</li>
                                 <li>FSSC 22000</li>
                                 <li>BRC Global</li>
                                 <li>BRC Packaging</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="home3.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">SUSTAINABLE STANDARDS
                              </h5>
                              <ul>
                                 <li>ISO 14001</li>
                                 <li>ISO 50001</li>
                                 <li>ISO 45001</li>
                                 <li>SA 8000</li>
                                 <li>Rainforest Alliance</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-6">
                        <a href="home4.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Other Schemes</h5>
                              <ul>
                                 <li>Pack Houses</li>
                                 <li>Cold Storages</li>
                                 <li>Dry Warehouses</li>
                                 <li>Laboratories</li>
                                 <li>Halal and others based on the market demand</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-4">
                        <a href="https://premiummarket.krishigap.com/" id="liveAlertBtn2" target="_blank">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Market Linkage for
                                 Certified Organizations</h5>
                              <ul>
                                 <li>Buyer</li>
                                 <li>FPO/Supplier</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-5">
                        <a href="https://premiummarket.krishigap.com/export.php" id="liveAlertBtn2" target="_blank">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Export Documentation</h5>
                              <ul>
                                 <li>Export</li>
                                 <!--<li>Import</li>-->
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <p class="text-center">
                     <strong>Skill development of farmers organizations and food processors with ease and scale of
                        implementation of food safety and sustainable global standards.
                     </strong><br>
                  </p>

               </div>
            </div>


            <div class="col-md-12">
               <h3 class="text-center mb-5 title-m-1">Our Clients/Associates</h3>
               <div class="slider-logo">
                  <div class="slide-track">
                     <div class="owl-demo owl-carousel">

                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <a href='https://horticulture.ap.nic.in/' target='_blank'>
                                 <div class="six-box-icon mb-3">
                                    <center><img src="img/doafw.PNG" class="img-fluid"></center>
                                 </div>
                              </a>
                              <div class="six-box-title01">Department of Horticulture</div>
                              <p class="mb-0">Government of Andhra Pradesh</p>
                              <a href='https://horticulture.ap.nic.in/' target='_blank'>www.horticulture.ap.nic.in</a>
                           </div>
                        </div>

                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <a href='https://apagrisnet.gov.in/' target='_blank'>
                                 <div class="six-box-icon mb-3">
                                    <center><img src="img/doh.PNG" class="img-fluid"></center>
                                 </div>
                              </a>
                              <div class="six-box-title01">Department of Agriculture </div>
                              <p class="mb-0">Government of Andhra Pradesh</p>
                              <a href='https://apagrisnet.gov.in/' target='_blank'>www.apagrisnet.gov.in</a>
                           </div>
                        </div>


                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <a href='https://aioi.org.in/' target='_blank'>
                                 <div class="six-box-icon mb-3">
                                    <center><img src="img/aioi.png" class="img-fluid"></center>
                                 </div>
                              </a>
                              <div class="six-box-title01">Association of Indian Organic Industry</div>
                              <a href='https://aioi.org.in/' target='_blank'>www.aioi.org.in</a>
                           </div>
                        </div>


                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <a href='https://www.alsglobal.com/' target='_blank'>
                                 <div class="six-box-icon mb-3">
                                    <center><img src="img/asl.png" class="img-fluid"></center>
                                 </div>
                              </a>
                              <div class="six-box-title01">ALS Testing Services India Pvt Ltd</div>
                              <a href='https://www.alsglobal.com/' target='_blank'>www.alsglobal.com</a>
                           </div>
                        </div>

                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <a href='https://apssca.org/' target='_blank'>
                                 <div class="six-box-icon mb-3"><img src="img/apsopca.jpg" class="img-fluid"></div>
                              </a>
                              <p>
                              <div class="six-box-title01">Andhra Pradesh State Organic Products Certification Authority
                              </div>
                              <a href='https://apssca.org/' target='_blank'>www.apssca.org</a>
                              </p>
                           </div>
                        </div>

                        <!--<div class="item">-->
                        <!--   <div class="six-box-re border-gray-1" style="height: 197px;">-->
                        <!--      <div class="six-box-icon" style="margin-top: 50px;">-->
                        <!--<img src="img/icon-1.png" style="width: 75px;">-->
                        <!--          </div>-->
                        <!--      <div class="six-box-title01">Farmer Producer Companies</div>-->
                        <!--      <p class="mb-0">Supported by Govt of Andhra Pradesh, Andhra Pradesh.</p>-->
                        <!--   </div>-->
                        <!--</div>-->
                     </div>
                  </div>
               </div>



                        <!-- <div class="col-md-12">
                        <h3 class="text-center mb-5 title-m-1">One Stop Solution</h3>
                        <div class="row">
                           <div class="col-md-3">
                              <div class="all-serice-box">Food Safety Standards</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Farmer Hand Book</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Demo Farm</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Skill Development</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Internal Inspection</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Internal Audit</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Plant Protection Products</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Package of Practices</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Harvesting</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Others</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Workers Health, Safety & Welfare</div>
                           </div>
                           <div class="col-md-3">
                              <div class="all-serice-box">Crops Standards</div>
                           </div>
                        </div>
                     </div> -->
            </div>

            <h3 class="text-center mb-0 mt-5 title-m-1">Events</h3>
            <div class="row row-cols-1 row-cols-lg-3 g-4">
               <div class="col-md-4">
                  <div class="card h-p100">
                     <div id="carouselExampleIndicators01" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="0" class="active">
                           </li>
                           <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block w-100" src="/img/event-27-12-2023-1.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/event-27-12-2023-2.jpg" alt="Second slide">
                           </div>
                        </div>
                        

                        <a class="carousel-control-prev" href="#carouselExampleIndicators01"
                           data-bs-target="#carouselExampleIndicators01" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators01"
                           data-bs-target="#carouselExampleIndicators01" role="button" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                     </div>
                     <div class="card-body mt-3">
                        <!-- <h4 class="card-title b-0 px-0">Card title</h4> -->
                        <p>Exciting News in Agriculture! We're thrilled to share that the Quality Council of India has officially launched ... </p>
                        <div class="text-center mt-3"><a href="qci-indgap-portal.php" class="btn btn-success btn-sm">Read
                              More</a></div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="card h-p100">
                     <div id="carouselExampleIndicators02" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="0" class="active">
                           </li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="2"></li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="3"></li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">

                           <div class="carousel-item active">
                              <img class="d-block w-100"
                                 src="/img/387808386_122103382676073381_3287361327232021098_n.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100"
                                 src="/img/387818306_122103382610073381_1332078765598969753_n.jpg" alt="Second slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100"
                                 src="/img/387839522_122103382580073381_4160206242867344493_n.jpg" alt="Third slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100"
                                 src="/img/391551145_122103382526073381_2938081320028843314_n.jpg" alt="Fourth slide">
                           </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators02"
                           data-bs-target="#carouselExampleIndicators02" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators02"
                           data-bs-target="#carouselExampleIndicators02" role="button" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                     </div>
                     <div class="card-body mt-3">
                        <!-- <h4 class="card-title b-0 px-0">Card title</h4> -->
                        <p>Mr.Kotela Srihari, Founder Krishigap Digital Solutions. Speaking at FPO'S: Industry
                           Partnership Program, Hydera... </p>
                        <div class="text-center mt-3"><a href="program_event_details.php"
                              class="btn btn-success btn-sm">Read More</a></div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="card h-p100">
                     <div id="carouselExampleIndicators03" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="0" class="active">
                           </li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="2"></li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="3"></li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="4"></li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="5"></li>
                           <li data-bs-target="#carouselExampleIndicators03" data-bs-slide-to="6"></li>
                        </ol>
                        <div class="carousel-inner">

                           <div class="carousel-item active">
                              <img class="d-block w-100" src="/img/Image-5.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/Image-6.jpg" alt="Second slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/Image-7.jpg" alt="Third slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/Image-8.jpg" alt="Fourth slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/Image-9.jpg" alt="Fifth slide">
                           </div>

                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/Image-10.jpg" alt="Sixth slide">
                           </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators03"
                           data-bs-target="#carouselExampleIndicators03" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators03"
                           data-bs-target="#carouselExampleIndicators03" role="button" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                     </div>
                     <div class="card-body mt-3">
                        <!-- <h4 class="card-title b-0 px-0">Card title</h4> -->
                        <p>Kotela Srihari speaking at US India SME Council and Montgomery County government
                           delegation,Maryland St... </p>
                        <div class="text-center mt-3"><a href="srihari_speaking_at_us.php"
                              class="btn btn-success btn-sm">Read More</a></div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="col-md-12 text-center">
            <a href="events.php" class="btn-sm btn-primary p-2" style="color:#fff;">View All</a>
            </div>

            <style>
               .item {
                  margin: 0px 10px;
               }

               .owl-carousel .owl-wrapper-outer {
                  height: auto !important;
               }

               .item .six-box-re {
                  min-height: 250px !important;
               }

               a {
                  color: #00a039;
                  text-decoration: none;
               }
            </style>

            

         </div>

         <div class="container">
            <div class="col-md-12">
               <div class="row">
                  <h3 class="text-center mb-5 mt-5 title-m-1">Impact Creation</h3>

                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-1">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Mitigation of Climate
                                 Change
                              </h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-2">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Enhanced income to the
                                 farmers
                              </h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-3">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Safe Food for the consumers
                              </h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-4">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Increased exports from
                                 India
                              </h5>
                           </div>
                        </a>
                     </div>
                  </div>

               </div>
            </div>
         </div>


         <div class="container">
            <h4 class="mb-4 mt-5 text-center">Working Towards Sustainable Development Goals of United Nations</h4>
            <div class="row mt-4">
               <div class="col-lg-2 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re green-bg">
                     <div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>
                     <div class="six-box-title">Good Health and Well-Being</div>
                  </div>
               </div>
               <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="six-box-re skyblue-bg">
                     <div class="six-box-icon"><img src="img/icon-2.png" style="width: 75px;"></div>
                     <div class="six-box-title">Quality Education</div>
                  </div>
               </div>
               <div class="col-lg-2 wow fadeInRight" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                  <div class="six-box-re lightred-bg">
                     <div class="six-box-icon"><img src="img/icon-3.png" style="width: 75px;"></div>
                     <div class="six-box-title">Decent Work &amp; Economic Growth</div>
                  </div>
               </div>
               <div class="col-lg-2 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re greenlight-bg">
                     <div class="six-box-icon"><img src="img/icon-4.png" style="width: 75px;"></div>
                     <div class="six-box-title">Responsible Consumption &amp; Production</div>
                  </div>
               </div>
               <div class="col-lg-2 wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="six-box-re orange-bg">
                     <div class="six-box-icon"><img src="img/icon-5.png" style="width: 75px;"></div>
                     <div class="six-box-title">Climate Action</div>
                  </div>
               </div>
               <div class="col-lg-2 wow fadeInRight" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                  <div class="six-box-re green-bg">
                     <div class="six-box-icon"><img src="img/icon-6.png" style="width: 75px;"></div>
                     <div class="six-box-title">Life on Land</div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>

   <?php 
                     if(isset($_POST['submit']))
                     {
                        $search = $_POST['search'];
                        $select = "SELECT * FROM `demo_farm` WHERE DocumentsTitle LIKE '%$search%'";
                        $query = mysqli_query($db,$select);
                        $row = mysqli_num_rows($query);
                        if($row == TRUE)
                        {  
                           echo "<br>";
                           echo $row;
                        }
                        else
                        {  echo "<br>";
                           echo $row;
                        }
                     }
                  ?>
   <?php include "footer.php"; ?>
   <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>




   <!-- <script src="js/jquery-1.9.1.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/waypoints/waypoints.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="js/main.js"></script>
   <script>

      function showmsg() {
         alert("Limited Access");
      }



      function TextReadMore() {
         var dots = document.getElementById("dots");
         var moreText = document.getElementById("more");
         var btnText = document.getElementById("myBtn");

         if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
         } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
         }
      }

   </script>
   <link href="css/owl.carousel.css" rel="stylesheet">
   <script src="js/owl.carousel.js"></script>
   <script>
      $(document).ready(function () {
         var owl = $(".owl-demo");
         owl.owlCarousel({
            itemsCustom: [[0, 1], [450, 2], [600, 3], [700, 3], [1000, 3], [1200, 3], [1400, 3], [1600, 3]],
            navigation: true, pagination: false, autoPlay: 3000, stopOnHover: true, autoHeight: true,
            touchDrag: false, mouseDrag: false
         });
      });
   </script>



</body>

</html>