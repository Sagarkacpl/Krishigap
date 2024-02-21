<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_DF"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
      header("Location: login.php");
   }
   $query = mysqli_query($db, "SELECT * FROM users WHERE UserID = '$_SESSION[UID]' AND DeletedStatus = '0'");
    $row = mysqli_fetch_assoc($query);
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfCfTsnAAAAAEuD-7Gu1M1y2VPLHk-V_caxXRQM"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <?php include "navbar.php";?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5" style="padding-top: 1rem !important;padding-bottom: 1rem !important;">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                        </ol>
                        <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Name of Organization: </strong><?php echo $row['NameofOrganization'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Address: </strong><?php echo $row['Address'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Contact Person Name: </strong><?php echo $row['ContactPersonName'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Mobile Number: </strong><?php echo $row['MobileNumber'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Email Id: </strong><?php echo $row['EmailId'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Website: </strong><?php echo $row['Website'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Business Activity: </strong><?php echo $row['BusinessActivity'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Standards: </strong><?php echo $row['Standers'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0">
                                <strong>Crop: </strong><?php 
                                $query1 = mysqli_query($db, "SELECT * FROM crop WHERE CropId = '$row[Crop]' AND DeletedStatus = '0'");
                                $row1 = mysqli_fetch_assoc($query1);
                                echo $row1['CropName'];
                                ?>
                            </p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Plan Type: </strong><?php echo $row['PlanType'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Plan Amount: </strong><?php echo $row['PlanAmount'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Plan Details: </strong><?php echo $row['PlanDetails'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Plan Start Date: </strong><?php echo $row['PlanStartDate'] ;?></p>
                            <p style="margin-bottom: 10px !important;" class="mb-0"><strong>Plan End Date: </strong><?php echo $row['PlanEndDate'] ;?></p>
                        </div>
                    </div>
                    
                    
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
