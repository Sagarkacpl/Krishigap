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
  //  include "most_visited_page.php";
   if ($_GET['gsw'] != '') {
       if ($_GET['gsw'] == 'IndGAP') {
           $GETgsw = 'IndG.A.P';
       }
       if ($_GET['gsw'] == 'GLOBALGAP') {
           $GETgsw = 'GLOBALG.A.P';
       }
       if ($_GET['gsw'] == 'OrganicNPOP') {  
           $GETgsw = 'Organic NPOP';
       }
       if ($_GET['gsw'] == 'OrganicNOP') {
           $GETgsw = 'Organic NOP';
       }
       if ($_GET['gsw'] == 'FairtradeInternational') {
           $GETgsw = 'Fairtrade International';
       }
       if ($_GET['gsw'] == 'RainforestAlliance') {
           $GETgsw = 'Rainforest Alliance';
       }
   $query = mysqli_query($db, "SELECT * from related_documents WHERE PageName = 'Internal Inspection' AND GAPStandardWise = '$GETgsw' AND DeletedStatus='0' ORDER BY RelatedDocumentId ASC");
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
                  <h1 class="display-3 text-white animated slideInDown">Internal Inspection Related Documents</h1>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Internal Inspection</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
         <div class="container">
            <div class="col-md-4">
               <h5>Standard</h5>
               <div class="form-floating">
                  <select id="gswselector" name="gsw" class="form-control" required="" onchange="if (this.value) window.location.href=this.value">
                     <option value="internal-inspection-related-documents.php">All</option>
                     <option value="internal-inspection-related-documents.php?gsw=IndGAP" <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                     <option value="internal-inspection-related-documents.php?gsw=GLOBALGAP" <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                     <option value="internal-inspection-related-documents.php?gsw=OrganicNPOP" <?php if($_GET['gsw'] == 'OrganicNPOP'){echo "selected";} ?> value="OrganicNPOP">Organic NPOP</option>
                     <option value="internal-inspection-related-documents.php?gsw=OrganicNOP" <?php if($_GET['gsw'] == 'OrganicNOP'){echo "selected";} ?> value="OrganicNOP">Organic NOP</option>
                     <option value="internal-inspection-related-documents.php?gsw=FairtradeInternational" <?php if($_GET['gsw'] == 'FairtradeInternational'){echo "selected";} ?> value="FairtradeInternational">Fairtrade International</option>
                     <option value="internal-inspection-related-documents.php?gsw=RainforestAlliance" <?php if($_GET['gsw'] == 'RainforestAlliance'){echo "selected";} ?> value="RainforestAlliance">Rainforest Alliance</option>
                  </select>
               </div>
            </div>
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="row g-3">
                     <div class="clearfix"></div>
                     <?php 
                        $RelatedDocumentIds = array();
                        while ($row = mysqli_fetch_array($query)) {
                        $RelatedDocumentIds[] = $row['RelatedDocumentId'];
                        }
                          $RelatedDocumentIds = implode ( ",", $RelatedDocumentIds );
                         if($RelatedDocumentIds != ''){
                          $query3s = mysqli_query($db, "SELECT RelatedDocumentId FROM `related_document_files`  WHERE RelatedDocumentId IN ($RelatedDocumentIds) AND DeletedStatus='0'");
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
                        $array = explode(',', $RelatedDocumentIds); 
                           if($RelatedDocumentIds != ''){
                           $documents_namezz = array();
                           foreach($array as $value) {
                           $queryzz = mysqli_query($db, "SELECT distinct substring(documents_name,21,500) as documents_name1 FROM `related_document_files`  WHERE RelatedDocumentId ='$value' AND DeletedStatus='0' GROUP BY documents_name1");
                                while($rowzz = mysqli_fetch_array($queryzz)){
                           $documents_namezz[] = $rowzz['documents_name1'];
                           }
                           }
                           $documents_namezzz = implode ( ",", $documents_namezz );
                           $array1 = array_unique(explode(',', $documents_namezzz)); 
                           foreach($array1 as $value1) {
                           $query311 = mysqli_query($db, "SELECT * FROM `related_document_files` WHERE documents_name  LIKE '%$value1%' AND DeletedStatus='0' AND RelatedDocumentId IN ($RelatedDocumentIds)");
                                 $row311 = mysqli_fetch_assoc($query311);
                                 $related_document_file_id1 = $row311['related_document_file_id'];
                                  $RelatedDocumentId1 = $row311['RelatedDocumentId'];
                                  $query31 = mysqli_query($db, "SELECT * FROM `related_document_files` WHERE related_document_file_id = '$related_document_file_id1' AND DeletedStatus='0'");
                                 $row31 = mysqli_fetch_assoc($query31);
                                 $query32 = mysqli_query($db, "SELECT * FROM `related_documents` WHERE RelatedDocumentId = '$RelatedDocumentId1' AND DeletedStatus='0'");
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
                        <a href="internal-inspection-related-document-pdf.php?doc=<?php echo $row31['related_document_file_id']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php }else{?>
                        <a href="RelatedDocuments/<?php echo $row31['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
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