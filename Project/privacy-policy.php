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
                    <h1 class="display-3 text-white animated slideInDown">Privacy Policy</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Privacy Policy</li>
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
                    <h5 class="mb-4">1. Copyright policy</h5>
                    <p class="mb-4" style="text-align: justify;">Content of the website cannot be reproduce without taking proper permission, it can be taken by sending mail or connecting with us. After getting proper permission the material is being published or issued to others, the source must be prominently acknowledged. However, the permission to reproduce this material shall not extend to any material which is identified as being copyright of a third party. Authorization to reproduce such material must be obtained from the departments/copyright holders concerned.</p>

                    <h5 class="mb-4">2. Hyper linking Policy</h5>
                    <p class="mb-4" style="text-align: justify;">Krishi Gap is not responsible for the contents and reliability of the linked websites and does not necessarily endorse the views expressed in them. Mere presence of the link or its listing on this website should not be assumed as endorsement of any kind. We cannot guarantee that these links will work all the time and we have no control over availability of linked pages Permission for the same, stating the nature of the content on the pages from where the link has to be given and the exact language of the Hyperlink should be obtained by sending a request to stake holder.</p>

                     <h5 class="mb-4">3. Privacy Policy </h5>
                    <p class="mb-4" style="text-align: justify;">We do not collect personal information for any purpose other than to respond to you. If you choose to provide us with personal information like filling out a Contact Us form with an e-mail address or postal address, and submitting it to us through the website, we use that information to respond to your message, and to help you get the information you have requested. • Our website never collects information or creates individual profiles for commercial marketing. While you must provide an e-mail address for a localized response to any incoming questions or comments to us, we recommend that you do NOT include any other personal information. • If you are asked for any other Personal Information you will be informed how it will be used. If at any time you believe the principles referred to in this privacy statement have not been followed, or have any other comments on these principles, please notify the concerned through the contact us page. • The use of the term "Personal Information" in this privacy statement refers to any information from which your identity is apparent or can be reasonably ascertained.</p>

                    <h5 class="mb-4">4. Links to our website by other websites</h5>
                    <p class="mb-4" style="text-align: justify;">We do not object to you linking directly to the information that is hosted on this website and no prior permission is required for the same. However, we would like you to inform us about any links provided to this website so that you can be informed of any changes or updating therein. Also, we do not permit our pages to be loaded into frames on your site. The pages belonging to this website must load into a newly opened browser window of the User.</p>
                    <p class="mb-4" style="text-align: justify;">This privacy policy sets out how KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED uses and protects any information that you give KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED when you use this website.</p>
                    <p class="mb-4" style="text-align: justify;">KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, and then you can be assured that it will only be used in accordance with this privacy statement.</p>
                    <p class="mb-4" style="text-align: justify;">KRISHIGAP DIGITAL SOLUTIONS PRIVATE LIMITED may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.</p>
                    
                    <h5 class="mb-4">5. We may collect the following information</h5>
                    <ul class="unorder-list">
        <li class="list-item">
            <p class="content-text list-text">Name and job title</p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Contact information including email address
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Demographic information such as postcode, preferences and interests
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                Other information relevant to customer surveys and/or offers
            </p>
        </li>
    </ul>
     <h5 class="mb-4">6. What we do with the information we gather</h5>
     <p class="content-text list-text">
        We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:
    </p>
    <ul class="unorder-list">
        <li class="list-item">
            <p class="content-text list-text">Internal record keeping.</p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                We may use the information to improve our products and services.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                We may periodically send promotional emails about new products, special
                offers or other information which we think you may find interesting
                using the email address which you have provided.
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                From time to time, we may also use your information to contact you for
                market research purposes. We may contact you by email, phone, fax or
                mail. We may use the information to customise the website according to
                your interests.
            </p>
        </li>
    </ul>
    <p class="content-text list-text">
        We are committed to ensuring that your information is secure. In order to
        prevent unauthorised access or disclosure we have put in suitable measures.
    </p>
    <h5 class="mb-4">7. How we use cookies</h5>
    <p class="content-text list-text">
        A cookie is a small file which asks permission to be placed on your
        computer's hard drive. Once you agree, the file is added and the cookie
        helps analyses web traffic or lets you know when you visit a particular
        site. Cookies allow web applications to respond to you as an individual. The
        web application can tailor its operations to your needs, likes and dislikes
        by gathering and remembering information about your preferences.
    </p>
    <p class="content-text list-text">
        We use traffic log cookies to identify which pages are being used. This
        helps us analyses data about webpage traffic and improve our website in
        order to tailor it to customer needs. We only use this information for
        statistical analysis purposes and then the data is removed from the system.
    </p>
    <p class="content-text list-text">
        Overall, cookies help us provide you with a better website, by enabling us
        to monitor which pages you find useful and which you do not. A cookie in no
        way gives us access to your computer or any information about you, other
        than the data you choose to share with us.
    </p>
    <p class="content-text list-text">
        You can choose to accept or decline cookies. Most web browsers automatically
        accept cookies, but you can usually modify your browser setting to decline
        cookies if you prefer. This may prevent you from taking full advantage of
        the website.
    </p>
    <h5 class="mb-4">8. Controlling your personal information</h5>
    <p class="content-text list-text">
        You may choose to restrict the collection or use of your personal
        information in the following ways:
    </p>
    <ul class="unorder-list">
        <li class="list-item">
            <p class="content-text list-text">
                whenever you are asked to fill in a form on the website, look for the
                box that you can click to indicate that you do not want the information
                to be used by anybody for direct marketing purposes
            </p>
        </li>
        <li class="list-item">
            <p class="content-text list-text">
                if you have previously agreed to us using your personal information for
                direct marketing purposes, you may change your mind at any time by
                writing to or emailing us at
                harsh@aretecon.com
            </p>
        </li>
    </ul>
    <p class="content-text list-text">
        We will not sell, distribute or lease your personal information to third
        parties unless we have your permission or are required by law to do so. We
        may use your personal information to send you promotional information about
        third parties which we think you may find interesting if you tell us that
        you wish this to happen.
    </p>
    <p class="content-text list-text">
        If you believe that any information we are holding on you is incorrect or
        incomplete, please write to or email us as soon as possible, at the above
        address. We will promptly correct any information found to be incorrect.
    </p>
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