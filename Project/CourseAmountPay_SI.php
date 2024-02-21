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
    <?php include "navbar.php";?>
    <!-- <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Course Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Course Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <div class="text-heading">
        <h1 class="text-center">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <!-- <li class="breadcrumb-item"><a class="text-black" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-black active" aria-current="page">Course Details</li> -->
                <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
            </ol>
        </nav>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                

            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h5>Course Amount</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary couse-logo">
                            <img src="img/neet-logo.jpg">
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary m-0">Aakash Live</h5>
                            <p class="mb-0">Online Classes for Class 11, NEET 2024</p>
                            <p class="mb-0"><strong>Rs. 1,62,000.00</strong></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Discount Code" required="">
                                <label for="name">Enter Discount Code</label>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-floating">
                            <button class="btn btn-primary w-100 py-3" type="submit">Apply</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 text-left mt-4">
                            <p>Subtotal</p>
                        </div>

                        <div class="col-lg-6 text-end mt-4">
                            <p><strong>1,62,000.00</strong></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 text-left">
                            <p>Shipping</p>
                        </div>

                        <div class="col-lg-6 text-end">
                            <p><strong>Free</strong></p>
                        </div>
                    </div>

                    <div class="row row border-top pt-3">
                        <div class="col-lg-6 text-left">
                            <h4>Total</h4>
                        </div>

                        <div class="col-lg-6 text-end">
                            <h4><strong>1,62,000.00</strong></h4>
                        </div>
                    </div>



                </div>


                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <form action="" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <p>Your Name</p>
                                    <input type="text" class="form-control" id="" placeholder="Your Name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <p>Your Email</p>
                                    <input type="email" class="form-control" id="" placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <p>Phone No.</p>
                                    <input type="text" class="form-control" id="" placeholder="Phone No." required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <p>DOB</p>
                                    <input type="date" class="form-control" id="" placeholder="Phone No." required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <p>Address</p>
                                    <textarea class="form-control" placeholder="Address" id="message" style="height: 150px" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Continue to Shipping</button>
                            </div>
                        </div>
                    </form>
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