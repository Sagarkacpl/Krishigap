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
if ($_SESSION['UID'] == '') {
    if($_GET['page'] != ''){
       header("Location: login.php?page=$_GET[page]"); 
    }else{
      header("Location: login.php"); 
    }
   }
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
    <link href="lib/owlcarousel/assets/owl.theme.default.min" rel="stylesheet">
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
    <?php include "navbar.php";?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Skill Development</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Skill</li>
                        </ol>
                        <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.3s" style="padding: 0px 200px;">
                    <h1 class="mb-4">Short Story</h1>
                    <?php 
                        $story = "SELECT * FROM `training_module_short_story_SI`";
                        $StoryExe = mysqli_query($db,$story);
                        $ShortStory = mysqli_fetch_assoc($StoryExe);
                    ?>
                    <p class="mb-4" style="text-align: justify;">
                        <?php echo $ShortStory['ShortStory'] ?>
                    </p>
                    <p>
                        <!--<a href="#" class="btn btn-primary">Learn More</a>-->
                    </p>
                </div>
                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.3s" style="padding: 0px 154px;">
                    <h1 class="mb-4">Faculty</h1>
                    <?php 
                        $story = "SELECT * FROM `faculty_SI`";
                        $StoryExe = mysqli_query($db,$story);
                        $ShortStory = mysqli_fetch_assoc($StoryExe);
                    ?>
                    <p class="mb-4">
                        <?php echo $ShortStory['OurFaculty'] ?>
                    </p>
                    <!--<p>-->
                    <!--    <a href="faculty-list.php" class="btn btn-primary">Learn More</a>-->
                    <!--</p>-->
                </div>
                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Most Popular Courses</h1>
                    <div class="row g-5">
                        <div class="owl-carousel">
                            <?php
                        $schedule = "SELECT * , EXTRACT(YEAR FROM StartDate) AS Year, EXTRACT(MONTH FROM StartDate) AS Month FROM `schedule_SI` WHERE EndDate > CURDATE() AND DeletedStatus='0'";
                        $exe = mysqli_query($db, $schedule);
                        while ($read = mysqli_fetch_assoc($exe)) {
                        // Start Date Format
                        $StartDate = date_create($read['StartDate']);
                        $Date = date_format($StartDate, "d M Y");
                        // End Date Format
                        $EndDate = date_create($read['EndDate']);
                        $End_Date = date_format($EndDate, "d M Y");



                        $to_date = strtotime($read['EndDate']);
                        $from_date = strtotime($read['StartDate']);
                        $day_diff = $to_date - $from_date;

                        // $days=date_diff($read['StartDate'],$read['EndDate']);
                        // $abs_diff = $later->diff($read['StartDate'],$read['EndDate'])->format("%a");
                        ?>
                            <div class="item">
                                <div class="popular-course">
                                    <ul class="mt-4 mb-4" style="text-align: justify;">
                                        <li><strong>Course</strong></li>
                                        <li>
                                            <?php echo $read['Course']; ?>
                                        </li>
                                        <li><strong>Duration</strong></li>
                                        <li>
                                            <?php echo floor($day_diff / (60 * 60 * 24) + 1) . "\n"; ?> Days
                                        </li>
                                        <li><strong>Subjects</strong></li>
                                        <li>
                                            <?php echo $read['TopicCovered']; ?>
                                        </li>
                                        <li><strong>Standard Covered</strong></li>
                                        <li></li>
                                        <!-- <li><strong>Start Date</strong></li>
                                <li>
                                    <?php echo $Date; ?>
                                </li>
                                <li><strong>End Date</strong></li>
                                <li>
                                    <?php echo $End_Date; ?>
                                </li> 
                                <li><strong>Targeted Audience</strong></li>
                                <li></li>
                                <li><strong>Faculty Name</strong></li>
                                <li>
                                    <?php echo $read['FacultyName']; ?>
                                </li>-->
                                        <li><strong>Targeted Trainees</strong></li>
                                        <li>
                                            <?php echo $read['RegisteredTrainees']; ?>
                                        </li>
                                        <li><strong>Remark</strong></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <script>
                            $(document).ready(function () {
                                var owl = $('.owl-carousel');
                                owl.owlCarousel({
                                    autoPlay: 3000,
                                    items: 3,
                                    loop: false,
                                    margin: 10,
                                    autoplay: true,
                                    itemsDesktop: [1199, 3],
                                    itemsDesktopSmall: [979, 3],
                                    center: true,
                                    // nav: true,
                                    autoplayTimeout: 1000,
                                    autoplayHoverPause: true,
                                    responsive: {
                                        600: {
                                            items: 3
                                        }
                                    }

                                });
                            })
                        </script>
                        <style>
                            .padding {
                                padding: 3rem
                            }

                            .owl-carousel .item {
                                margin: 3px;
                            }

                            .owl-carousel .item img {
                                display: block;
                                width: 100%;
                                height: auto;
                            }

                            .owl-carousel .item {
                                margin: 3px;
                            }

                            .owl-carousel {
                                margin-bottom: 15px;
                            }
                        </style>
                    </div>
                </div>
                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Schedule</h1>
                    <?php 
                        $story = "SELECT * FROM `scheduledate_SI`";
                        $StoryExe = mysqli_query($db,$story);
                        $ShortStory = mysqli_fetch_assoc($StoryExe);
                    ?>
                    <p class="mb-4">
                        <?php echo $ShortStory['Schedule'] ?>
                    </p>
                    <p>
                        <a href="schedule-page_SI.php" class="btn btn-primary">Learn More</a>
                    </p>
                </div>


                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Skill Development History</h1>
                    <?php 
                        $story = "SELECT * FROM `skilldevelopmenthistory_SI`";
                        $StoryExe = mysqli_query($db,$story);
                        $ShortStory = mysqli_fetch_assoc($StoryExe);
                    ?>
                    <p class="mb-4">
                        <?php echo $ShortStory['SkillDevelopmentHistory'] ?>
                    </p>
                    <p>
                        <a href="skill-development-page_SI.php" class="btn btn-primary">Learn More</a>
                    </p>
                </div>

                <div class="query-feed-bg p-5">
                    <div class="row">
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="form-02 bg-white p-4 form-2-box">
                                <h3 class="text-center">Feedback</h3>
                                <form method="POST">
                                    <div class="form-group mb-4">
                                        <label class="form-control-label text-muted">Username</label>
                                        <input type="text" name="username" placeholder="Enter Name"
                                            class="form-control-m" required="">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-control-label text-muted">Email</label>
                                        <input type="text" name="email" placeholder="Enter Email ID"
                                            class="form-control-m" required="">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-control-label text-muted">Course</label>
                                        <input type="text" name="course" placeholder="Enter Subject"
                                            class="form-control-m" required="">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-control-label text-muted">Message</label>
                                        <textarea name="message" placeholder="Enter Message" class="form-control-m"
                                            required=""></textarea>
                                    </div>
                                    <div class="row justify-content-center my-3 px-3">
                                        <button type="submit" class="btn btn-primery" name="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            if(isset($_POST['submit']))
                            {
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $course = $_POST['course'];
                                $message = $_POST['message'];

                                $feedback = "INSERT INTO `training_module_feedback_SI` SET Username='$username',Email='$email',Course='$course',Message='$message'";
                                $FormExe = mysqli_query($db,$feedback);
                                if($FormExe== TRUE)
                                {
                                    echo "<script>alert('Your Details Save Successfully')</script>";
                                    echo "<script>window.location.href = 'training-module_SI.php'</script>";
                                }
                            }
                        ?>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="form-02 bg-white p-4 form-2-box">
                                <h3 class="text-center">Enquiry Now</h3>

                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Full Name</label>
                                            <input type="text" name="name" placeholder="Enter Full Name"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Mobile No</label>
                                            <input type="tel" name="mobile" placeholder="Enter Mobile No"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">E-mail ID</label>
                                            <input type="email" name="mail" placeholder="Enter Email"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Position</label>
                                            <input type="text" name="position" placeholder="Enter Position"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Organization</label>
                                            <input type="text" name="organization" placeholder="Enter Organization"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Course Interesetd</label>
                                            <input type="text" name="CourseInteresetd" placeholder="Course Interesetd"
                                                class="form-control-m" required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Remark</label>
                                            <input type="text" name="remark" placeholder="Remark" class="form-control-m"
                                                required="">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                            <label class="form-control-label text-muted">Address</label>
                                            <input type="text" name="address" placeholder="Enter Address"
                                                class="form-control-m" required="">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center my-3 px-3">
                                        <button type="submit" class="btn btn-primery" name="sendmessage">Send
                                            Message</button>
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST['sendmessage']))
                                    {
                                        $name = $_POST['name'];
                                        $mobile = $_POST['mobile'];
                                        $mail = $_POST['mail'];
                                        $position = $_POST['position'];
                                        $organization = $_POST['organization'];
                                        $CourseInteresetd = $_POST['CourseInteresetd'];
                                        $remark = $_POST['remark'];
                                        $address = $_POST['address'];

                                        $Enquiry = "INSERT INTO `training_module_enquiry_SI` SET Name='$name',Mobile='$mobile',Email='$mail',Position='$position',Organization='$organization',CourseInteresetd='$CourseInteresetd',Remark='$remark',Address='$address'";
                                        $Execute = mysqli_query($db,$Enquiry);
                                        if($Execute == TRUE)
                                        {
                                            echo "<script>alert('Your Enquiry Save Successfully')</script>";
                                            echo "<script>window.location.href = 'training-module_SI.php'</script>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>
</html>