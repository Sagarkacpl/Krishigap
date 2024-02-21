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
                <img style="width: 20%;" src="img/Srihari-Photo-Founder-KrishiGAP.png">
             <p style="color: #000;font-size: 20px;"><b>Srihari Kotela</b></p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">Founder and MD of eFresh Agribusiness Solutions P Ltd, (www.efreshglobal.com).
Conceived a SMART and SAFE Farming Platform called ,Farmers Development Centre( FDC)
as a One Stop solution for all farmer needs ( Seeds, fertilizers, plant protection, post-
harvest and digital solutions empowering Farmers organizations towards commercialization,
ease of doing business and farming.
                  </li>
                  <li style="text-align: justify;">Received United States President Volunteer Service Gold Award 2022 with a citation from
The White House in Washington –June 2022
                  </li>






<br>
<p style="float: left;color: #000;"><b>Start Up and Incubation</b></p>
                  <br><br>
                  <li style="text-align: justify;">Registered as a Start Up by DIITP, Govt of India
                  </li>
                  <li style="text-align: justify;">Incubated by ICRISAT
                  </li>


<br>
<p style="float: left;color: #000;"><b>1. Founder Past Background in Food Safety Management Systems</b></p>
                  <br><br>
                  <li style="text-align: justify;">Mr. Srihari Kotela is a serial entrepreneur and an expert in global certification standards within
food supply chain and has over two decades of experience. He launched Foodcert India Pvt. Ltd
in 2001in collaboration with Foodcert BV, The Netherlands.
                  </li>
                  <li style="text-align: justify;">Foodcert India Pvt Ltd formed in the year 2001, emerged as the first Indian certification body
to achieve European Accreditation for inspection of farms for cultivation of fruits and
vegetables under international standard ISO 17020.
                  </li>


<li style="text-align: justify;">Foodcert is also the first Indian certification body to receive recognition for India Good
Agricultural Practices from National Accreditation Board for Certification Bodies , Quality
Council of India
                  </li>
                  <li style="text-align: justify;">Championed the introduction of European Retail Parties Good Agricultural Practices
certification scheme in India for the first time in the year 2002 and more than 5000 farmers
were covered under GAP certification and facilitated export of agricultural products and
production of safe food to the Indian consumers. Introduced various food safety standards in
India covering entire food supply chain like organic certification (NPOP and NOP), HACCP, ISO
22000, BRC, International Food Standard (IFS) etc. Foodcert was also the first certification
body granted recognition for Ayush Products and Medicinal Plants certification scheme.
                  </li>
                  <li style="text-align: justify;">Keeping the main focus on eFresh Vision parted with Foodcert India. TATA Projects Ltd, a TATA
Group company acquired Foodcert in the year 2015.
                  </li>


<br>
<p style="float: left;color: #000;"><b>2. Ex Member of various committees</b></p>
                  <br><br>
                  <li style="text-align: justify;">Recognizing his contributions, was appointed by various government institutions on the
committees for formulation of good agricultural practices and food safety management
systems in the food supply chain.
                  </li>





                  <br>
<p style="float: left;color: #000;"><b>Bureau of Indian Standards, Govt. of India:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Provided inputs in the development of standards for food safety related to Good Hygiene
Practices and Good Retail Practices as a member of Sectional Committee FAD 15.
                  </li>
                  <li style="text-align: justify;">Member of expert committee for formulation of Indian Standard- National Agricultural Code –Vol 1: India GAP( Good Agricultural practices)
                  </li>




                  <br>
<p style="float: left;color: #000;"><b>Quality Council of India.</b></p>
                  <br><br>
                  <li style="text-align: justify;">Establishing and harmonizing standards for Good Agricultural Practices (GAP) and aligning
India specific practices with Global GAP under the chairmanship of Dr Mangal Rai, Secretary
(Dare) &amp; DG, ICAR.
                  </li>
                  <li style="text-align: justify;">To introduce Voluntary Certification Mark for the food processing sector
                  </li>
                   <li style="text-align: justify;">To develop a voluntary compliance and certification on Good Agricultural Practices and Good
Animal Husbandry Practices to help industry in procuring right raw material.
                  </li>
                   <li style="text-align: justify;">To develop the SAARC GAP for scope “All Farm/Crops Base/Fruit and Vegetables” for the FAO
of the UN.
                  </li>





                  <br>
<p style="float: left;color: #000;"><b>Food Safety Standards Authority of India</b></p>
                  <br><br>
                  <li style="text-align: justify;">To develop draft scheme indicating the standards &amp; guidelines for a basic food safety
management system for food establishments in the country and procedure for certification of
professionals to certify the compliance of Food Safety System.
                  </li>
                  <li style="text-align: justify;">To prepare a voluntary standard on Good Agricultural Practices.
                  </li>


<br>
<p style="float: left;color: #000;"><b>Department of Ayush, Ministry of Health &amp; Family welfare, Govt. of India</b></p>
                  <br><br>
                  <li style="text-align: justify;"><b>Member Technical Committee</b> for developing rules for Good Agricultural Practices/Good
Field collection Practices voluntary certification criteria for medicinal plants
                  </li>





                  <br>
<p style="float: left;color: #000;"><b>Confederation of Indian Industry</b></p>
                  <br><br>
                  <li style="text-align: justify;"><b>Member CII Task Force</b> on Horticulture for developing strong and globally competitive
horticulture value chain.
                  </li>
                  <li style="text-align: justify;"><b>Member of the Agricultural task force</b> (Southern Region) and Member of the Agriculture &amp;
Rural Economy Sub Committee (western region)
                  </li>




                  <br>
<p style="float: left;color: #000;"><b>3. Educational Qualifications:</b></p>
                  <br><br>
                  <li style="text-align: justify;">Qualified Lead Auditor- Quality Management Systems, Environmental Management Systems,
Occupational Health &amp; Safety Management Systems.
                  </li>
                  <li style="text-align: justify;">Trained in Food safety Management Systems : Primary Food Production and Processing
                  </li>
                   <li style="text-align: justify;">Successfully completed programs on – Introduction of Capability Maturity Model conducted
by Carnegie Mellon University.
                  </li>

   <br>
<p style="float: left;color: #000;"><b>4. Trainings</b></p>
                  <br><br>
                  <li style="text-align: justify;">Business planning for Indian SMEs conducted in Japan by the association for overseas
technical scholarship, Japan.
                  </li>
                  <li style="text-align: justify;">Essential requirements  for free movement of products within EU and CE Marking
                  </li>
                   <li style="text-align: justify;">Trained on National and International Standards – ISO 9000, ISO 14000, OHSAS 18001, ISO
22000, ISO 27001,ISO 17025, ISO 17065, EurepGAP, GlobalG.A.P, IndG.A.P, Organic
certification scheme (NPOP and NOP ), British Retail Consortium , International Food
Standard , HACCP based food safety systems
                  </li>



        </div> </div> </div>
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