<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['Admin_GAP793_Id'] == '') {
       header("Location: index.php");
   }
   include "connection.php";
   $RelatedDocumentId = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * from related_documents where RelatedDocumentId  = '$RelatedDocumentId' AND DeletedStatus = '0'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["PageName"]) && isset($_POST["GAPStandardWise"]) && isset($_POST["DocumentsSource"]) && isset($_POST["SourceLink"])) {
       $PageName = mysqli_real_escape_string($db, $_POST["PageName"]);
       $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
       $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
       $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
       $query = mysqli_query($db, "UPDATE `related_documents` SET `PageName`='$PageName', `GAPStandardWise`='$GAPStandardWise', `DocumentsSource`='$DocumentsSource', `SourceLink`='$SourceLink' WHERE `RelatedDocumentId`='$RelatedDocumentId' AND DeletedStatus = '0'");
       for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
           $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
           $documents = str_replace(",", "", "$documents1");
           if ($_FILES["documents"]["name"][$i] != '') {
               if(strtolower(end(explode(".",$documents))) =="pdf") {
               if (move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../RelatedDocuments/" . $documents)) {
                   $query1 = mysqli_query($db, "INSERT INTO `related_document_files` (`related_document_file_id`, `RelatedDocumentId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$RelatedDocumentId', '$documents', '0', current_timestamp());");
               }}
           }
       }
       if ($query) {
           header("Location:Related-Documents-edit.php?id=$RelatedDocumentId&msg=success");
       } else {
           header("Location:Related-Documents-edit.php?id=$RelatedDocumentId&msg=fail");
       }
   } ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin</title>
      <link rel="stylesheet" href="vendors/feather/feather.css">
      <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="vendors/select2/select2.min.css">
      <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
      <link rel="stylesheet" href="css/vertical-layout-light/style.css">
      <link rel="shortcut icon" href="images/favicon.png" />
      <style type="text/css">
         .multifile_remove_input {
         color: red;
         text-decoration: none;
         font-size: 20px;
         font-weight: 600;
         }
         p {
         margin-bottom: 0px;
         margin-top: 5px;
         }
         .content-wrapper {
         padding: .3rem .3rem;
         }
         .card {
         border-radius: 0px;
         }
         .card .card-body {
         padding: 0.5rem 0.5rem;
         }
         .card .card-title {
         margin-bottom: 0.7rem;
         }
         .form-control {
         border: 1px solid #999;
         }
         select.form-control {
         outline: 1px solid #999;
         color: #999;
         }
         .mup
         {
         display: block;
         width: 100%;
         height: 2.875rem;
         padding: 0.875rem 1.375rem;
         font-size: 0.875rem;
         font-weight: 400;
         line-height: 1;
         color: #495057;
         background-color: #ffffff;
         background-clip: padding-box;
         border: 1px solid #ced4da;
         border-radius: 2px;
         transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
         }
      </style>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
   </head>
   <body>
      <div class="container-scroller">
      <?php include "header.php"; ?>
         <div class="container-fluid page-body-wrapper">
            <?php include "navbar.php"; ?>
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title float-left" style="margin-top: 7px;">Edit Related Documents</h4>
                              <div class="card-title float-right">        
                                 <a href="Related-Documents-list.php" class="btn btn-primary btn-sm">View List</a>
                              </div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'faile') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Related Document details already exist.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'fail') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Related Document details not updated.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'success') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Related Document details successfully updated.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat" style="padding-top: 10px;padding-bottom: 10px;">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Page Name</label>
                                             <select name="PageName" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if ($row_edit['PageName'] == 'Food Safety Standards') {
                                                   echo "selected";
                                                   } ?> value="Food Safety Standards">Food Safety Standards</option>
                                                <option <?php if ($row_edit['PageName'] == 'Food Safety Standards PHP') {
                                                   echo "selected";
                                                   } ?> value="Food Safety Standards PHP">Food Safety Standards (Post Harvest Processing)</option>
                                                <option <?php if ($row_edit['PageName'] == 'Standards SI') {
                                                   echo "selected";
                                                   } ?> value="Standards SI">Standards (Sustainable Initiatives)</option>
                                                <option <?php if ($row_edit['PageName'] == 'Farmer Hand Book') {
                                                   echo "selected";
                                                   } ?> value="Farmer Hand Book">Farmer Hand Book</option>
                                                <option <?php if ($row_edit['PageName'] == 'Demo Farm') {
                                                   echo "selected";
                                                   } ?> value="Demo Farm">Demo Farm</option>
                                                <option <?php if ($row_edit['PageName'] == 'Internal Inspection') {
                                                   echo "selected";
                                                   } ?> value="Internal Inspection">Internal Inspection</option>
                                                <option <?php if ($row_edit['PageName'] == 'Internal Audit') {
                                                   echo "selected";
                                                   } ?> value="Internal Audit">Internal Audit</option>
                                                <option <?php if ($row_edit['PageName'] == 'Internal Audit PHP') {
                                                   echo "selected";
                                                   } ?> value="Internal Audit PHP">Internal Audit (Post Harvest Processing)</option>
                                                   <option <?php if ($row_edit['PageName'] == 'Internal Audit SI') {
                                                   echo "selected";
                                                   } ?> value="Internal Audit SI">Internal Audit (Sustainable Initiatives)</option>
                                                <option <?php if ($row_edit['PageName'] == 'Plant Protection Products') {
                                                   echo "selected";
                                                   } ?> value="Plant Protection Products">Plant Protection Products</option>
                                                <option <?php if ($row_edit['PageName'] == 'Crops Standards') {
                                                   echo "selected";
                                                   } ?> value="Crops Standards">Crops Standards</option>
                                                <option <?php if ($row_edit['PageName'] == 'Package of Practices') {
                                                   echo "selected";
                                                   } ?> value="Package of Practices">Package of Practices</option>
                                                <option <?php if ($row_edit['PageName'] == 'Harvesting') {
                                                   echo "selected";
                                                   } ?> value="Harvesting">Harvesting</option>
                                                <option <?php if ($row_edit['PageName'] == 'Workers Health Safety') {
                                                   echo "selected";
                                                   } ?> value="Workers Health Safety">Workers Health Safety</option>
                                                <option <?php if ($row_edit['PageName'] == 'Workers Health Safety PHP') {
                                                   echo "selected";
                                                   } ?> value="Workers Health Safety PHP">Workers Health Safety (Post Harvest Processing)</option>

                                                <option <?php if ($row_edit['PageName'] == 'Workers Health Safety SI') {
                                                   echo "selected";
                                                   } ?> value="Workers Health Safety SI">Workers Health Safety (Sustainable Initiatives)</option>

                                                   <option <?php if ($row_edit['PageName'] == 'Skills Development SI') {
                                                   echo "selected";
                                                   } ?> value="Skills Development SI">Skills Development (Sustainable Initiatives)</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'IndG.A.P') {
                                                   echo "selected";
                                                   } ?> value="IndG.A.P">IndG.A.P</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'GLOBALG.A.P') {
                                                   echo "selected";
                                                   } ?> value="GLOBALG.A.P">GLOBALG.A.P</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Organic NPOP') {
                                                   echo "selected";
                                                   } ?> value="Organic NPOP">Organic NPOP</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Organic NOP') {
                                                   echo "selected";
                                                   } ?> value="Organic NOP">Organic NOP</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Fairtrade International') {
                                                   echo "selected";
                                                   } ?> value="Fairtrade International">Fairtrade International</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Rainforest Alliance') {
                                                   echo "selected";
                                                   } ?> value="Rainforest Alliance">Rainforest Alliance</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 22000') {
                                                   echo "selected";
                                                   } ?> value="ISO 22000">ISO 22000</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'FSSC 22000') {
                                                   echo "selected";
                                                   } ?> value="FSSC 22000">FSSC 22000</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'BRCGS') {
                                                   echo "selected";
                                                   } ?> value="BRCGS">BRCGS</option>

                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 14001- Environment') {
                                                   echo "selected";
                                                   } ?> value="ISO 14001- Environment">ISO 14001- Environment</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 50001- Energy Management') {
                                                   echo "selected";
                                                   } ?> value="ISO 50001- Energy Management">ISO 50001- Energy Management</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Rainforest Alliance') {
                                                   echo "selected";
                                                   } ?> value="Rainforest Alliance">Rainforest Alliance</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Fair Trade Certified') {
                                                   echo "selected";
                                                   } ?> value="Fair Trade Certified">Fair Trade Certified</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Related Documents</label>
                                             <div class="input-group col-xs-12">
                                                <input id="file_input" type="file" name="documents[]" class="mup" multiple="">
                                             </div>
                                          </div>
                                          <script type="text/javascript">
                                             jQuery(function($)
                                             {
                                               $('#file_input').multifile();
                                             });
                                          </script>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Related Documents Source</label>
                                             <div class="input-group col-xs-12">
                                                <input value="<?php echo $row_edit['DocumentsSource']; ?>" name="DocumentsSource" type="text" class="form-control" id="" placeholder="Documents Source">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Related Source Link</label>
                                             <div class="input-group col-xs-12">
                                                <input value="<?php echo $row_edit['SourceLink']; ?>" name="SourceLink" type="text" class="form-control" id="" placeholder="Source Link">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                     <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Good Agricultural Practices All rights reserved. </span>
                     <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by <a href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
                  </div>
               </footer>
            </div>
         </div>
      </div>
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <script src="vendors/select2/select2.min.js"></script>
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/settings.js"></script>
      <script src="js/todolist.js"></script>
      <script src="js/file-upload.js"></script>
      <script src="js/typeahead.js"></script>
      <script src="js/select2.js"></script>
   </body>
</html>