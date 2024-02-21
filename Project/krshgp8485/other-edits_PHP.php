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
   $OthersId = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * from others_php where OthersId  = '$OthersId'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["Title"]) && isset($_POST["Description"])) {
       $Title = mysqli_real_escape_string($db, $_POST["Title"]);
       $Description = mysqli_real_escape_string($db, $_POST["Description"]);
       $TrainingModulesTitle = mysqli_real_escape_string($db, $_POST["TrainingModulesTitle"]);
       $TrainingModulesLink = mysqli_real_escape_string($db, $_POST["TrainingModulesLink"]);
       $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
       $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
       $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
    $State = mysqli_real_escape_string($db, $_POST["State"]);
       for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
           $documents1 = time() . "-" . rand(1000, 9999) . "-" . $_FILES["documents"]["name"][$i];
           $documents = str_replace(",","","$documents1");
           if ($_FILES["documents"]["name"][$i] != '') {
               if(strtolower(end(explode(".",$documents))) =="pdf") {
               if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Others_PHP/" . $documents)){
               $query1 = mysqli_query($db, "INSERT INTO `others_documents_php` (`others_documents_id`, `OthersId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '$documents', '0', current_timestamp());");
             }}
           }
       }  
        for ($k = 0;$k < count($_FILES["videos"]["name"]);$k++) {
           $videos1 = time() . "-" . rand(1000, 9999) . "-" . $_FILES["videos"]["name"][$k];
           $videos = str_replace(",","","$videos1");
           if ($_FILES["videos"]["name"][$k] != '') {
               if(strtolower(end(explode(".",$videos))) =="mp4") {
               if(move_uploaded_file($_FILES["videos"]["tmp_name"][$k], "../OthersVideos_PHP/" . $videos)){
               $query1 = mysqli_query($db, "INSERT INTO `others_videos_php` (`others_video_id`, `OthersId`, `VideoFile`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '$videos', '0', CURRENT_TIMESTAMP);");
             }}
           }
       }
       for ($j = 0;$j < count($_POST["YoutubeVideoLink"]);$j++) {
           $YoutubeVideoLink = $_POST["YoutubeVideoLink"][$j];
           if ($_POST["YoutubeVideoLink"][$j] != '') {
               $query1 = mysqli_query($db, "INSERT INTO `others_youtube_php` (`others_youtube_id`, `OthersId`, `YoutubeTitle`, `YoutubeTitleLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$OthersId', '', '$YoutubeVideoLink', '0', current_timestamp());");
           }
       }
           $query = mysqli_query($db, "UPDATE `others_php` SET `Title`='$Title', `Description`='$Description', `TrainingModulesTitle`='$TrainingModulesTitle', `TrainingModulesLink`='$TrainingModulesLink', `Remark`='$Remark', `DocumentsSource`='$DocumentsSource', `SourceLink`='$SourceLink', `State`='$State' WHERE `OthersId`='$OthersId'");
           if ($query) {
               header("Location:other-edits_PHP.php?id=$OthersId&msg=success");
           } else {
               header("Location:other-edits_PHP.php?id=$OthersId&msg=fail");
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
      </style>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
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
                              <h4 class="card-title float-left">Edit Others (Post Harvest Processing)</h4>
                              <div class="card-title float-right"><a href="other-edit_PHP.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details not edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Others details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Tab Title</label>
                                             <input value="<?php echo $row_edit['Title']; ?>" name="Title" type="text" class="form-control" id="" placeholder="Enter Name" required="">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Description</label>
                                             <textarea name="Description" class="form-control" id="" placeholder="Description"><?php echo $row_edit['Description']; ?></textarea>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Title</label>
                                             <input value="<?php echo $row_edit['TrainingModulesTitle']; ?>" name="TrainingModulesTitle" type="text" class="form-control" id="" placeholder="Training Modules Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Link</label>
                                             <input value="<?php echo $row_edit['TrainingModulesLink']; ?>" name="TrainingModulesLink" type="text" class="form-control" id="" placeholder="Training Modules link">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Remark</label>
                                             <div class="input-group col-xs-12">
                                                <textarea class="form-control" name="Remark"><?php echo $row_edit['Remark']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Documents Source</label>
                                             <div class="input-group col-xs-12">
                                                <input value="<?php echo $row_edit['DocumentsSource']; ?>" name="DocumentsSource" type="text" class="form-control" id="" placeholder="Documents Source">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Source Link</label>
                                             <div class="input-group col-xs-12">
                                                <input value="<?php echo $row_edit['SourceLink']; ?>" name="SourceLink" type="text" class="form-control" id="" placeholder="Source Link">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>State</label>
                                             <div class="input-group col-xs-12">
                                                <select name="State" class="form-control" style="color: #282f3a;">
                                                   <option <?php if($row_edit['State'] == '0'){echo "selected";} ?> value="0">State not selected</option>
                                                   <option <?php if($row_edit['State'] == 'Andhra Pradesh'){echo "selected";} ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                                   <option <?php if($row_edit['State'] == 'Andaman and Nicobar Islands'){echo "selected";} ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                   <option <?php if($row_edit['State'] == 'Arunachal Pradesh'){echo "selected";} ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                   <option <?php if($row_edit['State'] == 'Assam'){echo "selected";} ?> value="Assam">Assam</option>
                                                   <option <?php if($row_edit['State'] == 'Bihar'){echo "selected";} ?> value="Bihar">Bihar</option>
                                                   <option <?php if($row_edit['State'] == 'Chandigarh'){echo "selected";} ?> value="Chandigarh">Chandigarh</option>
                                                   <option <?php if($row_edit['State'] == 'Chhattisgarh'){echo "selected";} ?> value="Chhattisgarh">Chhattisgarh</option>
                                                   <option <?php if($row_edit['State'] == 'Dadar and Nagar Haveli'){echo "selected";} ?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                   <option <?php if($row_edit['State'] == 'Daman and Diu'){echo "selected";} ?> value="Daman and Diu">Daman and Diu</option>
                                                   <option <?php if($row_edit['State'] == 'Delhi'){echo "selected";} ?> value="Delhi">Delhi</option>
                                                   <option <?php if($row_edit['State'] == 'Lakshadweep'){echo "selected";} ?> value="Lakshadweep">Lakshadweep</option>
                                                   <option <?php if($row_edit['State'] == 'Puducherry'){echo "selected";} ?> value="Puducherry">Puducherry</option>
                                                   <option <?php if($row_edit['State'] == 'Goa'){echo "selected";} ?> value="Goa">Goa</option>
                                                   <option <?php if($row_edit['State'] == 'Gujarat'){echo "selected";} ?> value="Gujarat">Gujarat</option>
                                                   <option <?php if($row_edit['State'] == 'Haryana'){echo "selected";} ?> value="Haryana">Haryana</option>
                                                   <option <?php if($row_edit['State'] == 'Himachal Pradesh'){echo "selected";} ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                                   <option <?php if($row_edit['State'] == 'Jammu and Kashmir'){echo "selected";} ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                   <option <?php if($row_edit['State'] == 'Jharkhand'){echo "selected";} ?> value="Jharkhand">Jharkhand</option>
                                                   <option <?php if($row_edit['State'] == 'Karnataka'){echo "selected";} ?> value="Karnataka">Karnataka</option>
                                                   <option <?php if($row_edit['State'] == 'Kerala'){echo "selected";} ?> value="Kerala">Kerala</option>
                                                   <option <?php if($row_edit['State'] == 'Madhya Pradesh'){echo "selected";} ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                                   <option <?php if($row_edit['State'] == 'Maharashtra'){echo "selected";} ?> value="Maharashtra">Maharashtra</option>
                                                   <option <?php if($row_edit['State'] == 'Manipur'){echo "selected";} ?> value="Manipur">Manipur</option>
                                                   <option <?php if($row_edit['State'] == 'Meghalaya'){echo "selected";} ?> value="Meghalaya">Meghalaya</option>
                                                   <option <?php if($row_edit['State'] == 'Mizoram'){echo "selected";} ?> value="Mizoram">Mizoram</option>
                                                   <option <?php if($row_edit['State'] == 'Nagaland'){echo "selected";} ?> value="Nagaland">Nagaland</option>
                                                   <option <?php if($row_edit['State'] == 'Odisha'){echo "selected";} ?> value="Odisha">Odisha</option>
                                                   <option <?php if($row_edit['State'] == 'Punjab'){echo "selected";} ?> value="Punjab">Punjab</option>
                                                   <option <?php if($row_edit['State'] == 'Rajasthan'){echo "selected";} ?> value="Rajasthan">Rajasthan</option>
                                                   <option <?php if($row_edit['State'] == 'Sikkim'){echo "selected";} ?> value="Sikkim">Sikkim</option>
                                                   <option <?php if($row_edit['State'] == 'Tamil Nadu'){echo "selected";} ?> value="Tamil Nadu">Tamil Nadu</option>
                                                   <option <?php if($row_edit['State'] == 'Telangana'){echo "selected";} ?> value="Telangana">Telangana</option>
                                                   <option <?php if($row_edit['State'] == 'Tripura'){echo "selected";} ?> value="Tripura">Tripura</option>
                                                   <option <?php if($row_edit['State'] == 'Uttar Pradesh'){echo "selected";} ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                                   <option <?php if($row_edit['State'] == 'Uttarakhand'){echo "selected";} ?> value="Uttarakhand">Uttarakhand</option>
                                                   <option <?php if($row_edit['State'] == 'West Bengal'){echo "selected";} ?> value="West Bengal">West Bengal</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input id="file_input" type="file" name="documents[]" style="display: block;
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
                                          <script type="text/javascript">
                                             jQuery(function($)
                                             {
                                               $('#file_input').multifile();
                                             });
                                          </script>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Videos </label>
                                             <div class="input-group col-xs-12">
                                                <input id="file_inputs" type="file" name="videos[]" style="display: block;
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
                                          <script type="text/javascript">
                                             jQuery(function($)
                                             {
                                               $('#file_inputs').multifile();
                                             });
                                          </script>
                                       </div>
                                       <div class="col-11">
                                          <div class="form-group">
                                             <label for="">Enter Youtube Video Link</label>
                                             <input name="YoutubeVideoLink[]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
                                          </div>
                                       </div>
                                       <div class="col-1">
                                          <div class="form-group">
                                             <a href="javascript:void(0)" style="top: 30px;border-radius: inherit;" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow()">
                                             <i class="ti-plus btn-icon-prepend"></i> 
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="content"></div>
                                 </div>
                                 <div id="content"></div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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
         function addRow () {
         document.querySelector('#content').insertAdjacentHTML(
         'afterbegin',
         `<div class="row"><div class="col-12">
                                         <div class="form-group">
                                           <a href="javascript:void(0)" style="top: 0px;border-radius: inherit;" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow(this)">
                                     <i class="ti-minus btn-icon-prepend"></i> 
                                   </a><input style="width: 99%;" name="YoutubeVideoLink[]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
                                         </div>
                                         </div>  
                                      </div>`      
         )
         }
         function removeRow (input) {
         input.parentNode.remove()
         }
      </script>
   </body>
</html>