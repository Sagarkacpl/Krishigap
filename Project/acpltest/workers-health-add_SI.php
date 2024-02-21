<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   set_time_limit(0);
   error_reporting(0);
   if ($_SESSION['Admin_GAP793_Id'] == '') {
       header("Location: index.php");
   }
   include "connection.php";
   if (isset($_POST["StandardCategory"]) AND isset($_POST["GAPStandardWise"])) {
       $query2 = mysqli_query($db, "INSERT INTO `workers_health_safety_welfare_main_si` (`workers_health_safety_welfare_main_id`, `StandardCategory`, `GAPStandardWise`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$_POST[StandardCategory]', '$_POST[GAPStandardWise]', '0', current_timestamp());");
       $workers_health_safety_welfare_main_id = $db->insert_id;
       if ($query2) {
           foreach ($_POST["others"] as $key => $other) {
               $Title = mysqli_real_escape_string($db, $other["Title"]);
               $TrainingModulesTitle = mysqli_real_escape_string($db, $other["TrainingModulesTitle"]);
               $TrainingModulesLink = mysqli_real_escape_string($db, $other["TrainingModulesLink"]);
               $Remark = mysqli_real_escape_string($db, $other["Remark"]);
               $DocumentsSource = mysqli_real_escape_string($db, $other["DocumentsSource"]);
               $SourceLink = mysqli_real_escape_string($db, $other["SourceLink"]);
               $query2 = mysqli_query($db, "INSERT INTO `workers_health_safety_welfare_si` (`WorkersHealthSafetyWelfareId`, `workers_health_safety_welfare_main_id`, `Title`, `Remark`, `DocumentsSource`, `SourceLink`, `TrainingModulesTitle`, `TrainingModulesLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$workers_health_safety_welfare_main_id', '$Title', '$Remark', '$DocumentsSource', '$SourceLink', '$TrainingModulesTitle', '$TrainingModulesLink', '0', current_timestamp());");
               $WorkersHealthSafetyWelfareId = $db->insert_id;
               if (!empty($YoutubeVideoLinks = $other['YoutubeVideoLink'])) {
                   foreach ($YoutubeVideoLinks as $YoutubeVideoLink) {
                       $query3 = mysqli_query($db, "INSERT INTO `workers_health_safety_welfare_youtube_si` (`workers_health_safety_welfare_youtube_id`, `WorkersHealthSafetyWelfareId`, `YoutubeTitleLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$WorkersHealthSafetyWelfareId', '$YoutubeVideoLink', '0', current_timestamp());");
                   }
               }
               for ($i = 0;$i < count($_FILES["documents"]["name"][$key]);$i++) {
                   $documents11 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$key][$i];
                   $documents = str_replace(",", "", "$documents11");
                   if ($_FILES["documents"]["name"][$key][$i] != '') {
                       if(strtolower(end(explode(".",$documents))) =="pdf") {
                       if (move_uploaded_file($_FILES["documents"]["tmp_name"][$key][$i], "../Workers-Health_SI/" . $documents)) {
                           $query1 = mysqli_query($db, "INSERT INTO `workers_health_safety_welfare_documents_si` (`workers_health_safety_welfare_documents_id`, `WorkersHealthSafetyWelfareId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$WorkersHealthSafetyWelfareId', '$documents', '0', current_timestamp());");
                       }}
                   }
               }
               for ($i = 0;$i < count($_FILES["documents1"]["name"][$key]);$i++) {
                   $documents12 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents1"]["name"][$key][$i];
                   $documents1 = str_replace(",", "", "$documents12");
                   if ($_FILES["documents1"]["name"][$key][$i] != '') {
                       if(strtolower(end(explode(".",$documents1))) =="pdf") {
                       if (move_uploaded_file($_FILES["documents1"]["tmp_name"][$key][$i], "../Workers-Health-Images_SI/" . $documents1)) {
                           $query1 = mysqli_query($db, "INSERT INTO `workers_health_safety_welfare_images_si` (`workers_health_safety_welfare_images_id`, `WorkersHealthSafetyWelfareId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$WorkersHealthSafetyWelfareId', '$documents1', '0', current_timestamp());");
                       }}
                   }
               }
           }
           header("Location:workers-health-add_SI.php?msg=success");
       } else {
           header("Location:workers-health-add_SI.php?msg=fail");
       }
   }
   ?>
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
         select.form-control {
         outline: 1px solid #999;
         color: #999;
         }
         .form-control {
         border: 1px solid #999;
         }
      </style>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
      <script type="text/javascript">
         jQuery(function($){
           $('html').on('click', '.file_input', function(){
             var elementId = $(this).attr('id');
             $('#'+elementId).multifile();
           });
         });
      </script>
      <script type="text/javascript">
         jQuery(function($){
           $('html').on('click', '.file_inputa', function(){
             var elementId = $(this).attr('id');
             $('#'+elementId).multifile();
           });
         });
      </script>
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
                              <h4 class="card-title float-left" style="margin-top: 7px;">Add Workers Health, Safety & Welfare (Sustainable Initiatives)</h4>
                              <div class="card-title float-right">        
                                 <a href="workers-health-edit_SI.php" class="btn btn-primary btn-sm">View List</a>
                              </div>
                              <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'faile') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Workers Health, Safety & Welfare
                                          details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Workers Health, Safety & Welfare
                                          details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Workers Health, Safety & Welfare
                                          details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'relfail') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">Related Document not saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'relsuccess') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Related Document successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat" style="padding-top: 10px;">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Standard Category</label>
                                             <select name="StandardCategory" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="Sustainable Initiatives">Sustainable Initiatives</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="ISO 14001 Environment">ISO 14001- Environment</option>
                                                <option value="ISO 50001 Energy Management">ISO 50001- Energy Management</option>
                                                <option value="ISO 45001 OH & S Mgt">ISO 45001 OH & S Mgt</option>
                                                <option value="SA 8000 Social Accounting">SA 8000 Social Accounting</option>
                                                <option value="Rainforest Alliance">Rainforest Alliance</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="expert-repeat mainbox1">
                                    <a href="javascript:void(0)" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow1()">
                                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                                    Add More
                                    </a>
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Tab Title</label>
                                             <input name="others[1][Title]" type="text" class="form-control" id="" placeholder="Enter Name">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Remark</label>
                                             <textarea name="others[1][Remark]" class="form-control" id="" placeholder="Remark"></textarea>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Documents Source</label>
                                             <textarea name="others[1][DocumentsSource]" class="form-control" id="" placeholder="Documents Source"></textarea>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Source Link</label>
                                             <textarea name="others[1][SourceLink]" class="form-control" id="" placeholder="Source Link"></textarea>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Title</label>
                                             <input name="others[1][TrainingModulesTitle]" type="text" class="form-control" id="" placeholder="Training Modules Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Link</label>
                                             <input name="others[1][TrainingModulesLink]" type="text" class="form-control" id="" placeholder="Training Modules link">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input class="file_input" id="file_input1" type="file" name="documents[1][]" style="display: block;
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
                                                   transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Images </label>
                                             <div class="input-group col-xs-12">
                                                <input class="file_inputa" id="file_inputs1" type="file" name="documents1[1][]" style="display: block;
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
                                                   transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-11">
                                          <div class="form-group">
                                             <label for="">Enter Youtube Video Link</label>
                                             <input name="others[1][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
                                          </div>
                                       </div>
                                       <div class="col-1">
                                          <div class="form-group">
                                             <a href="javascript:void(0)" style="top: 30px;border-radius: inherit;" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow(1)">
                                             <i class="ti-plus btn-icon-prepend"></i> 
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="youtubeurlmore1"></div>
                                 </div>
                                 <div id="content1"></div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
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
      <script>
         function addRow (num) {
           document.querySelector('#youtubeurlmore' + num).insertAdjacentHTML(
           'afterbegin',
           `<div class="row">
         <div class="col-12">
         <div class="form-group">
         <a href="javascript:void(0)" style="top: 0px;border-radius: inherit;" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow(this)">
         <i class="ti-minus btn-icon-prepend"></i> 
         </a><input style="width: 99%;" name="others[`+ num +`][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
         </div>
         </div>
         </div>`      
         )
         }
         function removeRow (input) {
         input.parentNode.remove()
         }
         function addRow1 () {
           var count = 1;
           count = count + $('.expert-repeat').length;
         document.querySelector('#content1').insertAdjacentHTML(
         'afterbegin',
         `<div class="expert-repeat mainbox`+count+`" id="content1">
         <a href="javascript:void(0)" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow1(this)">
         <i class="ti-minus btn-icon-prepend"></i>                                                    
         Remove
         </a>
         <div class="row">
         <div class="col-12">
         <div class="form-group">
            <label for="">Tab Title</label>
            <input name="others[`+ count +`][Title]" type="text" class="form-control" id="" placeholder="Enter Name">
         </div>
         </div>
         <div class="col-12">
         <div class="form-group">
            <label for="">Remark</label>
            <textarea name="others[`+ count +`][Remark]" class="form-control" id="" placeholder="Remark"></textarea>
         </div>
         </div>
         <div class="col-12">
         <div class="form-group">
            <label for="">Documents Source</label>
            <textarea name="others[`+ count +`][DocumentsSource]" class="form-control" id="" placeholder="Documents Source"></textarea>
         </div>
         </div>
         <div class="col-12">
         <div class="form-group">
            <label for="">Source Link</label>
            <textarea name="others[`+ count +`][SourceLink]" class="form-control" id="" placeholder="Source Link"></textarea>
         </div>
         </div>
         <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Title</label>
                                             <input name="others[`+ count +`][TrainingModulesTitle]" type="text" class="form-control" id="" placeholder="Training Modules Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Link</label>
                                             <input name="others[`+ count +`][TrainingModulesLink]" type="text" class="form-control" id="" placeholder="Training Modules link">
                                          </div>
                                       </div>
         <div class="col-12">
         <div class="form-group">
            <label>Upload Documents </label>
            <div class="input-group col-xs-12">
               <input class="file_input" id="file_input`+ count +`" type="file" name="documents[`+ count +`][]" style="display: block;
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
                  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
            </div>
         </div>
         </div>
         <div class="col-12">
         <div class="form-group">
            <label>Upload Documents </label>
            <div class="input-group col-xs-12">
               <input class="file_inputa" id="file_inputs`+ count +`" type="file" name="documents1[`+ count +`][]" style="display: block;
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
                  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
            </div>
         </div>
         </div>
         <div class="col-11">
         <div class="form-group">
            <label for="">Enter Youtube Video Link</label>
            <input name="others[`+ count +`][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
         </div>
         </div>
         <div class="col-1">
         <div class="form-group">
            <a href="javascript:void(0)" style="top: 30px;border-radius: inherit;" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow(`+count+`)">
            <i class="ti-plus btn-icon-prepend"></i> 
            </a>
         </div>
         </div>
         </div>
         <div id="youtubeurlmore`+ count +`"></div>
         </div>`      
         )
         }
         function removeRow1 (input) {
         input.parentNode.remove()
         }
      </script>
   </body>
</html>