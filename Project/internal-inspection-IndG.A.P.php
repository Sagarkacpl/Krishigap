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
          
<p>1 Chapter 4.4.2, Version dated 01-11-2021 of Section 4 A of Certification Process-Group Certification provides requirements of conducting Internal inspections</p>
<h4>2 Coverage and use of Check lists for internal inspections:</h4>
<p>• All the producer members of the Group(Option 2) to be inspected using the Control Points and Compliance Criteria Checklists  as applicable to the crop.  All Farm base and Crops base checklists to be used for all crops and specific other check list as applicable to the crop specific to be used. Example, Fruits & Vegetables or Combinable Crops, Spices or Tea or Coffee as applicableM</p>
<h4>3. Frequency:</h4>
<p>• Minimum of once in a year in case of annual crop  or per crop cycle as applicable.</p>
<h4>4. Competency of Internal Inspectors:</h4>
<p>• It is most important that internal inspectors shall meet the competency requirements as specified under Chapter 5.2.1,5.2.2,5.3.1,5.4, 5.5,5.6 and 5.7</p>
<p>• Internal inspections becomes void, if the internal inspections are conducted without meeting the above requirements.</p>
<h4>5. Use of Internal or External inspectors</h4>
<p>• In case the Group does not have the qualified inspectors, then it can engage the external inspectors meeting the above requirements.</p>
<h4>6. Non Conformances during Internal Inspections.</h4>
<p>• All Non Conformances  if any raised by the Internal Inspectors during internal inspections to be closed by the  Producer member or the Group before scheduling internal audit of the Group.</p>
<h4>7. Submission of Reports:</h4>
<p>• All the inspection reports to be submitted by the internal inspectors to the Group </p>
