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
   $query = mysqli_query($db, "SELECT * from plant_protection_products where DeletedStatus='0' ORDER BY plant_protection_product_id DESC");
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
                              <h4 class="card-title float-left">List Plant Protection Products</h4>
                              <div class="card-title float-right"><a href="plant-protection-add.php" class="btn btn-primary btn-sm" style="padding: 0.4rem 1rem;">Add New</a></div>
                              <div class="clearfix"></div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faild'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Plant Protection Products
                                          details not deleted..
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Plant Protection Products
                                          details successfully deleted.
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
                                          <th>Standard</th>
                                          <th>Country</th>
                                          <th>Crop</th>
                                          <th>Category</th>
                                          <th>Status</th>
                                          <th>Document Name</th>
                                          <th>Edit/Delete</th>
                                          <th>Document</th>
                                          <th>Document Source</th>
                                          <th>Document Link</th>
                                          <th>Country</th>
                                          <th>Pesticide Status</th>
                                          <th>Document Name</th>
                                          <th>Document</th>
                                          <th>Document Source</th>
                                          <th>Document Link</th>
                                          <th>Tabs File Name</th>
                                          <th>Tabs</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          if($query){
                                             $count = 1;
                                          while($row = mysqli_fetch_array($query)){
                                          $query113 = mysqli_query($db,"SELECT * from countries where CountryID ='$row[CountryID]'");
                                          $row113 = mysqli_fetch_assoc($query113);
                                          $row113num = mysqli_num_rows($query113);
                                          $query1131 = mysqli_query($db,"SELECT * from countries where CountryID ='$row[CountryID1]'");
                                          $row1131 = mysqli_fetch_assoc($query1131);
                                          $row113num1 = mysqli_num_rows($query1131);
                                          
                                          ?>
                                       <tr>
                                          <td><?php echo $count; ?></td>
                                          <td><?php echo $row['GAPStandardWise'];?></td>
                                          <td><?php 
                                             if($row113num == '0' OR $row113num == ''){
                                                echo "Other"; 
                                             }else{
                                               echo $row113['CountryName'];
                                             }
                                              ?></td>
                                          <td><?php
                                             if($row['CropId'] == '00'){
                                               echo "ALL"; 
                                             }else{
                                             $query115 = mysqli_query($db,"SELECT * from crop where CropId='$row[CropId]'"); 
                                               $row115 = mysqli_fetch_assoc($query115);
                                               echo $row115['CropName']; 
                                             }
                                             ?>
                                          </td>
                                          <td><?php
                                             if($row['CategoryId'] == '00'){
                                                  echo "ALL"; 
                                              }else{
                                                $query112 = mysqli_query($db,"SELECT * from category where CategoryId ='$row[CategoryId]'");
                                                $row112 = mysqli_fetch_assoc($query112);
                                                              echo $row112['CategoryName']; 
                                                }
                                                ?></td>
                                          <td><?php echo $row['Permitted'];?></td>
                                          <td><?php echo $row['DocumentName'];?></td>
                                          <td class="font-weight-medium">
                                             <a onclick="return confirm('Are you sure want to edit?')" href="plant-protection-edits.php?id=<?php echo $row['plant_protection_product_id']; ?>" class="badge badge-success"><i class="ti-pencil btn-icon-prepend"></i> Edit</a>
                                             <a onclick="return confirm('Are you sure want to delete?')" href="plant-protection-delete.php?id=<?php echo $row['plant_protection_product_id']; ?>" class="badge badge-danger"><i class="ti-trash btn-icon-prepend"></i> Delete</a>
                                          </td>
                                          <td>
                                             <?php if($row['UploadDocument'] !=''){?>
                                             <a href="../Plant-Protection-Products-documents/<?php echo $row['UploadDocument']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a>
                                             <?php } ?>
                                          </td>
                                          <td><?php echo $row['DocumentSource'];?></td>
                                          <td>
                                             <?php if($row['DocumentLink'] !=''){?>
                                             <a href="<?php echo $row['DocumentLink']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a>
                                             <?php } ?>
                                          </td>
                                          <td><?php 
                                             if($row113num1 == '0' OR $row113num1 == ''){
                                                echo "Other"; 
                                             }else{
                                               echo $row1131['CountryName'];
                                             }
                                              ?></td>
                                          <td><?php echo $row['PesticideStatus'];?></td>
                                          <td><?php echo $row['DocumentName1'];?></td>
                                          <td>
                                             <?php if($row['UploadDocument1'] !=''){?>
                                             <a href="../Plant-Protection-Products-documents/<?php echo $row['UploadDocument1']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a>
                                             <?php } ?>
                                          </td>
                                          <td><?php echo $row['DocumentSource1'];?></td>
                                          <td>
                                             <?php if($row['DocumentLink1'] !=''){?>
                                             <a href="<?php echo $row['DocumentLink1']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a>
                                             <?php } ?>
                                          </td>
                                          <td>
                                             
                                             <?php
                                          $queryff = mysqli_query($db, "SELECT * from plant_protection_products_tabs where plant_protection_product_id='$row[plant_protection_product_id]' AND DeletedStatus='0' ORDER BY plant_protection_products_tab_id ASC");
                                           while($rowff = mysqli_fetch_array($queryff)){
                                           $queryf = mysqli_query($db, "SELECT * from plant_protection_products_documents where plant_protection_products_tab_id='$rowff[plant_protection_products_tab_id]' AND DeletedStatus='0' ORDER BY plant_protection_products_documents_id ASC");
                                           while($rowf = mysqli_fetch_array($queryf)){
                                          
                                           ?>
                                           <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($rowf['documents_name'], strpos($rowf['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?><br>
                                       <?php }} ?>

                                          </td>
                                          <td>
                                             <?php
                                                $query6 = mysqli_query($db,"SELECT plant_protection_product_id from plant_protection_products_tabs where plant_protection_product_id='$row[plant_protection_product_id]' AND DeletedStatus='0'");
                                                if(mysqli_num_rows($query6) > 0){
                                                ?>
                                             <a href="plant-protection-documents-tabs.php?id=<?php echo $row['plant_protection_product_id']; ?>" target="_blank"><i style="font-size: 22px;" class="ti-files btn-icon-prepend"></i></a>
                                             <?php } ?>
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