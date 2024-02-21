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
if (isset($_POST["GAPStandardWise"]) AND isset($_POST["SeasonWiseID"]) AND isset($_POST["CropId"]) AND isset($_POST["CountryID"])) {
        $query2 = mysqli_query($db, "INSERT INTO `package_of_practices` (`PackageOfPracticesId`, `GAPStandardWise`, `SeasonWiseID`, `CropId`, `CountryID`, `StateID`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$_POST[GAPStandardWise]', '$_POST[SeasonWiseID]', '$_POST[CropId]', '$_POST[CountryID]', '$_POST[StateID]', '0', current_timestamp());");
        $PackageOfPracticesId = $db->insert_id;
        if ($query2) {
            foreach ($_POST["others"] as $key => $other) {
                    $DocumentsSource = mysqli_real_escape_string($db, $other["DocumentsSource"]);
                    $SourceLink = mysqli_real_escape_string($db, $other["SourceLink"]);
                    $query2 = mysqli_query($db, "INSERT INTO `package_of_practices_documents` (`package_of_practices_documentsId`, `PackageOfPracticesId`, `DocumentsSource`, `SourceLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$PackageOfPracticesId', '$DocumentsSource', '$SourceLink', '0', current_timestamp());");
                    $package_of_practices_documentsId = $db->insert_id;
                    for ($i = 0;$i < count($_FILES["documents"]["name"][$key]);$i++) {
                        $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$key][$i];
                        $documents = str_replace(",","","$documents1");
                        if ($_FILES["documents"]["name"][$key][$i] != '') {
                            if(strtolower(end(explode(".",$documents))) =="pdf") {
                            if(move_uploaded_file($_FILES["documents"]["tmp_name"][$key][$i], "../Package-Of-Practices/" . $documents)){
                            $query1 = mysqli_query($db, "INSERT INTO `package_of_practices_documents_videos` (`package_of_practices_documents_video_id`, `package_of_practices_documentsId`, `VideoName`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$package_of_practices_documentsId', '$documents', '0', current_timestamp());");
                          }}
                        }
                    }
            }
            header("Location:Package-of-practices.php?msg=success");
        } else {
            header("Location:Package-of-practices.php?msg=fail");
        }
}
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
    .mup{
      display: block;
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
                                                   transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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
                           <h4 class="card-title float-left" style="margin-top: 7px;">Add Package of Practices</h4>
                           <div class="card-title float-right">        
                              <a href="Package-of-practices-edit.php" class="btn btn-primary btn-sm">View List</a></div>
                           <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                  <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="bs-component">
                                       <div class="alert alert-dismissible alert-danger">
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package of Practices details already exist.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package of Practices details not saved.
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
                                          <button class="close" type="button" data-dismiss="alert">×</button>Package of Practices details successfully saved.
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
                    <div class="col-2">
                                          <div class="form-group">
                                             <label for="">Standard</label>
                                             <select name="GAPStandardWise" class="form-control" required="">
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

                      <div class="col-2">
                        <div class="form-group">
                         <label for="">Season Wise</label>
                          <select name="SeasonWiseID" class="form-control" required="">
                            <option value="">Please Select</option>
                                 <?php 
                                 $query112 = mysqli_query($db,"SELECT * from seasonwise ORDER BY SeasonWiseName");
                                        if($query112){
                                        while($row112 = mysqli_fetch_array($query112)){?>
                                        <option value="<?php echo $row112['SeasonWiseID']; ?>"><?php echo $row112['SeasonWiseName']; ?></option>
                                        <?php }} ?>
                        </select>
                        </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                              <label for="">Crop</label>
                              <select name="CropId" class="form-control" required="">
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

                        <div class="col-3">
                          <div class="form-group">
                            <label for="">Country</label>
                            <select id="country" name="CountryID" class="form-control" required="">
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

                          <div class="col-3">
                            <div class="form-group">
                              <label for="">State</label>
                              <select id="state" name="StateID" class="form-control">
                                <option value="0">State not available</option>
                               
                            </select>
                            </div>
                            </div>
                              </div>
                            </div>


                            <div class="expert-repeat mainbox1">
                              <a href="javascript:void(0)" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow1()">
                                <i class="ti-plus btn-icon-prepend"></i>                                                    
                                Add More
                              </a>
          
          
                              <div class="row">
 <div class="col-12">
                                          <div class="form-group">
                                             <label>Upload Documents </label>
                                             <div class="input-group col-xs-12">
                                                <input class="file_input" id="file_input1" type="file" name="documents[1][]" class="mup">
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
  <script>
         function addRow1 () {
           var count = 1;
           count = count + $('.expert-repeat').length;
         document.querySelector('#content1').insertAdjacentHTML(
         'afterbegin',
         `<div class="expert-repeat mainbox`+count+`" id="content1">
                              <a href="javascript:void(0)" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow1(this)">
   <i class="ti-minus btn-icon-prepend"></i>                                                    
   Remove
   </a><div class="row">
   <div class="col-12">
         <div class="form-group">
            <label>Upload Documents </label>
            <div class="input-group col-xs-12">
               <input class="file_input" id="file_input`+ count +`" type="file" name="documents[`+ count +`][]" class="mup">
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
       </div></div>`      
         )
         }
         function removeRow1 (input) {
         input.parentNode.remove()
         }
      </script>

      <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html); 
                }
            }); 
        }
    });  
});
</script>   
</body>

</html>
