<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php?page=home4");
   }
   include "connection.php";
   include "most_visited_page.php";
   if ($_GET['scheme'] != '' and $_GET['scheme_category'] != '' and $_GET['document'] != '') {
       if ($_GET['user1'] == '' AND $_GET['user2'] == '' AND $_GET['user3'] == '') {
           $q = "";
       }
       if ($_GET['user1'] == '' AND $_GET['user2'] == '' AND $_GET['user3'] != '') {
           $q = " AND Users IN ('$_GET[user3]')";
       }
       if ($_GET['user1'] == '' AND $_GET['user2'] != '' AND $_GET['user3'] == '') {
           $q = " AND Users IN ('$_GET[user2]')";
       }
       if ($_GET['user1'] == '' AND $_GET['user2'] != '' AND $_GET['user3'] != '') {
           $q = " AND Users IN ('$_GET[user2]','$_GET[user3]')";
       }
       if ($_GET['user1'] != '' AND $_GET['user2'] == '' AND $_GET['user3'] != '') {
           $q = " AND Users IN ('$_GET[user1]','$_GET[user3]')";
       }
       if ($_GET['user1'] != '' AND $_GET['user2'] != '' AND $_GET['user3'] != '') {
           $q = " AND Users IN ('$_GET[user1]','$_GET[user2]','$_GET[user3]')";
       }
       $query = mysqli_query($db, "SELECT * from mainpage_others WHERE Scheme = '$_GET[scheme]' AND Scheme_Category = '$_GET[scheme_category]'  AND Documents = '$_GET[document]' AND DeletedStatus='0' AND DocumentUpload !='' $q ORDER BY Id ASC");
       $querynum = mysqli_num_rows($query);
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
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
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
      
      <div class="container-fluid p-0 mb-5 position-relative">
          <div onclick="history.back()" class="go-back-btn btn btn-success">Go Back</div>
                         <img class="img-fluid" src="img/pomegranatebanner.jpg" alt="">
        </div>                     
      
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center"> -->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown">Others</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Others</li>-->
      <!--               </ol>-->
      <!--               <button class="btn btn-success btn-sm" onclick="history.back()">Go Back</button>-->
      <!--            </nav>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
         <div class="container">

         <h1 class="text-center">Other Schemes</h1>
         <p class="mb-4 text-center">
         In this section, we have covered. Packhouses, Cold Storages, Dry Warehouses, Laboratories, Medicinal Plants Certification  You can search for the required information standard-wise by clicking on the respective icons. Additionally, we offer skill development programs on the implementation of these standards and the qualification of auditors, conducted digitally.
         </p>

            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="" method="GET">
                     <div class="row g-3">
                        <div class="col-md-4">
                           <h5>Scheme</h5>
                           <div class="form-floating">
                              <select id="gswselector" name="scheme" class="form-control scheme" required="">
                                 <option></option>
                                 <option <?php if ($_GET['scheme'] == 'PGS-INDIA Organic') {
                                    echo "selected";
                                    } ?> value="PGS-INDIA Organic">PGS-INDIA Organic</option>
                                 <option <?php if ($_GET['scheme'] == 'Packhouses for Horticulture Produce') {
                                    echo "selected";
                                    } ?> value="Packhouses for Horticulture Produce">Packhouses for
                                    Horticulture Produce
                                 </option>
                                 <option <?php if ($_GET['scheme'] == 'Cold Storages for Horticulture Produce') {
                                    echo "selected";
                                    } ?> value="Cold Storages for Horticulture Produce">Cold
                                    Storages for Horticulture Produce
                                 </option>
                                 <option <?php if ($_GET['scheme'] == 'Food Testing Laboratories') {
                                    echo "selected";
                                    } ?> value="Food Testing Laboratories">Food Testing Laboratories</option>
                                 <option <?php if ($_GET['scheme'] == 'Dry Warehouses') {
                                    echo "selected";
                                    } ?> value="Dry Warehouses">Dry Warehouses</option>
                                <option <?php if ($_GET['scheme'] == 'Medicinal Plants Certification') {
                                    echo "selected";
                                    } ?> value="Medicinal Plants Certification">Medicinal Plants Certification</option>
                              </select>
                           </div>
                        </div>
                        <script>
                           $(document).ready(function(){
                               $("select.scheme").change(function(){
                                   var scheme = $(".scheme option:selected").val();
                                   $.ajax({
                                       type: "POST",
                                       url: "home4_documents.php",
                                       data: { scheme : scheme } 
                                   }).done(function(data){
                                       $("#documents").html(data);
                                   });
                               });
                           });
                        </script>
                        <script type="text/javascript">
                           $(function () {
                               $('#gswselector').change(function () {
                                   $('.gsww').hide();
                                   $('.gswww').hide();
                                   $('#' + $(this).val()).show();
                               });
                           });
                        </script>
                        <div class="col-md-4">
                           <h5>Scheme Category</h5>
                           <div class="form-floating">
                              <select name="scheme_category" class="form-control" required="">
                                 <option></option>
                                 <option <?php if ($_GET['scheme_category'] == 'Agri Value Chain') {
                                    echo "selected";
                                    } ?> value="Agri Value Chain">Agri Value Chain</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>Documents</h5>
                           <div class="form-floating">
                              <select id="documents" name="document" class="form-control" required="">
                                 <?php if ($_GET['scheme'] != '' AND $_GET['document'] != '') { ?>
                                 <option></option>
                                 <?php
                                    $querydoc = mysqli_query($db, "SELECT DISTINCT Documents from mainpage_others WHERE Scheme='$_GET[scheme]' AND DeletedStatus='0' ORDER BY Documents");
                                    while ($rowdoc = mysqli_fetch_array($querydoc)) {
                                    ?>
                                 <option <?php if ($_GET['document'] == $rowdoc['Documents']) {
                                    echo "selected";
                                    } ?> value="<?php echo $rowdoc['Documents']; ?>"><?php echo $rowdoc['Documents']; ?></option>
                                 <?php
                                    }
                                    } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>User</h5>
                           <div class="row">
                              <div class="col-md-14">
                                 <div class="form-check m-form-check">
                                    <input <?php if ($_GET['user1'] == 'Farmer Producer Group/Food Processor/Exporter') {
                                       echo "checked";
                                       } ?> type="radio" class="form-check-input" name="user1" id="" value="Farmer Producer Group/Food Processor/Exporter"><label class="form-check-label" for="flexRadioDefault1"style="font-size: 14px;">Farmer Producer Group/Food Processor/Exporter
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>&nbsp;</h5>
                           <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="about_other_related.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="other_related.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <br>
                        <div class="gswww">
                        </div>
                        <div class="container">
                           <?php if ($_GET['scheme'] != '' and $_GET['scheme_category'] != '' and $_GET['document'] != '') { ?>
                           <div class="row">
                              <?php if ($querynum > 0) { ?>                      
                              <div class="col-md-4">
                                 <h5>Document Name</h5>
                              </div>
                              <div class="col-md-2">
                                 <h5>Document</h5>
                              </div>
                              <div class="col-md-3">
                                 <h5>Document Source</h5>
                              </div>
                              <div class="col-md-3">
                                 <h5>Source Link</h5>
                              </div>
                              <?php
                                 }
                                 $count = 1;
                                 while ($row = mysqli_fetch_array($query)) { ?>
                              <div class="col-md-4">
                                 <p class="mb-2 mt-3">
                                     <i class="fa text-primary me-2"><?php echo $count; ?>.</i>
                                    <?php
                                    
                                       $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-", "", substr($row['DocumentUpload'], strpos($row['DocumentUpload'], '-DOC-'))), PATHINFO_FILENAME)));
                                       $doc_name2 = str_replace("_", " ", "$doc_name1");
                                       echo $doc_name3 = str_replace("-", " ", "$doc_name2");
                                       ?>
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <a href="home4-pdf.php?doc=<?php echo $row['Id']; ?>" target="_blank"><i
                                    style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                              </div>
                              <div class="col-md-3">
                                 <p style="overflow-y: auto;"><?php echo $row['Documents_Source']; ?></p>
                              </div>
                              <div class="col-md-3">
                                 <p style="overflow-y: auto;">
                                    <a href="<?php echo $row['Source_Link']; ?>"
                                       target="_blank"><?php echo $row['Source_Link']; ?></a>
                                 </p>
                              </div>
                              <?php
                              $count++;   }  ?>
                           </div>
                           <?php
                              } ?>
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