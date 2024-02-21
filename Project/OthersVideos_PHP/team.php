<?php
session_start();
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
                    <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                        </ol>
                        <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <center>
                        <h4>Advisory Board</h4>
                    </center>
                    <p style="text-align: justify;">Every business needs advice to grow and thrive. Advisory board allow
                        you access to advice
                        from top experts in their respective fields, gain insights or explore new opportunities by
                        stimulating high quality conversations. The role of an advisory board is to provide current
                        knowledge, critical thinking and analysis to increase the confidence of the decision-makers who
                        represent the company<br>
                        Personnel with great knowledge and experience on food safety initiatives will be on boarded as
                        members of the Advisory Board. This will include Global Experts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
        <div class="container">
            <div class="row g-4">



                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Srihari-Kotela.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/shri-hari.jpg" alt=""></a>
                            </center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Srihari-Kotela.php">
                                <h5 class="mb-0">Srihari Kotela</h5>
                            </a>
                            <small>Standard Specialist</small><br>
                            <small>Ex Founder Foodcert India (Now TQ Cert Services, A TATA group company)</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Mr-Sanjay-Dave.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/MrSanjayDave.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Mr-Sanjay-Dave.php">
                                <h5 class="mb-0">Mr. Sanjay Dave</h5>
                            </a>
                            <small>Food Safety Specialist</small><br>
                            <small>Ex Global Chair Person Codex</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Ms-Shashi-Sareen.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/Ms-Shashi-Sareen.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Ms-Shashi-Sareen.php">
                                <h5 class="mb-0">Ms Shashi Sareen</h5>
                            </a>
                            <small>Ex  CEO & Director</small><br>
                            <small>Export Inspection Council of India and Ex Director, Bureau of Indian Standards</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Mr-Anil-Jauhri.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/anil-jauhri.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Mr-Anil-Jauhri.php">
                                <h5 class="mb-0">Mr. Anil Jauhri</h5>
                            </a>
                            <small>Standard Specialist</small><br>
                            <small>Ex CEO NABCB</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Dr-Leslie-D-Bourqui.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/DrLeslieDBourquin.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Dr-Leslie-D-Bourqui.php">
                                <h5 class="mb-0">Dr. Leslie D. Bourquin</h5>
                            </a>
                            <small>Food Safety Specialist</small><br>
                            <small>Dept Chairperson Food safety, Michigan State University</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="BaskarKotte.php"><img style="width: 231px;height: 231px;" class="img-fluid"
                                        src="img/BaskarKotte.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="BaskarKotte.php">
                                <h5 class="mb-0">Mr. Baskar Kotte</h5>
                            </a>
                            <small>Standard Specialist</small><br>
                            <small>Founder Quality System Enhancement Inc, USA</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Dr-Seema-Shukla.php"><img style="width: 231px;height: 231px;" class="img-fluid"
                                        src="img/Dr-Seema-Shukla.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Dr-Seema-Shukla.php">
                                <h5 class="mb-0">Dr Seema Shukla</h5>
                            </a>
                            <small>Expert on Indian and International</small><br>
                            <small>(Codex, EU, USFDA, CFIA, ASEAN) standards and regulations within food supply chain</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Dr-MS-Rao.php"><img style="width: 231px;height: 231px;" class="img-fluid"
                                        src="img/Dr-MS-Rao.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Dr-MS-Rao.php">
                                <h5 class="mb-0">Dr. MS Rao</h5>
                            </a>
                            <small>Bio Pesticides Specialist</small><br>
                            <small>Ex Principal Scientist ,ICAR</small>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Dr-Santhosh-J-Eapen.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/DrSanthoshJEapen.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Dr-Santhosh-J-Eapen.php">
                                <h5 class="mb-0">Dr. Santhosh J. Eapen</h5>
                            </a>
                            <small>Spices Specialist</small><br>
                            <small>Ex Head ICAR Spices Research</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Dr-Abraham-Verghese.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/DrAbrahamVerghese.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Dr-Abraham-Verghese.php">
                                <h5 class="mb-0">Dr. Abraham Verghese</h5>
                            </a>
                            <small>IPM Specialist</small><br>
                            <small>Ex Director ,ICAR NBAIR</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Joginder_singh-minhas.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/Joginder-Singh-Minhas.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Joginder_singh-minhas.php">
                                <h5 class="mb-0">Joginder Singh Minhas</h5>
                            </a>
                            <small>Potato Value Chain</small><br>
                            <small>Project Manager,  International Potato Center</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="pandurang-gundappaad-sule.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/pandurang-gundappaad-sule.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="pandurang-gundappaad-sule.php">
                                <h5 class="mb-0">Dr. Pandurang Gundappa Adsule</h5>
                            </a>
                            <small>Grape Value Chain Specialist</small><br>
                            <small>Former Director, National Research Centre for Grapes</small>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="devender-prasad.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/devender-prasad.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="devender-prasad.php">
                                <h5 class="mb-0">Mr. Devendra Prasad</h5>
                            </a>
                            <small>Laboratory and Food Safety Compliances Specialist</small><br>
                            <small>Former-DGM, APEDA</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="jyotsana_sharma.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/jyotsana_sharma.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="jyotsana_sharma.php">
                                <h5 class="mb-0">Dr. (Mrs.) Jyotsana Sharma</h5>
                            </a>
                            <small>Pomegranate Value Chain </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="vilas_a_tonapi.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/vilas-a-tonapi.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="vilas_a_tonapi.php">
                                <h5 class="mb-0">Dr. Vilas A Tonapi</h5>
                            </a>
                            <small>Millet Value Chain Specialist </small><br>
                            <small>Former Director, ICAR-IIMR</small>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="venkat_pindipolu.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/venkat-pindipolu.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="venkat_pindipolu.php">
                                <h5 class="mb-0">Venkat Pindipolu</h5>
                            </a>
                            <small>Technology Expert </small><br>
                            <small>Co-founder, Carbon Mint</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="anju_nayyar.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/anju_nayyar.png" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="anju_nayyar.php">
                                <h5 class="mb-0">Anju Nayyar</h5>
                            </a>
                            <small>Digital Solutions Expert </small><br>
                            <small>Senior Advisor – Business Development & Alliances, YARA International</small>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="rama_reddy_kovvuri.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/rama_reddy_kovvuri.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="rama_reddy_kovvuri.php">
                                <h5 class="mb-0">Rama Reddy Kovvuri</h5>
                            </a>
                            <small>Technology Expert </small><br>
                            <small>Vice President Tyisha Technologies</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="ca-ramchandra.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/Ca-ramchandra.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="ca-ramchandra.php">
                                <h5 class="mb-0">CA Ramachandra Rao Tummala</h5>
                            </a>
                            <small>Finance, Systems & Compliance Expert </small>
                            <small>Founder :T R R & Associates</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="kapse_bhagwan.php"><img style="width: 231px;height: 231px;"
                                        class="img-fluid" src="img/kapse_bhagwan.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="kapse_bhagwan.php">
                                <h5 class="mb-0">Dr. Kapse Bhagwan</h5>
                            </a>
                            <small>Mango, Sweet Orange & Banana Supply Chain Expert</small>
                            <small>Former Director, National Institute of Post-Harvest Technology</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="chacko_jacob.php"><img style="width: 231px;height: 231px;" class="img-fluid" src="img/chacko_jacob.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="chacko_jacob.php">
                                <h5 class="mb-0">Mr Chacko Jacob</h5>
                            </a>
                            <small>Co-founder and Chief Business Officer Mist EO</small>
                            <small>Precision and Remote Sensing Expert</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="DharmeshVerma.php"><img style="width: 231px;height: 231px;" class="img-fluid" src="img/DharmeshVerma.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="DharmeshVerma.php">
                                <h5 class="mb-0">Dr Dharmesh Verma</h5>
                            </a>
                            <small>Basmati Rice Value Chain Expert</small>
                            <!--<small>Precision and Remote Sensing Expert</small>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Sumant_D_Parkhi.php"><img style="width: 231px;height: 231px;" class="img-fluid" src="img/Sumant_D_Parkhi.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Sumant_D_Parkhi.php">
                                <h5 class="mb-0">Mr. Sumant D. Parkhi</h5>
                            </a>
                            <small>Standard Expert (QMS, EMS and EnMS)</small>
                            <!--<small>Precision and Remote Sensing Expert</small>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="Mohan_M_Kulkarni.php"><img style="width: 231px;height: 231px;" class="img-fluid" src="img/Mohan_M_Kulkarni.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="Mohan_M_Kulkarni.php">
                                <h5 class="mb-0">Mr. Mohan M. Kulkarni</h5>
                            </a>
                            <small>Standard Expert (EMS, Carbon Footprint, Water Foot Print)</small>
                            <!--<small>Precision and Remote Sensing Expert</small>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden" style="background: white;">
                            <center><a href="akhil_mittal.php"><img style="width: 231px;height: 231px;" class="img-fluid" src="img/akhil_mittal.jpg" alt=""></a></center>
                        </div>
                        <div class="position-relative d-flex justify-content-center"
                            style="margin-top: -23px;background: white;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1" style="background: white;">
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4" style="background: white;">
                            <a href="akhil_mittal.php">
                                <h5 class="mb-0">Akhil Mittal</h5>
                            </a>
                            <small>Corporate Compliances Expert</small>
                            <!--<small>Precision and Remote Sensing Expert</small>-->
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