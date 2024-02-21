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
   $FoodSafetyStandardsId = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * from food_safety_standards_si where FoodSafetyStandardsId  = '$FoodSafetyStandardsId'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["StandardCategory"]) && isset($_POST["GAPStandardWise"]) && isset($_POST["User"]) && isset($_POST["Documents"]) && isset($_POST["SourceLink"])) {
       $StandardCategory = mysqli_real_escape_string($db, $_POST["StandardCategory"]);
       $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
       $User = mysqli_real_escape_string($db, $_POST["User"]);
       $Documents = mysqli_real_escape_string($db, $_POST["Documents"]);
       $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
       $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
       $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
       $query = mysqli_query($db, "UPDATE `food_safety_standards_si` SET `StandardCategory`='$StandardCategory', `GAPStandardWise`='$GAPStandardWise', `Documents`='$Documents', `User`='$User', `Remark`='$Remark', `DocumentsSource`='$DocumentsSource', `SourceLink`='$SourceLink' WHERE `FoodSafetyStandardsId`='$FoodSafetyStandardsId'");
       if ($query) {
           for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
               $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
               $documents = str_replace(",", "", "$documents1");
               if ($_FILES["documents"]["name"][$i] != '') {
                   if(strtolower(end(explode(".",$documents))) =="pdf") {
                   if (move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Food-Safety-Standards_SI/" . $documents)) {
                       $query1 = mysqli_query($db, "INSERT INTO `food_safety_standards_documents_si` (`food_safety_standards_documents_id`, `FoodSafetyStandardsId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FoodSafetyStandardsId', '$documents', '0', current_timestamp());");
                   }}
               }
           }
           header("Location:Food-Safety-Standards-edits_SI.php?id=$FoodSafetyStandardsId&msg=success");
       } else {
           header("Location:Food-Safety-Standards-edits_SI.php?id=$FoodSafetyStandardsId&msg=fail");
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
         select.form-control {
         outline: 1px solid #999;
         color: #999;
         }
         .form-control {
         border: 1px solid #999;
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
                              <h4 class="card-title float-left">Edit Standards (Sustainable Initiatives)</h4>
                              <div class="card-title float-right"><a href="Food-Safety-Standards-add-edit_SI.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if ($msg == 'faile') { ?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standards details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standards details not edited..
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standards details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php
                                 } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat">
                                    <div class="row">
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 14001- Environment') {
                                                   echo "selected";
                                                   } ?> value="ISO 14001- Environment">ISO 14001- Environment</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 50001- Energy Management') {  echo "selected"; } ?> value="ISO 50001- Energy Management">ISO 50001- Energy Management</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'ISO 45001 OH&S Mgt Systems') {  echo "selected"; } ?> value="ISO 45001 OH&S Mgt Systems">ISO 45001 OH&S Mgt Systems</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'SA 8000- Social Accountability') {  echo "selected"; } ?> value="SA 8000- Social Accountability">SA 8000- Social Accountability</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Rainforest Alliance') {
                                                   echo "selected";
                                                   } ?> value="Rainforest Alliance">Rainforest Alliance</option>
                                                <option <?php if ($row_edit['GAPStandardWise'] == 'Fair Trade Certified') {
                                                   echo "selected";
                                                   } ?> value="Fair Trade Certified">Fair Trade Certified</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Standard Category</label>
                                             <select name="StandardCategory" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if ($row_edit['StandardCategory'] == 'Sustainable Initiatives') {
                                                   echo "selected";
                                                   } ?> value="Sustainable Initiatives">Sustainable Initiatives</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <label for="">User</label>
                                          <div class="form-group row">
                                             <div class="col-sm-12">
                                                <div class="form-check">
                                                   <label class="form-check-label">
                                                   <input <?php if ($row_edit['User'] == 'Farmer Producer Group/Exporter/Processor') {
                                                      echo "checked";
                                                      } ?> type="radio" class="form-check-input" name="User" id="" value="Farmer Producer Group/Exporter/Processor" required="">
                                                   Farmer Producer Group/Exporter/Processor
                                                   <i class="input-helper"></i></label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Documents</label>
                                             <select name="Documents" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if ($row_edit['Documents'] == 'Standard') {
                                                   echo "selected";
                                                   } ?> value="Standard">Standard</option>
                                                <option <?php if ($row_edit['Documents'] == 'Quality Manual') {
                                                   echo "selected";
                                                   } ?> value="Quality Manual">Quality Manual</option>
                                                <option <?php if ($row_edit['Documents'] == 'Procedures') {
                                                   echo "selected";
                                                   } ?> value="Procedures">Procedures</option>
                                                <option <?php if ($row_edit['Documents'] == 'Work Instructions') {
                                                   echo "selected";
                                                   } ?> value="Work Instructions">Work Instructions</option>
                                                <option <?php if ($row_edit['Documents'] == 'Records') {
                                                   echo "selected";
                                                   } ?> value="Records">Records</option>
                                                <option <?php if ($row_edit['Documents'] == 'Others') {
                                                   echo "selected";
                                                   } ?> value="Others">Others</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input id="file_input" type="file" name="documents[]" class="mup">
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
                                    </div>
                                 </div>
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
   </body>
</html>