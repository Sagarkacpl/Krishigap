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
   if (isset($_POST["others"])) {
       foreach ($_POST["others"] as $key => $other) {
             $Title = mysqli_real_escape_string($db, $other["Title"]);
             $Description = mysqli_real_escape_string($db, $other["Description"]);
             $TrainingModulesTitle = mysqli_real_escape_string($db, $other["TrainingModulesTitle"]);
             $TrainingModulesLink = mysqli_real_escape_string($db, $other["TrainingModulesLink"]);
             $Remark = mysqli_real_escape_string($db, $other["Remark"]);
             $DocumentsSource = mysqli_real_escape_string($db, $other["DocumentsSource"]);
             $SourceLink = mysqli_real_escape_string($db, $other["SourceLink"]);
             $State = mysqli_real_escape_string($db, $other["State"]);
             $query2 = mysqli_query($db, "INSERT INTO `others` (`OthersId`, `Title`, `Description`, `TrainingModulesTitle`, `TrainingModulesLink`, `Remark`, `DocumentsSource`, `SourceLink`, `State`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$Title', '$Description', '$TrainingModulesTitle', '$TrainingModulesLink', '$Remark', '$DocumentsSource', '$SourceLink', '$State', '0', current_timestamp());");
             $OthersId = $db->insert_id;
               if (!empty($YoutubeVideoLinks = $other['YoutubeVideoLink'])) {
                   foreach ($YoutubeVideoLinks as $YoutubeVideoLink) {
                       $query3 = mysqli_query($db, "INSERT INTO `others_youtube` (`others_youtube_id`, `OthersId`, `YoutubeTitleLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '$YoutubeVideoLink', '0', current_timestamp());");
                   }
               }
               for ($i = 0;$i < count($_FILES["documents"]["name"][$key]);$i++) {
                   $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$key][$i];
                   $documents = str_replace(",","","$documents1");
                   if ($_FILES["documents"]["name"][$key][$i] != '') {
                       if(strtolower(end(explode(".",$documents))) =="pdf") {
                       if(move_uploaded_file($_FILES["documents"]["tmp_name"][$key][$i], "../Others/" . $documents)){
                       $query1 = mysqli_query($db, "INSERT INTO `others_documents` (`others_documents_id`, `OthersId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '$documents', '0', current_timestamp());");
                     }}
                   }
               }    
       for ($k = 0;$k < count($_FILES["documents1"]["name"][$key]);$k++) {
                   $videos1 = time() . "-" . rand(1000, 9999) . "-VID-" . $_FILES["documents1"]["name"][$key][$k];
                   $videos = str_replace(",","","$videos1");
                   if ($_FILES["documents1"]["name"][$key][$k] != '') {
                       if(strtolower(end(explode(".",$videos))) =="mp4") {
                       if(move_uploaded_file($_FILES["documents1"]["tmp_name"][$key][$k], "../OthersVideos/" . $videos)){
                       $query12 = mysqli_query($db, "INSERT INTO `others_videos` (`others_video_id`, `OthersId`, `VideoFile`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '$videos', '0', current_timestamp());");
                     }}
                   }
               }        
       }
       header("Location:other-add.php?msg=success");
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
            <?php include "navbar.php";?>
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title float-left">Others</h4>
                              <div class="card-title float-right"><a href="other-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details already exist.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'fail'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details not saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'success'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat mainbox1">
                                    <a href="javascript:void(0)" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow1()">
                                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                                    Add More
                                    </a>
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Tab Title</label>
                                             <input name="others[1][Title]" type="text" class="form-control" id="" placeholder="Enter Name" required="">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Description</label>
                                             <textarea name="others[1][Description]" class="form-control" id="" placeholder="Description"></textarea>
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
                                             <label>Remark</label>
                                             <div class="input-group col-xs-12">
                                                <textarea class="form-control" name="others[1][Remark]"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Documents Source</label>
                                             <div class="input-group col-xs-12">
                                                <input name="others[1][DocumentsSource]" type="text" class="form-control" id="" placeholder="Documents Source">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Source Link</label>
                                             <div class="input-group col-xs-12">
                                                <input name="others[1][SourceLink]" type="text" class="form-control" id="" placeholder="Source Link">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>State</label>
                                             <div class="input-group col-xs-12">
                                                <select name="others[1][State]" class="form-control" style="color: #282f3a;">
                                                   <option value="0">State not selected</option>
                                                   <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                   <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                   <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                   <option value="Assam">Assam</option>
                                                   <option value="Bihar">Bihar</option>
                                                   <option value="Chandigarh">Chandigarh</option>
                                                   <option value="Chhattisgarh">Chhattisgarh</option>
                                                   <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                   <option value="Daman and Diu">Daman and Diu</option>
                                                   <option value="Delhi">Delhi</option>
                                                   <option value="Lakshadweep">Lakshadweep</option>
                                                   <option value="Puducherry">Puducherry</option>
                                                   <option value="Goa">Goa</option>
                                                   <option value="Gujarat">Gujarat</option>
                                                   <option value="Haryana">Haryana</option>
                                                   <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                   <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                   <option value="Jharkhand">Jharkhand</option>
                                                   <option value="Karnataka">Karnataka</option>
                                                   <option value="Kerala">Kerala</option>
                                                   <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                   <option value="Maharashtra">Maharashtra</option>
                                                   <option value="Manipur">Manipur</option>
                                                   <option value="Meghalaya">Meghalaya</option>
                                                   <option value="Mizoram">Mizoram</option>
                                                   <option value="Nagaland">Nagaland</option>
                                                   <option value="Odisha">Odisha</option>
                                                   <option value="Punjab">Punjab</option>
                                                   <option value="Rajasthan">Rajasthan</option>
                                                   <option value="Sikkim">Sikkim</option>
                                                   <option value="Tamil Nadu">Tamil Nadu</option>
                                                   <option value="Telangana">Telangana</option>
                                                   <option value="Tripura">Tripura</option>
                                                   <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                   <option value="Uttarakhand">Uttarakhand</option>
                                                   <option value="West Bengal">West Bengal</option>
                                                </select>
                                             </div>
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
                                             <label>Upload Videos </label>
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
                                    <button type="reset" class="btn btn-light">Cancel</button>
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
            <input name="others[`+ count +`][Title]" type="text" class="form-control" id="" placeholder="Enter Name" required="">
         </div>
         </div>
         <div class="col-12">
         <div class="form-group">
            <label for="">Description</label>
            <textarea name="others[`+ count +`][Description]" class="form-control" id="" placeholder="Description"></textarea>
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
                                          <label>Remark</label>
                                          <div class="input-group col-xs-12">
                                             <textarea class="form-control" name="others[`+ count +`][Remark]"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Documents Source</label>
                                          <div class="input-group col-xs-12">
                                             <input name="others[`+ count +`][DocumentsSource]" type="text" class="form-control" id="" placeholder="Documents Source">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Source Link</label>
                                          <div class="input-group col-xs-12">
                                             <input name="others[`+ count +`][SourceLink]" type="text" class="form-control" id="" placeholder="Source Link">
                                          </div>
                                       </div>
                                    </div>
         
         <div class="col-12">
                                       <div class="form-group">
                                          <label>State</label>
                                          <div class="input-group col-xs-12">
         <select name="others[`+ count +`][State]" class="form-control" style="color: #282f3a;">
         <option value="0">State not selected</option>
         <option value="Andhra Pradesh">Andhra Pradesh</option>
         <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
         <option value="Arunachal Pradesh">Arunachal Pradesh</option>
         <option value="Assam">Assam</option>
         <option value="Bihar">Bihar</option>
         <option value="Chandigarh">Chandigarh</option>
         <option value="Chhattisgarh">Chhattisgarh</option>
         <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
         <option value="Daman and Diu">Daman and Diu</option>
         <option value="Delhi">Delhi</option>
         <option value="Lakshadweep">Lakshadweep</option>
         <option value="Puducherry">Puducherry</option>
         <option value="Goa">Goa</option>
         <option value="Gujarat">Gujarat</option>
         <option value="Haryana">Haryana</option>
         <option value="Himachal Pradesh">Himachal Pradesh</option>
         <option value="Jammu and Kashmir">Jammu and Kashmir</option>
         <option value="Jharkhand">Jharkhand</option>
         <option value="Karnataka">Karnataka</option>
         <option value="Kerala">Kerala</option>
         <option value="Madhya Pradesh">Madhya Pradesh</option>
         <option value="Maharashtra">Maharashtra</option>
         <option value="Manipur">Manipur</option>
         <option value="Meghalaya">Meghalaya</option>
         <option value="Mizoram">Mizoram</option>
         <option value="Nagaland">Nagaland</option>
         <option value="Odisha">Odisha</option>
         <option value="Punjab">Punjab</option>
         <option value="Rajasthan">Rajasthan</option>
         <option value="Sikkim">Sikkim</option>
         <option value="Tamil Nadu">Tamil Nadu</option>
         <option value="Telangana">Telangana</option>
         <option value="Tripura">Tripura</option>
         <option value="Uttar Pradesh">Uttar Pradesh</option>
         <option value="Uttarakhand">Uttarakhand</option>
         <option value="West Bengal">West Bengal</option>
         </select>
                                          </div>
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
            <label>Upload Videos </label>
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