<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
if ($_SESSION['UID'] != '') {
    header("Location: https://www.krishigap.com");
}
include "connection.php";

if (isset($_GET["email"]) AND !empty($_GET["email"]) AND isset($_POST["otp"]) AND !empty($_POST["otp"]) AND isset($_POST["new_password"]) AND !empty($_POST["new_password"])) {
    $EmailId = mysqli_real_escape_string($db, trim($_GET["email"]));
    $otp = mysqli_real_escape_string($db, trim($_POST["otp"]));
    $new_password = md5(mysqli_real_escape_string($db, trim($_POST["new_password"])));

    $query = mysqli_query($db, "SELECT * FROM users WHERE EmailId = '$EmailId' AND otp = '$otp' AND DeletedStatus = '0'");
    $row_count = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);
    if ($row_count > 0) {     
         $result = mysqli_query($db,"UPDATE `users` SET `otp`='',`Password`='$new_password' where EmailId='$EmailId' AND otp = '$otp' AND DeletedStatus = '0'");
           if ($result)
            { 
               header("Location:reset_password.php?msg=success");
            }
            else
            {
               header("Location:reset_password.php?msg=success");
            } 
        
    } else {
        header("Location:reset_password.php?msg=fail");
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
    <div class="">
      <div class="mx-auto">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">
                            <h3 class="text-center">Reset Password</h3>
                            <h6 class="msg-info text-center">for existing user</h6>
                            <?php if($_GET['msg'] == 'fail'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div style="padding: 0.5rem 1rem;" class="alert alert-danger">Password not changed.</div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <?php if($_GET['msg'] == 'success'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div style="padding: 0.5rem 1rem;" class="alert alert-success">Password successfully changed.</div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                           <?php if($_GET['msg'] == 'snt'){?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="bs-component">
                                    <div style="padding: 0.5rem 1rem;" class="alert alert-success">OTP sent to your email id.</div>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                            <form action="" method="POST">
                            <div class="form-group"> <label class="form-control-label text-muted">OTP</label> <input type="text" name="otp" placeholder="OTP" class="form-control" required=""> </div>
                            <div class="form-group"> <label class="form-control-label text-muted">New Password</label> <input type="password" name="new_password" placeholder="New Password" class="form-control" required=""> </div>
                            
                            <div class="row justify-content-center my-3 px-3"> <button type="submit" class="btn-block btn-color">Submit</button> </div>
                            
                            <div class="row justify-content-center my-2">
                              <p>
                                  <a style="float:left;" href="login.php"><small class="text-muted">Login</small></a>
                                  <a style="float:right;" href="price-page.php"><small class="text-muted">Register</small></a> 
                               
                              </p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card card2">
                     <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white"></h3> <small class="text-white"></small>
                        <div class="row justify-content-center my-3 px-3"> 
                          
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
    input,
    textarea {
    background-color: #F3E5F5;
    border-radius: 50px !important;
    padding: 12px 15px 12px 15px !important;
    width: 100%;
    box-sizing: border-box;
    border: none !important;
    border: 1px solid #F3E5F5 !important;
    font-size: 16px !important;
    color: #000 !important;
    font-weight: 400
    }
    input:focus,
    textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #D500F9 !important;
    outline-width: 0;
    font-weight: 400
    }
    button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
    }
    .card {
    border-radius: 0;
    border: none
    }
.card1 {
    width: 50%;
    padding: 40px 30px 10px 30px
}
.card2 {
    width: 50%;
    background-image: linear-gradient(to right, #00a039, #006725);
    background-image: url(img/subscrib-img.jpg);
    background-position: center;
    background-size: cover;
}
#logo {
    width: 70px;
    height: 60px
}
.heading {
    margin-bottom: 60px !important
}
::placeholder {
    color: #000 !important;
    opacity: 1
}
:-ms-input-placeholder {
    color: #000 !important
}
::-ms-input-placeholder {
    color: #000 !important
}
.form-control-label {
    font-size: 12px;
    margin-left: 15px
}
.msg-info {
    padding-left: 15px;
    margin-bottom: 30px
}
.btn-color {
    border-radius: 50px;
    color: #fff;
    background-image: linear-gradient(to right, #00a039, #006624);
    padding: 15px;
    cursor: pointer;
    border: none !important;
    margin-top: 40px
}
.btn-color:hover {
    color: #fff;
    background-image: linear-gradient(to right, #006624, #00a039);
}
.card2 .btn-color {
    border-radius: 50px;
    color: rgb(0, 0, 0);
    background:#fff !important;
    padding: 15px;
    cursor: pointer;
    border: none !important;
    margin-top: 40px;
    border:1px #fff solid !important; 
}
.btn-white {
    border-radius: 50px;
    color: #D500F9;
    background-color: #fff;
    padding: 8px 40px;
    cursor: pointer;
    border: 2px solid #D500F9 !important
}
.btn-white:hover {
    color: #fff;
    background-image: linear-gradient(to right, #FFD54F, #D500F9)
}
a {
    color: #000
}
a:hover {
    color: #000
}
.bottom {
    width: 100%;
    margin-top: 50px !important
}
.sm-text {
    font-size: 15px
}
@media screen and (max-width: 992px) {
    .card1 {
        width: 100%;
        padding: 40px 30px 10px 30px
    }
    .card2 {
        width: 100%
    }
    .right {
        margin-top: 100px !important;
        margin-bottom: 100px !important
    }
}
@media screen and (max-width: 768px) {
    .container {
        padding: 10px !important
    }
    .card2 {
        padding: 50px
    }
    .right {
        margin-top: 50px !important;
        margin-bottom: 50px !important
    }
}
</style>
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