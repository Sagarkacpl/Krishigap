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
                                    <h4 class="card-title float-left">Standards</h4>
                                    <div class="card-title float-right"><a href="about_all_standards.php"
                                            class="btn btn-primary btn-sm">View List</a></div>
                                    <div class="clearfix"></div>
                                    <?php
                                 $msg = $_GET['msg'];
                                 if($msg == 'faile'){?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bs-component">
                                                <div class="alert alert-dismissible alert-danger">
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Standard details already exist.
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
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Standard details not saved.
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
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Standard details successfully
                                                    saved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                        <div class="expert-repeat" style="padding-top: 10px;">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Section</label>
                                                        <select  name="sections" id="inputstandards" class="form-control" required="">
                                                            <option></option>
                                                            <option value="On Farm Production">On Farm Production</option>
                                                            <option value="Post Harvesting Processing">Post Harvesting Processing</option>
                                                            <option value="Sustainable Initiatives">Sustainable Initiatives</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Standard</label>
                                                        <select name="standards" id="inputsgsw" class="form-control" required="">
                                                            <option value="">Please Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Documents Source</label>
                                                        <div class="input-group col-xs-12">
                                                            <input name="DocumentsSource" type="text" class="form-control" id="" placeholder="Documents Source">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Upload Documents </label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="file" name="documents" style="display: block;width: 100%;height: 2.875rem;padding: 0.875rem 1.375rem;font-size: 0.875rem;font-weight: 400;line-height: 1;color: #495057;background-color: #ffffff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: 2px;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                                        </div>
                                                    </div>
                                                    <!-- <script type="text/javascript">
                                                        jQuery(function ($) {
                                                            $('#file_input').multifile();
                                                        });
                                                    </script> -->
                                                </div>
                                            </div>
                                            <div id="content"></div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                    <?php 
                                        if(isset($_POST['sections']) && isset($_POST['standards']) && isset($_POST['DocumentsSource']) && isset($_FILES['documents']))
                                        {
                                            $sections = $_POST['sections'];
                                            $standards = $_POST['standards'];
                                            $doc = $_FILES['documents']['name'];
                                            $doc_temp =  $_FILES['documents']['tmp_name'];
                                            move_uploaded_file($doc_temp,"../about_standard_docs/".$doc);

                                            $DocumentsSource = $_POST['DocumentsSource'];

                                            $standard = "INSERT INTO `all_standards_about` SET SectionName='$sections',StandardName='$standards',DocumentName='$DocumentsSource',Document='$doc',DeletedStatus='0'";
                                            $execute = mysqli_query($db,$standard);
                                            if($execute == TRUE)
                                            {
                                                echo "<script>alert('Add Successfully')</script>";
                                                echo '<meta http-equiv="refresh" content="0;URL=about_all_standards.php">';
                                            }
                                            else
                                            {
                                                echo "<script>alert('Can't Add Try Again')</script>";
                                            }
                                            

                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                            Good Agricultural Practices All rights reserved. </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Developed by
                            <a href="https://aretesoftwares.com" target="_blank">Aretesoftwares.com</a></span>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript">
         var OnFarmProduction = ["IndG.A.P", "GLOBALG.A.P", "Organic NPOP", "Organic NOP"];
         
         var PostHarvestingProcessing = ["ISO 22000", "FSSC 22000", "BRC Global Standard Packaging 6", "BRC Global Standard Food Safety 9"];
         
         var SustainableInitiatives = ["ISO 14001- Environment", "ISO 50001- Energy Management", "ISO 45001 OH&S Mgt Systems", "SA 8000- Social Accountability", "Rainforest Alliance", "Fair Trade Certified"];
         
         $("#inputstandards").change(function() {
         
         var StateSelected = $(this).val();
         
         var optionsList;
         
         var htmlString = "";
         switch (StateSelected) {
         
         case "On Farm Production":
         
            optionsList = OnFarmProduction;
         
            break;
         
         case "Post Harvesting Processing":
         
            optionsList = PostHarvestingProcessing;
         
            break;
         
         case "Sustainable Initiatives":
         
            optionsList = SustainableInitiatives;
         
            break;
         
         }
         for (var i = 0; i < optionsList.length; i++) {
         htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
         }
         $("#inputsgsw").html(htmlString);
         });
         </script>

</body>

</html>