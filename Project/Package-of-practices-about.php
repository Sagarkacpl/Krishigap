<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
       header("Location: login.php");
   }
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
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.js"></script>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <div class="container-fluid bg-primary py-5 mb-5 page-header">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Package Of Practices</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Package Of Practices</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                  <p style="color: #0fb249;"><b>Package of Practices</b></p>
                  <p style="color: #000;"><b>IndG.A.P</b></p>
                  <p style="text-align: justify;">In this section, crop wise package of practices are provided for the crops in India. Package of
practices developed by the Indian Council of Agricultural Research institutions, Agricultural
Universities and State agricultural departments are uploaded. In case it is not available for
specific crop for the specific state, then you can consider package of practices developed for the
same crop for any other state and then consider the amendments as applicable to the local
conditions in the state.</p>
                   <p style="text-align: justify;"><font style="color: #0fb249;"><b>Related Documents: </b></font>Section is provided in which you can access to documents, which are
related to the package of practices.</p>
                  <br>



<p style="float: left;color: #0fb249;"><b>Brief About the Requirements</b></p>
                  <br><br>
                  <p style="text-align: justify;">A Good Agricultural Package of Practices is a prescription for growing different crops in
scientific manner for obtaining the improved crop productivity, quality and sustainable
production.
</p>
<p style="text-align: justify;">Package of practices broadly covers selection of seed materials to harvesting stage. It
may differ for Kharif and Rabi seasons and vary from State to State within the country

</p>
<p style="text-align: justify;">Indian Council of Agricultural Research Institutions, Agricultural Universities and State
Agricultural Departments are the primary bodies that develop this package of practices
for use by the farmers in India.
</p>
<p style="text-align: justify;">It is most important to obtain a copy of this document as applicable to the crop as many
requirements of the GAPstandards can be linked to these practices for compliance and
demonstration.
</p>
<p style="text-align: justify;">We have made efforts in making available package of practices for many crops which
are prepared by the institutions referred above.
</p>
<p style="text-align: justify;">Though, state wise package of practices not available for many crops, it is advised to
look into the package of practices that is available for the crop and modify it into specific
practices as per local conditions in the state.
</p>
                 

                  <br>
<p style="float: left;color: #000;"><b>Notes:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Certificate will not be granted by the certification body for any noncompliance to a Major
clause </li>
<li style="text-align: justify;">Similarly certificate will not be granted by the certification body for any noncompliance’s
which accounts more than 5% of the applicable Minor Clauses to a Major clause.</li>
                  <br>

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