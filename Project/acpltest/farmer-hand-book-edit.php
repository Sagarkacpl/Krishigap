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
   $query = mysqli_query($db, "SELECT * from farmer_hand_book where DeletedStatus='0' ORDER BY farmer_hand_book_id DESC");
   if (isset($_POST["id"]) && isset($_POST["sort"])) {
       $id = mysqli_real_escape_string($db, $_POST["id"]);
       $sort = mysqli_real_escape_string($db, $_POST["sort"]); 
       $query = mysqli_query($db, "UPDATE `farmer_hand_book` SET `sort`='$sort' WHERE `farmer_hand_book_id`='$id'");
        if($query){
               header("Location:farmer-hand-book-edit.php?msg=osuccess");
           }else{
               header("Location:farmer-hand-book-edit.php?msg=ofail");
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
      <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css" />
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
                              <h4 class="card-title float-left">List Farmer Hand Book</h4>
                              <div class="card-title float-right"><a href="farmer-hand-book.php" class="btn btn-primary btn-sm" style="padding: 0.4rem 1rem;">Add New</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'ofail'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Not updated.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'osuccess'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Successfully updated.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faild'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Farmer Hand Book details not deleted..
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Farmer Hand Book details successfully deleted.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <div class="table-responsive">
                                 <table id="example" class="table table-striped table-borderless" style="width: 100% !important;">
                                    <thead>
                                       <tr>
                                          <th>S.No.</th>
                                          <th>Season Wise</th>
                                          <th>Standard</th>
                                          <th>Crop</th>
                                          <th>File Name</th>
                                          <th>Documents</th>
                                          <th>Youtube Links</th>
                                          <th>Order</th>
                                          <th>Edit/Delete</th>
                                          <th>Document Source</th>
                                          <th>Source Link</th>
                                          <th>Remark</th>
                                          <th>Language</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          if($query){
                                             $count = 1;
                                          while($row = mysqli_fetch_array($query)){
                                          $query2 = mysqli_query($db,"SELECT * from seasonwise WHERE SeasonWiseID ='$row[SeasonWise]'");
                                          $row2 = mysqli_fetch_array($query2)
                                          ?>
                                       <tr>
                                          <td><?php echo $count; ?></td>
                                          <td><?php echo $row2['SeasonWiseName']; ?></td>
                                          <td><?php echo $row['GAPStandardWise']; ?></td>
                                          <td><?php
                                             if($row['Crop'] == '00'){
                                              echo "ALL"; 
                                             }else{
                                             $query1 = mysqli_query($db,"SELECT * from crop where CropId='$row[Crop]'"); 
                                               $row1 = mysqli_fetch_assoc($query1);
                                               echo $row1['CropName']; 
                                             }
                                             ?></td>
                                             <td>
                                              <?php
                                          $queryf = mysqli_query($db,"SELECT * from farmer_hand_book_documents where DeletedStatus='0' AND farmer_hand_book_id='$row[farmer_hand_book_id]' ORDER BY farmer_hand_book_documents_id ASC");
                                          while($rowf = mysqli_fetch_array($queryf)){
                                          ?>
                                       <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($rowf['documents_name'], strpos($rowf['documents_name'], '-DOC-'))), PATHINFO_FILENAME))); ?><br>
                                       <?php } ?>
                                             </td>
                                          <td><a href="farmer-hand-book-documents.php?id=<?php echo $row['farmer_hand_book_id']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a></td>
                                          <td><a href="farmer-hand-book-youtubes.php?id=<?php echo $row['farmer_hand_book_id']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a></td>
                                          <td>
                                             <form method="POST" action="">
                                                <input type="hidden" name="id" value="<?php echo $row['farmer_hand_book_id']; ?>">
                                                <input type="number" name="sort" value="<?php echo $row['sort']; ?>" style="width: 48px;">
                                                <button type="submit" style="border-radius: 4px;padding: 0.2rem 0.3rem;" class="badge badge-primary"><i style="font-size: 12px;" class="ti-save btn-icon-prepend"></i></button>
                                             </form>
                                          </td>
                                          <td class="font-weight-medium">
                                             <a onclick="return confirm('Are you sure want to edit?')" href="farmer-hand-book-edits.php?id=<?php echo $row['farmer_hand_book_id']; ?>" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                                             <a onclick="return confirm('Are you sure want to delete?')" href="farmer-hand-book-delete.php?id=<?php echo $row['farmer_hand_book_id']; ?>" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                                          </td>
                                          <td><?php echo $row['DocumentsSource']; ?></td>
                                          <td><?php echo $row['SourceLink']; ?></td>
                                          <td><?php echo $row['Remark']; ?></td>
                                          <td><?php echo $row['Language']; ?></td>
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