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
      /* .page-detail-line
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
 */


@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif
}
/* 
body {
    margin-top: 30px;
    background-color:#eee;
}

.container {
    min-height: 100vh;
    padding: 20px 0;
    display: flex;
    align-items: center;
    justify-content: center
}

p {
    margin: 0px
} */


.containercard {
    min-height: 100vh;
    padding: 20px 0;
    /*display: flex;*/
    /*align-items: center;*/
    /*justify-content: center*/
}

.card {
    width: 330px;
    height: 520px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    background: #fff;
    transition: all 0.5s ease;
    cursor: pointer;
    user-select: none;
    z-index: 10;
    overflow: hidden
}

.card .backgroundEffect {
    bottom: 0;
    height: 0px;
    width: 100%
}

.card:hover {
    color: #fff;
    transform: scale(1.025);
    box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 10px
}

.card:hover .backgroundEffect {
    bottom: 0;
    height: 320px;
    width: 100%;
    position: absolute;
    z-index: -1;
    background: #1b9ce3;
    animation: popBackground 0.3s ease-in
}

@keyframes popBackground {
    0% {
        height: 20px;
        border-top-left-radius: 50%;
        border-top-right-radius: 50%
    }

    50% {
        height: 80px;
        border-top-left-radius: 75%;
        border-top-right-radius: 75%
    }

    75% {
        height: 160px;
        border-top-left-radius: 85%;
        border-top-right-radius: 85%
    }

    100% {
        height: 320px;
        border-top-left-radius: 100%;
        border-top-right-radius: 100%
    }
}

.card .pic {
    position: relative
}

.card .pic img {
    width: 100%;
    height: 280px;
    object-fit: cover
}

.card .date {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 70px;
    background-color: #1b9ce3;
    color: white;
    position: absolute;
    bottom: 0px;
    transition: all ease
}

.card .date .day {
    font-size: 14px;
    font-weight: 600
}

.card .date .month,
.card .date .year {
    font-size: 10px
}

.card .text-muted {
    font-size: 12px
}

.card:hover .text-muted {
    color: #fff !important
}

.card .content {
    padding: 0 20px
}

.card .content .btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    background-color: #1b9ce3;
    border-radius: 25px;
    font-size: 12px;
    border: none
}

.card:hover .content .btn {
    background: #fff;
    color: #1b9ce3;
    box-shadow: #0000001a 0px 3px 5px
}

.card .content .btn .fas {
    font-size: 10px;
    padding-left: 5px
}

.card .content .foot .admin {
    color: #1b9ce3;
    font-size: 12px
}

.card:hover .content .foot .admin {
    color: #fff
}

.card .content .foot .icon {
    font-size: 12px
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
               <h1 class="display-3 text-white animated slideInDown">News</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                     <li class="breadcrumb-item text-white active" aria-current="page">News</li>
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
        
            <?php } ?>
         
					


                     <div class="col">
                        <div class="container containercard">
                           <div class="d-lg-flex">
                           <div class="card border-0 me-lg-4 mb-lg-0 mb-4">
                              <div class="backgroundEffect"></div>
                              <div class="pic"> <img class="" src="img/newsletter1.jpg" alt="">
                                 <div class="date"> <span class="day">10</span> <span class="month">October</span> <span
                                    class="year">2023</span> </div>
                              </div>
                              <div class="content">
                                 <p class="h-1 mt-4">Hon'ble Prime Minister Vision for Global Standards is being fulfilled.</p>
                                 <p class="text-muted mt-3"> India Good Agricultural Practices(IndG.A.P)  became equivalent to Global G.A.P...</p>
                                 <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                                 <a href="news-details.php" target="_blank"><div class="btn btn-primary">Read More<span class="fas fa-arrow-right"></span></div></a>
                                 <div class="d-flex align-items-center justify-content-center foot">
                                    <!-- <p class="admin">Warm Regards</p> -->
                                    <p class="admin">Srihari Kotela</p>
                                    <!-- <p class="ps-3 icon text-muted"><span class="fas fa-comment-alt pe-1"></span>3</p> -->
                                 </div>
                                 </div>
                              </div>
                           </div>
                           
                          
                           </div>
                        </div>
                     </div>
                        
         </div>
      </div>
   </div>
   <?php include "footer.php"; ?>
   <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script> -->
   
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
   <script src="lib/easing/easing.min.js"></script>
   <script src="lib/waypoints/waypoints.min.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="js/main.js"></script>
</body>

</html>