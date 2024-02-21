<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    if($_GET['page'] != ''){
       header("Location: login.php?page=$_GET[page]"); 
    }else{
      header("Location: login.php"); 
    }
   }
include "connection.php";
//  include "most_visited_page.php";
$query1 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
if ($_GET['gsw'] != '' AND $_GET['crp'] != '') {
    if ($_GET['gsw'] == 'IndGAP') {
        $GETgsw = 'IndG.A.P';
    }
    if ($_GET['gsw'] == 'GLOBALGAP') {
        $GETgsw = 'GLOBALG.A.P';
    }
    if ($_GET['gsw'] == 'FairtradeInternational') {
        $GETgsw = 'Fairtrade International';
    }
    if ($_GET['gsw'] == 'RainforestAlliance') {
        $GETgsw = 'Rainforest Alliance';
    }
    if ($_GET['crp'] == '00') {
        $query2 = "SELECT DISTINCT DocumentsTitle,DocumentsLink,VideoTitle,YoutubeVideoLink,Remark,DocumentsSource from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' ORDER BY DocumentsTitle";
        $query2dt = "SELECT DISTINCT DocumentsTitle,DocumentsLink,VideoTitle,YoutubeVideoLink,Remark,DocumentsSource from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND DocumentsTitle != '' ORDER BY DocumentsTitle";
        $query2yt = "SELECT DISTINCT DocumentsTitle,DocumentsLink,VideoTitle,YoutubeVideoLink,Remark,DocumentsSource from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND VideoTitle != '' ORDER BY DocumentsTitle";
    } else {
        $query2 = "SELECT * from demo_farm WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' ORDER BY DocumentsTitle";
        $query2dt = "SELECT * from demo_farm WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND DocumentsTitle != '' ORDER BY DocumentsTitle";
        $query2yt = "SELECT * from demo_farm WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus = '0' AND VideoTitle != '' ORDER BY DocumentsTitle";
    }
}
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
   <body style="background: #f6f6f6;">
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
                  <h1 class="display-6 text-white animated slideInDown">Capacity Building on Food Safety Standard</h1>
                  
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
        <div class="container">
			        

            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="" method="GET">
                     <div class="row g-3">
                        <div class="col-md-12 text-center">
							         <center><div class="col-md-2">
                        <a href="capacity-building-on-food-safety-about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                     </div></center>
                        </div>       


                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
        <div class="container">
              

            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="" method="GET">
                     <div class="row g-3">
                        <div class="col-md-12 text-center">
              <div class="img"><br>
              <p style="font-size: 32px;">Training Module Coming Soon.</p>
              </div>
                        </div>       


                     </div>
                  </form>
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