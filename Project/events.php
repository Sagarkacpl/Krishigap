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
 //   include "most_visited_page.php";
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

   <style>
      .page-detail-line {
         width: 70%;
         margin: 0px auto;
         padding-bottom: 50px;
         font-size: 25px;
         text-align: center;
      }

      .card {
         border-radius: 10px;
         box-shadow: 0px 2px 5px 0px rgba(19, 23, 38, 0.05);
         margin-bottom: 1.5rem !important;
      }

      .h-p100 {
         height: 100% !important;
      }

      .card-img-top {
         border-top-left-radius: 10px;
         border-top-right-radius: 10px;
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
   <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
               <h1 class="display-3 text-white animated slideInDown">Events</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                     <li class="breadcrumb-item text-white active" aria-current="page">Events</li>
                  </ol>
                  <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
      <div class="container">
         <div class="row">
            <?php
                                          $slect ="SELECT * FROM `event` WHERE DeletedStatus='0' ORDER BY Id DESC";
                                          $execute = mysqli_query($db,$slect);
                                          while($read = mysqli_fetch_assoc($execute))
                                          {
                                             $originalDate = $read['Event_Date'];
                                             $newDate = date("d-M-Y", strtotime($originalDate));

                                       ?>
            <!--  <div class="col-md-4">
               <div class="card img">
               <?php if(empty($read['Event_img'])) {?>
                  <img style="height: 155.9px;" class="card-img-top" src="EventsImages/krishi_gap.PNG"alt="krishi_gap.PNG">
                     <?php } else { ?>
                        <img style="height: 155.9px;" class="card-img-top" src="EventsImages/<?php echo $read['Event_img'];  ?>"alt="<?php echo $read['Event_img'];  ?>">
                        <?php } ?>
                  <div class="card-body">
                     <a href="event-description.php?id=<?php echo $read['Id']; ?>"><h5 style="height: 75px;overflow: auto;" class="card-title">
                     <?php echo $read['Event_Title'];  ?>
                     </h5></a>
                     <p style="overflow: auto;text-align: justify;" class="card-text listing-1-text"><?php echo strip_tags(substr_replace( $read['Event_Desc'], "...", 150)); ?></p>
                     <a href="event-description.php?id=<?php echo $read['Id']; ?>" class="btn btn-danger pull-right" style="box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%);">Read More</a>
                  </div>
               </div>
            </div> -->
            <?php } ?>
            <div class="row row-cols-1 row-cols-lg-3 g-4">
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
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="5"></li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="6"></li>
                           <li data-bs-target="#carouselExampleIndicators02" data-bs-slide-to="7"></li>
                        </ol>
                        <div class="carousel-inner">

                           <div class="carousel-item active">
                              <img class="d-block w-100" src="/img/Nutrihub-ICAR-IIMR-Webinar.jpg"
                                 alt="Nutrihub ICAR IIMR Webinar">

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
                        <p>KrishiGap organized a National Webinar on September 25th,2023 on global food safety standards
                           for startups in associ... </p>
                        <div class="text-center mt-3"><a href="envents-details.php" class="btn btn-success btn-sm">Read
                              More</a></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card h-p100">
                     <div id="carouselExampleIndicators01" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
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

               <div class="col-md-4">
                  <div class="card h-p100">
                     <div id="carouselExampleIndicators04" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-interval="5000">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExampleIndicators04" data-bs-slide-to="0" class="active">
                           </li>
                           <li data-bs-target="#carouselExampleIndicators04" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExampleIndicators04" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block w-100" src="/img/event-27-12-2023-1.jpg" alt="First slide">
                           </div>
                           <div class="carousel-item">
                              <img class="d-block w-100" src="/img/event-27-12-2023-2.jpg" alt="Second slide">
                           </div>
                        </div>
                        

                        <a class="carousel-control-prev" href="#carouselExampleIndicators04"
                           data-bs-target="#carouselExampleIndicators04" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators04"
                           data-bs-target="#carouselExampleIndicators04" role="button" data-bs-slide="next">
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

            </div>


            <!-- <div class="page-detail-line">KrishiGap organized a National Webinar on September 25th,2023 on global food safety standards for startups in association with IIMR-ICAR (Indian Institute of Millets Research) to promote millet exports.</div>
            <center><img src="img/enventimage.jpg" class="page-detail-line"></center> -->
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