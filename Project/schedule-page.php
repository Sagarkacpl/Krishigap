<?php
session_start();
error_reporting(0);
include "connection.php";
include "most_visited_page.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Good Agricultural Practices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.4.2.js"></script>

</head>

<body>
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <?php include "navbar.php"; ?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Schedule</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <a href="index.php" class="btn btn-success btn-sm">Home</a>
                            &nbsp;
                            <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                        </ol>
                        <!-- <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="text-heading">
        <h3 class="text-center">View Skill Development Program Schedule</h3>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <form action="schedule-page.php" method="GET">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <h5>Course Type</h5>
                        <div class="form-floating">
                            <select class="form-control" name="Course_type" id="Course" required>
                                <option value="0">Course Type</option>
                                <option <?php if($_GET['Course_type']=="UpcomingCourse" ) { echo "selected" ; } ?> value="UpcomingCourse">Upcoming Course</option>
                                <option <?php if($_GET['Course_type']=="CompletedCourse" ) { echo "selected" ; } ?> value="CompletedCourse">Completed Course</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="Years">
                        <h5>Year</h5>
                        <div class="form-floating">
                            <select class="form-control" name="Year" required="" id="Year">
                                <option value="">Select Year</option>
                                <?php
                                 $year = "SELECT YEAR(StartDate) `year` FROM schedule WHERE EndDate < CURDATE() GROUP BY YEAR(StartDate)";
                                 $year_exe = mysqli_query($db, $year);
                                 while ($fetch_year = mysqli_fetch_assoc($year_exe)) {
                                     $selectyear = $fetch_year['year']; ?>
                                <option <?php if ($_GET['Year']==$selectyear) { echo "selected" ; } ?> value="<?php echo $fetch_year['year']; ?>"><?php echo $fetch_year['year']; ?>
                                </option>
                                <?php
                                 } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="Months">
                        <h5>Month</h5>
                        <div class="form-floating">
                            <select name="Month" class="form-control" required="" id="Month">
                                <?php if (isset($_GET['Month']) AND $_GET['Month'] != '') { ?>
                                <option value="">Select Month</option>
                                <option <?php if ($_GET['Month']=='00' ) { echo "selected" ; } ?> value="00">All
                                </option>
                                <?php
                                 $query = "SELECT MONTH(StartDate) `Month`, YEAR(StartDate) `year` FROM schedule WHERE EndDate < CURDATE() AND YEAR(StartDate)='$_GET[Year]' GROUP BY MONTH(StartDate),YEAR(StartDate)";
                                 $result = mysqli_query($db, $query);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($row = mysqli_fetch_assoc($result)) {
                                         $month = date($row['Month']);
                                         $dateObj = DateTime::createFromFormat('!m', $month);
                                         $monthName = $dateObj->format('F');
                                         $string = $monthName;
                                         $month_number = date("n", strtotime($string)); ?>
                                <option <?php if ($_GET['Month']==$month_number) { echo "selected" ; } ?> value="<?php echo $month_number; ?>" ><?php echo $monthName; ?>
                                </option>
                                <?php
                                 }
                                 }
                                 ?>
                                <?php
                                 } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="search_btn">
                        <h5 style="font-size: 19px;"></h5>

                        <button class="btn btn-primary w-100 py-3 mt-4" name="result" type="submit">Show Result</button>
                    </div>
                </div>
            </form>
            <?php
                    // if(isset($_POST['result']))
                    // {
                    //     $Year = $_POST['Year'];
                    //     $startdate = $_POST['startdate'];

                    //     if($Year =='Upcoming Course')
                    //     {
                    //         echo "Upcoming Course";
                    //     }
                    // }
                ?>

            <div class="row g-5 mt-5">
                <?php
                    if(isset($_GET['Year']) AND isset($_GET['Month']) AND isset($_GET['Course_type']) AND $_GET['Course_type']  == 'CompletedCourse' )
                    {
                ?>
                <h3 class='text-center' id="refer_link"><a href='skill-development-page.php' target='_blank'>Refer to Skill Development Histroy</a></h3>
                <?php } ?>


                <!-- <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    <div class="schedule-re">
                        <ul>
                            <li><strong>Course</strong></li>
                            <li><a href="CourseDetails.php">Awareness on Basic Food Hygenie</a></li>
                            <li><strong>Topic Covered</strong></li>
                            <li>Food Hygiene</li>
                            <li><strong>Start Date</strong> &nbsp; - &nbsp; <strong>End Date</strong></li>
                            <li>24 Sep 2022 &nbsp; - &nbsp; 24 Sep 2022</li>
                            <li><strong>No of days</strong></li>
                            <li>1 Days</li>
                            <li><strong>Course Details</strong></li>
                            <li><a href="CourseDetails.php">View Course Details</a> </li>
                            <li><a href="CourseAmountPay.php" class="btn btn-outline-success mt-3">Register</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    <div class="schedule-re">
                        <ul>
                            <li><strong>Course Name</strong></li>
                            <li><a href="CourseDetails.php">HACCP Principles</a></li>
                            <li><strong>Place </strong></li>
                            <li>Awareness course on Basic Food Hygenie </li>
                            <li><strong>Start Date</strong></li>
                            <li>24 Sep 2022</li>
                            <li><strong>End Date</strong></li>
                            <li>24 Sep 2022</li>
                            <li><strong>Course Details</strong></li>
                            <li><a href="CourseDetails.php">View Course Details</a> </li>
                            <li><strong>Faculty Name</strong></li>
                            <li>Test </li>
                            <li><strong>Faculty Profile</strong></li>
                            <li>N/A</li>
                            <li><strong>Faculty Organization</strong></li>
                            <li>ALS Testing Services India Pvt Ltd</li>
                            <li><strong>Participant Dees</strong></li>
                            <li>150/-</li>
                            <li><strong>No of Days</strong></li>
                            <li>20 Days </li>
                            <li><a href="CourseAmountPay.php" class="btn btn-outline-success mt-3">Register</a></li>
                        </ul>
                    </div>
                </div> -->
                <!--<h3 class="text-center">Comming Soon</h3>-->
                <div id="ImportantNotice">

                </div>


                <?php
                $select = "SELECT * FROM `schedule` WHERE EndDate > CURRENT_DATE AND DeletedStatus='0'";
                $execute = mysqli_query($db, $select);
                while ($fetch = mysqli_fetch_assoc($execute)) {
                    // Start Date Format
                    $StartDate = date_create($fetch['StartDate']);
                    $Date = date_format($StartDate, "d M Y");
                    // End Date Format
                    $EndDate = date_create($fetch['EndDate']);
                    $End_Date = date_format($EndDate, "d M Y");
                    ?>
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="schedule-re">
                        <ul>
                            <li><strong>Course</strong></li>
                            <li>
                                <a href="CourseDetails.php">
                                    <?php echo $fetch['Course']; ?>
                                </a>
                            </li>
                            <li><strong>Topic Covered</strong></li>
                            <li>
                                <?php echo $fetch['TopicCovered']; ?>
                            </li>
                            <li><strong>Start Date</strong> &nbsp; - &nbsp; <strong>End Date</strong>
                            </li>
                            <li>
                                <?php echo $Date; ?> &nbsp; - &nbsp;
                                <?php echo $End_Date; ?>
                            </li>
                            <!--<li><strong>End Date</strong></li>-->
                            <!--<li>-->
                            <!--    <?php echo $End_Date; ?>-->
                            <!--</li>-->
                            <li><strong>No of days</strong></li>
                            <li>
                                <?php
                                $start = strtotime($Date);
                                $End = strtotime($End_Date);
                                $datediff = $End - $start;
                                    echo $number = floor($datediff/(60*60*24)+1) . "\n";
                                ?> Days
                            </li>

                            <li><strong>Course Details</strong></li>
                            <li><a href="CourseDetails.php">View Course Details</a> </li>

                            <li><a href="CourseAmountPay.php" class="btn btn-outline-success mt-3">Register</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>

        $(function () {

            $("#Course").on('change', function () {
                var langauge = this.value;
                var month = $('#monthSelect').val();
                var year = $('#yearSelect').val();

                if (langauge == "UpcomingCourse") {
                    $("#ImportantNotice").html("<center><img src='img/coming-soon-img.png' style='width: 37%;'</center>");
                    $('#Months').hide();
                    $('#Years').hide();
                    $('#linkToShow').hide();
                    $('#refer_link').hide();
                    $('#search_btn').hide();
                }
                // else if(langauge=="CompletedCourse")
                // {
                //     $("#ImportantNotice").html("<h3 class='text-center'><a href='skill-development-page.php' target='_blank'>Refer to Skill Development Histroy</a></h3>");
                //     $('#months').show();
                // }


                else {
                    $("#ImportantNotice").html('');
                    $('#Months').show();
                    $('#Years').show();
                    $('#refer_link').show();
                    $('#search_btn').show();
                }
            });

        });

    </script>
    <script>
         $(document).ready(function() {
             $("#Year").on('change', function() {
                 var year = $(this).val();
                $.ajax(
                    {
                        method: "POST",
                        url: "skill_dev_dropdown.php",
                        data: {
                            id: year
                        },
                        datatype: "html",
                        success: function(data) {
                            $("#Month").html(data);
                        }
                    }
                 );
             });
         });
      </script>
</body>

</html>