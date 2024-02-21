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
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                        <a href='index.php' class="btn btn-success btn-sm">Go Back</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Kotela Srihari</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">Krishigap Digital Solutions Pvt ltd</p>
                            <p class="mb-0">CIN  U62013TS2023PTC172865</p>
                            <p class="mb-0">House No 5-106/281B, Narsing Municipality Manchirevula K.V Ranga Reddy Hyderabad 500075 Telangana State</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0"><a style="color: #52565b;" href="tel:+919848034740">+91-9848034740</a></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0"><a style="color: #52565b;" href = "mailto:Srihari@krishigap.com">Srihari@krishigap.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.65940366535!2d78.49873941384925!3d17.38011470759183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb984b1d296f4f%3A0x89139a561673ed35!2s3-4%2C%20Ajantha%20Colony%2C%20Narayanguda%2C%20Hyderabad%2C%20Telangana%20500036!5e0!3m2!1sen!2sin!4v1665507300441!5m2!1sen!2sin"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form method="get">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="" value="<?php echo $_GET['name']; ?>">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="mail" class="form-control" id="email" placeholder="Your Email" required="" value="<?php echo $_GET['mail']; ?>">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required="" value="<?php echo $_GET['subject']; ?>">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px" required=""><?php echo $_GET['message']; ?></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <?php
                                $min  = 1;
                                $max  = 9;
                                $num1 = rand( $min, $max );
                                $num2 = rand( $min, $max );
                                $sum  = $num1 + $num2;
                                ?>
                                <h4> Solve this, <?php echo $num1 . '+' . $num2; ?>?</h4>
                                <input type="hidden" name="answer" value="<?php echo $sum; ?>">
                            </div>
                           <div class="col-6">
                               <input type="number" class="form-control quiz-control" id="quiz" placeholder="Enter Your Answer" name='input_answer' required="">
                            </div>
                            <!--<div class="col-12">-->
                            <!--    <div class="form-floating">-->
                            <!--        <div class="g-recaptcha" data-sitekey="6LfwWTwnAAAAAEewaNprSQgIb4_ykWFWioQTntjh"></div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="send" type="submit" id="sendmsg">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_GET['send']))
                        {
                            $name = mysqli_real_escape_string($db,$_GET['name']);
                            $email = mysqli_real_escape_string($db,$_GET['mail']);
                            $subject = mysqli_real_escape_string($db,$_GET['subject']);
                            $message = mysqli_real_escape_string($db,$_GET['message']);
                            $answer = mysqli_real_escape_string($db,$_GET['answer']);
                            $input_answer = mysqli_real_escape_string($db,$_GET['input_answer']);
                            
                            if($answer === $input_answer)
                            {
                                $contact = mysqli_query($db,"INSERT INTO `contact_us` (`ID`, `Name`, `Email`, `Subject`, `Message`, `Response`, `Number_Captcha` ,`CreatedDate`) VALUES (NULL, '$name', '$email', '$subject', '$message', NULL, '$input_answer' ,CURRENT_TIMESTAMP)");
                            if($contact == TURE)
                            {
                                echo "<script>alert('Your Details Sent Successfully')</script>";
                                echo "<script>window.location.href='index.php'</script>";
                            }
                            else
                            {
                                echo "<script>alert('Try After Some Time')</script>";
                            }
                            }
                            else
                            {
                                echo "<script>alert('Wrong Captcha')</script>";
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
    <script>
function onClick(e) {
  e.preventDefault();
  grecaptcha.enterprise.ready(async () => {
    const token = await grecaptcha.enterprise.execute('6LfCfTsnAAAAAEuD-7Gu1M1y2VPLHk-V_caxXRQM', {action: 'LOGIN'});
    // IMPORTANT: The 'token' that results from execute is an encrypted response sent by
    // reCAPTCHA Enterprise to the end user's browser.
    // This token must be validated by creating an assessment.
    // See https://cloud.google.com/recaptcha-enterprise/docs/create-assessment
  });
}
</script>

<script>
    $(document).on('click','#sendmsg',function()
    {
        var response = grecaptcha.getResponse();
        if(response.length==0)
{
alert('Please verify you are not robot');
return false;
}
    })
</script>
</body>
</html>
