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
          1.  Chapter 3 of All Farms Base Module provides requirements on Workers Health, Safety and Welfare 
          </p>
          <h4>2.  Important Issues to be addressed </h4>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Risk assessment and hygiene instructions document to be prepared  and Welfare policy to be documented for safe and healthy working conditions of farm workers, sub-contractors if any working on the farm and the visitors to the farm based on the conditions of each farm location cultivated by the producer member of the Group.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Evidence of training provided to the  farm owner or worker on handling of chemicals, farm equipment, first aid application, use of protective cloth etc</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Access to designated areas of food storage, eating, and drinking water facility</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Identification of the responsible at the Group level for handling workers welfare and safety.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Prevention of accidents ,accident and emergency procedures and communication mechanisms</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Potential identification of hazards on farm like electrical installations, open wells etc.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;• Training to be provided by the qualified person</p>
