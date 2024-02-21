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
$query11 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
if ((isset($_POST["CountryID"]) OR isset($_POST["CountryID1"])) && ($_POST["CountryID"] != '' OR $_POST["CountryID1"])) {
    if ($_FILES["UploadDocument"]["name"] != '') {
        $UploadDocument1 = time() . "-" . rand(1000, 9999) . "-img-" . $_FILES["UploadDocument"]["name"];
        $UploadDocument = str_replace(",","","$UploadDocument1");
        if(move_uploaded_file($_FILES["UploadDocument"]["tmp_name"], "../Plant-Protection-Products-documents/" . $UploadDocument)){}else{$UploadDocument = '';}
    } else {
        $UploadDocument = '';
    }
    if ($_FILES["UploadDocument1"]["name"] != '') {
        $UploadDocument11 = time() . "-" . rand(1000, 9999) . "-img-" . $_FILES["UploadDocument1"]["name"];
        $UploadDocument1 = str_replace(",","","$UploadDocument11");
        if(strtolower(end(explode(".",$UploadDocument1))) =="pdf") {
        if(move_uploaded_file($_FILES["UploadDocument1"]["tmp_name"], "../Plant-Protection-Products-documents/" . $UploadDocument1)){}else{$UploadDocument1 = '';}
    }} else {
        $UploadDocument1 = '';
    }
    $query2 = mysqli_query($db, "INSERT INTO `plant_protection_products` (`plant_protection_product_id`, `GAPStandardWise`, `CountryID`, `CropId`, `CategoryId`, `Permitted`, `DocumentName`, `UploadDocument`, `DocumentSource`, `DocumentLink`, `CountryID1`, `PesticideStatus`, `DocumentName1`, `UploadDocument1`, `DocumentSource1`, `DocumentLink1`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$_POST[GAPStandardWise]', '$_POST[CountryID]', '$_POST[CropId]', '$_POST[CategoryId]', '$_POST[Permitted]', '$_POST[DocumentName]', '$UploadDocument', '$_POST[DocumentSource]', '$_POST[DocumentLink]', '$_POST[CountryID1]', '$_POST[PesticideStatus]', '$_POST[DocumentName1]', '$UploadDocument1', '$_POST[DocumentSource1]', '$_POST[DocumentLink1]', '0', current_timestamp());");
    $plant_protection_product_id = $db->insert_id;
    if ($query2) {
        if (isset($_POST["others"])) {
            foreach ($_POST["others"] as $key => $other) {
                    $Title = mysqli_real_escape_string($db, $other["Title"]);
                    $TrainingModulesTitle = mysqli_real_escape_string($db, $other["TrainingModulesTitle"]);
                    $TrainingModulesLink = mysqli_real_escape_string($db, $other["TrainingModulesLink"]);
                    $Remark = mysqli_real_escape_string($db, $other["Remark"]);
                    $DocumentsSource = mysqli_real_escape_string($db, $other["DocumentsSource"]);
                    $SourceLink = mysqli_real_escape_string($db, $other["SourceLink"]);
                    $query2 = mysqli_query($db, "INSERT INTO `plant_protection_products_tabs` (`plant_protection_products_tab_id`, `plant_protection_product_id`, `Title`, `TrainingModulesTitle`, `TrainingModulesLink`, `Remark`, `DocumentsSource`, `SourceLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$plant_protection_product_id', '$Title', '$TrainingModulesTitle', '$TrainingModulesLink', '$Remark', '$DocumentsSource', '$SourceLink', '0', current_timestamp());");
                    $plant_protection_products_tab_id = $db->insert_id;
                    if (!empty($YoutubeVideoLinks = $other['YoutubeVideoLink'])) {
                        foreach ($YoutubeVideoLinks as $YoutubeVideoLink) {
                            $query3 = mysqli_query($db, "INSERT INTO `plant_protection_products_youtube` (`plant_protection_products_youtube_id`, `plant_protection_products_tab_id`, `YoutubeTitleLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$plant_protection_products_tab_id', '$YoutubeVideoLink', '0', current_timestamp());");
                        }
                    }
                    for ($i = 0;$i < count($_FILES["documents"]["name"][$key]);$i++) {
                        $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$key][$i];
                        $documents = str_replace(",","","$documents1");
                        if ($_FILES["documents"]["name"][$key][$i] != '') {
                            if(strtolower(end(explode(".",$documents))) =="pdf") {
                            if(move_uploaded_file($_FILES["documents"]["tmp_name"][$key][$i], "../Plant-Protection-Products/" . $documents)){
                            $query1 = mysqli_query($db, "INSERT INTO `plant_protection_products_documents` (`plant_protection_products_documents_id`, `plant_protection_products_tab_id`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$plant_protection_products_tab_id', '$documents', '0', current_timestamp());");
                          }}
                        }
                    }
            }
        }
        header("Location:plant-protection-add.php?msg=success");
    } else {
        header("Location:plant-protection-add.php?msg=fail");
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
         .multifile_remove_input {
         color: red;
         text-decoration: none;
         font-size: 20px;
         font-weight: 600;
         }
         p {
         margin-bottom: 0px;
         margin-top: 5px;
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
         select.form-control {
    outline: 1px solid #999;
    color: #999;
}
.form-control {
    border: 1px solid #999;
    }
      </style>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.multifile.js"></script>
      <script type="text/javascript">
         jQuery(function($){
           $('html').on('click', '.file_input', function(){
             var elementId = $(this).attr('id');
             $('#'+elementId).multifile();
           });
         });
      </script>
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
                              <h4 class="card-title float-left" style="margin-top: 7px;">Add Plant Protection Products</h4>
                              <div class="card-title float-right">        
                                 <a href="plant-protection-edit.php" class="btn btn-primary btn-sm">View List</a>
                              </div>
                              <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;">
                              </div>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Plant Protection Products
                                          details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Plant Protection Products
                                          details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Plant Protection Products
                                          details successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'relfail'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">Related Document not saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'relsuccess'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-success">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Related Document successfully saved.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php } ?>
                              <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                                 <div class="expert-repeat" style="padding-top: 10px;">
                                    <div class="row">
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="IndG.A.P">IndG.A.P</option>
                                                <option value="GLOBALG.A.P">GLOBALG.A.P</option>
                                                <option value="Organic NPOP">Organic NPOP</option>
                                                <option value="Organic NOP">Organic NOP</option>
                                                <!--<option value="Fairtrade International">Fairtrade International</option>-->
                                                <!--<option value="Rainforest Alliance">Rainforest Alliance</option>-->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Country</label>
                                             <select id="country" name="CountryID" class="form-control">
                                                <option value="">Please Select</option>
                                                <?php 
                                                   $query113 = mysqli_query($db,"SELECT * from countries ORDER BY CountryName");
                                                          if($query113){
                                                          while($row113 = mysqli_fetch_array($query113)){?>
                                                <option value="<?php echo $row113['CountryID']; ?>"><?php echo $row113['CountryName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Crop</label>
                                             <select name="CropId" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="00">ALL</option>
                                                <?php 
                                                   if($query11){
                                                   while($row11 = mysqli_fetch_array($query11)){?>
                                                <option value="<?php echo $row11['CropId']; ?>"><?php echo $row11['CropName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <label for="">Category</label>
                                             <select name="CategoryId" class="form-control">
                                                <option>Please Select</option>
                                                <option value="00">ALL</option>
                                                <?php 
                                                   $queryc = mysqli_query($db,"SELECT * from category where DeletedStatus='0' ORDER BY CategoryName");
                                                           if($queryc){
                                                           while($rowc = mysqli_fetch_array($queryc)){?>
                                                <option value="<?php echo $rowc['CategoryId']; ?>"><?php echo $rowc['CategoryName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                          <label for="">&nbsp;</label>
                                          <div class="form-group row">
                                             <div class="col-sm-6">
                                                <div class="form-check">
                                                   <label class="form-check-label">
                                                   <input type="checkbox" class="form-check-input" name="Permitted" value="Permitted">
                                                   Permitted
                                                   <i class="input-helper"></i></label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Name</label>
                                             <input name="DocumentName" type="text" class="form-control" placeholder="Enter Document Name">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Upload Document</label>
                                             <input name="UploadDocument" type="file" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Source</label>
                                             <input name="DocumentSource" type="text" class="form-control" placeholder="Enter Document Source">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Link</label>
                                             <input name="DocumentLink" type="text" class="form-control" placeholder="Enter Document Link">
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                 </div>
                                 <div class="expert-repeat">
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Country</label>
                                             <select id="country" name="CountryID1" class="form-control">
                                                <option value="">Please Select</option>
                                                <?php 
                                                   $query113 = mysqli_query($db,"SELECT * from countries ORDER BY CountryName");
                                                          if($query113){
                                                          while($row113 = mysqli_fetch_array($query113)){?>
                                                <option value="<?php echo $row113['CountryID']; ?>"><?php echo $row113['CountryName']; ?></option>
                                                <?php }} ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Pesticide Status</label>
                                             <select name="PesticideStatus" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="00">ALL</option>
                                                <option value="Banned">Banned</option>
                                                <option value="Restricted">Restricted</option>
                                                <option value="Registered">Registered</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Name</label>
                                             <input name="DocumentName1" type="text" class="form-control" placeholder="Enter Document Name">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Upload Document</label>
                                             <input name="UploadDocument1" type="file" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Source</label>
                                             <input name="DocumentSource1" type="text" class="form-control" placeholder="Enter Document Source">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Document Link</label>
                                             <input name="DocumentLink1" type="text" class="form-control" placeholder="Enter Document Link">
                                          </div>
                                       </div>
                                    </div>
                                    <br>
                                 </div>
                                 <div class="expert-repeat mainbox1">
                                    <a href="javascript:void(0)" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow1()">
                                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                                    Add More
                                    </a>
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="">Document Title</label>
                                             <input name="others[1][Title]" type="text" class="form-control" id="" placeholder="Enter Document Title">
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Remark</label>
                                             <div class="input-group col-xs-12">
                                                <textarea class="form-control" name="others[1][Remark]"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Documents Source</label>
                                             <div class="input-group col-xs-12">
                                                <input name="others[1][DocumentsSource]" type="text" class="form-control" id="" placeholder="Documents Source">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Source Link</label>
                                             <div class="input-group col-xs-12">
                                                <input name="others[1][SourceLink]" type="text" class="form-control" id="" placeholder="Source Link">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input class="file_input" id="file_input1" type="file" name="documents[1][]" style="display: block;
                                                   width: 100%;
                                                   height: 2.875rem;
                                                   padding: 0.875rem 1.375rem;
                                                   font-size: 0.875rem;
                                                   font-weight: 400;
                                                   line-height: 1;
                                                   color: #495057;
                                                   background-color: #ffffff;
                                                   background-clip: padding-box;
                                                   border: 1px solid #ced4da;
                                                   border-radius: 2px;
                                                   transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-11">
                                          <div class="form-group">
                                             <label for="">Enter Youtube Video Link</label>
                                             <input name="others[1][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
                                          </div>
                                       </div>
                                       <div class="col-1">
                                          <div class="form-group">
                                             <a href="javascript:void(0)" style="top: 30px;border-radius: inherit;" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow(1)">
                                             <i class="ti-plus btn-icon-prepend"></i> 
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="youtubeurlmore1"></div>
                                    <div class="row">
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Title</label>
                                             <input name="others[1][TrainingModulesTitle]" type="text" class="form-control" id="" placeholder="Training Modules Title">
                                          </div>
                                       </div>
                                       <div class="col-6">
                                          <div class="form-group">
                                             <label for="">Training Modules Link</label>
                                             <input name="others[1][TrainingModulesLink]" type="text" class="form-control" id="" placeholder="Training Modules link">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="content1"></div>
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
      <script>
         function addRow (num) {
document.querySelector('#youtubeurlmore' + num).insertAdjacentHTML(
'afterbegin',
`
<div class="row">
   <div class="col-12">
      <div class="form-group">
         <a href="javascript:void(0)" style="top: 0px;border-radius: inherit;" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow(this)">
         <i class="ti-minus btn-icon-prepend"></i> 
         </a><input style="width: 99%;" name="others[`+ num +`][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
      </div>
   </div>
</div>
`      
)
}
function removeRow (input) {
input.parentNode.remove()
}
function addRow1 () {
var count = 1;
count = count + $('.expert-repeat').length;
document.querySelector('#content1').insertAdjacentHTML(
'afterbegin',
`
<div class="expert-repeat mainbox`+count+`" id="content1">
   <a href="javascript:void(0)" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow1(this)">
   <i class="ti-minus btn-icon-prepend"></i>                                                    
   Remove
   </a>
   <div class="row">
      <div class="col-12">
         <div class="form-group">
            <label for="">Document Title</label>
            <input name="others[`+ count +`][Title]" type="text" class="form-control" id="" placeholder="Enter Document Title" >
         </div>
      </div>
      <div class="col-12">
         <div class="form-group">
            <label>Remark</label>
            <div class="input-group col-xs-12">
               <textarea class="form-control" name="others[`+ count +`][Remark]"></textarea>
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="form-group">
            <label>Documents Source</label>
            <div class="input-group col-xs-12">
               <input name="others[`+ count +`][DocumentsSource]" type="text" class="form-control" id="" placeholder="Documents Source">
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="form-group">
            <label>Source Link</label>
            <div class="input-group col-xs-12">
               <input name="others[`+ count +`][SourceLink]" type="text" class="form-control" id="" placeholder="Source Link">
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="form-group">
            <label>Upload Documents </label>
            <div class="input-group col-xs-12">
               <input class="file_input" id="file_input`+ count +`" type="file" name="documents[`+ count +`][]" style="display: block;
                  width: 100%;
                  height: 2.875rem;
                  padding: 0.875rem 1.375rem;
                  font-size: 0.875rem;
                  font-weight: 400;
                  line-height: 1;
                  color: #495057;
                  background-color: #ffffff;
                  background-clip: padding-box;
                  border: 1px solid #ced4da;
                  border-radius: 2px;
                  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
            </div>
         </div>
      </div>
      <div class="col-11">
         <div class="form-group">
            <label for="">Enter Youtube Video Link</label>
            <input name="others[`+ count +`][YoutubeVideoLink][]" type="text" class="form-control" id="" placeholder="Enter Youtube Video Link">
         </div>
      </div>
      <div class="col-1">
         <div class="form-group">
            <a href="javascript:void(0)" style="top: 30px;border-radius: inherit;" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow(`+count+`)">
            <i class="ti-plus btn-icon-prepend"></i> 
            </a>
         </div>
      </div>
   </div>
   <div id="youtubeurlmore`+ count +`"></div>
   <div class="row">
      <div class="col-6">
         <div class="form-group">
            <label for="">Training Modules Title</label>
            <input name="others[`+ count +`][TrainingModulesTitle]" type="text" class="form-control" id="" placeholder="Training Modules Title">
         </div>
      </div>
      <div class="col-6">
         <div class="form-group">
            <label for="">Training Modules Link</label>
            <input name="others[`+ count +`][TrainingModulesLink]" type="text" class="form-control" id="" placeholder="Training Modules link">
         </div>
      </div>
   </div>
</div>
`      
)
}
function removeRow1 (input) {
input.parentNode.remove()
}
      </script>
   </body>
</html>