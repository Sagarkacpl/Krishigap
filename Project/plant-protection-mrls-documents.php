<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
       header("Location: login.php"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
       header("Location: login.php");
   }
   include "most_visited_page.php";
      $query = mysqli_query($db, "SELECT * from mrls_laboratories_documents WHERE PageName = 'Plant Protection Products' AND DeletedStatus='0' AND type='MRLs' ORDER BY mrls_laboratories_documentId ASC");
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
                  <h1 class="display-3 text-white animated slideInDown" style="font-size: 45px;">Plant Protection Products MRLs Documents</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Plant Protection Products</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
         <div class="container">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="row g-3">
                     <div class="clearfix"></div>
                     <?php 
                        $mrls_laboratories_documentIds = array();
                        while ($row = mysqli_fetch_array($query)) {
                        $mrls_laboratories_documentIds[] = $row['mrls_laboratories_documentId'];
                        }
                          $mrls_laboratories_documentIds = implode ( ",", $mrls_laboratories_documentIds );
                         if($mrls_laboratories_documentIds != ''){
                          $query3s = mysqli_query($db, "SELECT mrls_laboratories_documentId FROM `mrls_laboratories_document_files`  WHERE mrls_laboratories_documentId IN ($mrls_laboratories_documentIds) AND DeletedStatus='0'");
                           $num3s = mysqli_num_rows($query3s); 
                        if ($num3s > 0) {
                        ?>                      
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
                     <?php }} ?>
                     <?php
                        $docnumz = 1;
                        $array = explode(',', $mrls_laboratories_documentIds); 
                           if($mrls_laboratories_documentIds != ''){
                           $documents_namezz = array();
                           foreach($array as $value) {
                           $queryzz = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `mrls_laboratories_document_files`  WHERE mrls_laboratories_documentId ='$value' AND DeletedStatus='0' GROUP BY documents_name1");
                                while($rowzz = mysqli_fetch_array($queryzz)){
                           $documents_namezz[] = $rowzz['documents_name1'];
                           }
                           }
                           $documents_namezzz = implode ( ",", $documents_namezz );
                           $array1 = array_unique(explode(',', $documents_namezzz)); 
                           foreach($array1 as $value1) {
                           $query311 = mysqli_query($db, "SELECT * FROM `mrls_laboratories_document_files` WHERE documents_name  LIKE '%$value1%' AND DeletedStatus='0' AND mrls_laboratories_documentId IN ($mrls_laboratories_documentIds)");
                                 $row311 = mysqli_fetch_assoc($query311);
                                 $mrls_laboratories_document_file_id1 = $row311['mrls_laboratories_document_file_id'];
                                  $mrls_laboratories_documentId1 = $row311['mrls_laboratories_documentId'];
                                  $query31 = mysqli_query($db, "SELECT * FROM `mrls_laboratories_document_files` WHERE mrls_laboratories_document_file_id = '$mrls_laboratories_document_file_id1' AND DeletedStatus='0'");
                                 $row31 = mysqli_fetch_assoc($query31);
                                 $query32 = mysqli_query($db, "SELECT * FROM `mrls_laboratories_documents` WHERE mrls_laboratories_documentId = '$mrls_laboratories_documentId1' AND DeletedStatus='0'");
                                 $row32 = mysqli_fetch_assoc($query32);
                                 if($row31['documents_name'] != ''){
                        ?>
                     <div class="col-md-4">
                        <p class="mb-2">
                           <i class="fa text-primary me-2"><?php echo $docnumz;?>.</i>
                           <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row31['documents_name'], strpos($row31['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?>
                        </p>
                     </div>
                     <div class="col-md-2">
                        <?php
                           $allowed =  array('pdf');
                           $ext = pathinfo($row31['documents_name'], PATHINFO_EXTENSION);
                           if(in_array($ext,$allowed) ) {?>
                        <a href="plant-protection-mrls-document-pdf.php?doc=<?php echo $row31['mrls_laboratories_document_file_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php }else{?>
                        <a href="MRLsLaboratories/<?php echo $row31['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php } ?>             
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row32['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row32['DocumentsSource']; ?>" target="_blank" ><?php echo $row32['DocumentsSource']; ?></a>
                           <?php }else{?>
                           <?php echo $row32['DocumentsSource']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row32['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row32['SourceLink']; ?>" target="_blank" ><?php echo $row32['SourceLink']; ?></a>
                           <?php }else{?>
                           <?php echo $row32['SourceLink']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <?php $docnumz = $docnumz + 1;}}}?>
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