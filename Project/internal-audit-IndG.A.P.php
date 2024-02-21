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
<h4>2 Coverage and use of Check lists for internal Audit</h4>
<p>• QMS Checklist for the Group (Option 2) to be used for Internal Audit. This checklist can be downloaded from the QCI website <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></p>
<p>• Internal auditor has to approve the internal inspection reports submitted by the internal inspectors.</p>
<h4>3. Frequency:</h4>
<p>• Minimum of once in a year in case of annual crop  or per crop cycle as applicable.</p>
<h4>4. Competency of Internal Auditors:</h4>
<p>• All the requirements of  internal inspectors  as  specified under Chapter 5.2.1,5.2.2,5.3.1,5.4, 5.5,5.6 and 5.7 </p>
<p>• Plus completion of Internal Auditor training on Quality Management Systems ( ISO 9000)  for a minimum duration of 16 hours.</p>
<p>• Internal Audit of QMS  becomes void, if the internal audits are conducted without meeting the above requirements.</p>
<h4>5. Use of Internal or External Auditors</h4>
<p>• In case the Group does not have the qualified Auditors, then it can engage the external auditors meeting the above requirements.</p>
<h4>6. Non Conformances during Internal Audits</h4>
<p>• All Non Conformances if any raised by the Internal Auditor during internal audit to be closed by the   Group before scheduling CB certification Audit</p>
<h4>7. Submission of Reports:</h4>
<p>• The completed internal audit report and closure of non-conformances to be submitted by the Internal auditor to the Group.</p>
<h4>8.  Records:</h4>
<p>• All the qualifications and trainings of the internal auditors meeting the above requirements to be kept by the Group for submission to the Certification Body during the external audit.</p>
