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
      .page-detail-line
      {
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
    height: 100% !important;}

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
					<div class="col">
						<div class="card h-p100">
                     <a href="envents-details.php" target="_blank">
							<img class="card-img-top" src="img/enventimage1.jpg" alt="card image cap"> </a>
							<div class="card-body">
							  <!-- <h4 class="card-title b-0 px-0">Card title</h4> -->
							  <p>KrishiGap organized a National Webinar on September 25th,2023 on global food safety standards for startups in association with IIMR-ICAR... <a href="envents-details.php" class="btn btn-success">Read More</a></p>
							</div>
						    <!-- <div class="card-footer justify-content-between d-flex">
								<span class="text-muted">Last updated 3 mins ago</span>
								<span>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<span class="text-muted ms-2">(12)</span>
								</span>
						    </div> -->
                    

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