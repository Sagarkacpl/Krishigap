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
<p><b>1. In this section, IndG.A.P scope covers Fruits &amp; Vegetables and Combinable
Crops, which includes spices.</b></p>
<p>2. IndG.A.P scheme, Version date November 1,2021 was launched by Quality Council of
India(<a href="https://www.qcin.org/" target="_blank" >www.qcin.org</a>).</p>
<p>3. IndG.A.P standard is accredited under International Standard ISO 17065 and the
Certification Bodies are accredited by NABCB, a division of QCI.</p>
<p>4. All Farm Base and Crops Base Control Points &amp; Compliance Criteria (CCPC) are
applicable for all types of Crops. Fruits &amp; Vegetables or Combinable Crops as applicable
to be implemented.</p>
<p>5. Since CCPCs are generic, the implementing organization has to customize the crop
specific information for applicable clauses of CCPCs. For example in case of Grape Crop,
specific crop cultivation practices have to be incorporated in applicable clauses of CCPCs.</p>
<p>6. To assist you in understanding the technical information on specific crops, you can refer to
Package of Practices Section.</p>
<p>7. Important documents like Quality Manual, Procedures, Risk Assessments, Plans,
Records etc. are provided for your guidance in order to comply with the requirements of
the IndG.A.P standard. You need to apply the documentation based on the crop selected
and your local conditions.</p>
<p>8. <b>Disclaimer:</b> Please note that KrishiGAP prepared and uploaded the documents to the
best of knowledge as we understood the requirements of the standard. You are always
advised to visit the website of Quality Council of India (<a href="https://www.qcin.org/" target="_blank" >www.qcin.org</a>) for correct
information and updates .KrishiGAP is not responsible for any consequences that may
arise out of the use of the documents uploaded into KrishiGAP website.</p>