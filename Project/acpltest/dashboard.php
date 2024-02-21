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
$query_news = mysqli_query($db, "SELECT * from news where DeletedStatus = '0'");
$count_news = mysqli_num_rows($query_news);
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
   <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
   <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
   <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
   <link rel="stylesheet" href="css/vertical-layout-light/style.css">
   <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
   <div class="container-scroller">
      <?php include "header.php"; ?>
      <div class="container-fluid page-body-wrapper">
         <?php include "navbar.php"; ?>
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <div class="col-md-12 grid-margin">
                     <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                           <h3 class="font-weight-bold">Welcome Back</h3>
                           <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="card tale-bg">
                        <div class="card-people mt-auto">
                           <img src="images/dashboard/people.jpg" alt="people">
                           <div class="weather-info">
                              <div class="d-flex">
                                 <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>43<sup>C</sup></h2>
                                 </div>
                                 <div class="ml-2">
                                    <h4 class="location font-weight-normal">Delhi</h4>
                                    <h6 class="font-weight-normal">India</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 grid-margin transparent">
                     <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                           <div class="card card-tale">
                              <div class="card-body">
                                 <p class="mb-4">Today’s Subscription</p>
                                 <p class="fs-30 mb-2">4006</p>
                                 <p>(30 days)</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                           <div class="card card-dark-blue">
                              <div class="card-body">
                                 <p class="mb-4">Total Active User</p>
                                 <p class="fs-30 mb-2">61344</p>
                                 <p>(30 days)</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                           <div class="card card-light-blue">
                              <div class="card-body">
                                 <p class="mb-4">News</p>
                                 <p class="fs-30 mb-2">
                                    <?php echo $count_news; ?>
                                 </p>
                                 <p>(30 days)</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                           <div class="card card-light-danger">
                              <div class="card-body">
                                 <p class="mb-4">Number of Clients</p>
                                 <p class="fs-30 mb-2">47033</p>
                                 <p>(30 days)</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer">
               <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Good
                     Agricultural Practices All rights reserved. </span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by <a
                        href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
               </div>
            </footer>
         </div>
      </div>
   </div>
   <script src="vendors/js/vendor.bundle.base.js"></script>
   <script src="vendors/chart.js/Chart.min.js"></script>
   <script src="vendors/datatables.net/jquery.dataTables.js"></script>
   <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
   <script src="js/dataTables.select.min.js"></script>
   <script src="js/off-canvas.js"></script>
   <script src="js/hoverable-collapse.js"></script>
   <script src="js/template.js"></script>
   <script src="js/settings.js"></script>
   <script src="js/todolist.js"></script>
   <script src="js/dashboard.js"></script>
   <script src="js/Chart.roundedBarCharts.js"></script>
   <script src="js/jquery.cookie.js"></script>
</body>

</html>