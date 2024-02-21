<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_CS");
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_CS");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_CS'</script>";
   }
  //  include "most_visited_page.php";
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN plant_nutritional_management ON crop.CropId = plant_nutritional_management.CropId AND plant_nutritional_management.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['gsw'] != '' AND $_GET['ct'] != '' AND $_GET['cid'] != '') {
       if ($_GET['cid'] == '00') {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
           $query2 = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND DeletedStatus = '0'");
       } elseif ($_GET['cid'] != '00') {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0'");
           $query2 = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0'");
       } else {
           $query = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0'");
           $query2 = mysqli_query($db, "SELECT * from plant_nutritional_management where GAPStandardWise = '$_GET[gsw]' AND CountryID = '$_GET[ct]' AND CategoryId = '$_GET[cid]' AND DeletedStatus = '0'");
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
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
      <style>
         .m-tab .nav {
         border: 10px #ffffff solid;
         background: #ffffff;
         }
      </style>
   </head>
   <body>
      <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
         </div>
      </div>
      <?php include "navbar.php";?>
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown">Crops Standards</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Crops Standards</li>-->
      <!--               </ol>-->
      <!--               <a href='home1.php' class="btn btn-success btn-sm">Go Back</a>-->
      <!--            </nav>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <div class="container-fluid p-0 mb-5">
          <img class="img-fluid" src="img/banner5.jpg" alt="" style="width:100%">
        </div>
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 3rem !important;">
         <div class="container">
            <div class="row g-4">
               <form action="" method="GET">
                  <div class="row g-3">
                     <div class="col-md-4">
                        <h5>Standard</h5>
                        <div class="form-floating">
                           <select id="gswselector" name="gsw" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['gsw'] == 'Agmark Standards'){echo "selected";} ?> value="Agmark Standards">Agmark Standards</option>
                              <option <?php if($_GET['gsw'] == 'Bureau of Indian Standards'){echo "selected";} ?> value="Bureau of Indian Standards">Bureau of Indian Standards</option>
                              <option <?php if($_GET['gsw'] == 'Central Seed Certification Board - Minimum Seed Certification Standards'){echo "selected";} ?> value="Central Seed Certification Board - Minimum Seed Certification Standards">Central Seed Certification Board - Minimum Seed Certification Standards</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <h5>Crop Category</h5>
                        <div class="form-floating">
                           <select name="cid" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['cid'] == '00'){echo "selected";}  ?> value="00">ALL</option>
                              <!--<option <?php if($_GET['cid'] == 'Cereals'){echo "selected";}  ?> value="Cereals">Cereals</option>-->
                              <!--<option <?php if($_GET['cid'] == 'FruitsandVegetables'){echo "selected";}  ?> value="FruitsandVegetables">Fruits and Vegetables</option>-->
                              <!--<option <?php if($_GET['cid'] == 'SpicesandCondiments'){echo "selected";}  ?> value="SpicesandCondiments">Spices and Condiments</option>-->
                              <?php 
                                 #$queryc = mysqli_query($db,"SELECT * from category_standards where DeletedStatus='0' ORDER BY CategoryName");
                                   #      if($queryc){
                                    #     while($rowc = mysqli_fetch_array($queryc)){?>
                              <!-- <option <?php # if($_GET['cid'] == $rowc['CategoryId']){echo "selected";}  ?> value="<?php # echo $rowc['CategoryId']; ?>"><?php # echo $rowc['CategoryName']; ?></option> -->
                              <?php # }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <h5>Country</h5>
                        <div class="form-floating">
                           <select id="country" name="ct" class="form-control" required="">
                              <option></option>
                              <?php 
                                 $query113 = mysqli_query($db,"SELECT * from countries ORDER BY CountryName");
                                        if($query113){
                                        while($row113 = mysqli_fetch_array($query113)){?>
                              <option <?php if($_GET['ct'] == $row113['CountryID']){echo "selected";}  ?> value="<?php echo $row113['CountryID']; ?>"><?php echo $row113['CountryName']; ?></option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button style="margin-top: 30px;" class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                     </div>
                     <div class="col-md-2">
                        <h5>&nbsp;</h5>
                        <a href="crops-standards-about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                     </div>
                     <!--<div class="col-md-2">-->
                     <!--   <h5>&nbsp;</h5>-->
                     <!--   <a href="crops-standards-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                     <!--</div>-->
                     <div style="margin-top: 25px;">
                      <p><b>A NATIONAL</b></p>
                           <p>1. Bureau of Indian Standards (BIS) is the National Standard Body of India, which is
responsible for the harmonious development of the National Standards. Prescribed
quality standards for 16 Spices, Spice Powders, Concentrates and Oleoresins, and
Cereals, Pulses and Millet Products</p>
 <p>2. AGMARK is a certification mark for agricultural produce under Agricultural Produce
(Grading Marking) Act, 1937, assuring that they conform to a grade standard notified by
Directorate of Marketing &amp; Inspection, Ministry of Agriculture &amp; Farmers Welfare, Govt of
India. It Published Grading and Marking Rules for Pulses, Cereals, Fruits &amp; Vegetables and
Vegetable Oils ,Fiber Crops, Edible Nuts, Spices etc</p>
<p><b>B INTERNATIONAL</b></p>
                           <p>1. United Nations Economic Commission for Europe through its Working Party on
Agricultural Quality Standards developed internationally agreed commercial quality
standards for agricultural produce. The standards are based on existing national
standards, industry and trade practices.</p>
                        </div>
                  </div>
               </form>
               <?php if ($_GET['gsw'] != '' AND $_GET['ct'] != '' AND $_GET['cid'] != '') {?>
               <div class="container">
                  <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="row g-3 m-tab">
                        <?php
                           $num = 0;
                           while ($row = mysqli_fetch_array($query)) {
                               $plant_nutritional_management_id = $row['plant_nutritional_management_id'];
                               $querynum = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_tabs`  WHERE plant_nutritional_management_id = '$plant_nutritional_management_id' AND DeletedStatus='0'");
                               while ($rownum = mysqli_fetch_array($querynum)) {
                                   $querynum1 = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_documents`  WHERE plant_nutritional_management_tab_id = '$rownum[plant_nutritional_management_tab_id]' AND DeletedStatus='0'");
                                   while ($rownum1 = mysqli_fetch_array($querynum1)) {
                                       if ($rownum1['documents_name'] != '') {
                                           $num = $num + 1;
                                       }
                                   }
                               }
                           }
                           if ($num > 0) { ?>
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
                        <?php }
                           $docnum = 1;
                             while ($row2 = mysqli_fetch_array($query2)) {
                                $plant_nutritional_management_id1 = $row2['plant_nutritional_management_id'];
                             $query3 = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_tabs` WHERE plant_nutritional_management_id = '$plant_nutritional_management_id1' AND DeletedStatus='0'");
                             while ($row3 = mysqli_fetch_array($query3)) {
                             $query4 = mysqli_query($db, "SELECT * FROM `plant_nutritional_management_documents`  WHERE plant_nutritional_management_tab_id = '$row3[plant_nutritional_management_tab_id]' AND DeletedStatus='0'");
                            
                             while ($row4 = mysqli_fetch_array($query4)) {
                              if($row4['documents_name'] != ''){
                              ?>
                        <div class="col-md-4">
                           <p class="mb-2" style="overflow-y: auto;">
                              <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                              <?php 
                               echo  $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row4['documents_name'], strpos($row4['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); 
                                 $doc_name2 = str_replace("_"," ","$doc_name1");
                                  $doc_name3 = str_replace("-"," ","$doc_name2");
                                 ?>
                                 
                           </p>
                        </div>
                        <div class="col-md-2">
                           <?php
                              $allowed =  array('pdf');
                              $ext = pathinfo($row4['documents_name'], PATHINFO_EXTENSION);
                              if(in_array($ext,$allowed) ) {?>
                           <a href="crops-standards-pdf.php?doc=<?php echo $row4['plant_nutritional_management_documents_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php }else{?>
                           <a href="Plant-Nutritional-Management/<?php echo $row4['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                           <?php } ?>              
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;" class="mb-2">
                              <?php if (!filter_var($row3['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row3['DocumentsSource']; ?>" target="_blank"><?php echo $row3['DocumentsSource']; ?></a>
                              <?php }else{?>
                              <?php echo $row3['DocumentsSource']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p style="overflow-y: auto;" class="mb-2">
                              <?php if (!filter_var($row3['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                              <a href="<?php echo $row3['SourceLink']; ?>" target="_blank"><?php echo $row3['SourceLink']; ?></a>
                              <?php }else{?>
                              <?php echo $row3['SourceLink']; ?>
                              <?php } ?>
                           </p>
                        </div>
                        <?php $docnum = $docnum + 1;}}}} ?>
                     </div>
                  </div>
                  <?php } ?>
               </div>
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