<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
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
                    <h1 class="display-3 text-white animated slideInDown">Terms & Conditions</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Terms & Conditions</li>
                        </ol>
                        <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 0rem !important;
    padding-bottom: 0rem !important;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <p class="mb-4" style="text-align: justify;">The Website Owner, including subsidiaries and affiliates (“Website” or “Website Owner” or “we” or “us” or “our”) provides the information contained on the website or any of the pages comprising the website (“website”) to visitors (“visitors”) (cumulatively referred to as “you” or “your” hereinafter) subject to the terms and conditions set out in these website terms and conditions, the privacy policy and any other relevant terms and conditions, policies and notices which may be applicable to a specific section or module of the website.</p>

                   
                    <p class="mb-4" style="text-align: justify;">Welcome to our website. If you continue to browse and use this website you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED''s relationship with you in relation to this website.</p>

                    <p class="mb-4" style="text-align: justify;">The term 'KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED' or 'us' or 'we' refers to the owner of the website whose registered/operational office is House No 5-106/281B, Narsing Municipality Manchirevula K.V Ranga Reddy K V Rangareddy TELANGANA 500075. The term 'you' refers to the user or viewer of our website.</p>
                    <p class="content-text">
        <strong>The use of this website is subject to the following terms of use:</strong>
    </p>
                    <ul class="unorder-list">
        <li class="list-item">
            <p class="content-text list-text">The content of the pages of this website is for your general information and use only. It is subject to change without notice</p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.


            </p>
        </li>
        
        <li class="list-item">
            <p class="content-text list-text">
                All trademarks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offense.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                You may not create a link to this website from another website or document without KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED’s prior written consent.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Your use of this website and any dispute arising out of such use of the website is subject to the laws of India or other regulatory authority.
            </p>
        </li>
    </ul>

                    <p class="mb-4" style="text-align: justify;">We as a merchant shall be under no liability whatsoever in respect of any loss or damage arising directly or indirectly out of the decline of authorization for any Transaction, on Account of the Cardholder having exceeded the preset limit mutually agreed by us with our acquiring bank from time to time.</p>
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