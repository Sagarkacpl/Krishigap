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

      .six-box-title {
         font-size: 15px;
         color: #fff;
         line-height: 34px;
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
         GLOBAL FOOD SAFETY STANDARDS AT YOUR DOOR STEP-A PRACTICAL GUIDE TOWARDS EASE OF IMPLEMENTATION
      </div>
   </div>
   <div class="container-fluid p-0 mb-5">
      <div class="owl-carousel header-carousel position-relative">


         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/banner5.jpg" alt="">
         </div>

         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/banner6.jpg" alt="">
         </div>

         <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/banner7-1.jpg" alt="">
         </div>

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

            <div class="col-md-9">
               <h3 class="text-left mb-2 title-m-2">An Overview on Krishi GAP</h3>
               <p class="text-justify">
                  We bring global food safety standards to your doorstep. Facilitate, ease of implementation, and link
                  you to the markets for certified produce. To make this possible, we have a one ‘Stop Solution’, which
                  combines tools and advisories that are simple and easily
                  implementable. All records are avaliable in regional language ie , Hindi , Kannada, Marathi, Telugu ,
                  Tamil , Malayalam , Bengali, and Odia.<span id="dots">...</span>
               </p>
               <p class="text-justify">
                  <strong>Krishigap is not involved in the certification of organizations, which will be done by
                     independent bodies approved by the standard owner/National Accreditation Boards and the visitor is
                     advised to visit their websites for the standards and updates</strong>
               </p>

               <span id="more">
                  <p class="text-justify">
                     Through these, we equip crop production/food processing centers to empower farmer’s organizations
                     and processing centers towards ease of
                     implementation of global food safety standards.
                  </p>
                  <p class="text-justify">
                     With the export of agriculture products crossing USD 50 billion in 2021-22, the highest ever, the
                     world is looking up to India for the
                     supply of Agri commodities and processed foods, which will go a long way in realizing the Hon’ble
                     Prime Minister’s vision of improving
                     farmers income.
                  </p>
                  <p class="text-justify">
                     The demand for good quality and safe foods has also been growing in India with the rise in income
                     levels and purchasing power of consumers.
                     Consequently, the ability or willingness to pay a premium price for high-quality products too is
                     increasing.
                  </p>
                  <p class="text-justify">
                     However, the biggest challenge in the implementation of global food safety standards is the lack of
                     understanding of these standards and the
                     non-availability of consultants in semi-urban and rural Areas.
                  </p>



               </span>
               <div class="text-left">
                   <button onclick="TextReadMore()" id="myBtn" class="btn-sm btn-primary" style="border:0px; outline:none; color:#fff;">Read more</button>
                </div>
                
                 <div class="text-left mt-4">
                   <a href="price-page.php" class="btn-sm btn-primary p-2" style="color:#fff;">New Subscription</a>
                </div>
                    


               <style>
                  #more {
                     display: none;
                  }
               </style>
            </div>

            <div class="col-md-3">
               <div class="m-news-ticker">
                  <div class="holder">
                     <h4 class="text-left title-m-2">Advertisement</h4>

                     <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block w-100" src="/img/add-1.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/add-2.jpg" alt="Second slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/add-1.jpg" alt="Third slide">
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
            </div>

            <div class="col-md-12">
               <h3 class="text-center mb-5 mt-4 title-m-1">What Krishi GAP does</h3>
            </div>

            <div class="row mb-5">
               <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                  <div class="six-box-re border-gray-1">
                     <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                     <div class="six-box-title01">Digital Enablement & Skill Development on Food Safety standards</div>
                  </div>
               </div>

               <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                  <div class="six-box-re border-gray-1">
                     <!---<div class="six-box-icon"><img src="img/icon-2.png" style="width: 75px;"></div>---->
                     <div class="six-box-title01">Connecting the buyers to the certified organizations.</div>
                  </div>
               </div>

               <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.3s"
                  style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                  <div class="six-box-re border-gray-1">
                     <!---<div class="six-box-icon"><img src="img/icon-3.png" style="width: 75px;"></div>---->
                     <div class="six-box-title01">Digitization of the data and records involved in the certification
                        process. </div>
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
                              <h5 class="align-self-center text-center" style="color: #fff;">ON FARM PRODUCTION</h5>
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
                              <h5 class="align-self-center text-center" style="color: #fff;">POST HARVEST</h5>
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
                              <h5 class="align-self-center text-center" style="color: #fff;">SUSTAINABLE INITIATIVES
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
                     <strong>Skill development of farmers organizations and food processors with ease and scale of implementation of food safety and sustainable global standards.
                     </strong><br>
                  </p>

               </div>
            </div>

            <div class="col-md-12">

               <div class="row">
                  <div class="col-md-6">
                     <h3 class="text-left mb-2 title-m-2">Events</h3>
                     <div class="all-serice-box">
                        <div>
                           <div id="carouselExampleIndicators01" class="carousel slide carousel-fade"
                              data-bs-ride="carousel" data-bs-interval="5000">
                              <ol class="carousel-indicators">
                                 <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="0" class="active">
                                 </li>
                                 <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="1"></li>
                                 <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="2"></li>
                                 <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="3"></li>
                                 <li data-bs-target="#carouselExampleIndicators01" data-bs-slide-to="4"></li>
                              </ol>
                              <div class="carousel-inner">
                                 <div class="carousel-item active">
                                    <img class="d-block w-100" src="/img/krishi-gap-event-img-1.jpg" alt="First slide">
                                    <div class="event-data-here">
                                       Sri Sri Ravi Shankar , Yoga and Spiritual Guru is in receipt of the Award | Left
                                       Hon Aruna Miller , Lt Governor, Govt of MaryLand
                                    </div>
                                 </div>
                                 <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/krishi-gap-event-img-2.jpg" alt="Second slide">
                                 </div>
                                 <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/krishi-gap-event-img-3.jpg" alt="Third slide">
                                 </div>
                                 <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/krishi-gap-event-img-4.jpg" alt="Forth slide">
                                 </div>
                                 <div class="carousel-item">
                                    <img class="d-block w-100" src="/img/krishi-gap-event-img-5.jpg" alt="Fifth slide">
                                    <div class="event-data-here">
                                       With Hon Secretary of State, Govt of MaryLand
                                    </div>
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
                        </div>
                        <p class="text-left pt-2">The United States President's Lifetime Achievement Award was conferred
                           on Mr Srihari Kotela.
                           The Award was received during the event organised by US India SME Council Incredible Inc 50
                           held in MaryLand, Washington D.C on August 10th , 2023.
                           Mr Srihari Kotela is the founder of Krishigap Digital Solutions and eFresh Agribusiness
                           Solutions.</p>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <h3 class="text-left mb-2 title-m-2">Testimonials</h3>
                     <div class="all-serice-box">
                        <section class="client pt-2 pb-5">
                           <div class="container">
                              <div class="row align-items-md-center">
                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                       <!-- Wrapper for slides -->
                                       <div class="carousel-inner">
                                          <div class="carousel-item active">
                                             <div class="row p-4">
                                                <div class="t-card">
                                                   <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                   <p class="lh-lg">Lorem Ipsum ist ein einfacher Lorem Ipsum ist in der
                                                      Industrie bereits der iste natus error sit voluptatem accusantium
                                                      totam rem aperiam, eaque ipsa quae ab illo architecto beatae vitae
                                                      dicta sunt explicabo. Lorem Ipsum ist ein einfacher Lorem Ipsum
                                                      ist in der Industrie bereits der iste natus error sit voluptatem
                                                      accusantium totam rem aperiam, eaque ipsa quae ab illo architecto
                                                      beatae vitae dicta sunt explicabo.</p>
                                                   <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                                                </div>
                                                <div class="row">
                                                   <!-- <div class="col-sm-2 pt-3">
                                                      <img
                                                         src="https://unsplash.com/photos/OhKElOkQ3RE?utm_source=unsplash&utm_medium=referral&utm_content=creditShareLink"
                                                         class="rounded-circle img-responsive img-fluid">
                                                   </div> -->
                                                   <div class="col-sm-12">
                                                      <div class="arrow-down d-none d-lg-block"></div>
                                                      <h4><strong>Jack Mathews</strong></h4>
                                                      <p class="testimonial_subtitle"><span>Global Brand
                                                            manager</span><br>
                                                         <span>Artc Cafe</span>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="carousel-item">
                                             <div class="row p-4">
                                                <div class="t-card">
                                                   <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                   <p class="lh-lg">Lorem Ipsum ist ein einfacher Lorem Ipsum ist in der
                                                      Industrie bereits der iste natus error sit voluptatem accusantium
                                                      totam rem aperiam, eaque ipsa quae ab illo architecto beatae vitae
                                                      dicta sunt explicabo. Lorem Ipsum ist ein einfacher Lorem Ipsum
                                                      ist in der Industrie bereits der iste natus error sit voluptatem
                                                      accusantium totam rem aperiam, eaque ipsa quae ab illo architecto
                                                      beatae vitae dicta sunt explicabo.</p>
                                                   <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                                                </div>
                                                <div class="row">
                                                   <!-- <div class="col-sm-2 pt-4">
                                                      <img src="https://imgur.com/gallery/QKv8w2k"
                                                         class="rounded-circle img-responsive img-fluid">
                                                   </div> -->
                                                   <div class="col-sm-12">
                                                      <div class="arrow-down d-none d-lg-block"></div>
                                                      <h4><strong>Esther Zawadi</strong></h4>
                                                      <p class="testimonial_subtitle"><span>
                                                            digital strategist</span><br>
                                                         <span>Vaxa digital</span>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="carousel-item">
                                             <div class="row p-4">
                                                <div class="t-card">
                                                   <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                   <p class="lh-lg">Lorem Ipsum ist ein einfacher Lorem Ipsum ist in der
                                                      Industrie bereits der iste natus error sit voluptatem accusantium
                                                      totam rem aperiam, eaque ipsa quae ab illo architecto beatae vitae
                                                      dicta sunt explicabo. Lorem Ipsum ist ein einfacher Lorem Ipsum
                                                      ist in der Industrie bereits der iste natus error sit voluptatem
                                                      accusantium totam rem aperiam, eaque ipsa quae ab illo architecto
                                                      beatae vitae dicta sunt explicabo.</p>
                                                   <i class="fa fa-quote-right" aria-hidden="true"></i><br>
                                                </div>
                                                <div class="row">
                                                   <!-- <div class="col-sm-2 pt-4">
                                                      <img src="https://imgur.com/gallery/QKv8w2k"
                                                         class="rounded-circle img-responsive img-fluid">
                                                   </div> -->
                                                   <div class="col-sm-12">
                                                      <div class="arrow-down d-none d-lg-block"></div>
                                                      <h4><strong>Esther Zawadi</strong></h4>
                                                      <p class="testimonial_subtitle"><span>
                                                            digital strategist</span><br>
                                                         <span>Vaxa digital</span>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="controls push-right">
                                       <a class="left btn btn-outline-dark" href="#carouselExampleCaptions"
                                          data-bs-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                       <a class="right btn btn-outline-dark" href="#carouselExampleCaptions"
                                          data-bs-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <style>
                           $primary: #2945df;
                           $white: #fff;
                           $color-dark: #000;


                           .client {
                              width: 100%;
                              height: 100%;
                              background-color: $primary;

                           }

                           .carousel-icon {

                              i {
                                 font-size: 5rem;
                              }

                           }

                           .carousel-item {

                              i {
                                 font-size: 1.6rem;
                              }
                           }

                           .t-card {
                              padding: 1.8125rem 1.125rem;
                              border-radius: 1.25rem;
                              color: $white;
                              height: auto;
                           }

                           .arrow-down {
                              width: 0;
                              height: 0;
                              border-left: 1.5625rem solid transparent;
                              border-right: 1.5625rem solid transparent;
                              border-top: 1.25rem solid rgba($color-dark, 0.5);
                              // margin-left: 4.6875rem
                           }
                        </style>
                     </div>
                  </div>

               </div>
            </div>

