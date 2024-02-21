<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
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
            <form action="schedule-page_PHP.php" method="post">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <h5>Course Type</h5>
                        <div class="form-floating">
                            <select class="form-control" name="Year" id="Course" required>
                                <option value="">Course Type</option>
                                <option value="UpcomingCourse">Upcoming Course</option>
                                <option value="RunningCourse">Running Course</option>
                                <option value="Completed Course">Completed Course</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>Months</h5>
                        <div class="form-floating">
                            <select name="Month" class="form-control" required="">
									<option value="">Select Month</option>
								
									<?php
									 $db_month = "SELECT  MONTH(StartDate) `Month` FROM schedule_PHP WHERE EndDate < CURDATE() GROUP BY MONTH(StartDate)";
									$execute = mysqli_query($db, $db_month);
									while ($fetch = mysqli_fetch_assoc($execute)) {
										$month = date($fetch['Month']);
										$dateObj = DateTime::createFromFormat('!m', $month);
										$monthName = $dateObj->format('F');
										$string = $monthName;
										$month_number = date("n", strtotime($string));
										?>
										<option <?php if ($_GET['Month'] == $month_number) {
											echo "selected";
										} ?>
											value="<?php echo $month_number; ?>"><?php echo $monthName; ?></option>
									<?php } ?>
								</select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 style="font-size: 19px;"></h5>

                        <button class="btn btn-primary w-100 py-3 mt-4" name="result" type="submit">Show Result</button>
                    </div>
                </div>
            </form>
            <div class="row g-5 mt-5">
                <div id="ImportantNotice">
               
                </div>
                <?php
                $select = "SELECT * FROM `schedule_PHP` WHERE EndDate > CURRENT_DATE AND DeletedStatus='0'";
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
                            <a href="CourseDetails.php"><?php echo $fetch['Course']; ?></a>
                            </li>
                            <li><strong>Topic Covered</strong></li>
                            <li>
                                <?php echo $fetch['TopicCovered']; ?>
                            </li>
                            <li><strong>Start Date</strong> &nbsp; - &nbsp; <strong>End Date</strong>
                            </li>
                            <li>
                                <?php echo $Date; ?>  &nbsp; - &nbsp; <?php echo $End_Date; ?>
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
                            <li><a href="CourseDetails_PHP.php">View Course Details</a> </li>
                           
                            <li><a href="CourseAmountPay_PHP.php" class="btn btn-outline-success mt-3">Register</a></li>
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
            if (langauge == "UpcomingCourse") {
               $("#ImportantNotice").html("<center><img src='img/coming-soon-img.png' style='width: 37%;'</center>");
            }
            else if (langauge == "RunningCourse") {
               $("#ImportantNotice").html("<center><img src='img/coming-soon-img.png' style='width: 37%;'</center>");
            }
            else {
               $("#ImportantNotice").html('');
            }
         });
      });
   </script>
</body>
</html>