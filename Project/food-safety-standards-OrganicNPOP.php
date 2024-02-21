<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
  //  include "most_visited_page.php";
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }?>
<h5>IMPORTANT POINTS TO BE NOTED</h5>
<p><b>1. In this section, Organic NPOP Scope covers Crop Production.</b></p>
<p>2. National Program for Organic Production (NPOP) Standard latest version, November
2014 is applicable as on September, 2022. This program is administered by APEDA
(<a href="https://apeda.gov.in/apedawebsite/" target="_blank" >www.apeda.gov.in</a>).</p>
<p>3. NPOP program is accredited under International Standard ISO 17065 .The Certification
Bodies are approved by APEDA.</p>
<p>4. At present only organic Crop Production is covered. Aquaculture, Livestock and Poultry
are not covered.</p>
<p>5. To assist you in understanding the technical information on specific crops, you can refer
to Package of Practices Section.</p>
<p>6. Important documents like Quality Manual, Procedures, Risk Assessments, Plans,
Records etc. are provided for your guidance in order to comply with the requirements of
the NPOP standard. You need to apply the documentation based on the crop selected
and your local conditions.</p>
<p>7. <b>Disclaimer:</b> Please note that KrishiGAP prepared and uploaded the documents to the
best of knowledge and as we understood the requirements of the standard. You are
always advised to visit the website of APEDA (<a href="https://apeda.gov.in/apedawebsite/" target="_blank" >www.apeda.gov.in</a>) for correct
information and updates .KrishiGAP is not responsible for any consequences that may
arise out of the use of the documents uploaded into KrishiGAP website.</p>