<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       if ($_GET['page'] != '') {
           header("Location: login.php?page=$_GET[page]");
       } else {
           header("Location: login.php");
       }
   }
   include "connection.php";
 //   include "most_visited_page.php";
 
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Steps in Obtaining Certificate</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Steps in Obtaining Certificate</li>
                        </ol>
                        <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="" method="GET">
                        <input type="hidden" name="search" value="type1" required="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <h5>Sections</h5>
                                <div class="form-floating">
                                    <select  name="standards" id="inputstandards" class="form-control" required="" onchange="toggleDropdown()">
                                        <option></option>
                                        <option <?php if($_GET['standards']=='On Farm Production' ){ echo "selected" ;
                                            }?> value="On Farm Production">On Farm Production</option>
                                        <option <?php if($_GET['standards']=='Post Harvesting Processing' ){
                                            echo "selected" ; }?> value="Post Harvesting Processing">Post Harvesting Processing</option>
                                        <option <?php if($_GET['standards']=='Sustainable Initiatives' ){
                                            echo "selected" ; }?> value="Sustainable Initiatives">Sustainable Initiatives</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Standard</h5>
                                <div class="form-floating">
                                    <select  name="gsw" id="inputsgsw" class="form-control" required="">
                                        <option></option>
                                        <?php if($_GET['standards']=='On Farm Production' ){?>
                                        <option <?php if($_GET['gsw']=='IndG.A.P' ){ echo "selected" ;
                                            }?> value="IndG.A.P">IndG.A.P</option>
                                            <option <?php if($_GET['gsw']=='GLOBALG.A.P' ){ echo "selected" ;
                                            }?> value="GLOBALG.A.P">GLOBALG.A.P</option>
                                            <option <?php if($_GET['gsw']=='Organic NPOP' ){ echo "selected" ;
                                            }?> value="Organic NPOP">Organic NPOP</option>
                                            <option <?php if($_GET['gsw']=='Organic NOP' ){ echo "selected" ;
                                            }?> value="Organic NOP">Organic NOP</option>
                                        
                                        <?php } ?>
                                        
                                        <?php if($_GET['standards']=='Post Harvesting Processing' ){?>
                                        <option <?php if($_GET['gsw']=='ISO 22000' ){ echo "selected" ;
                                            }?> value="ISO 22000">ISO 22000</option>
                                        <option <?php if($_GET['gsw']=='FSSC 22000' ){ echo "selected" ;
                                            }?> value="FSSC 22000">FSSC 22000</option>
                                        <option <?php if($_GET['gsw']=='BRC Global Standard Packaging 6' ){ echo "selected" ;
                                            }?> value="BRC Global Standard Packaging 6">BRC Global Standard Packaging 6</option>
                                        <option <?php if($_GET['gsw']=='BRC Global Standard Food Safety 9' ){ echo "selected" ;
                                            }?> value="BRC Global Standard Food Safety 9">BRC Global Standard Food Safety 9</option>
                                        
                                        <?php } ?>
                                        
                                        <?php if($_GET['standards']=='Sustainable Initiatives' ){?>
                                        <option <?php if($_GET['gsw']=='ISO 14001- Environment' ){ echo "selected" ;
                                            }?> value="ISO 14001- Environment">ISO 14001- Environment</option>
                                        <option <?php if($_GET['gsw']=='ISO 50001- Energy Management' ){ echo "selected" ;
                                            }?> value="ISO 50001- Energy Management">ISO 50001- Energy Management</option>
                                        <option <?php if($_GET['gsw']=='ISO 45001 OH&S Mgt Systems' ){ echo "selected" ;
                                            }?> value="ISO 45001 OH&S Mgt Systems">ISO 45001 OH&S Mgt Systems</option>
                                        <option <?php if($_GET['gsw']=='SA 8000- Social Accountability' ){ echo "selected" ;
                                            }?> value="SA 8000- Social Accountability">SA 8000- Social Accountability</option>
                                        <option <?php if($_GET['gsw']=='Rainforest Alliance' ){ echo "selected" ;
                                            }?> value="Rainforest Alliance">Rainforest Alliance</option>
                                        <option <?php if($_GET['gsw']=='Fair Trade Certified' ){ echo "selected" ;
                                            }?> value="Fair Trade Certified">Fair Trade Certified</option>
                                        
                                        <?php } ?>
                                    </select>
                                    
         
        
                                   
                                </div>
                            </div>
                          
                            <div class="col-md-4">
                                <h5>&nbsp;</h5>
                                <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                            </div>
                            
                            <?php 
                                if(isset($_GET['standards']) && isset($_GET['gsw']))
                                {
                                    $section = $_GET['standards'];
                                    $standard = $_GET['gsw'];
                                    $select = "SELECT * FROM `all_standards_about` WHERE SectionName='$section' AND StandardName='$standard' AND DeletedStatus='0'";
                                    $execute = mysqli_query($db,$select);
                            ?>
                            <div class="col-md-6">
                                <h5>Document Name</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Document</h5>
                            </div>
                            <?php 
                            if(mysqli_num_rows($execute) > 0)
                            {
                               
                            }
                            else
                            {
                               echo '<div class="alert alert-danger mt-3" id="register_en">No Records Found.</div>';
                            }
                            $count = 1;
                                 while($read = mysqli_fetch_assoc($execute))
                                 {
                            ?>
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <i class="fa text-primary me-2"><?php echo $count; ?>.</i><?php echo $read['DocumentName'] ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <a href="../about_standard_docs/<?php echo $read['Document']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                            </div> 
                            <?php $count++; } } ?>                         
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript">
         var OnFarmProduction = ["IndG.A.P", "GLOBALG.A.P", "Organic NPOP", "Organic NOP"];
         
         var PostHarvestingProcessing = ["ISO 22000", "FSSC 22000", "BRC Global Standard Packaging 6", "BRC Global Standard Food Safety 9"];
         
         var SustainableInitiatives = ["ISO 14001- Environment", "ISO 50001- Energy Management", "ISO 45001 OH&S Mgt Systems", "SA 8000- Social Accountability", "Rainforest Alliance", "Fair Trade Certified"];
         
         $("#inputstandards").change(function() {
         
         var StateSelected = $(this).val();
         
         var optionsList;
         
         var htmlString = "";
         switch (StateSelected) {
         
         case "On Farm Production":
         
            optionsList = OnFarmProduction;
         
            break;
         
         case "Post Harvesting Processing":
         
            optionsList = PostHarvestingProcessing;
         
            break;
         
         case "Sustainable Initiatives":
         
            optionsList = SustainableInitiatives;
         
            break;
         
         }
         for (var i = 0; i < optionsList.length; i++) {
         htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
         }
         $("#inputsgsw").html(htmlString);
         });
         </script>
         
        
</body>

</html>