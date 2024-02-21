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
//    include "most_visited_page.php";
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
                  <h1 class="display-3 text-white animated slideInDown">Internal Inspection</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Internal Inspection</li>
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
                  <p style="color: #0fb249;"><b>Internal Inspections</b></p>
                  <p style="color: #000;"><b>IndG.A.P</b></p>
                  <p style="text-align: justify;">In this section, the standard requirements related internal inspections of the producer members
of the group are provided
</p>
                   <p style="text-align: justify;"><font style="color: #0fb249;"><b>Related Documents: </b></font>Section is provided in which you can access to documents, which are
related to internal inspections.</p>
                  <br>



<p style="float: left;color: #0fb249;"><b>Brief About the Requirements</b></p>
                  <br><br>
                  <p style="text-align: justify;">Key Points to be kept in mind for qualification of internal inspectors and conducting of internal
inspections of producer members of the group.</p>
                 
                  <br>



<p style="float: left;color: #0fb249;"><b>1. Coverage and use of Check lists for internal inspections: 
</b></p>
                  <br><br>
                  <li style="text-align: justify;">All the producer members of the Group(Option 2) to be inspected using the Control
Points and Compliance Criteria Checklists as applicable to the crop module. All Farm
base and Crops base checklists to be used for all crops plus crop specific module to be
used. Example, Fruits & Vegetables or Combinable Crops, Spices or Tea or Coffee as
applicable.</li>
                  <br>

<p style="float: left;color: #0fb249;"><b>2. Frequency: </b></p>
                  <br><br>
                  <li style="text-align: justify;">Minimum of once in a year in case of annual crop or per crop cycle as applicable.</li>
                  <br>

<p style="float: left;color: #0fb249;"><b>3. Competency of Internal Inspectors:
</b></p>
                  <br><br>
                  <li style="text-align: justify;">Evaluation of competency requirements documented in internal inspector qualification
matrix, which is uploaded into the section.</li>
<li style="text-align: justify;">Internal inspections become void, if the internal inspections are conducted without
meeting the above requirements.
</li>
                  <br>

<p style="float: left;color: #0fb249;"><b>4. Use of Internal or External inspectors: </b></p>
                  <br><br>
                  <li style="text-align: justify;">In case the Group does not have the qualified inspectors, then it can engage the
external inspectors meeting the above requirements.
</li>
                  <br>

<p style="float: left;color: #0fb249;"><b>5. Non Conformances during Internal Inspections: </b></p>
                  <br><br>
                  <li style="text-align: justify;">All Non Conformances if any raised by the Internal Inspectors during internal inspections
to be closed by the Producer member or the Group before scheduling internal audit of
the Group.

</li>
                  <br>


<p style="float: left;color: #0fb249;"><b>6. Submission of Reports:</b></p>
                  <br><br>
                  <li style="text-align: justify;">All the inspection reports to be submitted by the internal inspectors to the Group</li>
                  <br>
<p style="float: left;color: #000;"><b>Notes:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Certificate will not be granted by the certification body for any noncompliance to a Major
clause </li>
<li style="text-align: justify;">Similarly certificate will not be granted by the certification body for any noncompliance’s
which accounts more than 5% of the applicable Minor Clauses to a Major clause </li>
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