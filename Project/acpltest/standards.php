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
$query11 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
if (isset($_POST["OtherDocuments"]) && isset($_POST["GAPStandardWise"]) && isset($_POST["Crop"]) && isset($_POST["Remark"]) && isset($_POST["DocumentsSource"])) {
    $OtherDocuments = mysqli_real_escape_string($db, $_POST["OtherDocuments"]);
    $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
    $Crop = mysqli_real_escape_string($db, $_POST["Crop"]);
    $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
    $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
        $query = mysqli_query($db, "INSERT INTO `standards` (`standards_id`, `GAPStandardWise`, `OtherDocuments`, `Crop`, `Remark`, `DocumentsSource`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$GAPStandardWise', '$OtherDocuments', '$Crop', '$Remark', '$DocumentsSource', '0', current_timestamp());");
        $standards_id = $db->insert_id;
        for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
            $documents = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
            if ($_FILES["documents"]["name"][$i] != '') {
                if(strtolower(end(explode(".",$documents))) =="pdf") {
                if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Standards/" . $documents)){
                $query1 = mysqli_query($db, "INSERT INTO `standards_documents` (`standards_documents_id`, `standards_id`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$standards_id', '$documents', '0', current_timestamp());");
             }}
            }
        }
        for ($j = 0;$j < count($_POST["YoutubeVideoLink"]);$j++) {
            $YoutubeVideoLink = $_POST["YoutubeVideoLink"][$j];
            if ($_POST["YoutubeVideoLink"][$j] != '') {
                $query1 = mysqli_query($db, "INSERT INTO `standards_youtube_links` (`standards_youtube_link_id`, `standards_id`, `YoutubeVideoLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$standards_id', '$YoutubeVideoLink', '0', current_timestamp());");
            }
        }
        if ($query) {
            header("Location:standards.php?msg=success");
        } else {
            header("Location:standards.php?msg=fail");
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
                              <h4 class="card-title float-left">Standards</h4>
                              <div class="card-title float-right"><a href="standards-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standard details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standard details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Standard details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat" style="padding-top: 10px;">
                                    <div class="row">
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">GAP Standard Wise</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                 <option value="IndG.A.P">IndG.A.P</option>
                                             <option value="GLOBALG.A.P">GLOBALG.A.P</option>
                                             <option value="Fairtrade International">Fairtrade International</option>
                                             <option value="Rainforest Alliance">Rainforest Alliance</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Documents</label>
                                          <select name="OtherDocuments" class="form-control" required="">
                                             <option value="">Please Select</option>
                                             <option value="Quality Manual">Quality Manual</option>
                                             <option value="Procedures">Procedures</option>
                                             <option value="Work Instructions">Work Instructions</option>
                                             <option value="Records">Records</option>
                                             <option value="Videos">Videos</option>
                                          </select>
                                       </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Crop</label>
                                             <select name="Crop" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="00">ALL</option>
                                                <?php 
                                                   if($query11){
                                                   while($row11 = mysqli_fetch_array($query11)){?>
                                                <option value="<?php echo $row11['CropId']; ?>"><?php echo $row11['CropName']; ?></option>
                                                <?php }} ?>
                                             </select>
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
         function addRow () {
         document.querySelector('#content').insertAdjacentHTML(
         'afterbegin',
         `<div class="row">
   <div class="col-12">
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