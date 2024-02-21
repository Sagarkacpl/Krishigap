<?php
   session_start();
   error_reporting(0);
   include "connection.php";
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
      <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <script type="text/javascript">
         function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'hi,en,te'}, 'google_translate_element');
         }
      </script>
      <style>
         img.img-fluid {
         height: 400px !important;
         }
         .service-item-box-1 {
    border-radius: 5px;
}
 .m-img {
    padding-top: 100px;
    padding-bottom: 100px;
}
      </style>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
         </div>
      </div>


      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container">
            <div class="row g-4 faculity-list-1">
            <div class="text-center">
               <h1 class="mb-4">FACULTY LIST</h1>
                     </div>
            <!---re--->
                  <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="faculty-trainee-img">
                              <img style="width: 150px;height: 150px;" src="img/BaskarKotte.jpg" alt="">
                        </div>
                        
                        <div class="text-center p-4" style="background: white;">
                            <a href="#"> <h5 class="mb-0">Srihari Kotela</h5></a>
                            <small>Ex Founder Foodcert India (Now TQ Cert  Services, A TATA group company)</small>
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;background: white;">
                            <div class="d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                  </div>
            <!---re end //--->
            <!---re--->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="faculty-trainee-img">
                              <img style="width: 150px;height: 150px;" src="img/BaskarKotte.jpg" alt="">
                        </div>
                        
                        <div class="text-center p-4" style="background: white;">
                            <a href="#"> <h5 class="mb-0">Srihari Kotela</h5></a>
                            <small>Ex Founder Foodcert India (Now TQ Cert  Services, A TATA group company)</small>
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;background: white;">
                            <div class="d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                  </div>
            <!---re end //--->
            <!---re--->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="faculty-trainee-img">
                              <img style="width: 150px;height: 150px;" src="img/BaskarKotte.jpg" alt="">
                        </div>
                        
                        <div class="text-center p-4" style="background: white;">
                            <a href="#"> <h5 class="mb-0">Srihari Kotela</h5></a>
                            <small>Ex Founder Foodcert India (Now TQ Cert  Services, A TATA group company)</small>
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;background: white;">
                            <div class="d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                  </div>
            <!---re end //--->
            <!---re--->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="faculty-trainee-img">
                              <img style="width: 150px;height: 150px;" src="img/BaskarKotte.jpg" alt="">
                        </div>
                        
                        <div class="text-center p-4" style="background: white;">
                            <a href="#"> <h5 class="mb-0">Srihari Kotela</h5></a>
                            <small>Ex Founder Foodcert India (Now TQ Cert  Services, A TATA group company)</small>
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;background: white;">
                            <div class="d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                  </div>
            <!---re end //--->
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