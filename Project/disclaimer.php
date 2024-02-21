<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
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
                    <h1 class="display-3 text-white animated slideInDown">Disclaimer</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Disclaimer</li>
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
                    <p style="text-align: justify;margin-bottom: 15px;"><b>Disclaimer:</b></p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> Krishi GAP does not necessarily own each component of the content contained in this platform, therefore it does not warrant that the use of any third party owned individual component or part contained in this platform will not infringe on the rights of those parties. The risk of a claim resulting from such infringement rests solely with the user. If the user wishes to re-use a component of the content, it is user responsibility to determine whether permission is needed for re use and to obtain permission from the copyright owner.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> The information/data contained in this platform is retrieved or sourced from various sources to the best of our judgement and   should only be construed as guidance. and we do not take any responsibility for the accuracy, content, completeness, reliability and useful of such information. We assert that any business or investment decisions should not be based on the information presented in this site. We will not be responsible for any losses incurred by the users as a result of decisions made based on any information/data included in this site.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> The Quality Manual, Procedures, Work Instructions, Records etc. for the standards showcased in the platform are prepared to the best of our judgement and for the guidance of the users. Please note that these are prepared keeping in view the general requirements of the particular standard. The user is advised to look at his processes, products, services, customer requirements, legal and food safety regulatory requirements etc. as applicable to the organization, while drafting his quality manual and other related documents. The requirements are under constant revision and the user is advised to go through the standards updates etc. all the time.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> KrishiGAP (<a href="https://www.krishigap.com" target="_blank">www.krishigap.com</a>) or its founders or its advisory board members, or employees are not responsible or liable for loss of profits or revenue, claims or damages direct or indirect, tangible or intangible, incidental, consequential or punitive damages or intangible losses arising out of the use of information or material or data or services  as appeared in  this site.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> Krishi GAP site provided links to other sites wherever found and it is not responsible for the content or its accuracy in those sites. The links are provided for your reference only.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> User must always visit the relevant websites of Standard or Scheme owners or concerned organizations involved in agri supply chain activities for information and compliances (whether government or private).  Some Examples: Quality Council of India (<a href="https://www.qcin.org" target="_blank">www.qcin.org</a>) GlobalG.A.P (<a href="https://www.globalgap.org" target="_blank">www.globalgap.org</a>), Organic NPOP (<a href="https://apeda.gov.in" target="_blank">www.apeda.gov.in</a>), Organic NOP (<a href="https://www.ams.usda.gov" target="_blank">www.ams.usda.gov</a>), Fair Trade International (<a href="https://www.fairtrade.net" target="_blank">www.fairtrade.net</a>), Rain Forest Alliance (<a href="hhttps://www.rainforest-alliance.org" target="_blank">www.rainforest-alliance.org</a>), ICAR institutions, Agricultural Universities, other regulatory bodies.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> User can purchase or download the specific Standard documents from the Standard owner’s websites.</p>
                    <p class="mb-4" style="text-align: justify;"><strong>•</strong> NO WARRANTY, NO REPRESENTATION, NO GUARANTEE, NO LIABILITY DIRECT OR INDIRECT FOR THE CONTENTS IN THE DOCUMENTATION PROVIDED THROUGH KRISHGAP PLATFORM.</p>
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