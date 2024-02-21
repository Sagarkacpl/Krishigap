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
   $id=$_GET['id'];
   $edit = "SELECT * FROM `training_module_short_story` WHERE Id='$id'";
   $edit_exe = mysqli_query($db,$edit);
   $fetch = mysqli_fetch_assoc($edit_exe);
   if(isset($_POST['save']))
   {
       $story = $_POST['story'];

       $insert = "UPDATE `training_module_short_story` SET ShortStory='$story' WHERE Id='$id'";
       $execute = mysqli_query($db,$insert);
       if($execute == TRUE)
       {
            echo "<script>alert('Successfully Update')</script>";
            echo "<script>window.location.href='short-story.php'</script>";
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
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
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
   </head>
   <body>
      <div class="container-scroller">
      <?php include "header.php"; ?>
      <div class="container-fluid page-body-wrapper">
         <?php include "module_training_navbar.php"; ?>
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title float-left" style="margin-top: 7px;">Short Story</h4>
                           <div class="card-title float-right">        
                              <a href="short-story.php" class="btn btn-primary btn-sm">View List</a>
                           </div>
                           <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                           <form class="forms-sample" method="POST">
                              <div class="expert-repeat" style="padding-top: 10px;">
                                 <div class="row">
                                    <!-- <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Standard</label>
                                          <select name="GAPStandardWise" class="form-control" required="">
                                             <option value="">Please Select</option>
                                             <option value="ISO 22000">ISO 22000</option>
                                             <option value="FSSC 22000">FSSC 22000</option>
                                             <option value="BRC Global">BRC Global</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Standard Category</label>
                                          <select name="StandardCategory" class="form-control" required="">
                                             <option value="">Please Select</option>
                                             <option value="Post Harvest Processing">Post Harvest Processing</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="">User</label>
                                       <div class="form-group row">
                                          <div class="col-sm-12">
                                             <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="User" id="" value="Farmer Producer Group/Exporter/Processor" required="">
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
                                             <option value="Standard">Standard</option>
                                             <option value="Quality Manual">Quality Manual</option>
                                             <option value="Procedures">Procedures</option>
                                             <option value="Work Instructions">Work Instructions</option>
                                             <option value="Records">Records</option>
                                             <option value="Others">Others</option>
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
                                    </div> -->
                                    <div class="form-group col-12">
                                        <label for="exampleTextarea1">Short Story</label>
                                        <textarea class="form-control" id="editor1" rows="4" name="story"><?php echo $fetch['ShortStory']; ?></textarea>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2" name="save">Update</button>
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
      <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
      <script>
        CKEDITOR.replace( 'editor1' );
      </script>
   </body>
</html>