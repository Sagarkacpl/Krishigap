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

   $id = $_GET['id'];
   $select = "SELECT * FROM `schedule` WHERE Id='$id'";
   $exe = mysqli_query($db,$select);
   $read = mysqli_fetch_assoc($exe);

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
                                    <h4 class="card-title float-left" style="margin-top: 7px;">Edit Skill Development</h4>
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
                                                        <input type="text" name="course" value="<?php echo $read['Course']; ?>" class="form-control"
                                                            placeholder="Course Name">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Subject</label>
                                                        <input type="text" name="Subject" class="form-control"
                                                            placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Topic Covered</label>
                                                        <input type="text" name="coveredtopic" value="<?php echo $read['TopicCovered']; ?>" class="form-control"
                                                            placeholder="Topic Covered">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Mode</label>
                                                        <select class="form-control" name="Mode">
                                                            <option selected>--Select Mode--</option>
                                                            <option value="Online">Online</option>
                                                            <option value="Offline">Offline</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Course Link</label>
                                                            <input type="url" name="CourseLink" class="form-control" placeholder="Course Link">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input type="text" name="Address" class="form-control" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Start Date</label>
                                                        <input type="date" name="StartDate" value="<?php echo $read['StartDate']; ?>" class="form-control">
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
                                                    <input type="date" name="EndDate"  value="<?php echo $read['EndDate']; ?>" id="" class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Duration in Hours <span
                                                                class="text-danger">(hh:mm:ss)</span></label>
                                                        <input type="text" name="Duration" value="<?php echo $read['Duration']; ?>" class="form-control"
                                                            pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="00:00:00"
                                                            title="Write a duration in the format hh:mm:ss:ms"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Registered Trainees</label>
                                                        <input type="text" name="RegisteredTrainees" value="<?php echo $read['RegisteredTrainees']; ?>" class="form-control" placeholder="Registered Trainees">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Organization Respresented</label>
                                                        <input type="text" name="OrganizationRespresented" id="" class="form-control" placeholder="Organization Respresented">
                                                    </div>
                                                </div> -->
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Faculty Organization</label>
                                                        <input type="text" name="FacultyOrganization" value="<?php echo $read['FacultyOrganization']; ?>" class="form-control" placeholder="Faculty Organization">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Faculty Name</label>
                                                        <input type="text" name="FacultyName" value="<?php echo $read['FacultyName']; ?>" class="form-control"
                                                            placeholder="Faculty Name">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Organization Respresented</label>
                                                        <input type="text" name="FacultyProfile" value="<?php echo $read['FacultyProfile']; ?>" class="form-control"
                                                            placeholder="Organization Respresented">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Fees</label>
                                                        <input type="number" name="Fees" id="" class="form-control"
                                                            placeholder="Fees">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Register</label>
                                                        <input type="text" name="Register" id="" class="form-control" placeholder="Register">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Feedback</label>
                                                        <input type="text" name="Feedback" value="<?php echo $read['Feedback']; ?>" class="form-control" placeholder="Feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Trainee Certificate</label>
                                                        <input type="file" name="certificates" class="form-control">
                                                            <p><a href="../certificates/<?php echo $read['Trainee_Certificate']; ?>" target="_blank"><img src="../img/pdf.png" alt="" style="width: 36px;height: 44px;border-radius: 0%!important;"></a></p>
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
                                            $course = $_POST['course'];
                                            $coveredtopic = $_POST['coveredtopic'];
                                            $Mode = $_POST['Mode'];
                                            $StartDate = $_POST['StartDate'];
                                            $StartTiming = $_POST['StartTime'];
                                            $EndDate = $_POST['EndDate'];
                                            $Duration = $_POST['Duration'];
                                            $FacultyOrganization = $_POST['FacultyOrganization'];
                                            $FacultyName = $_POST['FacultyName'];
                                            $FacultyProfile = $_POST['FacultyProfile'];
                                            $Fees = $_POST['Fees'];
                                            $Register = $_POST['Register'];

                                            $Feedback = $_POST['Feedback'];
                                            // $OrganizationRespresented = $_POST['OrganizationRespresented'];
                                            $RegisteredTrainees = $_POST['RegisteredTrainees'];
                                            // $Subject = $_POST['Subject'];

                                            $certificates = $_FILES['certificates']['name'];
                                            $certificates_tmp = $_FILES['certificates']['tmp_name'];
                                            $file_type = pathinfo($certificates, PATHINFO_EXTENSION);

                                            
                                                move_uploaded_file($certificates_tmp,"../certificates/".basename($certificates));
                                                if($img == "")
                                                {
                                                    $New_Certificates =$read['Trainee_Certificate'];
                                                }
                                                else{
                                                    $New_Certificates = $img;
                                                }
                                                $schedule = "UPDATE `schedule` SET Course='$course',TopicCovered='$coveredtopic',Mode='$Mode',StartDate='$StartDate',StartTiming='$StartTiming',EndDate='$EndDate',Duration='$Duration',FacultyOrganization='$FacultyOrganization',FacultyName='$FacultyName',FacultyProfile='$FacultyProfile',Fees='$Fees',Register='$Register',RegisteredTrainees='$RegisteredTrainees',Feedback='$Feedback',Trainee_Certificate='$New_Certificates',DeletedStatus='0', WHERE Id='$id'";
                                                $execute = mysqli_query($db,$schedule);
                                                if($execute == TRUE)
                                                {
                                                    echo "<script>alert('Record Successfully Update')</script>";
                                                    echo "<script>window.location.href='skill_dev_internalPage.php'</script>";
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