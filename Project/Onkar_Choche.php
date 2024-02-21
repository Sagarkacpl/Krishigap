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
                  <img style="width: 20%;" src="img/Onkar_Choche.jpg">
                  <p style="color: #000;font-size: 20px; margin-bottom:0px;"><b>Mr. Onkar Choche</b></p>
                  <p>Food Safety Audit, Quality and Regulatory Compliance</p>
                  <p style="float: left;color: #000;"><b>Present</b></p>
                  <br><br>
                  <li style="text-align: justify;">FSSC Lead Auditor.</li>
                  <p style="float: left;color: #000;"><strong>Food Technology Consultant, providing services in the domains of:</strong></p>
                  <br><br>
                  <ul>
                    <li style="text-align: justify;">New Product Development</li>
                        <ul >
                            <li style="text-align: justify;"><strong>Confectionery and Chocolates</strong> – Hard Boiled Candies; Center filled Candies; Jellies; Centre filled Jellies; Ice-lollies; Toffees; Wafer and Cream based Confectionery products; Cocoa based Chocolates and Confectionery products.</li>
                            <li style="text-align: justify;"><strong>Beverages</strong> – Fruit Pulp / Fruit Concentrate based Beverages; Fruit or Flavour based Syrups and Concentrates, Carbonated Beverages, Fermented Beverages; Non-dairy Beverages.</li>
                            <li style="text-align: justify;"><strong>Sauces</strong> – Emulsified sauces like Mayonnaise and its variants; Tomato Ketchup; Chutneys; Sriracha; Harissa; Pizza / Pasta Sauces like Arrabbiata, Marinara, Alfredo etc.</li>
                            <li style="text-align: justify;"><strong>Extruded Products and Snacks</strong> – Cereal and Millet based extruded snacks; Traditional Extruded Products (like Kurdai, Sevai, Chakli, Murukku etc.); Noodles; Pasta.</li>
                            <li style="text-align: justify;"><strong>Premixes</strong> – Fruit based beverage premixes; Traditional Cereal Pulses and Millet based premixes; Bakery premixes (like Cake premix; Cookie Premix, Whipped cream premix, Custard premix etc.).</li>
                            <li style="text-align: justify;"><strong>Bakery</strong> – Breads; Sponge Cakes; Creams; Biscuits; Cookies.</li>
                            <li style="text-align: justify;"><strong>Dairy </strong> – Milk; Yogurt; Lassi; Dairy based sweets; Dairy based fermented products</li>
                            <li style="text-align: justify;"><strong>Seasoning </strong> – Seasonings for Snacks, Herb Seasonings; Masala seasonings. </li>
                    </ul>
                    <li style="text-align: justify;">Technology Support: </li>
                    <ul>
                    <li style="text-align: justify;">Process Standardization from Prototyping to Commercial Scale-up stage.</li>
                    <li style="text-align: justify;">Standardizing Product Specifications as per FSSAI and other applicable International Standards.</li>
                    </ul>
                    <li style="text-align: justify;">Factory Support: </li>
                    <ul>
                    <li style="text-align: justify;">Factory Compliances.</li>
                    <li style="text-align: justify;">Food Safety Management System.</li>
                    <li style="text-align: justify;">Hazard Analysis and Risk Assessment Plan.</li>
                    <li style="text-align: justify;">Quality Compliance and Documentation Guidance.</li>
                    <li style="text-align: justify;">Quality Assurance, GMP, GHP.</li>
                    <li style="text-align: justify;">Training the factory team in product handling, process hygiene, documentation and record keeping, material handling etc.</li>
                    <li style="text-align: justify;">Conducting Internal Audits and guide the factory team for 3rd Party audits.</li>
                    <li style="text-align: justify;">Support in implementation of voluntary standards and certification like FSSC 22000, BRCGS, ISO etc.</li>
                    </ul>
                    <li style="text-align: justify;">Regulatory Support as per applicable Standards: </li>
                    <ul>
                    <li style="text-align: justify;">Label Declarations.</li>
                    <li style="text-align: justify;">Understanding Claim Declarations.</li>
                    <li style="text-align: justify;">Product Guidelines and Categorization.</li>
                    <li style="text-align: justify;">Import and Export Guidelines and Compliances.</li>
                    </ul>
                  </ul>
                  <p style="float: left;color: #000;"><b>Past</b></p>
                  <br><br>
                  <li style="text-align: justify;">Worked with Future Consumer Limited, Keva Flavours Private Limited, Anshul Life Sciences in the departments of New Product Development and Product Applications.</li>
                  <li style="text-align: justify;">Worked with Future Consumer Limited, Keva Flavours Private Limited, Anshul Life Sciences in the departments of New Product Development and Product Applications.</li>
                  <br>
                  <p style="float: left;color: #000;"><b>Education</b></p>
                  <br><br>
                  <li style="text-align: justify;">Bachelor of Technology (Food Engineering and Technology) – Institute of Chemical Technology, Mumbai (Formerly, U.D.C.T).</li>
                  <li style="text-align: justify;">Post Graduate Program in Agribusiness Management (Part-time) – Prin. L. N. Wellingkar Institute of Management Development and Research, Mumbai.</li>
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