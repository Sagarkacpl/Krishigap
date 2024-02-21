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
                  <h4 class="card-title float-left">Edit Our Team</h4>
                  <div class="card-title float-right"><a href="team-data.php" class="btn btn-primary btn-sm">Back</a></div>
                  <div class="clearfix"></div>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Edit/Delete</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td><img src="images/faces/face1.jpg" width="80px" height="80px"></td>
                          <td class="font-weight-bold">Surya Kumar Yadav</td>
                          <td>Designation Here</td>
                          <td class="font-weight-medium">
                            <a href="#" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                            <a href="#" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>

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
