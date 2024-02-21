<?php
   session_start();
   use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
if(!isset($_SESSION["Amountt"]) || $_SESSION["Amountt"] =='') {
//header("Location:price-page.php");
}
if (isset($_SESSION["UserID"]) AND $_SESSION["UserID"] != '' AND $_SESSION['FormType'] == 'paid') {
       //header("Location:pay.php");
   }
include "connection.php";
include "most_visited_page.php";
$query1 = mysqli_query($db, "SELECT * from crop WHERE DeletedStatus = '0' ORDER BY CropName");
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
</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <?php include "navbar.php";?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">
                        Contact Information
                        </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Informations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="page-detail-line">
                <p></p>
                </div>    
            </div>
                            <?php
                              $msg = $_GET['msg'];
                              if($msg == 'failext'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                                       Email Id already exist.
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
                                    <div class="alert alert-dismissible alert-danger" style="width: 50%;">
                                       Registration failed.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <!--<form action="pay.php" method="POST">-->
                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <h5>Name of Organization/Person</h5>
                                <div class="form-floating">
                                    <input type="text" name="NameofOrganization" value="" placeholder="Enter Organization Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Address</h5>
                                <div class="form-floating">
                                    <input type="text" name="Address" placeholder="Enter Address" class="form-control" required>
                                </div>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <h4>Contact Informations</h4>-->
                            <!--</div>    -->
                            <div class="col-md-6">
                                <h5>Contact Person Name</h5>
                                <div class="form-floating">
                                    <input type="text" name="ContactPersonName" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Mobile Number</h5>
                                <div class="form-floating">
                                    <input type="tel" maxlength="10" pattern="\d{10}" name="MobileNumber" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Email Id</h5>
                                <div class="form-floating">
                                    <input type="email" name="EmailId" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Website <small class="text-danger">(optional)</small></h5>
                                <div class="form-floating">
                                    <input type="text" name="Website" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Business Activity</h5>
                                <div class="form-floating">
                                    <input type="text" name="BusinessActivity" class="form-control" required>
                                </div>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <h5>Password</h5>-->
                            <!--    <div class="form-floating">-->
                            <!--        <input type="password" name="Password" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="clearfix"></div>
                            <div class="col-md-3">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--    <h5>Standards</h5>-->
                            <!--    <div class="form-floating">-->
                            <!--        <input type="text" name="Standers" class="form-control">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <h5>Crop</h5>-->
                            <!--    <div class="form-floating">-->
                            <!--        <select name="Crop" class="form-control">-->
                            <!--                 <option value="">Please Select</option>-->
                                <?php 
                                          #  if($query1){
                                         #     while($row1 = mysqli_fetch_array ($query1)){?>
                                          <option value="<? #php echo $row1['CropId']; ?>"><?php # echo $row1['CropName']; ?></option>
                                          <?php #}} ?>
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                             
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST["ContactPersonName"]) && isset($_POST["EmailId"]) && isset($_POST["MobileNumber"]))
                        {
                                $NameofOrganization = mysqli_real_escape_string($db,$_POST['NameofOrganization']);
                                $Address = mysqli_real_escape_string($db,$_POST['Address']);
                                $ContactPersonName = mysqli_real_escape_string($db,$_POST['ContactPersonName']);
                                $MobileNumber = mysqli_real_escape_string($db,$_POST['MobileNumber']);
                                $EmailId = mysqli_real_escape_string($db,$_POST['EmailId']);
                                $Website = mysqli_real_escape_string($db,$_POST['Website']);
                                $BusinessActivity = mysqli_real_escape_string($db,$_POST['BusinessActivity']);
                                
                                
                                 $to = "info@krishigap.com";
                                    $subject = "Krishigap new registration";
                                    $message = '<table border="1"><thead><tr><th>Organization Name</th><th>Address</th><th>Name</th><th>Mobile No</th><th>Email ID</th><th>Website</th><th>Business Activity</th></tr></thead><tbody><tr><td scope="row">' . $NameofOrganization . '</td><td>' . $Address . '</td><td>'.$ContactPersonName.'</td><td>'.$MobileNumber.'</td><td>'.$EmailId.'</td><td>'.$Website.'</td><td>'.$BusinessActivity.'</td></tr></tbody></table>';
                                    
                                 $mail =  mail($to,$subject,$message);
                                    
                                 if($mail == TRUE)   
                                {

                                    $contact = mysqli_query($db, "INSERT INTO `partial_users` (`UserID`, `Organization`, `Address`, `Name`, `Mobile_No`, `Email`, `Website`, `Business_Activity`, `DeletedStatus`, `Created_at`) VALUES (NULL, '$NameofOrganization', '$Address', '$ContactPersonName', '$MobileNumber', '$EmailId', '$Website', '$BusinessActivity', '0', CURRENT_TIMESTAMP)");
                                if($contact == TRUE)
                                {
                                    $mail = new PHPMailer;
                                    $mail->Host = "smtp.gmail.com";
                                    $mail->SMTPAuth = true;
                                    $mail->Username = "info@krishigap.com";
                                    $mail->Password = "kcqkqjdwwtnttxtp";
                                    $mail->SMTPSecure = "tls";
                                    $mail->Port = 587;
                                    $mail->From = "info@krishigap.com";
                                    $mail->FromName = "Krishigap New Registration";
                                    $mail->addAddress("info@krishigap.com", "New Registration");
                                    $mail->isHTML(true);
                                    $mail->Subject = "Krishigap New Registration";
                                  $mail->Body = '<table border="1"><thead><tr><th>Organization Name</th><th>Address</th><th>Name</th><th>Mobile No</th><th>Email ID</th><th>Website</th><th>Business Activity</th></tr></thead><tbody><tr><td scope="row">' . $NameofOrganization . '</td><td>' . $Address . '</td><td>'.$ContactPersonName.'</td><td>'.$MobileNumber.'</td><td>'.$EmailId.'</td><td>'.$Website.'</td><td>'.$BusinessActivity.'</td></tr></tbody></table>';

                                    $mail->AltBody = "";
                                    $mail->send();
                                
                                    echo "<script>alert('Details Send Successfully')</script>";
                                    echo "<script>window.location.href='index.php'</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Details Not Save')</script>";
                                }
                                }
                                
                                else
                                {
                                    echo "<script>alert('Email Faild')</script>";
                                }
                                
                        }
                    ?>
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