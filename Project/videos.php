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
include "most_visited_page.php";
$query1 = mysqli_query($db, "SELECT * from crop ORDER BY CropName");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="ti-icons/css/themify-icons.css" rel="stylesheet">
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
                    <h1 class="display-3 text-white animated slideInDown">Videos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Videos</li>
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
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                        standard dummy text ever since the 1500s</p>
                    </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="" method="GET">
                        <input type="hidden" name="gsw" value="<?php echo $_GET['gsw'];?>" required="">
                        <input type="hidden" name="od" value="<?php echo $_GET['od'];?>" required="">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <h5>Crop  </h5>
                                <div class="form-floating">
                                <select name="crp" class="form-control" required="">
                                 <option value="">Please Select</option>
                                 <?php 
                                    if($query1){
                                    while($row1 = mysqli_fetch_array($query1)){?>
                                 <option <?php if($_GET['crp'] == $row1['CropId']){echo "selected";} ?> value="<?php echo $row1['CropId']; ?>"><?php echo $row1['CropName']; ?></option>
                                 <?php }} ?>
                              </select>
                           </div>
                        </div>
                            <div class="col-md-4">
                                <h5>&nbsp; </h5>
                                <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                            </div>
<?php
if ($_GET['crp'] != '') {
    $query2 = mysqli_query($db, "SELECT * from standards WHERE GAPStandardWise = '$_GET[gsw]' AND OtherDocuments = '$_GET[od]' AND Crop = '$_GET[crp]' AND DeletedStatus='0' ORDER BY standards_id ASC");  
    if (mysqli_num_rows($query2) > 0) {
?>
                        <div class="col-md-4">
                           <h5>Documents</h5>
                        </div>
                        <div class="col-md-2">
                           <h5>View</h5>
                        </div>
                        <div class="col-md-3">
                           <h5>Remarks</h5>
                        </div>
                        <div class="col-md-3">
                           <h5>Documents Source</h5>
                        </div>
<?php
    }
    while ($row2 = mysqli_fetch_array($query2)) {
        $query3 = mysqli_query($db, "SELECT * from standards_documents WHERE standards_id = '$row2[standards_id]' ORDER BY documents_name");
		$docnum1 = 1;
        while ($row3 = mysqli_fetch_array($query3)) {
?>                       
                        <div class="col-md-4">
                           <p class="mb-2">
                              <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                                 <?php echo ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row3['documents_name'], strpos($row3['documents_name'], '-DOC-') + 1)), PATHINFO_FILENAME))); ?>
                           </p>
                        </div>
                        <div class="col-md-2">
                           <a href="Standards/<?php echo $row3['documents_name']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        </div>
                        <div class="col-md-3">
                           <p class="mb-2">
                                 <?php echo $row2['Remark']; ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p class="mb-2">
                                 <?php echo $row2['DocumentsSource']; ?>
                           </p>
                        </div>
<?php $docnum1 = $docnum1 + 1;}}} 
if ($_GET['crp'] != '') {
    $query2 = mysqli_query($db, "SELECT * from standards WHERE GAPStandardWise = '$_GET[gsw]' AND OtherDocuments = '$_GET[od]' AND Crop = '$_GET[crp]' AND DeletedStatus='0' ORDER BY standards_id ASC");
    if (mysqli_num_rows($query2) > 0) {
?>
                        <div class="col-md-6">
                           <h5>Video Clips</h5>
                        </div>
                        <div class="col-md-3">
                           <h5>Remarks</h5>
                        </div>
                        <div class="col-md-3">
                           <h5>Documents Source</h5>
                        </div>
<?php
    }
    while ($row2 = mysqli_fetch_array($query2)) {
        $query3 = mysqli_query($db, "SELECT * from standards_youtube_links WHERE standards_id = '$row2[standards_id]' ORDER BY standards_youtube_link_id");
		$docnum2 = 1;
        while ($row3 = mysqli_fetch_array($query3)) {
?>                       
                        <div class="col-md-6">
							  <i class="fa text-primary me-2"><?php echo $docnum2;?>.</i>
                           <a href="<?php echo $row3['YoutubeVideoLink']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        </div>
                        <div class="col-md-3">
                           <p class="mb-2">
                                 <?php echo $row2['Remark']; ?>
                           </p>
                        </div>
                        <div class="col-md-3">
                           <p class="mb-2">
                                 <?php echo $row2['DocumentsSource']; ?>
                           </p>
                        </div>
                        <?php $docnum2 = $docnum2 + 1;}}} ?>
                    </form>
                </div>
            </div>
        </div>
    </div></div>
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