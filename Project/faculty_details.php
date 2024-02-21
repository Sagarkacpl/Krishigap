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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                    <h1 class="display-3 text-white animated slideInDown">Faculty Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Faculty Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4" style="box-shadow: 2px 6px 14px 6px rgba(142, 142, 142, 0.28);">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6> -->
                    <h1 class="mb-5">Faculty Details</h1>
                </div>
                <div class="col-lg-12 col-md-6 wow fadeInUp table">
                <table class="demTable">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Address</th>
				<th>Contact No.</th>
				<th>Email</th>
				<th>Course</th>
				<th>Subject</th>
				<th>Profile</th>
				<th>No. of Trainings conducted subject wise</th>
				<th>Feedback</th>
				<th>Organization</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Lorem is simply dummy</td>
				<td>Lorem is simply dummy</td>
				<td>123456789</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td><button type="button" class="btn btn-success" style="border-radius: 5px;">View</button></td>
				<td>5</td>
				<td>Lorem</td>
				<td>Lorem</td>
			</tr>
            <tr>
				<td>2</td>
				<td>Lorem is simply dummy</td>
				<td>Lorem is simply dummy</td>
				<td>123456789</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td><button type="button" class="btn btn-success" style="border-radius: 5px;">View</button></td>
				<td>5</td>
				<td>Lorem</td>
				<td>Lorem</td>
			</tr>
            <tr>
				<td>3</td>
				<td>Lorem is simply dummy</td>
				<td>Lorem is simply dummy</td>
				<td>123456789</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td>Lorem</td>
				<td><button type="button" class="btn btn-success" style="border-radius: 5px;">View</button></td>
				<td>5</td>
				<td>Lorem</td>
				<td>Lorem</td>
			</tr>
		</tbody>
	</table>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>