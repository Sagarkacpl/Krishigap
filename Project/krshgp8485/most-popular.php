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
//    $query = mysqli_query($db, "SELECT * from plant_nutritional_management where DeletedStatus='0' ORDER BY plant_nutritional_management_id DESC");
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

    .table> :not(caption)>*>* {
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

    .table td,
    .jsgrid .jsgrid-table td {
        font-size: 10px;
    }


    .form-control,
    .asColorPicker-input,
    .dataTables_wrapper select,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text],
    .jsgrid .jsgrid-table .jsgrid-filter-row select,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number],
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--single .select2-search__field,
    .typeahead,
    .tt-query,
    .tt-hint {
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
            <?php include "navbar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h4 class="card-title float-left">Short Stories
                                    </h4>
                                    <!-- <div class="card-title float-right">
                                        <a href="short-story-add.php"
                                            class="btn btn-primary btn-sm" style="padding: 0.4rem 1rem;">Add New</a>
                                    </div> -->
                                    <div class="clearfix"></div>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-centered mb-0"
                                            style="width: 100% !important;">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Most Popular Courses</th>
                                                    <th>Edit/Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select = "SELECT * FROM `most_popular_course`";
                                                $execute = mysqli_query($db, $select);
                                                $count = 1;
                                                $read = mysqli_fetch_assoc($execute);
                                                ?>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <?php echo $count; ?>
                                                        </p>
                                                    </td>
                                                    <td style="text-align: justify;">
                                                        <?php echo $read['popular_course']; ?>
                                                    </td>

                                                    <td>
                                                        <a onclick="return confirm('Are you sure want to edit?')"
                                                            href="most-popular-edit.php?id=<?php echo $read['Id']; ?>"
                                                            class="badge badge-success"><i
                                                                class="ti-pencil btn-icon-prepend"></i>&nbsp; Edit</a>
                                                    </td>

                                                </tr>
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