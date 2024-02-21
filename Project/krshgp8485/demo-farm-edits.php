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
$DemoFarmId = $_GET['id'];
$query_edit = mysqli_query($db, "SELECT * from demo_farm where DemoFarmId = '$DemoFarmId'");
$row_edit = mysqli_fetch_assoc($query_edit);
if (isset($_POST["GAPStandardWise"]) && isset($_POST["Crop"]) && isset($_POST["DocumentsTitle"]) && isset($_POST["VideoTitle"]) && isset($_POST["YoutubeVideoLink"]) && isset($_POST["Remark"]) && isset($_POST["DocumentsSource"]) && isset($_POST["SourceLink"])) {
    $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
    $Crop = mysqli_real_escape_string($db, $_POST["Crop"]);
    $DocumentsTitle = str_replace("'", '', mysqli_real_escape_string($db, $_POST["DocumentsTitle"]));
    $VideoTitle = mysqli_real_escape_string($db, $_POST["VideoTitle"]);
    $YoutubeVideoLink = mysqli_real_escape_string($db, $_POST["YoutubeVideoLink"]);
    $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
    $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
    $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
    $Language = mysqli_real_escape_string($db, $_POST["Language"]);
    for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
            $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
            $documentsf = str_replace(",","","$documents1");
            $documents = str_replace("'","","$documentsf");
            
            if ($_FILES["documents"]["name"][$i] != '') {
                if(strtolower(end(explode(".",$documents))) =="jpg" && strtolower(end(explode(".",$documents))) =="png" && strtolower(end(explode(".",$documents))) =="jpeg") {
                if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../demo-farm/" . $documents)){
                $query1 = mysqli_query($db, "INSERT INTO `demo_farm_documents` (`demo_farm_documents_id`, `DemoFarmId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$DemoFarmId', '$documents', '0', current_timestamp());");
             }}
            }
        }
        
        $Document1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["Document"]["name"];
            $Documentf = str_replace(",","","$Document1");
            $Document = str_replace("'","","$Documentf");
            if ($_FILES["Document"]["name"] != '') {
                if(strtolower(end(explode(".",$Document))) =="pdf") {
                if(move_uploaded_file($_FILES["Document"]["tmp_name"], "../demo-farm/" . $Document)){
                    $querydoc = mysqli_query($db, "UPDATE `demo_farm` SET `Document`='$Document' WHERE `DemoFarmId`='$DemoFarmId'");
             }}
            }
        
        $query = mysqli_query($db, "UPDATE `demo_farm` SET `GAPStandardWise`='$GAPStandardWise', `Crop`='$Crop', `DocumentsTitle`='$DocumentsTitle', `VideoTitle`='$VideoTitle', `YoutubeVideoLink`='$YoutubeVideoLink', `Remark`='$Remark', `DocumentsSource`='$DocumentsSource', `SourceLink`='$SourceLink', `Language`='$Language' WHERE `DemoFarmId`='$DemoFarmId'");
        if ($query) {
            header("Location:demo-farm-edits.php?id=$DemoFarmId&msg=success");
        } else {
            header("Location:demo-farm-edits.php?id=$DemoFarmId&msg=fail");
        }

}


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="vendors/feather/feather.css">
      <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="vendors/select2/select2.min.css">
      <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="css/vertical-layout-light/style.css">
      <!-- endinject -->
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
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:../../partials/_navbar.php -->
         <?php include "header.php"; ?>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.php -->
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.php -->
            <?php include "navbar.php";?>
            <!-- partial -->
            <div class="main-panel">
               <div class="content-wrapper">
                  <div class="row">
                     <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title float-left">Edit Demo Farm</h4>
                              <div class="card-title float-right"><a href="demo-farm-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Demo Farm details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Demo Farm details not edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Demo Farm details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat">
                                    <div class="row">
                                       <div class="col-2">
                                          <div class="form-group">
                                             <label for="">Language</label>
                                             <select name="Language" class="form-control" required="">
                                                <option <?php if($row_edit['Language'] == 'English'){echo "selected";} ?> value="English">English</option>
                                                <option <?php if($row_edit['Language'] == 'Hindi'){echo "selected";} ?> value="Hindi">Hindi</option>
                                                <option <?php if($row_edit['Language'] == 'Kannada'){echo "selected";} ?> value="Kannada">Kannada</option>
                                                <option <?php if($row_edit['Language'] == 'Marathi'){echo "selected";} ?> value="Marathi">Marathi</option>
                                                <option <?php if($row_edit['Language'] == 'Telugu'){echo "selected";} ?> value="Telugu">Telugu</option>
                                                <option  <?php if($row_edit['Language'] == 'Tamil'){echo "selected";} ?> value="Tamil">Tamil</option>
                                                <option <?php if($row_edit['Language'] == 'Malayalam'){echo "selected";} ?> value="Malayalam">Malayalam</option>
                                                <option <?php if($row_edit['Language'] == 'Bengali'){echo "selected";} ?> value="Bengali">Bengali</option>
                                                <option <?php if($row_edit['Language'] == 'Odia'){echo "selected";} ?> value="Odia">Odia</option>
                                                <option <?php if($row_edit['Language'] == 'Gujarati'){echo "selected";} ?> value="Gujarati">Gujarati</option>
                                                <option <?php if($row_edit['Language'] == 'Punjabi'){echo "selected";} ?> value="Punjabi">Punjabi</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-5">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if($row_edit['GAPStandardWise'] == 'IndG.A.P'){echo "selected";} ?> value="IndG.A.P">IndG.A.P</option>
                                                <option <?php if($row_edit['GAPStandardWise'] == 'GLOBALG.A.P'){echo "selected";} ?> value="GLOBALG.A.P">GLOBALG.A.P</option>

                                                <!--<option <?php if($row_edit['GAPStandardWise'] == 'Organic NPOP'){echo "selected";} ?> value="Organic NPOP">Organic NPOP</option>-->
                                                <!--<option <?php if($row_edit['GAPStandardWise'] == 'Organic NOP'){echo "selected";} ?> value="Organic NOP">Organic NOP</option>-->

                                                <!--<option <?php if($row_edit['GAPStandardWise'] == 'Fairtrade International'){echo "selected";} ?> value="Fairtrade International">Fairtrade International</option>-->
                                                <!--<option <?php if($row_edit['GAPStandardWise'] == 'Rainforest Alliance'){echo "selected";} ?> value="Rainforest Alliance">Rainforest Alliance</option>-->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-5">
                                          <div class="form-group">
                                             <label for="">Crop</label>
                                             <select name="Crop" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option <?php if($row_edit['Crop'] == '00'){echo "selected";} ?> value="00">ALL</option>
                                                <?php 
                                                   $query = mysqli_query($db,"select * from crop where DeletedStatus = '0' ORDER BY CropName");
                                                            if($query){
                                                            while($row = mysqli_fetch_array($query)){?>
                                                <option <?php if($row_edit['Crop'] == $row['CropId']){echo "selected";} ?> value="<?php echo $row['CropId']; ?>"><?php echo $row['CropName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Documents Title</label>
                                             <input value="<?php echo $row_edit['DocumentsTitle']; ?>" name="DocumentsTitle" type="text" class="form-control" id="" placeholder="Documents Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label>Upload Document</label>
                                             <input name="Document" type="file" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Video Title</label>
                                             <input value="<?php echo $row_edit['VideoTitle']; ?>" name="VideoTitle" type="text" class="form-control" id="" placeholder="Video Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Enter Youtube Video Link</label>
                                             <input value="<?php echo $row_edit['YoutubeVideoLink']; ?>" name="YoutubeVideoLink" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
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
                                          <label>Remark</label>
                                          <div class="input-group col-xs-12">
                                             <textarea class="form-control" name="Remark"><?php echo $row_edit['Remark'];?></textarea>
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