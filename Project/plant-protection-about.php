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
                  <h1 class="display-3 text-white animated slideInDown">Plant Protection Products</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Plant Protection Products</li>
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
                  <p style="color: #0fb249;"><b>Plant Protection Products</b></p>
                  <p style="color: #000;"><b>IndG.A.P</b></p>
                  <p style="text-align: justify;">In this section, Standard wise requirements on plant protection products are provided.<br><br>
You can select Standard, Country, Crop, Category of Plant Protection Product and then
Permitted Crop Wise
Separately, you can select Banned, Restricted and Registered plant protection Products for all
crops in India
</p>
                   <p style="text-align: justify;"><font style="color: #0fb249;"><b>Related Documents: </b></font>Section is provided in which you can access to documents, Example :
Dos and Don’ts for safe usage of pesticides, guidelines for storage and safe handling, safe use
with pictorials, Integrated pest management for different crops etc</p>
                  <br>



<p style="float: left;color: #0fb249;"><b>Brief About the Requirements</b></p>
                  <br><br>
                  <p style="text-align: justify;">Chapter7 of Crops Base Module provides requirements to be met on Plant Protection
Products</p>
<p style="text-align: justify;">This is very important section to be carefully reviewed, understood and implemented by
the farmers. Producer Group to monitor the implementation.</p>
<p style="text-align: justify;">Key compliances include,(1) List of plant protection products approved for the crop,(2)
maintenance of records of application- purchases, use,& inventory ,(3) Pre harvest
interval maintenance,(4) Disposal of surplus application mix (5) Produce sample
collection for residue analysis (6) Permitted MRLs both in India and destination country
(7) Plant protection product residue analysis (8) Selection of accredited laboratory for
testing (9) Plant protection storage (10) Plant protection product handling (11) disposal
of empty plant protection products containers.(12) Obsolete plant protection products
handling (13) Maintenance of equipment used for application 
</p>
<p style="text-align: justify;">Awareness on Banned/Restricted chemicals, Pre harvest intervals, and MRLs, Pest &
diseases in the area of crop cultivation, label instructions implementation to be
demonstrated.
</p>
<p style="text-align: justify;">Maintenance of equipment used for spraying, training to the workers on handling of
plant protection products and workers safety to be demonstrated.
</p>
<p style="text-align: justify;">Record to be maintained with the details - Crop name, variety, application location, date
and end time of location, product trade name and active ingredient, pre harvest interval,
operator name, justification for use, technical authorization for application, product qty
applied, application machinery used, weather conditions at the time of application
machinery, operator name, technical name of the product, technical authorization, status
of inventory etc.

</p>
                 

                  <br>
<p style="float: left;color: #000;"><b>Notes:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Certificate will not be granted by the certification body for any noncompliance to a Major
clause  </li>
<li style="text-align: justify;">Similarly certificate will not be granted by the certification body for any noncompliance’s
which accounts more than 5% of the applicable Minor Clauses to a Major clause</li>
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