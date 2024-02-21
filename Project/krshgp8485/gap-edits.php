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
   $gap_standard_wise_price_id = $_GET['id'];
   $query_edit = mysqli_query($db, "SELECT * from gap_standard_wise_price where gap_standard_wise_price_id = '$gap_standard_wise_price_id'");
   $row_edit = mysqli_fetch_assoc($query_edit);
   if (isset($_POST["GAPStandardWise"]) && isset($_POST["Plan"])) {
       $Amount = mysqli_real_escape_string($db, $_POST["Amount"]);
       $DiscountPercentage = mysqli_real_escape_string($db, $_POST["DiscountPercentage"]);
       $DiscountDescription = mysqli_real_escape_string($db, $_POST["DiscountDescription"]);
       $DiscountStatus = mysqli_real_escape_string($db, $_POST["DiscountStatus"]);
       $query = mysqli_query($db, "UPDATE `gap_standard_wise_price` SET `Amount`='$Amount',`DiscountPercentage`='$DiscountPercentage',`DiscountDescription`='$DiscountDescription', `DiscountStatus`='$DiscountStatus' WHERE `gap_standard_wise_price_id`='$gap_standard_wise_price_id'");
       if ($query) {
           header("Location:gap-edits.php?id=$gap_standard_wise_price_id&msg=success");
       } else {
           header("Location:gap-edits.php?id=$gap_standard_wise_price_id&msg=fail");
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
                              <h4 class="card-title float-left">Edit GAP Standard Wise Price</h4>
                              <div class="card-title float-right"><a href="gap-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price details successfully edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price details not edited.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>GAP Standard Wise Price details successfully edited.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST">
                                 <div class="expert-repeat mainbox1">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">GAP Standard Wise</label>
                                             <input value="<?php echo $row_edit['GAPStandardWise']; ?>" name="GAPStandardWise" type="text" class="form-control" id="" placeholder="Enter Discount Percentage" readonly>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Plan</label>
                                             <input value="<?php echo $row_edit['Plan']; ?>" name="Plan" type="text" class="form-control" id="" placeholder="Enter Discount Percentage" readonly>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Amount</label>
                                             <input value="<?php echo $row_edit['Amount']; ?>" name="Amount" type="number" class="form-control" id="" placeholder="Enter Amount">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Percentage</label>
                                             <input value="<?php echo $row_edit['DiscountPercentage']; ?>" name="DiscountPercentage" type="number" class="form-control" id="" placeholder="Enter Discount Percentage">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Description</label>
                                             <input value="<?php echo $row_edit['DiscountDescription']; ?>" name="DiscountDescription" type="text" class="form-control" id="" placeholder="Enter Discount Description">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Discount Status</label>
                                             <select name="DiscountStatus" class="form-control" required="">
                                                <option <?php if($row_edit['DiscountStatus'] == 0){echo "selected";} ?> value="0">Deactive</option>
                                                <option <?php if($row_edit['DiscountStatus'] == 1){echo "selected";} ?> value="1">Active</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="content1"></div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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