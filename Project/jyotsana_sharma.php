<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
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
                  <img style="width: 20%;" src="img/jyotsana_sharma.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr. (Mrs.) Jyotsana Sharma</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <p style="text-align: justify;">Principal Scientist - ICAR- National Research Centre on Pomegranate at Solapur, Maharashtra State, India. Joined this Centre in April 2006 and served in different capacities. Also Served as Acting Director from January 1, 2018 to April 27, 2021</p>
                  <!-- <li style="text-align: justify;">Project Manager, CIP-APART Potato Value Chain,
                  </li>
                  <li style="text-align: justify;">International Potato Center (CIP),</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <p style="text-align: justify;">Joined ICAR as Scientist in June 1989 at Central Potato Research Station Jalandhar (ICAR-CPRI, Shimla). Did research on soil and tuber borne diseases of potato.</p>
                  <!-- <li style="text-align: justify;">Chief Executive Officer, Jalandhar Potato Growers Biotech Producer Company Ltd, Lead a group of potato seed producers for quality seed production through geoponics technology and through good agricultural practices. Helped potato seed farmers in establishing a 2 million tuber capacity aeroponics facility in Jalandhar, Punjab, India</li>
                  <li style="text-align: justify;">Head, Central Potato Research Station, Jalandhar, Punjab State</li>
                  <li style="text-align: justify;">Principle Scientist, Agricultural Research Service of the Indian Council of Agricultural Research (ICAR), Central Potato Research Institute (CPRI) Shimla</li>
                  <li style="text-align: justify;">Scientist S2, Agricultural Research Service of the Indian Council of Agricultural Research (ICAR), Tribal Area Development Scheme Waghai</li> -->
                  <br>
                  <p style="float: left;color: #000;"><b>Awards:</b></p>
                  <br><br>
                  <li style="text-align: justify;"><b>‘Dalimb Ratna Award-2016’</b> Conferred by Akhil Maharashtra Pomegranate Growers Research Association for valuable contributions in development of model for management of bacterial blight disease (Telya) plant health management systems in pomegranate crops in all pomegranate growing states of India.
                  </li>
                  <li style="text-align: justify;">Conferred <b>Fellow of CHAI-2019</b>. By Confederation of Horticulture Association of India, New Delhi for contribution and commitment to the furtherance of Horticulture.
                  </li>
                  <li style="text-align: justify;"> Conferred <b>Fellow of Society for Promotion of Horticulture for the year 2021-22</b>, by Society for Promotion of Horticulture, IIHR, Bengaluru, Karnataka India, in recognition of contributions in the field of Horticulture- Plant Pathology.
                  </li>
                  <li style="text-align:justify;"><b>Narinder Nath Mohan Memorial Gold Medal</b> for outstanding performance in MSc.</li>
                  <li style="text-align:justify;"><b>Dr. S Ramanujam Memorial Certificate of Appreciation</b> 2003-04, by ICAR-CPRI, Shimla, for significant contributions in bringing potato revolution in India.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Patents Obtained</b></p>
                  <br><br>
                  <li style="text-align: justify;">One of the Inventors on the project for the patent granted to ICAR for an invention entitled Bio-formulation for Potassium fertilizer supplement in Pomegranate and process of preparation thereof. Patent No 403302</li>
                  <li style="text-align: justify;">A Process for Preparing a bio fertilizer cum bio fungicidal composition with Aspergillus niger strain AN27’   Notified in ‘The Gazette of India’, November 29, 2003 </li>
                  <br>
                  <p style="float: left;color: #000;"><b>SIGNIFICANT ACHIEVEMENTS</b></p>
                  <br><br>
                  <li style="text-align: justify;">Management of bacterial blight and other economically important diseases of pomegranate.</li>
                  <li style="text-align: justify;">Most recently developed, successfully demonstrated, ‘Stem solarisation: an eco-friendly, economical and effective technology to control bacterial blight’ in 4 farmers’ orchards</li>
                  <li style="text-align: justify;">Launched <b>Social Media Platform ‘Dalimb Mitra’</b> a collaborative project of ICAR- NRCP with Taral Infotech in March 2021, which was inaugurated by Hon’ble DG (Hort.) Dr AK Singh. Farmers can ask their queries in their local language and advisories are given every fifteen days</li>
                  <br>
                  <p style="float: left;color: #000;"><b>PUBLICATIONS</b></p>
                  <br><br>
                  <li style="text-align: justify;">Several research publications and technical /Extension bulletins, brochures and videos for the benefit of farmers in English, Marathi, and Hindi.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>EDUCATION</b></p>
                  <br><br>
                  <li style="text-align: justify;"><b>PhD.</b> in Plant Pathology from IARI, N. Delhi in 1989 (Grade point 3.91/4).</li>
                  <li style="text-align: justify;"><b>M.Sc.</b> (with honours) in Plant Pathology(Grade point 3.93/4).</li>
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