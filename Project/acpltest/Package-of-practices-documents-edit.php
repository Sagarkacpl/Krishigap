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
   $package_of_practices_documentsId = $_GET['id'];
   $id1 = $_GET['id1'];
   $query_edit = mysqli_query($db, "SELECT * from package_of_practices_documents where package_of_practices_documentsId = '$package_of_practices_documentsId'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["DocumentLink"]) AND isset($_POST["DocumentTitle"])) {
                   $DocumentTitle = mysqli_real_escape_string($db, $_POST["DocumentTitle"]);
                   $DocumentLink = mysqli_real_escape_string($db, $_POST["DocumentLink"]);
                   $StartMonth = mysqli_real_escape_string($db, $_POST["StartMonth"]);
                   $EndMonth = mysqli_real_escape_string($db, $_POST["EndMonth"]);
                   $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
                   $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
                     $query2 = mysqli_query($db, "UPDATE `package_of_practices_documents` SET `DocumentTitle`='$_POST[DocumentTitle]', `DocumentLink`='$_POST[DocumentLink]', `StartMonth`='$_POST[StartMonth]', `EndMonth`='$_POST[EndMonth]', `Remark`='$_POST[Remark]', `DocumentsSource`='$_POST[DocumentsSource]' WHERE `package_of_practices_documentsId`='$package_of_practices_documentsId'");
                     if ($query2) {
                     for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
                       $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
                       $documents = str_replace(",","","$documents1");
                       if ($_FILES["documents"]["name"][$i] != '') {
                           if(strtolower(end(explode(".",$documents))) =="pdf") {
                           if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Package-Of-Practices/" . $documents)){
                           $query1 = mysqli_query($db, "INSERT INTO `package_of_practices_documents_videos` (`package_of_practices_documents_video_id`, `package_of_practices_documentsId`, `VideoName`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$package_of_practices_documentsId', '$documents', '0', current_timestamp());");
                        }}
                            }
                                }
                        header("Location:Package-of-practices-documents-edit.php?id=$package_of_practices_documentsId&id1=$id1&msg=success");
   
                     }else{
                        header("Location:Package-of-practices-documents-edit.php?id=$package_of_practices_documentsId&id1=$id1&msg=fail");
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
      <script type="text/javascript">
         jQuery(function($){
           $('html').on('click', '.file_input', function(){
             var elementId = $(this).attr('id');
             $('#'+elementId).multifile();
           });
         });
      </script>
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
                              <h4 class="card-title float-left">Edit Package Of Practices Document</h4>
                              <div class="card-title float-right"><a href="Package-of-practices-documents.php?id=<?php echo $id1; ?>" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package Of Practices Document details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package Of Practices Document details not edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package Of Practices Document details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat mainbox1">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Title</label>
                                             <input value="<?php echo $row_edit['DocumentTitle']; ?>" name="DocumentTitle" type="text" class="form-control" id="" placeholder="Enter Document Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Link</label>
                                             <input value="<?php echo $row_edit['DocumentLink']; ?>" name="DocumentLink" type="text" class="form-control" id="" placeholder="Enter Document Link">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label>Start Month</label>
                                             <input value="<?php echo $row_edit['StartMonth']; ?>" name="StartMonth" type="month" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label>End Month</label>
                                             <input value="<?php echo $row_edit['EndMonth']; ?>" name="EndMonth" type="month" class="form-control">
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
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input class="file_input" id="file_input1" type="file" name="documents[]" style="display: block;
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
                                    </div>
                                 </div>
                                 <div id="content1"></div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:../../partials/_footer.php -->
               <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                     <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Good Agricultural Practices All rights reserved. </span>
                     <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by <a href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
                  </div>
               </footer>
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <script src="vendors/select2/select2.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/settings.js"></script>
      <script src="js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="js/file-upload.js"></script>
      <script src="js/typeahead.js"></script>
      <script src="js/select2.js"></script>
      <!-- End custom js for this page-->
      <script type="text/javascript">
         $(document).ready(function(){
             $('#country').on('change',function(){
                 var countryID = $(this).val();
                 if(countryID){
                     $.ajax({
                         type:'POST',
                         url:'ajaxFile.php',
                         data:'country_id='+countryID,
                         success:function(html){
                             $('#state').html(html); 
                         }
                     }); 
                 }
             });  
         });
      </script>   
   </body>
</html>