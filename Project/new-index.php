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
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
      <div class="container">
           <?php if($_SESSION["EmailId"] != 'kgap.2020@gmail.com'){?>
            <div id="liveAlertPlaceholder"></div>
          <?php } ?>
         <div class="row g-4">

         <div class="col-md-12">
         <h3 class="text-center mb-5 title-m-1">An Overview on Krishi GAP</h3>
            <p class="text-justify">
               We bring global food safety standards to your doorstep. Facilitate, ease of implementation, and link you to the markets for certified 
               produce. To make this possible, we have a one ‘Stop Solution’, which combines tools and advisories that are simple and easily 
               implementable.<span id="dots">...</span>
            </p>
            
            <span id="more">
            <p class="text-justify">
               Through these, we equip crop production/food processing centers to empower farmer’s organizations and processing centers towards ease of 
               implementation of global food safety standards.
            </p>
            <p class="text-justify">
               With the export of agriculture products crossing USD 50 billion in 2021-22, the highest ever, the world is looking up to India for the 
               supply of Agri commodities and processed foods, which will go a long way in realizing the Hon’ble Prime Minister’s vision of improving 
               farmers income.
            </p>
            <p class="text-justify">
               The demand for good quality and safe foods has also been growing in India with the rise in income levels and purchasing power of consumers. 
               Consequently, the ability or willingness to pay a premium price for high-quality products too is increasing. 
            </p>
            <p class="text-justify">
               However, the biggest challenge in the implementation of global food safety standards is the lack of understanding of these standards and the 
               non-availability of consultants in semi-urban and rural Areas.
            </p>

            
            
            </span>
            <div class="text-center"><button onclick="myFunction()" id="myBtn" class="btn-sm btn-primary" style="border:0px; outline:none; color:#fff;">Read more</button></div>

            <script>

function myFunction() {
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
<style>
   #more {display: none;}
</style> 
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
                  <div class="six-box-title01">Connecting the buyers to the certified clients.</div>
               </div>
            </div>

            <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.3s"
               style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
               <div class="six-box-re border-gray-1">
                  <!---<div class="six-box-icon"><img src="img/icon-3.png" style="width: 75px;"></div>---->
                  <div class="six-box-title01">Digitization of the data and records involved in the certification process. </div>
               </div>
            </div>
            

         </div>


            <div class="col-md-12">
               <div class="row">
                  <h3 class="text-center mb-5 title-m-1">Future of skill development in the
                     digital age</h3>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-1">
                        <a href="home1.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">ON FARM PRODUCTION</h5>
                              <ul>
                                 <li>IndG.A.P</li>
                                 <li>GlobalG.A.P</li>
                                 <li>Organic NOP/NPOP/PGS/Medicinal Plants</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                   <?php if($_SESSION["EmailId"] == 'kgap.2020@gmail.com'){ ?>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-2">
                        <a href="home2.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">POST HARVEST PROCESSING</h5>
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
                  <?php } else { ?>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-2">
                        <a href="#" id="liveAlertBtn" onclick="showmsg()">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">POST HARVEST PROCESSING</h5>
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
                  <?php } if($_SESSION["EmailId"] == 'kgap.2020@gmail.com'){ ?>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="home3.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">SUSTAINABLE INITIATIVES</h5>
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
                  <?php } else { ?>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="#" id="liveAlertBtn1" onclick="showmsg()">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">SUSTAINABLE INITIATIVES</h5>
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
                  <?php } if($_SESSION["EmailId"] == 'kgap.2020@gmail.com'){ ?>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="home4.php">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Others</h5>
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
                  <?php } else { ?>
                  <!--<div class="col-lg-2 col-sm-6">-->
                  <!--   <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">-->
                  <!--      <a href="#" id="liveAlertBtn2" onclick="showmsg()">-->
                  <!--         <div class="my-li-1 d-flex-g">-->
                  <!--            <h5 class="align-self-center text-center" style="color: #fff;">Others</h5>-->
                  <!--            <ul>-->
                  <!--               <li>Pack Houses</li>-->
                  <!--               <li>Cold Storages</li>-->
                  <!--               <li>Dry Warehouses</li>-->
                  <!--               <li>Laboratories</li>-->
                  <!--               <li>Halal and others based on the market demand</li>-->
                  <!--            </ul>-->
                  <!--         </div>-->
                  <!--      </a>-->
                  <!--   </div>-->
                  <!--</div>-->
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="#" id="liveAlertBtn2" onclick="showmsg()">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Others Schemes</h5>
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
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="#" id="liveAlertBtn2" onclick="showmsg()">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Market Linkage for Certified Organization</h5>
                              <ul>
                                 <li>FPO</li>
                                 <li>Buyer</li>
                                 <li>Cluster</li>
                                 <li>CB</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative home-box-bg-3">
                        <a href="#" id="liveAlertBtn2" onclick="showmsg()">
                           <div class="my-li-1 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Export Doucmentation</h5>
                              <ul>
                                 <li>FPO</li>
                                 <li>Buyer</li>
                                 <li>Cluster</li>
                                 <li>CB</li>
                              </ul>
                           </div>
                        </a>
                     </div>
                  </div>
                  <?php } ?>
                  <p class="text-center">
                     <strong>Taking digitization to Crop Production/Food Processing Centers to empower Farmers
                        Organizations and Food Processors with ease of
                        implementation of Food Safety and Sustainable Standards
                     </strong><br>
                  </p>
                  
               </div>
            </div>

         <div class="col-md-12">
         <h3 class="text-center mb-5 title-m-1">One Stop Solution</h3>
            <div class="row">
               <div class="col-md-3"><div class="all-serice-box">Food Safety Standards</div></div>
               <div class="col-md-3"><div class="all-serice-box">Farmer Hand Book</div></div>
               <div class="col-md-3"><div class="all-serice-box">Demo Farm</div></div>
               <div class="col-md-3"><div class="all-serice-box">Skill Development</div></div>
               <div class="col-md-3"><div class="all-serice-box">Internal Inspection</div></div>
               <div class="col-md-3"><div class="all-serice-box">Internal Audit</div></div>
               <div class="col-md-3"><div class="all-serice-box">Plant Protection Products</div></div>
               <div class="col-md-3"><div class="all-serice-box">Package of Practices</div></div>
               <div class="col-md-3"><div class="all-serice-box">Harvesting</div></div>
               <div class="col-md-3"><div class="all-serice-box">Others</div></div>
               <div class="col-md-3"><div class="all-serice-box">Workers Health, Safety & Welfare</div></div>
               <div class="col-md-3"><div class="all-serice-box">Crops Standards</div></div>
         </div>   
                  </div>




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
                              <h5 class="align-self-center text-center" style="color: #fff;">Mitigation of Climate Change</h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-2">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Enhanced income to the farmers</h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-3">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Safe Food for the consumers</h5>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="service-item service-item-box-1 text-center position-relative impact-creation-bg-4">
                        <a href="#">
                           <div class="my-li-1 plr-5 d-flex-g">
                              <h5 class="align-self-center text-center" style="color: #fff;">Increased exports from India</h5>
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

    </script>
</body>

</html>