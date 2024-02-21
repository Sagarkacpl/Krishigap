<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['Admin_GAP793_Id'] != '') {
       header("Location: dashboard.php");
   }
   include "connection.php";
   if (isset($_POST["username"]) && isset($_POST["password"])) {
       $username = mysqli_real_escape_string($db, trim($_POST["username"]));
       $password1 = mysqli_real_escape_string($db, md5(trim($_POST["password"])));
       $Deleted_Status = '0';
       $tsql = "SELECT * FROM admin WHERE UserName = '$username' AND Password = '$password1' AND Deleted_Status = '$Deleted_Status'";
       $query = mysqli_query($db, $tsql);
       $row_count = mysqli_num_rows($query);
       $row = mysqli_fetch_array($query);
       if ($row['UserName'] != '') {
           $_SESSION["Admin_GAP793_Id"] = $row['Admin_GAP793_Id'];
           $_SESSION["UserName"] = $row['UserName'];
           if (isset($_SESSION["Admin_GAP793_Id"])) {
               header("Location:dashboard.php");
           }
       } else {
           header("Location:index.php?msg=fail");
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Login</title>
      <link rel="stylesheet" href="vendors/feather/feather.css">
      <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="css/vertical-layout-light/style.css">
      <link rel="shortcut icon" href="images/favicon.png" />
   </head>
   <style>
      .content-wrapper {
      background-image: url(images/login-bg.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      }
   </style>
   <body>
      <div class="container-scroller">
         <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
               <div class="row w-100 mx-0">
                  <div class="col-lg-4 mx-auto">
                     <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                           <center><a href="index.php"><img src="../img/krishi-gap-logo.png"></a></center>
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <?php
                           $msg = $_GET['msg'];
                           if($msg == 'fail'){?>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="bs-component">
                                 <div class="alert alert-dismissible alert-danger">
                                    <button class="close" type="button" data-dismiss="alert">×</button>Wrong username or password.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                        <form class="pt-3" action="" method="POST">
                           <div class="form-group">
                              <input name="username" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required="">
                           </div>
                           <div class="form-group">
                              <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required="">
                           </div>
                           <div class="mt-3">
                              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">SIGN IN</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/settings.js"></script>
      <script src="js/todolist.js"></script>
   </body>
</html>