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
//    $query11 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
//    if (isset($_POST["StandardCategory"]) && isset($_POST["GAPStandardWise"]) && isset($_POST["Crop"]) && isset($_POST["User"]) && isset($_POST["Documents"]) && isset($_POST["SourceLink"])) {
//        $StandardCategory = mysqli_real_escape_string($db, $_POST["StandardCategory"]);
//        $GAPStandardWise = mysqli_real_escape_string($db, $_POST["GAPStandardWise"]);
//        $Crop = mysqli_real_escape_string($db, $_POST["Crop"]);
//        $User = mysqli_real_escape_string($db, $_POST["User"]);
//        $Documents = mysqli_real_escape_string($db, $_POST["Documents"]);
//        $Remark = mysqli_real_escape_string($db, $_POST["Remark"]);
//        $DocumentsSource = mysqli_real_escape_string($db, $_POST["DocumentsSource"]);
//        $SourceLink = mysqli_real_escape_string($db, $_POST["SourceLink"]);
//            $query = mysqli_query($db, "INSERT INTO `food_safety_standards` (`FoodSafetyStandardsId`, `StandardCategory`, `GAPStandardWise`, `Crop`, `Documents`, `User`, `sort`, `Remark`, `DocumentsSource`, `SourceLink`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$StandardCategory', '$GAPStandardWise', '$Crop', '$Documents', '$User', '0', '$Remark', '$DocumentsSource', '$SourceLink', '0', current_timestamp());");
//            $FoodSafetyStandardsId = $db->insert_id;
//            if ($query) {
//             for ($i = 0;$i < count($_FILES["documents"]["name"]);$i++) {
//                $documents1 = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["documents"]["name"][$i];
//                $documents = str_replace(",","","$documents1");
//                if ($_FILES["documents"]["name"][$i] != '') {
//                    if(move_uploaded_file($_FILES["documents"]["tmp_name"][$i], "../Food-Safety-Standards/" . $documents)){
//                    $query1 = mysqli_query($db, "INSERT INTO `food_safety_standards_documents` (`food_safety_standards_documents_id`, `FoodSafetyStandardsId`, `documents_name`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$FoodSafetyStandardsId', '$documents', '0', current_timestamp());");
//                 }
//                }
//            } 
//                header("Location:Food-Safety-Standards-add.php?msg=success");
//            } else {
//                header("Location:Food-Safety-Standards-add.php?msg=fail");
//            }
//    } 
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
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.multifile.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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

        .mup {
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
</head>

<body>
    <div class="container-scroller">
        <?php include "header.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include "module_training_navbar.php";?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title float-left" style="margin-top: 7px;">Add Faculty List</h4>
                                    <div class="card-title float-right">
                                        <a href="faculty_details.php" class="btn btn-primary btn-sm">View List</a>
                                    </div>
                                    <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                                    <?php
                              $msg = $_GET['msg'];
                              if($msg == 'faile'){?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bs-component">
                                                <div class="alert alert-dismissible alert-danger">
                                                    <button class="close" type="button"
                                                        data-dismiss="alert">×</button>Food Safety Standards details
                                                    already exist.
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
                                                        data-dismiss="alert">×</button>Food Safety Standards details not
                                                    saved.
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
                                                        data-dismiss="alert">×</button>Food Safety Standards details
                                                    successfully saved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                        <div class="expert-repeat" style="padding-top: 10px;">
                                            <div class="row">
                                                <!-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Profile Pic</label>
                                                        <input type="file" name="Profile" class="form-control" required="">
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="Name" class="form-control" placeholder="Name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input type="text" name="Address" class="form-control" required="" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Contact No.</label>
                                                        <input type="text" name="Contact" id="" class="form-control" required="" placeholder="Contact">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" name="Email" id="" class="form-control" required="" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Course</label>
                                                        <input type="text" name="Course" id="" class="form-control" required="" placeholder="Course">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Subject</label>
                                                        <input type="text" name="Subject" id="" class="form-control" required="" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Feedback</label>
                                                        <input type="text" name="Feedback" id="feedback" class="form-control" required="" placeholder="Feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Organization</label>
                                                        <input type="text" name="Organization" id="organization" class="form-control" required="" placeholder="Organization">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">No. of Trainings conducted subject wise</label>
                                                        <input type="number" name="TrainingsConducted" id="" class="form-control" required="" placeholder="No. of Trainings conducted subject wise">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="submit" class="btn btn-primary mr-2"
                                                    name="submit">Submit</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['submit']))
                                        {
                                            $Name = $_POST['Name'];
                                            $Address = $_POST['Address'];
                                            $Contact = $_POST['Contact'];
                                            $Email = $_POST['Email'];
                                            $Course = $_POST['Course'];
                                            $Subject = $_POST['Subject'];
                                            $TrainingsConducted = $_POST['TrainingsConducted'];
                                            $Feedback_faculty = $_POST['Feedback'];
                                            $Organization_faculty = $_POST['Organization'];

                                            $faculty_details = "INSERT INTO `faculty_details` SET Name='$Name',Address='$Address',Contact='$Contact',Email='$Email',Course='$Course',Subject='$Subject',TrainingsConducted='$TrainingsConducted',Feedback='$Feedback_faculty',Organization='$Organization_faculty'";
                                            $execute = mysqli_query($db,$faculty_details);
                                            if($execute == TRUE)
                                            {
                                                echo "<script>alert('New Faculty Add Successfully')</script>";
                                                echo "<script>window.location.href= 'faculty_details.php'</script>";
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
    <script>
                        CKEDITOR.replace( 'feedback' );
                        CKEDITOR.replace( 'organization' );
                </script>
</body>

</html>