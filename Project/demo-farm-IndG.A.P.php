<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
 //   include "most_visited_page.php";
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }?>
<div class="text-center" style="visibility: visible;">
                <h6 class="section-title bg-white text-center text-primary px-3">Introduction</h6>
                <h1 class="mb-5">IndG.A.P</h1>
            </div>
          
          <p>
          1.   A demonstration farm, or model farm, is a farm which is used primarily to research or demonstrate important good agricultural practices. Seeing and believing approach is followed.
          </p>
          <p>
          2.   Demos serve as a platform for skills enhancement and capacity building, thus enabling practical implementation of India Good Agricultural Practices on the farm.
          </p>
          <p>
          3.   Demos can raise awareness on topics like identification and fixing up hazards on the farm, handling of protective clothing while handling chemicals, complex equipment, storage of plant protection and nutrients on the farm , provision of drinking water, display of instructions related to workers, health, safety and welfare, harvesting guidelines, first aid kit display, etc
          </p>
          <p>
          4. On-Farm demonstrations serve as one of the most effective extension education tools and Peer-to-Peer learning  within the farming community and scaling up the implementation of Good Agricultural Practices
          </p>
          <p>
          5. Focus on IndG.A.P implementation of important activities on the farm
          </p>