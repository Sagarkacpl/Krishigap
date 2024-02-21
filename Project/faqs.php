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
</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <?php include "navbar.php";?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">FAQs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">FAQs</h6>
                <h1 class="mb-5">Frequently Asked Questions</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>1. What are the food safety related and other standards covered in Krishi GAP platform</b></p>
                            <p class="mb-0"><b>ON FARM PRODUCTION STANDARDS</b></p>
                            <p class="mb-0">India good Agricultural Practices, GlobalG.A.P, National Program for Organic Production, NPOP, National Organic Program , USA.</p>

                             <p class="mb-0"><b>POST HARVEST PROCESSING STANDARDS</b></p>
                            <p class="mb-0">ISO 22000 Food Safety Management Systems, BRCGS Global Food Safety Standard, FSSC 22000 Food Safety Standard, BRCGS Packaging Materials Global Standard </p>

                            <p class="mb-0"><b>SUSTAINABLE STANDARDS</b></p>
                            <p class="mb-0">ISO 14001: Environmental Management Systems, ISO 50001, Energy Management, SA 8000 Social accounting, Rainforest Alliance, Fail trade International.</p>

                            <p class="mb-0"><b>Other Schemes </b></p>
                            <p class="mb-0">Pack Houses, Cold Storages, Laboratories, Dry Warehouses</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>2. What is the objective of Krishi GAP</b></p>
                            <p class="mb-0">Krishi GAP objective is, to digitally reach all the important crop production and food processing centers and to create large pool of skilled persons (Food Safety bearers) who will become enablers in promoting food safety across food supply chain and to create impact on:</p>
                            <p class="mb-0"><b>•</b> Increase in income through better farm produce market linkages</p>
                            <p class="mb-0"><b>•</b> Safety, Healthof the farmers, workers, personnel in the processing sector.</p>
                            <p class="mb-0"><b>•</b> Sustainable and profitable agricultural operations</p>
                            <p class="mb-0"><b>•</b> Positive effect on Climate Change</p>
                            <p class="mb-0"><b>•</b> Safe food for the consumers</p>
                            <p class="mb-0"><b>•</b> Trained people in rural areas through skill development.</p>
                            <p class="mb-0"><b>•</b> Increased farm exports from India.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>3. Who are Krishi GAP Customers</b></p>
                            <p class="mb-0"><b>•</b> Farmers organizations, Food growers, Food processors/ packers, Food exporters/importers, Food retailers,  Institutions, faculty and students  in food supply chain, Suppliers of farm inputs</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>4. What Krishi GAP platform provides in the platform.</b></p>
                            <p class="mb-0"><b>• Guidance:</b> Virtual access to templates on Quality Manual, Procedures, Work Instructions, Risk Assessments, Management Plans, and Records etc. in generic form for the respective standards. An organization can use these for reference and incorporate its own requirements based on its processes, business operations, standard requirements, and local conditions.</p>
                            <p class="mb-0"><b>• Skill Development:</b>  Virtual training programs will be organized  towards ease of implementation of the  standards and to create large pool of skilled persons ., which will facilitate compliances (Training on audit principles as per ISO 19011, Internal Inspectors, Internal Auditors, Food Safety, Hygiene, Crop specific, Workers health, welfare, safety. Online certificates will be provided to the participant’s .Domain experts in respective standards will impart the training.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>5. Whether Krishi GAP platform is involved in Certification activity </b></p>
                            <p class="mb-0"><b>•</b> Krishi GAP platform shall not involve in the certification activities, which will be provided by Accredited Certification Bodies, approved by National Accreditation Bodies and selected independently by the implementers</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>6. From Which Sources Standards have to be purchased</b></p>
                            <p class="mb-0"><b>•</b> You are advised to purchase the standard copyfor the relevant standard from the standard owners by visiting their websites. Some   you can download free from the  standard owners  sites and some are at cost Example www.iso.org,  www.globalgap.org, www.qcin.org, www.apeda.gov.in, www.ams.usda.gov, www.mygfsi.com, www.rainforest-alliance.org, www.fairtrade.net.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p class="mb-0"><b>7. How do I access to Krishi GAP Platform</b></p>
                            <p class="mb-0"><b>•</b> Through Subscriptions and you can register on the platform</p>
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