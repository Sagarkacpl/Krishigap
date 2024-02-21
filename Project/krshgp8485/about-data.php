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
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!---<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.php">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.php">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.php">Typography</a></li>
              </ul>
            </div>
          </li>--->
          
          <li class="nav-item">
            <a class="nav-link" href="Food-Safety-Standards-add.php">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Food Safety Standards</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="farmer-hand-book.php">
              <i class="icon-bell menu-icon"></i>
              <span class="menu-title">Farmer Hand Book</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="demo-farm-add.php">
              <i class="icon-check menu-icon"></i>
              <span class="menu-title">Demo Farm</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="internal-inspection-add.php">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Internal Inspection</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Internal Audit</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="plant-protection-add.php">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Plant Protection Products </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Package-of-practices.php">
              <i class="icon-drop menu-icon"></i>
              <span class="menu-title">Package of Practices</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-flag menu-icon"></i>
              <span class="menu-title">Harvesting</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="other-add.php">
              <i class="icon-help menu-icon"></i>
              <span class="menu-title">Others</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="workers-health-add.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Workers Health, Safety</span>
            </a>
          </li>
 <li class="nav-item">
            <a class="nav-link" href="news.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">News</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add About Page Data</h4>

                  <form class="forms-sample">


                    <div class="row">


                    <div class="col-12">
                    <div class="form-group">
                      <label>Image upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>

                    

                  <div class="col-12">
                    <div class="form-group">
                      <label for="">About Data </label>
                      <textarea class="form-control" id="" placeholder="Enter About Data"></textarea>
                    </div>
                    </div>

                  </div>

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
