<?php
   session_start();
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
                                    <h4 class="card-title float-left" style="margin-top: 7px;">Add Schedule</h4>
                                    <div class="card-title float-right">
                                        <a href="manage_schedule.php" class="btn btn-primary btn-sm">View List</a>
                                    </div>
                                    <div class="clearfix" style="margin-top: 50px;margin-bottom: 30px;"></div>
                                    <?php
                                        $msg = $_GET['msg'];
                                        if($msg == 'faile'){
                                    ?>
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
                                    <?php } 
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
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Course</label>
                                                        <input type="text" name="course" class="form-control"
                                                            placeholder="Course Name">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Topic Covered</label>
                                                        <input type="text" name="coveredtopic" class="form-control"
                                                            placeholder="Topic Covered">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Start Date</label>
                                                        <input type="date" name="StartDate" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Timing</label>
                                                        <input type="time" name="StartTime" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">End Date</label>
                                                    <input type="date" name="EndDate" id="" class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Duration in Hours <span
                                                                class="text-danger">(hh:mm:ss)</span></label>
                                                        <input type="text" name="Duration" id="" class="form-control"
                                                            pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="00:00:00"
                                                            title="Write a duration in the format hh:mm:ss:ms"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Registered Trainees</label>
                                                        <input type="text" name="RegisteredTrainees" id="" class="form-control" placeholder="Registered Trainees">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Faculty Organization</label>
                                                        <input type="text" name="FacultyOrganization" id="" class="form-control" placeholder="Faculty Organization">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Faculty Name</label>
                                                        <input type="text" name="FacultyName" id="" class="form-control"
                                                            placeholder="Faculty Name">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Organization Respresented</label>
                                                        <input type="text" name="FacultyProfile" id="" class="form-control"
                                                            placeholder="Organization Respresented">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Feedback</label>
                                                        <input type="text" name="Feedback" id="" class="form-control" placeholder="Feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Trainee Certificate</label>
                                                        <input type="file" name="certificates" class="form-control"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                    </form>
                                    <?php 
                                        if(isset($_POST['submit']))
                                        {
                                            // $Mode = $_POST['Mode'];
                                            // $Fees = $_POST['Fees'];
                                            // $Register = $_POST['Register'];
                                            // $OrganizationRespresented = $_POST['OrganizationRespresented'];
                                            // $Subject = $_POST['Subject'];
                                            $course = $_POST['course'];
                                            $coveredtopic = $_POST['coveredtopic'];
                                            $StartDate = $_POST['StartDate'];
                                            $StartTiming = $_POST['StartTime'];
                                            $EndDate = $_POST['EndDate'];
                                            $Duration = $_POST['Duration'];
                                            $FacultyOrganization = $_POST['FacultyOrganization'];
                                            $FacultyName = $_POST['FacultyName'];
                                            $FacultyProfile = $_POST['FacultyProfile'];
                                            $Feedback = $_POST['Feedback'];
                                            $RegisteredTrainees = $_POST['RegisteredTrainees'];

                                            $certificates = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES['certificates']['name'];
                                            // $certificates_tmp = $_FILES['certificates']['tmp_name'];
                                            $file_type = pathinfo($certificates, PATHINFO_EXTENSION);
                                            if ($file_type == 'pdf' || $file_type == 'doc') {
                                                
                                                move_uploaded_file($_FILES['certificates']['tmp_name'],"../certificates/".basename($certificates));
                                              echo  $schedule = "INSERT INTO `schedule` (`Id`, `Course`, `Subject`, `TopicCovered`, `Mode`, `StartDate`, `StartTiming`, `EndDate`, `Duration`, `RegisteredTrainees`, `OrganizationRespresented`, `FacultyOrganization`, `FacultyName`, `FacultyProfile`, `Fees`, `Register`, `Feedback`, `Trainee_Certificate`, `Course_Type`, `DeletedStatus`, `Created_Date`) VALUES (NULL, '$course', NULL, '$coveredtopic', NULL, '$StartDate', '$StartTiming', '$EndDate', '$Duration', '$RegisteredTrainees', NULL, '$FacultyOrganization', '$FacultyName', '$FacultyProfile', NULL, NULL, '$Feedback', '$certificates', NULL, '0', current_timestamp())";
                                                $execute = mysqli_query($db,$schedule);
                                                if($execute == TRUE)
                                                {
                                                    echo "<script>alert('Data Save Successfully')</script>";
                                                    echo "<script>window.location.href='manage_schedule.php'</script>";
                                                }
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
</body>

</html>