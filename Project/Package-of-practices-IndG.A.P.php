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
          1.  A Good Agricultural Package of Practices is prescription for growing different crops in scientific manner for obtaining the improved crop productivity and can contribute to greater yields with improved quality. 
          </p>
          <p>
          2.  It broadly covers selection of seed materials to harvesting stage.  It will be different for Kharif and Rabi seasons and vary from State to State within the country
          </p>
          <p>
          3.  Research institutes and agricultural universities are the primary bodies that develop these practices, with the objective to make farming more efficient and sustainable in the long run.
          </p>
          <p>
          4.  In this section, package of practices recommended by reputed institutions are referred.
          </p>