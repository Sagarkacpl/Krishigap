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
      <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css" />
   </head>
   <style>
      .table th {
      text-transform: none;
      font-size: revert;
      }
      .btn-success {
      color: #fff;
      background-color: #04aa6d;
      border-color: #04aa6d;
      box-shadow: 0 0.125rem 0.25rem 0 rgb(176 218 203);
      }
      td {
      border-bottom: 0.01px solid #ddd !important;
      }
      .table > :not(caption) > * > * {
      padding: 0.15rem 0.25rem;
      }
      td {
      font-size: 8px;
      }
      th.sorting {
      font-size: 8px;
      }
      .btn {
      padding: 0.1375rem 1.25rem;
      }
      .table td, .jsgrid .jsgrid-table td {
      font-size: 10px;
      }
      .form-control, .asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .typeahead, .tt-query, .tt-hint {
      height: 1.875rem;
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
                              <h4 class="card-title float-left">List Package of Practices Tabs</h4>
                              <div class="card-title float-right"><a href="Package-of-practices-edit.php" class="btn btn-primary btn-sm" style="padding: 0.4rem 1rem;">Back</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faild'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package of Practices
                                          Tab not deleted..
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'successd'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package of Practices
                                          Tab successfully deleted.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <div class="table-responsive">
                                 <table id="example" class="table table-striped table-borderless" style="width: 100% !important;">
                                    <thead>
                                       <tr>
                                          <th>Sr.No.</th>
                                          <th>File Name</th>
                                          <th>Documents</th>
                                          <th>Edit/Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $query = mysqli_query($db, "SELECT * from package_of_practices_documents where PackageOfPracticesId='$_GET[id]' AND DeletedStatus='0' ORDER BY package_of_practices_documentsId ASC");
                                           if($query){
                                             $count = 1;
                                           while($row = mysqli_fetch_array($query)){
                                          
                                           ?>
                                       <tr>
                                          <td><?php echo $count; ?></td>
                                          <td>

                                          <?php
                                          $queryf = mysqli_query($db, "SELECT * from package_of_practices_documents_videos where package_of_practices_documentsId='$row[package_of_practices_documentsId]' AND DeletedStatus='0' ORDER BY package_of_practices_documents_video_id ASC");
                                           while($rowf = mysqli_fetch_array($queryf)){
                                           ?>
                                       <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($rowf['VideoName'], strpos($rowf['VideoName'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?><br>

                                       <?php } ?>

                                          </td>
                                          <td><a href="Package-of-practices-videos.php?id=<?php echo $row['package_of_practices_documentsId']; ?>&id1=<?php echo $_GET['id']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a></td>
                                          <td class="font-weight-medium">
                                             <a onclick="return confirm('Are you sure want to edit?')" href="Package-of-practices-documents-edit.php?id=<?php echo $row['package_of_practices_documentsId']; ?>&id1=<?php echo $_GET['id']; ?>" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                                             <a onclick="return confirm('Are you sure want to delete?')" href="Package-of-practices-documents-delete.php?id=<?php echo $row['package_of_practices_documentsId']; ?>&id1=<?php echo $_GET['id']; ?>" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                                          </td>
                                       </tr>
                                       <?php $count = $count+1;}} ?>
                                    </tbody>
                                 </table>
                              </div>
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
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
         $('#example').DataTable({
             scrollX: true,
         });
         });
      </script>
   </body>
</html>