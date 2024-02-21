<?php 
session_start(); 
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
if ($_SESSION['Admin_GAP793_Id'] == ''){header("Location: index.php");}  
include "connection.php";
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
                  <h4 class="card-title float-left">Our Team Data</h4>
                  <div class="card-title float-right"><a href="team-data-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                  <div class="clearfix"></div>
                  <form class="forms-sample">


                  <div class="expert-repeat">
                    <a href="#" class="btn btn-success btn-icon-text add-more-expert">
                      <i class="ti-plus btn-icon-prepend"></i>                                                    
                      Add More
                    </a>


                    <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label>Expert Photo (500px * 500px)</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label for="">Expert Name</label>
                          <input type="text" class="form-control" id="" placeholder="Enter Name">
                        </div>
                        </div>

                        <div class="col-4">
                          <div class="form-group">
                            <label for="">Designation</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Designation">
                          </div>
                          </div>

                          <div class="col-4">
                            <div class="form-group">
                              <label for="">Facebook Link</label>
                              <input type="text" class="form-control" id="" placeholder="Enter Facebook Link">
                            </div>
                            </div>

                            <div class="col-4">
                              <div class="form-group">
                                <label for="">Twitter Link</label>
                                <input type="text" class="form-control" id="" placeholder="Enter Twitter Link">
                              </div>
                              </div>

                              <div class="col-4">
                                <div class="form-group">
                                  <label for="">Instagram Link</label>
                                  <input type="text" class="form-control" id="" placeholder="Enter Instagram Link">
                                </div>
                                </div>

                              </div>
                            </div>

                      <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
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
</body>

</html>
