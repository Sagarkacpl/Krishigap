<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
// include "most_visited_page.php";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.4.2.js"></script>
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
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                        <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row g-5">

                <!---<h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>--->
                <h1 class="mb-4 text-center">MISSION</h1>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="mb-4">Our Mission is to promote food safety and sustainable standards by enhancing the
                        availability of skilled
                        manpower and inculcating a culture of food safety in the entire agri value chain and to create
                        enhanced income to the
                        farming community and safe food to the consumers</p>

                    <p class="mb-4">This will be achieved through Digital Platform as a one stop solution by networking
                        among food safety
                        institutions/stakeholders in agri echo system.</p>
                </div>
                <div class="col-md-5">
                    <div class="img">
                        <img src="img/mission-image.jpg">
                    </div>
                </div>


                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="text-center">OUR APPROACH</h1>
                    <p class="mb-4 text-center">Taking digital learning to crop production/food processing centers to
                        empower farmer's organizations and
                        food processors with ease and scale of implementation.</p>
                </div>

                <div class="col-lg-6 mt-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="phase-box">
                        <div class="phase-click"><a href="">Phase-1 : India</a></div>
                        <div class="img">
                            <img src="img/phase-1.jpg">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="phase-box">
                        <div class="phase-click"><a href="">Phase-2 : Global</a></div>
                        <div class="img">
                            <img src="img/phase-2.jpg">
                        </div>
                    </div>
                </div>
                <p class="mb-4 text-center">
                    Maintaining the integrity and independence of its activities, Krishi GAP will not be involved in Certification Activities, which are done by Accredited Certification Bodies.
                </p>

                <!--<div class="col-md-4">-->
                <!--    <div class="img border">-->
                <!--        <img src="img/customer.jpg">-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-12 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mt-5">OUR CUSTOMERS</h1>
                    <p class="mb-4"> Farmers organizations, Food growers, Food processors/ packers, Food exporters/importers , Food  retailers, Transport & Logistic providers, Institutions in food supply chain, Faculty & Students ,Suppliers of farm inputs</p>
                    <p><a href="#" class="btn btn-success pull-left"
                            style="box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%);">Customer</a></p>
                </div>

                <div class="col-lg-8 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mt-5">OUR TEAM</h1>
                    <p class="mb-4">Mr Srihari Kotela, a standard specialist and former founder of Foodcert India ( Now TQ Cert Services Pvt Ltd, a TATA group Company). He is assisted by experts who lend their skills, guidance and strategic advice to grow and achieve its mission</p>
                    <p><a href="team.php" class="btn btn-success pull-left"
                            style="box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%);">Team</a></p>
                </div>
                <div class="col-md-4">
                    <div class="img border">
                        <img src="img/shri-hari.jpg">
                    </div>
                </div>

                <h4>
                    <strong>Krishi GAP activities are aligned with The Sustainable Development Goals of United
                        Nations</strong>
                </h4>

                <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="six-box-re green-bg">
                        <div class="six-box-icon"><img src="img/icon-1.png"></div>
                        <div class="six-box-title">Good Health and Well-Being</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="six-box-re skyblue-bg">
                        <div class="six-box-icon"><img src="img/icon-2.png"></div>
                        <div class="six-box-title">Quality Education</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="six-box-re lightred-bg">
                        <div class="six-box-icon"><img src="img/icon-3.png"></div>
                        <div class="six-box-title">Decent Work & Economic Growth</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="six-box-re greenlight-bg">
                        <div class="six-box-icon"><img src="img/icon-4.png"></div>
                        <div class="six-box-title">Responsible Consumption & Production</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="six-box-re orange-bg">
                        <div class="six-box-icon"><img src="img/icon-5.png"></div>
                        <div class="six-box-title">Climate Action</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="six-box-re green-bg">
                        <div class="six-box-icon"><img src="img/icon-6.png"></div>
                        <div class="six-box-title">Live on Land</div>
                    </div>
                </div>

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