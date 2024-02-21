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
   $Id = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * from mainpage_others where Id = '$Id' AND DeletedStatus='0'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["Scheme"]) && isset($_POST["SchemeCategory"]) && isset($_POST["Documents"])) {
       $Scheme = $_POST["Scheme"];
       $SchemeCategory = $_POST['SchemeCategory'];
       $Documents = $_POST['Documents'];
       $users = $_POST['users'];
       $Remark = $_POST['Remark'];
       $DocumentsSource = $_POST['DocumentsSource'];
       $SourceLink = $_POST['SourceLink'];
       $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["document"]["name"];
       $file = str_replace(",", "", "$documents1");
       if ($_FILES["document"]["name"] != '') {
           if(strtolower(end(explode(".",$file))) =="pdf") {
           if (move_uploaded_file($_FILES["document"]["tmp_name"], "../MainPage_Others/" . $file)) {
               $query1 = mysqli_query($db, "UPDATE `mainpage_others` SET `DocumentUpload`='$file' WHERE `Id`='$Id' AND `DeletedStatus`='0'");
           }}
                }
               $query = mysqli_query($db, "UPDATE `mainpage_others` SET `Scheme`='$Scheme', `Scheme_Category`='$SchemeCategory', `Documents`='$Documents', `Users`='$users', `Remark`='$Remark', `Documents_Source`='$DocumentsSource', `Source_Link`='$SourceLink' WHERE `Id`='$Id' AND `DeletedStatus`='0'");
               if ($query) {
                   header("Location:main_other-edit.php?id=$Id&msg=success");
               } else {
                   header("Location:main_other-edit.php?id=$Id&msg=fail");
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
         .mup {
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
         <?php include "navbar.php"; ?>
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <div class="col-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title float-left" style="margin-top: 7px;">Edit Other
                           </h4>
                           <div class="card-title float-right">
                              <a href="main_others.php" class="btn btn-primary btn-sm">View List</a>
                           </div>
                           <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                           <?php
                              if ($_GET['msg'] == 'fail') { ?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div class="alert alert-dismissible alert-danger">
                                       <button class="close" type="button"
                                          data-dismiss="alert">×</button>Others details not updated.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } 
                              if ($_GET['msg'] == 'success') { ?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div class="alert alert-dismissible alert-success">
                                       <button class="close" type="button"
                                          data-dismiss="alert">×</button>Others details successfully updated.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php
                              } ?>
                           <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                              <div class="expert-repeat" style="padding-top: 10px;">
                                 <div class="row">
                                    <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Scheme</label>
                                          <select name="Scheme" class="form-control" required="">
                                             <option value="">Please Select</option>
                                             <option <?php if($row_edit['Scheme'] == 'Packhouses for Horticulture Produce'){echo "selected";} ?> value="Packhouses for Horticulture Produce">
                                                Packhouses for Horticulture Produce
                                             </option>
                                             <option <?php if($row_edit['Scheme'] == 'Cold Storages for Horticulture Produce'){echo "selected";} ?> value="Cold Storages for Horticulture Produce">Cold
                                                Storages for Horticulture Produce
                                             </option>
                                             <option <?php if($row_edit['Scheme'] == 'Food Testing Laboratories'){echo "selected";} ?> value="Food Testing Laboratories">Food Testing
                                                Laboratories
                                             </option>
                                             <option <?php if($row_edit['Scheme'] == 'Dry Warehouses'){echo "selected";} ?> value="Dry Warehouses">Dry Warehouses</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Scheme Category</label>
                                          <select name="SchemeCategory" class="form-control" required="">
                                             <option value="">Please Select</option>
                                             <option <?php if($row_edit['Scheme_Category'] == 'Agri Value Chain'){echo "selected";} ?> value="Agri Value Chain">Agri Value Chain
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="form-group">
                                          <label for="">Documents</label>
                                          <input value="<?php echo $row_edit['Documents'];?>" type="text" name="Documents" class="form-control" name="" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="">User</label>
                                       <div class="form-group row">
                                          <div class="col-sm-12">
                                             <div class="form-check">
                                                <label class="form-check-label">
                                                <input <?php if($row_edit['Users'] == 'Farmer Producer Group/Food Processor/Exporter'){echo "checked";} ?> type="radio" class="form-check-input" name="users" id="" value="Farmer Producer Group/Food Processor/Exporter" required="">
                                                Farmer Producer Group/Food Processor/Exporter
                                                <i class="input-helper"></i></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Upload Documents </label>
                                          <div class="input-group col-xs-12">
                                             <input id="file_input" type="file" name="document"
                                                class="mup">
                                          </div>
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
                                          <label>Documents Source</label>
                                          <div class="input-group col-xs-12">
                                             <input name="DocumentsSource" type="text"
                                                class="form-control" placeholder="Documents Source" value="<?php echo $row_edit['Documents_Source'];?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Source Link</label>
                                          <div class="input-group col-xs-12">
                                             <input name="SourceLink" type="text" class="form-control"
                                                id="" placeholder="Source Link" value="<?php echo $row_edit['Source_Link'];?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" name="submit"
                                       class="btn btn-primary mr-2">Update</button>
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
                     <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                     Good Agricultural Practices All rights reserved. </span>
                     <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by
                     <a href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
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