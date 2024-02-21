<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
// include "most_visited_page.php";
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
                    <h1 class="display-3 text-white animated slideInDown">Course Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Course Details</li>
                        </ol>
                        <li class="breadcum-item"><button class="btn btn-success btn-sm" onclick="history.back()">Go
                                Back</button></li>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="text-heading">
        <!-- <h1 class="text-center">About Course</h1> -->
        <h2 class="text-center">HACCP Principles</h2>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="product-single__description rte">
                    <h4><b>Course</b><span style="font-weight: 400;">:</span></h4>
                    <p><span style="font-weight: 400;">Live Online Classroom Program for Class 11 offers
                            total preparation for NEET 2024 aspirants. It combines rigorous live online classes with
                            comprehensive resources to support preparation, revision &amp; practice.</span></p>
                    <p><span style="font-weight: 400;">This course is a 2-year program and covers the syllabus of Class
                            11+12 during the course duration.</span></p>

                    <h4><b>Eligibility</b><span style="font-weight: 400;">:</span></h4>
                    <p><span style="font-weight: 400;">Students who are moving from Class 10 to 11 in 2023 or already in
                            Class 11th.</span></p>
                    <h4><b>Medium of Instruction</b><span style="font-weight: 400;">:</span></h4>
                    <p><span style="font-weight: 400;">English: Teaching in English and material in English.</span></p>
                    <p><span style="font-weight: 400;">Or</span></p>
                    <p><span style="font-weight: 400;">Hindi + English: Teaching in Hindi + English and Material in
                            English.</span></p>
                    <h4><b>Course Highlights:</b></h4>
                    <ul>
                        <li style="font-weight: 400;">
                            <b>Live Online Classes: </b><span style="font-weight: 400;">Attend live interactive classes
                                online. Raise your doubts during the live classes and get immediate clarification from
                                teachers.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>Top faculty: </b><span style="font-weight: 400;">Top teachers with proven
                                success will teach using world-class technology &amp; visual aids.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>Unmatched Individual Attention: </b><span style="font-weight: 400;">Mentors are allotted
                                to each batch. Reach out for counseling sessions related to academics and time
                                management.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>Comprehensive Study Material: </b><span style="font-weight: 400;">Top-rated study
                                material in print and e-book formats.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>All India Test Series: </b><span style="font-weight: 400;">Benchmark yourself
                                against thousands of aspirants from all around India.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>Replay Missed Classes: </b><span style="font-weight: 400;">You can access the recording
                                of any class and replay it as many times as you want to help thoroughly revise
                                concepts.</span>
                        </li>
                        <li style="font-weight: 400;">
                            <b>Ask a Doubt feature: </b><span style="font-weight: 400;">Complement your Live online
                                classes with thorough revision &amp; practice at home through engaging concept videos
                                and unlimited adaptive practice on the App for NEET. Use the ‘Ask a Doubt’
                                feature to clear all your doubts from expert faculty.</span>
                        </li>
                    </ul>
                    <h4><b>Learning Outcomes:</b></h4>
                    <p><br><br><a href="CourseAmountPay.php" class="btn btn-info btn-lg"
                            style="color: white;border-radius: 9px;float: right;">Register Now</a></p>
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
<?php

if (isset($_SERVER['HTTPS'])) {
    $actual_link = "https://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'];


} else {
    $actual_link = "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'];

}
$page_url = trim($actual_link);
$page_id = trim($page_url);

$query = "SELECT * FROM `most_visited_page` WHERE page_id='$page_id'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) == 0) {
    $insert_query = "INSERT INTO `most_visited_page` (page,page_id,number,DeletedStatus) VALUES('$page_url','$page_url',1,0)";
    if (mysqli_query($db, $insert_query)) {
        return true;
    } else {
        return false;
    }
} else {
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $number = intval(trim($data['number'])) + 1;
    $update_query = "UPDATE `most_visited_page` SET number='$number' WHERE page_id='$page_id'";
    if (mysqli_query($db, $update_query)) {
        return true;
    } else {
        return false;
    }
}
?>

</html>