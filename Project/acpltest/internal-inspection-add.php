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
if (isset($_POST["GAPStandardWise"]) && isset($_POST["Crop"]) && isset($_POST["DocumentsTitle"]) && isset($_POST["VideoTitle"]) && isset($_POST["YoutubeVideoLink"]) && isset($_POST["TrainingModulesTitle"]) && isset($_POST["TrainingModulesLink"]) && isset($_POST["Remark"]) && isset($_POST["DocumentsSource"]) && isset($_POST["SourceLink"])) {
    $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
    $Crop = mysqli_real_escape_string($db, $_POST["Crop"]); 
    $DocumentsTitle = mysqli_real_escape_string($db, $_POST["DocumentsTitle"]);
    $VideoTitle = mysqli_real_escape_string($db, $_POST["VideoTitle"]); 
    $YoutubeVideoLink = mysqli_real_escape_string($db, $_POST["YoutubeVideoLink"]); 
    $TrainingModulesTitle = mysqli_real_escape_string($db, $_POST["TrainingModulesTitle"]); 
    $TrainingModulesLink = mysqli_real_escape_string($db, $_POST["TrainingModulesLink"]); 
    $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
    $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
    $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
    $Language = mysqli_real_escape_string($db, $_POST["Language"]);

        $query = mysqli_query($db, "INSERT INTO `internal_inspection` (`InternalInspectionID`, `GAPStandardWise`, `Crop`, `DocumentsTitle`, `Document`, `VideoTitle`, `YoutubeVideoLink`, `TrainingModulesTitle`, `TrainingModulesLink`, `sort`, `Remark`, `DocumentsSource`, `SourceLink`, `Language`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$GAPStandardWise', '$Crop', '$DocumentsTitle', '', '$VideoTitle', '$YoutubeVideoLink', '$TrainingModulesTitle', '$TrainingModulesLink', '0', '$Remark', '$DocumentsSource', '$SourceLink', '$Language', '0', current_timestamp());");
        $InternalInspectionID = $db->insert_id;
        $Document1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["Document"]["name"];
            $Document = str_replace(",","","$Document1");
            if ($_FILES["Document"]["name"] != '') {
                if(strtolower(end(explode(".",$Document))) =="pdf") {
                if(move_uploaded_file($_FILES["Document"]["tmp_name"], "../Internal_inspection/" . $Document)){
                    $querydoc = mysqli_query($db, "UPDATE `internal_inspection` SET `Document`='$Document' WHERE `InternalInspectionID`='$InternalInspectionID'");
             }}
            }
        if ($query) {
            header("Location:internal-inspection-add.php?msg=success");
        } else {
            header("Location:internal-inspection-add.php?msg=fail");
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
      </style>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
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
                           <h4 class="card-title float-left" style="margin-top: 7px;">Add Internal Inspection</h4>
                           <div class="card-title float-right">        
                              <a href="internal-inspection-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                           <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Inspection details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Inspection details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Inspection details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                              $msg = $_GET['msg'];
                              if($msg == 'relfail'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div class="alert alert-dismissible alert-danger">Related Document not saved.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <?php
                              $msg = $_GET['msg'];
                              if($msg == 'relsuccess'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div class="alert alert-dismissible alert-success">
                                       <button class="close" type="button" data-dismiss="alert">×</button>Related Document successfully saved.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat" style="padding-top: 10px;">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Language</label>
                                             <select name="Language" class="form-control" required="">
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                             <option value="">Please Select</option>
                                                <option value="IndG.A.P">IndG.A.P</option>
                                                <option value="GLOBALG.A.P">GLOBALG.A.P</option>
                                                <option value="Organic NPOP">Organic NPOP</option>
                                                <option value="Organic NOP">Organic NOP</option>
                                                <!--<option value="Fairtrade International">Fairtrade International</option>-->
                                                <!--<option value="Rainforest Alliance">Rainforest Alliance</option>-->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Crop</label>
                                             <select name="Crop" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="00">ALL</option>
                                                <?php 
                                                   $query = mysqli_query($db,"select * from crop where DeletedStatus = '0' ORDER BY CropName");
                                                            if($query){
                                                            while($row = mysqli_fetch_array($query)){?>
                                                <option value="<?php echo $row['CropId']; ?>"><?php echo $row['CropName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Documents Title</label>
                                             <input name="DocumentsTitle" type="text" class="form-control" id="" placeholder="Documents Title">
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
                                             <input name="VideoTitle" type="text" class="form-control" id="" placeholder="Video Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Enter Youtube Video Link</label>
                                             <input name="YoutubeVideoLink" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Title</label>
                                             <input name="TrainingModulesTitle" type="text" class="form-control" id="" placeholder="Training Modules Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Link</label>
                                             <input name="TrainingModulesLink" type="text" class="form-control" id="" placeholder="Training Modules link">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                       <div class="form-group">
                                          <label>Remark</label>
                                          <div class="input-group col-xs-12">
                                             <textarea class="form-control" name="Remark"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Documents Source</label>
                                          <div class="input-group col-xs-12">
                                             <input name="DocumentsSource" type="text" class="form-control" id="" placeholder="Documents Source">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Source Link</label>
                                          <div class="input-group col-xs-12">
                                             <input name="SourceLink" type="text" class="form-control" id="" placeholder="Source Link">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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
   </body>
</html>