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
   $id = $_GET['id'];
   $select = "SELECT * FROM `event` WHERE DeletedStatus='0' and Id='$id'";
   $exe = mysqli_query($db,$select);
   $read = mysqli_fetch_assoc($exe);
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
</head>

<body>
   <div id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <?php include "navbar.php";?>
   <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
               <h1 class="display-3 text-white animated slideInDown">Event Description</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                     <li class="breadcrumb-item text-white active" aria-current="page">Event Description</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div id="demo" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item img  active "> 
                     <?php if(empty($read['Event_img'])) {?>
                        <img style="height: 350px !important;" src="EventsImages/krishi_gap.PNG" alt="">
                        <?php } else { ?>
                        <img style="height: 350px !important;" src="EventsImages/<?php echo $read['Event_img'];  ?>" 
                        alt="">
                        <?php } ?>
                     </div>
                  </div>
                  <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span
                        class="carousel-control-prev-icon"></span> </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next"> <span
                        class="carousel-control-next-icon"></span> </a> -->
               </div>
            </div>
            <div class="col-md-6">
               <div class="card img">
                  <div class="card-body">
                     <h5 class="card-title">
                     <?php echo $read['Event_Title'];  ?>
                     </h5>
                     <p class="card-text">
                     <?php echo $read['Event_Desc']; ?>
                     </p>
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