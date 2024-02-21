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
   if (isset($_POST["GAPStandardWise"]) AND isset($_POST["Plan"])) {
         $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
         $Plan = mysqli_real_escape_string($db, $_POST["Plan"]);
         $Amount = mysqli_real_escape_string($db, $_POST["Amount"]);
         $DiscountPercentage = mysqli_real_escape_string($db, $_POST["DiscountPercentage"]);
         $DiscountDescription = mysqli_real_escape_string($db, $_POST["DiscountDescription"]);
         $DiscountStatus = mysqli_real_escape_string($db, $_POST["DiscountStatus"]);
         $Date = $other["Date"];
         $query2 = mysqli_query($db, "SELECT * from gap_standard_wise_price where GAPStandardWise  = '$GAPStandardWise' AND Plan  = '$Plan' AND DeletedStatus  = '0'");
       $row2 = mysqli_num_rows($query2);
       if ($row2 == 0) {
           $query1 = mysqli_query($db, "INSERT INTO `gap_standard_wise_price` (`gap_standard_wise_price_id`, `GAPStandardWise`, `Plan`, `Amount`, `DiscountPercentage`, `DiscountDescription`, `DiscountStatus`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$GAPStandardWise', '$Plan', '$Amount', '$DiscountPercentage', '$DiscountDescription', '$DiscountStatus', '0', CURRENT_TIMESTAMP);");
           
       if($query1){
       header("Location:gap.php?msg=success");
     }else{
       header("Location:gap.php?msg=fail");
     }}else{
       header("Location:gap.php?msg=faile");
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
      <style type="text/css">
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
                              <h4 class="card-title float-left">GAP Standard Wise Price</h4>
                              <div class="card-title float-right"><a href="gap-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price  details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST">
                                 <div class="expert-repeat mainbox1" style="padding-top: 10px;">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">GAP Standard Wise</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="IndG.A.P">IndG.A.P</option>
                                                <option value="GLOBALG.A.P">GLOBALG.A.P</option>
                                                <option value="Organic NPOP">Organic NPOP</option>
                                                <option value="Organic NOP">Organic NOP</option>
                                                <option value="Organic PGS- India">Organic PGS- India</option>
                                                <option value="Medicinal Plants">Medicinal Plants</option>
                                                <option value="ISO 22000">ISO 22000</option>
                                                <option value="FSSC 22000">FSSC 22000</option>
                                                <option value="BRC Global Standard Packaging, Issue 6">BRC Global Standard Packaging, Issue 6</option>
                                                <option value="BRC Global Standard Food Safety,Issue 9">BRC Global Standard Food Safety,Issue 9</option>
                                                <option value="ISO 14001 Environment">ISO 14001 Environment</option>
                                                <option value="ISO 50001 Energy Management">ISO 50001 Energy Management</option>
                                                <option value="ISO 45001 OH and S Mgt">ISO 45001 OH & S Mgt</option>
                                                <option value="SA 8000 Social Accounting">SA 8000 Social Accounting</option>
                                                <option value="Rainforest Alliance">Rainforest Alliance</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Plan</label>
                                             <select name="Plan" class="form-control" required="">
                                                <option value="Yearly">Yearly</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Amount</label>
                                             <input name="Amount" type="number" class="form-control" id="" placeholder="Enter Amount" required="">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Percentage</label>
                                             <input name="DiscountPercentage" type="number" class="form-control" id="" placeholder="Enter Discount Percentage">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Description</label>
                                             <input name="DiscountDescription" type="text" class="form-control" id="" placeholder="Enter Discount Description">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Status</label>
                                             <select name="DiscountStatus" class="form-control" required="">
                                                <option value="0">Deactive</option>
                                                <option value="1">Active</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="content1"></div>
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
   </body>
</html>