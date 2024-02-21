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
$InternalAuditID = $_GET['id'];
$query_edit = mysqli_query($db, "SELECT * from internal_audit_si where InternalAuditID  = '$InternalAuditID'");
$row_edit = mysqli_fetch_assoc($query_edit);
if (isset($_POST["GAPStandardWise"]) && isset($_POST["DocumentsTitle"]) && isset($_POST["DocumentsLink"]) && isset($_POST["VideoTitle"]) && isset($_POST["YoutubeVideoLink"]) && isset($_POST["TrainingModulesTitle"]) && isset($_POST["TrainingModulesLink"]) && isset($_POST["Remark"]) && isset($_FILES["DocumentsUpload"]) && isset($_POST["DocumentsSource"]) && isset($_POST["SourceLink"])) {
   $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
    $DocumentsTitle = mysqli_real_escape_string($db, $_POST["DocumentsTitle"]); 
    $DocumentsLink = mysqli_real_escape_string($db, $_POST["DocumentsLink"]); 
    $VideoTitle = mysqli_real_escape_string($db, $_POST["VideoTitle"]); 
    $YoutubeVideoLink = mysqli_real_escape_string($db, $_POST["YoutubeVideoLink"]); 
    $TrainingModulesTitle = mysqli_real_escape_string($db, $_POST["TrainingModulesTitle"]); 
    $TrainingModulesLink = mysqli_real_escape_string($db, $_POST["TrainingModulesLink"]); 
    $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
    $DocumentsUpload = $_FILES['DocumentsUpload']['name'];
    $DocumentsUpload_tmp = $_FILES['DocumentsUpload']['tmp_name'];
    move_uploaded_file($DocumentsUpload_tmp, "../Internal_audit_SI/".$DocumentsUpload);
    $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
    $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
    if($DocumentsUpload=="")
    {
        $ExistsDoc=$row_edit['Document_Upload'];
    }
    else{
        $ExistsDoc=$DocumentsUpload;
    }
        $query = mysqli_query($db, "UPDATE `internal_audit_si` SET `GAPStandardWise`='$GAPStandardWise', `DocumentsTitle`='$DocumentsTitle', `DocumentsLink`='$DocumentsLink', `VideoTitle`='$VideoTitle', `YoutubeVideoLink`='$YoutubeVideoLink', `TrainingModulesTitle`='$TrainingModulesTitle', `TrainingModulesLink`='$TrainingModulesLink', `Remark`='$Remark', `DocumentsSource`='$DocumentsSource', `SourceLink`='$SourceLink',Document_Upload='$ExistsDoc' WHERE `InternalAuditID`='$InternalAuditID'");
        if ($query) {
            header("Location:internal-audit-edits_SI.php?id=$InternalAuditID&msg=success");
        } else {
            header("Location:internal-audit-edits_SI.php?id=$InternalAuditID&msg=fail");
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
                              <h4 class="card-title float-left">Edit Internal Audit (Sustainable Initiatives)</h4>
                              <div class="card-title float-right"><a href="internal-audit-edit_SI.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Audit details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Audit details not edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Internal Audit details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">GAP Standard Wise</label>
                                             <select name="GAPStandardWise" class="form-control">
                                               
                                                <option value="">Please Select</option>
                                                <option <?php if($row_edit['GAPStandardWise'] == 'ISO 14001 Environment'){echo "selected";} ?> value="ISO 14001 Environment">ISO 14001 Environment</option>
                                                <option <?php if($row_edit['GAPStandardWise'] == 'ISO 45001 OH & S Mgt'){echo "selected";} ?> value="ISO 45001 OH & S Mgt">ISO 45001 OH & S Mgt</option>
                                                <option <?php if($row_edit['GAPStandardWise'] == 'Rainforest Alliance'){echo "selected";} ?> value="Rainforest Alliance">Rainforest Alliance</option>
                                               
                                    
                                                <option <?php if ($_GET['gsw'] == 'ISO 50001 Energy Management') { echo "selected"; } ?> value="ISO 50001 Energy Management">ISO 50001 Energy Management</option>
                                                <option <?php if ($_GET['gsw'] == 'SA 8000 Social Accounting') { echo "selected"; } ?> value="SA 8000 Social Accounting">SA 8000 Social Accounting</option>
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
                                             <label>Documents Link</label>
                                             <input value="<?php echo $row_edit['DocumentsLink']; ?>" name="DocumentsLink" type="text" class="form-control" id="" placeholder="Documents Link">
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
                                             <textarea class="form-control" name="Remark"><?php echo $row_edit['Remark'];?></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Documents Upload</label>
                                          <div class="input-group col-xs-12">
                                             <input name="DocumentsUpload" type="file" class="form-control" id="" placeholder="Documents Source">
                                          </div>
                                          <a href="../Internal_audit_SI/<?php echo $row_edit['Document_Upload']; ?>" target="_blank"><img src="../img/pdf.png" class='mt-2' alt="" width='30'></a>
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