<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .p-5 {
         padding: 5px !important;
         }
         .rounded-pill {
         border-radius: 5px !important;
         }
         body {
         margin: 0;
         font-family: "Heebo",sans-serif;
         font-size: 13px;
         }
         input.razorpay-payment-button {
         font-size: 22px;
         margin-left: 45%;
         margin-top: 4%;
         padding: 15px 32px !important;
         background: #4CAF50 !important;
         border: 1px solid #4CAF50 !important;
         color: white;
         font-weight: 700;
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
         }
      </style>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php"; ?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header" style="padding-top: 1rem !important;padding-bottom: 1rem !important;">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Payment Success</h1>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 4rem !important;">
         <div class="container">
                           <div class="row">
                            <center><br><br>
      <?php
      if($_GET['msg'] == 'success' AND $_GET['pid'] != '' AND isset($_GET['pid'])){?>
      <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <font color="green">Subscription successfull.</b></font>
              </div>
            </div>
          </div>
        </div>
         <?php }else{ ?>
         <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <font color="green">Subscription failed.</b></font>
              </div>
            </div>
          </div>
        </div>
         <?php } ?>
                  </center>
            <br><br>                         
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