<style>
   .item {
      margin:0px 10px;
   }
</style>

            <div class="col-md-12">
               <h3 class="text-center mb-5 title-m-1">Our Client</h3>
               <div class="slider-logo">
                  <div class="slide-track">
                     <div class="owl-demo owl-carousel">
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Andhra Pradesh State Organic Products Certification Authority</div>
                              <p class="mb-0">Law Farm, ANGRAU Campus, Guntur 522034.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Department of Agriculture </div>
                                 <p class="mb-0">Office of Commissioner & Director of Agriculture Govt of Andhra Pradesh Guntur 522004</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Department of Horticulture</div>
                                 <p class="mb-0">Office of Commissioner of Horticulture Govt of Andhra Pradesh </br>Guntur 522004</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Andhra Pradesh State Organic Products Certification Authority</div>
                              <p class="mb-0">Law Farm, ANGRAU Campus, Guntur 522034.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Department of Agriculture </div>
                                 <p class="mb-0">Office of Commissioner & Director of Agriculture Govt of Andhra Pradesh Guntur 522004</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="six-box-re border-gray-1">
                              <!---<div class="six-box-icon"><img src="img/icon-1.png" style="width: 75px;"></div>--->
                              <div class="six-box-title01">Department of Horticulture</div>
                                 <p class="mb-0">Office of Commissioner of Horticulture Govt of Andhra Pradesh </br>Guntur 522004</p>
                           </div>
                        </div>

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
                     <div class="six-box-title">Live on Land</div>
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