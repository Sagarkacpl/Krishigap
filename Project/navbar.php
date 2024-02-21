<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQ9B5XW');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQ9B5XW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-TK7Q9L7ZJS"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-TK7Q9L7ZJS'); </script>

<div class="container">
   <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
      <div class="container-fluid">
         <a class="navbar-brand" href="http://www.krishigap.com"><img src="img/krishi-gap-logo.png" alt="krishi-gap-logo" style="height: 70px;"></a>
         <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse collapse" id="main_nav" style="">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item dropdown">
                  <a class="nav-link" href="index.php">Home </a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" href="about.php">About Us </a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" href="team.php">Team </a>
               </li>
               <!--<li class="nav-item dropdown">-->
               <!--   <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Who we are </a>-->
               <!--   <ul class="dropdown-menu dropdown-menu-right">-->
               <!--      <li><a class="dropdown-item" href="about.php"> About Us</a></li>-->
               <!--      <li><a class="dropdown-item" href="background.php"> Background </a></li>-->
               <!--      <li><a class="dropdown-item" href="team.php"> Team </a>-->
               <!--      </li>-->
               <!--   </ul>-->
               <!--</li>-->
               <li class="nav-item position-relative">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">What we do </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li><a class="dropdown-item" href="digital_enablement.php"> Digital Enablement</a></li>
                     <li><a class="dropdown-item" href="inpact_creation.php"> Impact Creation </a></li>
                     <li><a class="dropdown-item" href="background_behind_the_initiative.php"> Background behind the Initiative </a>
                     </li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="events.php">Events</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Standards </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li><a class="dropdown-item" href="home1.php"> On Farm Production</a></li>
                     <li><a class="dropdown-item" href="home2.php"> Post Harvest Processing </a></li>
                     <li><a class="dropdown-item" href="home3.php"> Sustainable Initiatives </a></li>
                     <li><a class="dropdown-item" href="home4.php"> Others</a></li>
                     <li><a class="dropdown-item" href="steps_in_obtaining_certificate.php"> Steps In obtaining Certificate</a></li>
                     <li><a class="dropdown-item" href="https://nabcb.qci.org.in/" target="_blank"> Accredited Certification Bodies</a></li>
                  </ul>
               </li>
               <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Standards </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li>
                        <a class="dropdown-item" href="#"> IndG.A.P »</a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="standard.php?gsw=IndGAP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=IndGAP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=IndGAP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=IndGAP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=IndGAP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=IndGAP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=IndGAP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=IndGAP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=IndGAP&od=Others">Others</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="dropdown-item" href="#"> GlobalG.A.P » </a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="standard.php?gsw=Global GAP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=Global GAP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=Global GAP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=Global GAP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=Global GAP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=Global GAP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=Global GAP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=Global GAP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=Global GAP&od=Others">Others</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="dropdown-item" href="#"> Organic NPOP » </a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="standard.php?gsw=Organic NPOP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=Organic NPOP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=Organic NPOP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=Organic NPOP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=Organic NPOP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=Organic NPOP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=Organic NPOP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=Organic NPOP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=Organic NPOP&od=Others">Others</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="dropdown-item" href="#"> Organic NOP » </a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="standard.php?gsw=Organic NOP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=Organic NOP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=Organic NOP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=Organic NOP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=Organic NOP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=Organic NOP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=Organic NOP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=Organic NOP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=Organic NOP&od=Others">Others</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="dropdown-item" href="#">Fairtrade International » </a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=Fairtrade International&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="standard.php?gsw=IndGAP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=IndGAP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=IndGAP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=IndGAP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=IndGAP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=IndGAP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=IndGAP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=IndGAP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=IndGAP&od=Others">Others</a></li>
                        </ul>
                     </li>
                     <li>
                        <a class="dropdown-item" href="#"> Rain Forest Alliance » </a>
                        <ul class="submenu submenu-left dropdown-menu">
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=Rain forest Alliance&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="standard.php?gsw=IndGAP&od=Standard">Standard</a></li>
                           <li><a class="dropdown-item" href="quality-manual.php?gsw=IndGAP&od=Quality Manual">Quality Manual</a></li>
                           <li><a class="dropdown-item" href="procedures.php?gsw=IndGAP&od=Procedures">Procedures</a></li>
                           <li><a class="dropdown-item" href="work-instructions.php?gsw=IndGAP&od=Work Instructions">Work instructions </a></li>
                           <li><a class="dropdown-item" href="risk-assessment.php?gsw=IndGAP&od=Risk Assessment">Risk Assessment</a></li>
                           <li><a class="dropdown-item" href="management-plans.php?gsw=IndGAP&od=Management Plans">Management Plans</a></li>
                           <li><a class="dropdown-item" href="policies.php?gsw=IndGAP&od=Policies">Policies</a></li>
                           <li><a class="dropdown-item" href="records.php?gsw=IndGAP&od=Records">Records</a></li>
                           <li><a class="dropdown-item" href="others.php?gsw=IndGAP&od=Others">Others</a></li>
                        </ul>
                     </li>
                  </ul>
               </li> -->
               
               <li class="nav-item dropdown">
                  <a class="nav-link" href="contact.php">Contact </a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" href="news.php">News </a>
               </li>
            </ul>
            <a href="http://premiummarket.krishigap.com/" target="_blank" class="btn-sm btn-primary px-3 border-end" style="border-radius: 30px;color: #fff;margin-right: 10px;">Premium Market</a>
            <?php if ($_SESSION['UID'] != '') { ?>
            <a href="profile.php" class="btn-sm btn-primary px-3 border-end" style="border-radius: 30px;color: #fff;margin-right: 10px;">Profile</a>
            <a href="logout.php" class="btn-sm btn-primary px-3 border-end" style="border-radius: 30px;color: #fff;">Logout<i class="fa fa-arrow-right ms-3"></i></a>
            <?php }else{ ?>        
            <a href="login.php" class="btn-sm btn-primary px-3 border-end" style="border-radius: 30px;color: #fff;">Login<i class="fa fa-arrow-right ms-3"></i></a>
            <?php } ?>  
            <span class="m-relative">
               <form action="search.php" method="GET">
                  <input type="text" class="form-control m-search" value="<?php echo $q; ?>" name="search" placeholder="Search" required="" autocomplete="off">
                  <button class="m-search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
               </form>
            </span>

         </div>
      </div>
   </nav>
</div>

<!-- <div class="new-registration">
   <a href="price-page.php">
   <img src="img/new-regiseration.png" alt="" class="img-fluid">
   </a>
</div>
<style>
   .new-registration {
    position: fixed;
    left: -8px;
    top: 200px;
    z-index: 9999;
}
</style> -->
