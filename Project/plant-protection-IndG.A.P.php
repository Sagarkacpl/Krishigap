<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "most_visited_page.php";
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }?>
    <div class="text-center" style="visibility: visible;">
                <h6 class="section-title bg-white text-center text-primary px-3">Introduction</h6>
                <h1 class="mb-5">IndG.A.P</h1>
            </div>
          
          <p>
          1. Chapter 8 of Crops Base Module provides requirements to be met on the handling of Plant Protection Products
          </p>
          <p>
          2. Chapter 8 of Crops Base Module provides requirements to be met on the handling of Plant Protection Products
          </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Awareness on Permitted, Banned chemicals  , Pre harvest intervals to be followed ,MRLs , label instructions  ( both India and product destination country ) for the crop cultivated.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Pest & Diseases in the area  of  crop cultivation.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Calibration of application machinery used for spraying </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Training on the use of protective clothing, handling of the products, handling of obsolete chemicals and emergency situations.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Maintenance of record for application of the product with qty, date of application, used application machinery, operator name, technical name of the product, technical authorization, status of inventory etc.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Disposal of surplus mix , empty used containers and obsolete chemicals</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Storage of products if stored on the farm </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Record of Residue testing </p>
