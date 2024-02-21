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
                  <img style="width: 20%;" src="img/Dr-Seema-Shukla.jpg">
                  <p style="color: #000;font-size: 20px;"><b>Dr. Seema Shukla</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Currently associated with 3 EU projects (ARISE plus, EU Asia cooperation on Sanitary and Phyto Sanitary and food regulation, BTSF) to be delivered in India, ASEAN and World.
                  </li>
                  <li style="text-align: justify;">Working on Guide on Animal and Animal Products exports to India for EU exporters under the project EU Asia Cooperation on phytosanitary and food safety regulation (DAHD, FSSAI).</li>
                  <li style="text-align: justify;">Working on Market surveillance technical report preparation for Tea, Pulses, Milk on behalf of FSSAI and NCML.</li>
                  <li style="text-align: justify;">Empaneled at WHO as technical expert/ Consultant on Food Safety including Quality Assurance to work on South Asia (April 2021-2024).</li>
                  <li style="text-align: justify;">Certified auditor for HACCP, ISO 9001, ISO 22000  ISO 13485, BRC.</li>
                  <li style="text-align: justify;">Assessor for ISO 17020, ISO 17021/ 220003, FSSC-22003 ver5.1 with EIC (2012-2018) and NABCB (2018-2022).</li>
                  <li style="text-align: justify;">Food Safety Training Expert for developing sustainable institutional framework for training and regulator’s capacity building  in ASEAN countries.</li>
                  <li style="text-align: justify;">Associated.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">22 years of experience in Food Safety at various levels as microbiologist, auditor, trainer, consultant, policy maker.</li>
                  <li style="text-align: justify;">Experience of working with regulatory, food safety and other governmental authorities in association with EIC FSSAI, EU, USFDA, AQSIQ and CFIA, CNCA, ASEAN.</li>
                  <li style="text-align: justify;">Demonstrated competence in SPS measure, codex matters, and science based standard setting process.</li>
                  <li style="text-align: justify;">Experience in handling WTO related matters and presented India’s approach on SPS, TBT standards. Developed e learning program on Introduction to WTO, NTMs and Safer Food for better trade.</li>
                  <li style="text-align: justify;">Completed revision of Guidebook on Plant and Plant products import to India covering regulatory paradigm for improved market access. Under the project EU Asia Cooperation on phytosanitary and food safety regulation.</li>
                  <li style="text-align: justify;">Drafted handbook on good beekeeping practice at EIC involving FSSAI and National bee board (2016), review of guide book on good aquaculture practice along with MPEDA and CIFT.</li>
                  <li style="text-align: justify;">Development of manual and training materials and conducting conferences and workshops and social events of high impact; notable one includes USFDA, CFIA and EU programs under CITD including aquaculture, good fishing vessel Practices.</li>
                  <li style="text-align: justify;">Coordinator for EU India Capacity Building Initiative for Trade Development (CITD) project for the component of food safety and SPS (2013-2017).</li>
                  <li style="text-align: justify;">Successfully moderated the delivery of six programs in online mode in ASEAN including overseeing the developmental work on food safety sampling, risk communication and Risk Based Inspection, Food Hygiene and Food Borne disease outbreak. New programs Labelling and Health claims, Risk assessment for pesticide residues, emergency and recall.</li>
                  <li style="text-align: justify;">Developed two capsule e learning module for Quality Council of India (Training and capacity building) department on Introduction to WTO and Safer food for better business.</li>
                  <li style="text-align: justify;">Expert in ADB project GMS Cros border Livestock Value chain project as ISO 22000 expert to develop policy road map for three countries Lao PDR, Cambodia and Myanmar. Worked closely with Cambodia MISTI.(2020-2022).</li>
                  <li style="text-align: justify;">Part of various committees and Indian delegation to CASCO, Codex committee on CCFH, CCGP and CCNFSD(2014-2021).</li>
                  <li style="text-align: justify;">Conducted more than 200 man-days of compliance audits in sectors like meat products, aquaculture, rice, catering.</li>
                  <li style="text-align: justify;">Coordinated several missions for capacity building with Malaysian Authority, Nepal, Bhutan, EU, USFDA, CNCA, CFIA and for international associations like FAO, ILSI, IFPRI.  (20112-2018).</li>
                  <li style="text-align: justify;">Worked closely for signing of US India capacity building protocol with USFDA and EIC and member of EU India Joint working groups as part of EIC (2014-2018).</li>
                  <li style="text-align: justify;">Leading the initiative to develop online portal for import rejection monitoring across the departments (EU RASFF). Actively participated in review of online portals (e traceability in fisheries and laboratory accreditation scheme). (2017-2018).</li>
                  <li style="text-align: justify;">Coordination of the FVO mission to India on peanut and peanut products for aflatoxin control;  residue control.(2015).</li>
                  <br>
                  <p style="float: left;color: #000;"><b>KEY CONTRIBUTIONS TO GOVERNMENT INITIATIVES:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Facilitating signing of agreement on feed and feed products between EIC, MoC&I, India and AQSIQ, China in May 2014.
                  </li>
                  <li style="text-align: justify;">Signing of technical protocol for capacity building between EIC, India and USFDA and its operationalization in October 2016.
                  </li>
                  <li style="text-align: justify;">Developing the protocol between EIC, FSSAI and World Bank to establish ITCFSAN in 2017.
                  </li>
                  <li style="text-align: justify;">Operationalization of agreement between FSSAI and Netherlands for capacity building during 2016-2018.
                  </li>
                  <li style="text-align: justify;">Contribution on White paper on Endocrine descriptors for EU legislations.
                  </li>
                  <li style="text-align: justify;">Facilitating the capacity building towards inspection of rice, Spices, honey, peanuts and seafood.
                  </li>
                  <li style="text-align: justify;">High level dialogue Seminar between India EU on Plant protection products complete coordination from inception(September 2016).
                  </li>
                  <li style="text-align: justify;">High level dialogue Seminar between India EU on Veterinary medicinal products and AMR complete coordination from inception (November 2017).
                  </li>
                  <li style="text-align: justify;">Gap analysis on official control vis-à-vis EU requirements for Fishery & aquaculture products (May 2014).
                  </li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Indian Institute of Technology, New Delhi :   Doctor of Philosophy, Supply Chain – Food Safety.
                  </li>
                  <li style="text-align: justify;">G.B Pant University of Agriculture  :Master of Technology (Agriculture, Food Biotech).
                  </li>
                  <li style="text-align: justify;">Delhi University: Bachelors of Applied Sciences (Food Tech).</li>
                  <li style="text-align: justify;">HACCP from Royal Institute of Public Health in 2002.</li>
                  <li style="text-align: justify;">Good Laboratory Practices (GLP) Inspectors as per ISO 17025 OECD principles in 2015; auditors’ program in December 2016 by NGCMA, Department of Science and Technology.</li>
                  <li style="text-align: justify;">Certified with distinction vide online course entitled "Sanitary and Phytosanitary Measures - ET200514E" in 2014.</li>
                  <li style="text-align: justify;">Workshop on SPS and TBT measures 2015 at WTO regional office, Bangkok.</li>
                  <li style="text-align: justify;">Workshop on Standards, regulation and health in 2016 by WTO office at Geneva.</li>
                  <li style="text-align: justify;">Participated in USDA Food Safety Equivalence Program at four locations in US, 2017.</li>
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