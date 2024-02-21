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
   $select = "SELECT * FROM `event` WHERE DeletedStatus='0' and Id='$id'";
   $exe = mysqli_query($db,$select);
   $read = mysqli_fetch_assoc($exe);
//    if (isset($_POST["others"])) {
//        foreach ($_POST["others"] as $key => $other) {
//          $NewsTitle = mysqli_real_escape_string($db, $other["NewsTitle"]);
//          $NewsLine = mysqli_real_escape_string($db, $other["NewsLine"]);
//          $NewsLink = mysqli_real_escape_string($db, $other["NewsLink"]);
//          $Date = $other["Date"];
//            $query2 = mysqli_query($db, "INSERT INTO `news` (`NewsID`, `NewsTitle`, `NewsLine`, `NewsLink`, `Date`, `DeletedStatus`, `CreatedDate`) VALUES (NULL, '$NewsTitle', '$NewsLine', '$NewsLink', '$Date', '0', current_timestamp());");
//        }
//        header("Location:news.php?msg=success");
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
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
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
                                    <h4 class="card-title float-left">Events</h4>
                                    <div class="card-title float-right"><a href="events.php"
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
                                                        data-dismiss="alert">×</button>News details already exist.
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
                                                        data-dismiss="alert">×</button>News details not saved.
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
                                                        data-dismiss="alert">×</button>News details successfully saved.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <form class="forms-sample" enctype='multipart/form-data' method="POST">
                                        <div class="expert-repeat mainbox1">
                                            <!-- <a href="javascript:void(0)" class="btn btn-success btn-icon-text add-more-expert" onclick="addRow1()">
                                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                                    Add More
                                    </a> -->
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Date</label>
                                                        <input name="Date" type="date" class="form-control" value="<?php echo $read['Event_Date']; ?>" placeholder="Enter Date" required="">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">News Title</label>
                                                        <input name="NewsTitle" type="text" value="<?php echo $read['Event_Title']; ?>" class="form-control" id="" placeholder="Enter Title" required="">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Image</label>
                                                        <input type="file" class="form-control" name="img" id="">
                                                        <a href="../EventsImages/<?php echo $read['Event_img'] ?>" target="_blank">View Image</a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">News Description</label>
                                                        <textarea name="Description" class="form-control" id="editor1" required><?php echo $read['Event_Desc'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="content1"></div>
                                        <div class="col-12">
                                            <button type="submit" name="submit"
                                                class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                    <?php 
                                if(isset($_POST['submit']))
                                {
                                    $Date = mysqli_real_escape_string($db,$_POST['Date']);
                                    $NewsTitle = mysqli_real_escape_string($db,$_POST['NewsTitle']);
                                    $Description = mysqli_real_escape_string($db,$_POST['Description']);
                                    $Event_img = $_FILES['img']['name'];
                                    $Event_img_temp = $_FILES['img']['tmp_name'];
                                    move_uploaded_file($Event_img_temp,"../EventsImages/".$Event_img);
                                    if($Event_img=="")
                                    {
                                        $pics=$read['Event_img'];
                                    }
                                    else{
                                        $pics=$Event_img;
                                    }

                                    $event = "UPDATE `event` SET Event_Date='$Date',Event_Title='$NewsTitle',Event_Desc='$Description',Event_img='$pics' WHERE Id='$id'";
                                    $execute = mysqli_query($db,$event);
                                    if($execute == TRUE)
                                    {
                                        echo "<script>alert('Update Event Successfully')</script>
                                            <script>window.location.href = 'events.php'</script>";
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
        function addRow1() {
            var count = 1;
            count = count + $('.expert-repeat').length;
            document.querySelector('#content1').insertAdjacentHTML(
                'afterbegin',
                `<div class="expert-repeat mainbox` + count + `" id="content1">
   <a href="javascript:void(0)" class="btn btn-danger btn-icon-text add-more-expert" onclick="removeRow1(this)">
   <i class="ti-minus btn-icon-prepend"></i>                                                    
   Remove
   </a>
   <div class="row">
      <div class="col-6">
         <div class="form-group">
            <label for="">Date</label>
            <input name="others[`+ count + `][Date]" type="date" class="form-control" id="" placeholder="Enter Date" required="">
         </div>
      </div>
      <div class="col-6">
         <div class="form-group">
            <label for="">News Title</label>
            <input name="others[`+ count + `][NewsTitle]" type="text" class="form-control" id="" placeholder="Enter Title" required="">
         </div>
      </div>
      <div class="col-6">
         <div class="form-group">
            <label for="">News Line</label>
            <input name="others[`+ count + `][NewsLine]" type="text" class="form-control" id="" placeholder="Enter News Line" required="">
         </div>
      </div>
      <div class="col-6">
         <div class="form-group">
            <label for="">News Link</label>
            <input name="others[`+ count + `][NewsLink]" type="text" class="form-control" id="" placeholder=" EnterNews Link" required="">
         </div>
      </div>
   </div>
</div>`
            )
        }
        function removeRow1(input) {
            input.parentNode.remove()
        }
    </script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
</body>

</html>