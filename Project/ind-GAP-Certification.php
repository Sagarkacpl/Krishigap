<?php
session_start();
error_reporting(0);
include "connection.php";
// include "most_visited_page.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INDGAP Certification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <meta name="title" content="Do you know what INDGAP Certification is?">
    <meta name="description" content="INDGAP certification and its importance to businesses in agriculture. Discover how it ensures sustainability, consumer trust, and business…  ">
    <meta name="keywords" content="INDGAP Certification,indgap certification requirements">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
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
    <!-- <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                 <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                        <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                    </nav>
                </div> 
            </div>
        </div>
    </div> -->
    <style>
        .m-slider-1 img {
            width:100%;
        }
    </style>
    <div class="m-slider-1">
        <img src="img/IndGAP-Certification.jpg" alt="IndGAP-Certification">
    </div>
    <div class="mt-5">
        <div class="container">
            <div class="row g-5">

                <!-- <h3 class="section-title bg-white text-start text-primary pe-3">How Can BRC Certification Benefit Your Food Business? </h3> -->
               
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1><strong>Do you know what INDGAP Certification is?</strong></h1>
                    <p>INDGAP, or Integrated Farm Assurance Certification, is a certification program that ensures sustainable agricultural practices. But why is it important? Well, in a world where the demand for food is rapidly increasing, it's important that we maintain our natural resources and ensure our food is produced in an environmentally responsible way. Not only it does benefit the planet, but it also benefits businesses by improving marketability, building brand trust and credibility, and promoting sustainable agricultural practices.</p>
                    
                    <h5><strong>Understanding INDGAP Certification</strong></h5>
                    <p>If you're a farmer wondering what INDGAP certification is, or a consumer interested in where your food comes from, INDGAP (Integrated Farm Assurance Global Gap Standards) might be a new term for you.  it is a certification scheme that aims to introduce quality in the production system to ensure food safety and hygiene, and to increase the acceptability of the produce by consumers and the food processing industry. This ensures that farmers follow good agricultural practices, manage food safety, and minimize environmental harm. It creates an internationally recognized framework for agriculture and assures consumers that the food they consume has been produced sustainably.</p>

                    <h5><strong>What are the Eligibility Criteria to apply for INDGAP Certification?</strong></h5>
                    <p>Both Individual producers and producer/farmer groups can apply for INDGAP Certification. You can apply through Certification Body, by filling out the application form available on our website or by contacting us via phone or email. farmers need to meet specific requirements and have an active, in-date certification from a third-party certification body. These bodies conduct regular audits and inspections at the farm to ensure that the farmer meets the essential guidelines of INDGAP Certification.</p>
                    <p>After verifying the eligibility, the certification process involves a thorough evaluation and audit of the farm's practices, infrastructure, and documentation, and the certification is granted when the farm meets the required standard.</p>
                    <p class="mb-4">Maintaining: Once a farm is certified, it must maintain its certification status by undergoing regular audits and inspections. These ensure that the farm continues to follow the INDGAP requirements and continuously commits to sustainable agriculture practices. In conclusion, a step towards sustainable agriculture that assures consumers about food safety and environmental responsibility. Obtaining certification is not a one-time process, and farms must continue to follow the guidelines and maintain their certification status by undergoing regular audits and inspections.</p>

                    <h5><strong>Benefits of INDGAP Certification?</strong></h5>
                    <p class="mb-4">The benefits not only benefit the environment and society but also improve the marketability of businesses. With the increasing demand for sustainable agriculture, INDGAP certification gives businesses an edge over their competitors, distinguishing them as brands that prioritize ethical and environmentally conscious practices. Brand trust and credibility go hand in hand with INDGAP certification. The certification helps businesses to adopt practices that promote soil health, conservation of biodiversity, and protection of natural resources. INDGAP certification benefits businesses, consumers, and society at large by promoting sustainable agricultural practices, improving marketability, and enhancing brand trust and credibility.</p>

                    <h5><strong>What kind of support can I expect after getting INDGAP Certification?</strong></h5>
                    <p class="mb-4">After obtaining it, you can expect to receive support in various aspects. One of the foremost support that you can avail of is technical assistance. Our team of experts will be there to provide guidance and support in case you face any technical difficulties. Additionally, we also offer marketing support to promote your certified products and help you reach potential customers. Furthermore, our certification provides access to various training programs to constantly improve and enhance your knowledge and skills. Our aim is to provide complete support to our clients to ensure their success in the market.</p>

                    <h5><strong>How much does INDGAP Certification cost?</strong></h5>
                    <p class="mb-4">Costs depend on various factors such as location, size of the farm, number of crops and their acreage, and type of certification. Please contact  the certification bodies for more information about the cost.</p>


                    <h3>Conclusion</h3>
                    <p class="mb-4">In conclusion, INDGAP certification ensures sustainable agricultural practices and facilitates brand trust and credibility. By obtaining this, businesses can improve their marketability and demonstrate their commitment to ethical and responsible farming. The certification process involves meeting eligibility criteria and undergoing assessments. Once certified, businesses must maintain their certification through monitoring and periodic auditing. Overall, benefits both businesses and the environment, promoting sustainable and responsible agricultural practices for a better future.</p>
                
                    <p> For more information, please visit <a href="https://www.qcin.org/" target="_blank">https://www.qcin.org/</a>
                    </p>
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