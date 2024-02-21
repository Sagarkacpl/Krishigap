<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
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
      <div class="container-fluid bg-primary py-5 mb-5 page-header" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container py-5">
            <div class="row justify-content-center">
               <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Team</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
         <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
               <div class="page-detail-line" style="padding-bottom: 0px;">
                  <img style="width: 20%;" src="img/anil-jauhri.png">
                  <p style="color: #000;font-size: 20px;"><b>Mr. Anil Jauhri</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>

                  <br><br>
                  <p style="float: left;">Post retirement in July, 2019, associated with several organizations as an independent expert:</p>
                  <br><br>
                  <li style="text-align: justify;">Member, CDM Accreditation Panel, UNFCCC, Bonn</li>
                  <li style="text-align: justify;">Member of the Boards for Yoga certification, Naturopathy certification and Ayurveda training accreditation set up by the Ministry of AYUSH.</li>
                  <li style="text-align: justify;">Chairman, Good Clinical Practice Professional Certification Scheme, THSTU, Deptt of Biotechnology</li>
                  <li style="text-align: justify;">Member of the Accreditation Committees of accreditation bodies, ASI Gmbh, Bonn and ASI North America</li>
                  <li style="text-align: justify;">Evaluator for ISEAL Alliance for sustainability standards and certification schemes.</li>
                  <li style="text-align: justify;">Co-chair of the recently launched initiative of Regulatory Representatives and Managers Association related to chemical regulation</li>
                  <li style="text-align: justify;">Co-chair of the AMTZ’s steering committee for development of conformity assessment schemes in medical device sector such as Biomedical Equipment Maintenance Certification Scheme</li>
                  <li style="text-align: justify;">Lead assessor for accreditation bodies like NABCB, ANAB and UAF. </li>
                  <li style="text-align: justify;">Lead peer evaluator for the Asia Pacific Accreditation Cooperation (APAC) as well as International Accreditation Forum (IAF).</li>
                  <br>
                   <p style="text-align: justify;">He continues to provide expertise to the government to Ministries such as Commerce, AYUSH, Biotechnology and office of the Principal Scientific Adviser in India, whenever needed. He continues to be member of the Core Group in the Department of Commerce coordinating development of technical regulations in India since 2017.<br><br>He writes extensively on standards, regulations and conformity assessment related issues. </p>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Former CEO of the National Accreditation Board for Certification Bodies (NABCB), a constituent Board of the Quality Council of India (QCI), and national accreditation body for certification and inspection attached to Ministry of Commerce & Industry. During his tenure as CEO, NABCB secured a number of international equivalences such as Product certification, Inspection, various management systems like Food safety, Information security, Occupational Health and Safety and Energy management systems and Personnel certification.
                  </li>
                  <li style="text-align: justify;">He has been part of India's trade negotiations with various countries, notably with the USA as part of Indian delegation led by the Commerce Minister in 2015 and 2017 in Washington DC and continues to work with Department of Commerce on trade issues and free trade negotiations like with UAE, UK and Australia currently
                  </li>

                  <li style="text-align: justify;">42 plus years of experience in the field of quality, standards, certification and accreditation having worked earlier in the Bureau of Indian Standards, the national standards body, and the Export Inspection Council, India's official export regulator and certification body under the Ministry of Commerce & Industry. 
Led the development of recently launched Good Clinical Practice Professional Certification scheme under Clinical Development Services Agency of THSTI in DBT as well as accreditation of Ayurveda training courses globally under newly created Ayurveda Training Accreditation Board in the Rashtriya Ayurveda Vidyapeeth of the Ministry of AYUSH. 

                  </li>
                  <li style="text-align: justify;">He is nationally and internationally recognized expert having worked with such international bodies as UNFCCC, UNIDO, PTB, FAO, APO and IFC and was invited as an expert by WTO in 2013 and 2015. 
                  </li>
                  <li style="text-align: justify;">Besides being instrumental in supporting regulators like PNGRB, FSSAI, CDSCO, BEE etc. in developing systems for using accredited 3rd party agencies, he also led development of a number of voluntary certification schemes of QCI notably AYUSH Mark for ayush products, ICMED scheme for medical devices, Yoga certification, Traditional healer certification, IndGAP/IndiaGHP/India HACCP certifications in agrifood sector, Star rating scheme for private security agencies etc. 
                  </li>
                 <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">M Tech
                  </li>
                  <li style="text-align: justify;">I.I.T   Kanpur
                  </li>

                  
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