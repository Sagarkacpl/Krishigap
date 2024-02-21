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
    <style>
        .conatiner {
			max-width: 1160px;
			margin: 0px auto;
		}

		table {
			font-family: "Heebo", sans-serif;
			border-collapse: collapse;
			width: 100%;
			font-size: 12px;

		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: Center;
			padding: 10px 5px;
		}

		.table-head {
			font-size: 13px;
			color: black;
		}

		.table-bg {
			background-color: white;
			box-shadow: 0px 0px 8px #e8e8e8;
			padding: 20px 10px;
			border-radius: 12px;
		}

		.table-heading {
			text-align: center;
			font-family: "Nunito", sans-serif;
			padding: 0px;
			margin: 0px;
			text-decoration: underline;
		}
    </style>
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
                    <h1 class="display-3 text-white animated slideInDown">Trainee List</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <a href="index.php" class="btn btn-success btn-sm">Home</a>
                            &nbsp;
                            <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Trainee List</h1>
                    <table class="mt-5">
                        <thead>
                            <tr class="table-head">
                                <th>S.No</th>
                                <th>Course</th>
                                <th>Organization Respresented</th>
                                <th>Trainee Name</th>
                                <th>Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $Course_name = $_GET['Course_name'];
                                $trainee_list = "SELECT * FROM `schedule` WHERE Course='$Course_name'";
                                $execute = mysqli_query($db,$trainee_list);
                                $count = 1;
                                while($read = mysqli_fetch_assoc($execute))
                                {
                            ?>
                            <tr>
                                <td><p><?php echo $count; ?> </p></td>
                                <td><p><?php echo $read['Course']; ?> </p></td>
                                <td>
									<p>
										<?php echo $read['FacultyProfile']; ?>
									</p>
								</td>
                                <td><p><?php echo $read['RegisteredTrainees']; ?></p></td>
                                
                                <td><a href="certificates/<?php echo $read['Trainee_Certificate']; ?>" target="_blank"><img src="img/pdf.png" alt="" style="width: 26px;height: 30px;border-radius: 0%!important;"></a></td>
                            </tr>
                            <?php $count++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-1"></div>
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