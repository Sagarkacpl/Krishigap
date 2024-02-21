<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
include "connection.php";
$q = trim(filter_var($_GET['search'], FILTER_SANITIZE_STRING));
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
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
        <div class="container py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 style="font-size: 30px;margin-top: 8px;" class="display-3 text-white animated slideInDown">Showing results for "<?php echo $q; ?>"</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 0rem !important;">
        <div class="container">
            <div class="row g-5">

<?php
$query1 = mysqli_query($db, "SELECT * from food_safety_standards WHERE DeletedStatus='0' AND (StandardCategory LIKE '%$q%' OR GAPStandardWise LIKE '%$q%' OR Documents LIKE '%$q%' OR User LIKE '%$q%')");
$row1 = mysqli_fetch_assoc($query1);
if(mysqli_num_rows($query1) > 0){
?>
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="food-safety-standards.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row1['GAPStandardWise']));?>&sc=<?php echo $row1['StandardCategory'];?>&crp=00&th1=<?php echo $row1['User'];?>&od=<?php echo $row1['Documents'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/food-safety-standards.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row1['GAPStandardWise']));?>&sc=<?php echo $row1['StandardCategory'];?>&crp=00&th1=<?php echo $row1['User'];?>&od=<?php echo $row1['Documents'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Food Safety Standards</h4>
                   <h6 style="font-size: 14px;font-weight: 400;"><?php echo $row1['StandardCategory'];?></h6>
                 </a>
                </div>
<?php } ?>

<?php
$query2 = mysqli_query($db, "SELECT * from food_safety_standards_php WHERE DeletedStatus='0' AND (StandardCategory LIKE '%$q%' OR GAPStandardWise LIKE '%$q%' OR Documents LIKE '%$q%' OR User LIKE '%$q%')");
$row2 = mysqli_fetch_assoc($query2);
if(mysqli_num_rows($query2) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="food-safety-standards_PHP.php?gsw=<?php echo str_replace(' ','',$row2['GAPStandardWise']);?>&sc=<?php echo $row2['StandardCategory'];?>&crp=00&th1=<?php echo $row2['User'];?>&od=<?php echo $row2['Documents'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/food-safety-standards_PHP.php?gsw=<?php echo str_replace(' ','',$row2['GAPStandardWise']);?>&sc=<?php echo $row2['StandardCategory'];?>&crp=00&th1=<?php echo $row2['User'];?>&od=<?php echo $row2['Documents'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Food Safety Standards</h4>
                   <h6 style="font-size: 14px;font-weight: 400;"><?php echo $row2['StandardCategory'];?></h6>
                 </a>
                </div>
<?php } ?>



<?php
$query3 = mysqli_query($db, "SELECT * from food_safety_standards_si WHERE DeletedStatus='0' AND (StandardCategory LIKE '%$q%' OR GAPStandardWise LIKE '%$q%' OR Documents LIKE '%$q%' OR User LIKE '%$q%')");
$row3 = mysqli_fetch_assoc($query3);
if(mysqli_num_rows($query3) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="food-safety-standards_SI.php?gsw=<?php echo str_replace('-','',str_replace(' ','',$row3['GAPStandardWise']));?>&sc=<?php echo $row3['StandardCategory'];?>&crp=00&th1=<?php echo $row3['User'];?>&od=<?php echo $row3['Documents'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/food-safety-standards_SI.php?gsw=<?php echo str_replace('-','',str_replace(' ','',$row3['GAPStandardWise']));?>&sc=<?php echo $row3['StandardCategory'];?>&crp=00&th1=<?php echo $row3['User'];?>&od=<?php echo $row3['Documents'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Standards</h4>
                   <h6 style="font-size: 14px;font-weight: 400;"><?php echo $row3['StandardCategory'];?></h6>
                 </a>
                </div>
<?php } ?>

<?php
$query4 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%')");
$row4 = mysqli_fetch_assoc($query4);
if(mysqli_num_rows($query4) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="farmer-hand-book.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row4['GAPStandardWise']));?>&sw=<?php echo $row4['SeasonWise'];?>&crp=00&lg=<?php echo $row4['Language'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/farmer-hand-book.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row4['GAPStandardWise']));?>&sw=<?php echo $row4['SeasonWise'];?>&crp=00&lg=<?php echo $row4['Language'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Farmer Hand Book</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query5 = mysqli_query($db, "SELECT * from demo_farm WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR DocumentsTitle LIKE '%$q%' OR DocumentsLink LIKE '%$q%' OR VideoTitle LIKE '%$q%' OR YoutubeVideoLink LIKE '%$q%')");
$row5 = mysqli_fetch_assoc($query5);
if(mysqli_num_rows($query5) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="demo-farm.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row5['GAPStandardWise']));?>&crp=00&lg=<?php echo $row5['Language'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/demo-farm.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row5['GAPStandardWise']));?>&crp=00&lg=<?php echo $row5['Language'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Demo Farm</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query6 = mysqli_query($db, "SELECT * from internal_inspection WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR DocumentsTitle LIKE '%$q%' OR DocumentsLink LIKE '%$q%' OR VideoTitle LIKE '%$q%' OR YoutubeVideoLink LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%')");
$row6 = mysqli_fetch_assoc($query6);
if(mysqli_num_rows($query6) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="internal-inspection.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row6['GAPStandardWise']));?>&crp=00&lg=<?php echo $row6['Language'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/internal-inspection.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row6['GAPStandardWise']));?>&crp=00&lg=<?php echo $row6['Language'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Internal Inspection</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query7 = mysqli_query($db, "SELECT * from internal_audit WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR DocumentsTitle LIKE '%$q%' OR DocumentsLink LIKE '%$q%' OR VideoTitle LIKE '%$q%' OR YoutubeVideoLink LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%')");
$row7 = mysqli_fetch_assoc($query7);
if(mysqli_num_rows($query7) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="internal-audit.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row7['GAPStandardWise']));?>&crp=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/internal-audit.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row7['GAPStandardWise']));?>&crp=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Internal Audit</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query8 = mysqli_query($db, "SELECT * from internal_audit_php WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR DocumentsTitle LIKE '%$q%' OR DocumentsLink LIKE '%$q%' OR VideoTitle LIKE '%$q%' OR YoutubeVideoLink LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%')");
$row8 = mysqli_fetch_assoc($query8);
if(mysqli_num_rows($query8) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="internal-audit_PHP.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row8['GAPStandardWise']));?>&crp=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/internal-audit_PHP.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row8['GAPStandardWise']));?>&crp=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Internal Audit</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Post Harvest Processing</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query9 = mysqli_query($db, "SELECT * from internal_audit_si WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR DocumentsTitle LIKE '%$q%' OR DocumentsLink LIKE '%$q%' OR VideoTitle LIKE '%$q%' OR YoutubeVideoLink LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%')");
$row9 = mysqli_fetch_assoc($query9);
if(mysqli_num_rows($query9) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="internal-audit_SI.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row9['GAPStandardWise']));?>&crp=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/internal-audit_SI.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row9['GAPStandardWise']));?>&crp=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Internal Audit</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Sustainable Initiatives</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query10 = mysqli_query($db, "SELECT * from package_of_practices WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%')");
$row10 = mysqli_fetch_assoc($query10);
if(mysqli_num_rows($query10) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="Package-of-practices.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row10['GAPStandardWise']));?>&sw=<?php echo $row10['SeasonWiseID'];?>&ct=<?php echo $row10['CountryID'];?>&st=00&crp=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/Package-of-practices.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row10['GAPStandardWise']));?>&sw=<?php echo $row10['SeasonWiseID'];?>&ct=<?php echo $row10['CountryID'];?>&st=00&crp=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Package Of Practices</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query11 = mysqli_query($db, "SELECT * from harvesting WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR StandardCategory LIKE '%$q%' OR User LIKE '%$q%')");
$row11 = mysqli_fetch_assoc($query11);
if(mysqli_num_rows($query11) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="harvesting.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row11['GAPStandardWise']));?>&sc=<?php echo $row11['StandardCategory'];?>&crp=00&th1=<?php echo $row11['User'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/harvesting.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row11['GAPStandardWise']));?>&sc=<?php echo $row11['StandardCategory'];?>&crp=00&th1=<?php echo $row11['User'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Harvesting</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query12 = mysqli_query($db, "SELECT * from plant_nutritional_management WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%')");
$row12 = mysqli_fetch_assoc($query12);
if(mysqli_num_rows($query12) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="crops-standards.php?gsw=<?php echo $row12['GAPStandardWise'];?>&cid=00&ct=102" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/crops-standards.php?gsw=<?php echo $row12['GAPStandardWise'];?>&cid=00&ct=102</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Crops Standards</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query13 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR StandardCategory LIKE '%$q%')");
$row13 = mysqli_fetch_assoc($query13);
if(mysqli_num_rows($query13) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="workers-health.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row13['GAPStandardWise']));?>&sc=<?php echo $row13['StandardCategory'];?>&cid=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/workers-health.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row13['GAPStandardWise']));?>&sc=<?php echo $row13['StandardCategory'];?>&cid=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Workers Health, Safety & Welfare</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query14 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main_php WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR StandardCategory LIKE '%$q%')");
$row14 = mysqli_fetch_assoc($query14);
if(mysqli_num_rows($query14) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="workers-health_PHP.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row14['GAPStandardWise']));?>&sc=<?php echo $row14['StandardCategory'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/workers-health_PHP.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row14['GAPStandardWise']));?>&sc=<?php echo $row14['StandardCategory'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Workers Health, Safety & Welfare</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Post Harvest Processing</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query15 = mysqli_query($db, "SELECT * from workers_health_safety_welfare_main_si WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR StandardCategory LIKE '%$q%')");
$row15 = mysqli_fetch_assoc($query15);
if(mysqli_num_rows($query15) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="workers-health_SI.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row15['GAPStandardWise']));?>&sc=<?php echo $row15['StandardCategory'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/workers-health_SI.php?gsw=<?php echo str_replace('.','',str_replace(' ','',$row15['GAPStandardWise']));?>&sc=<?php echo $row15['StandardCategory'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Workers Health, Safety & Welfare</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Sustainable Initiatives</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query16 = mysqli_query($db, "SELECT * from others WHERE DeletedStatus='0' AND (Title LIKE '%$q%' OR Description LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR State LIKE '%$q%')");
$row16 = mysqli_fetch_assoc($query16);
if(mysqli_num_rows($query16) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="other-option.php?nm=<?php echo $row16['Title'];?>&type=search&st=ALL" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/other-option.php?nm=<?php echo $row16['Title'];?>&type=search&st=ALL</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Others</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query17 = mysqli_query($db, "SELECT * from others_php WHERE DeletedStatus='0' AND (Title LIKE '%$q%' OR Description LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR State LIKE '%$q%')");
$row17 = mysqli_fetch_assoc($query17);
if(mysqli_num_rows($query17) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="other-option_PHP.php?nm=<?php echo $row17['Title'];?>&type=search&st=ALL" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/other-option_PHP.php?nm=<?php echo $row17['Title'];?>&type=search&st=ALL</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Others</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Post Harvest Processing</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query18 = mysqli_query($db, "SELECT * from others_si WHERE DeletedStatus='0' AND (Title LIKE '%$q%' OR Description LIKE '%$q%' OR TrainingModulesTitle LIKE '%$q%' OR TrainingModulesLink LIKE '%$q%' OR Remark LIKE '%$q%' OR DocumentsSource LIKE '%$q%' OR SourceLink LIKE '%$q%' OR State LIKE '%$q%')");
$row18 = mysqli_fetch_assoc($query18);
if(mysqli_num_rows($query18) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="other-option_SI.php?nm=<?php echo $row18['Title'];?>&type=search&st=ALL" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/other-option_SI.php?nm=<?php echo $row18['Title'];?>&type=search&st=ALL</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Others</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">Sustainable Initiatives</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query19 = mysqli_query($db, "SELECT * from plant_protection_products WHERE DeletedStatus='0' AND (PesticideStatus LIKE '%$q%' OR DocumentSource LIKE '%$q%' OR DocumentLink LIKE '%$q%' OR DocumentName1 LIKE '%$q%' OR UploadDocument1 LIKE '%$q%' OR DocumentSource1 LIKE '%$q%' OR DocumentLink1 LIKE '%$q%')");
$row19 = mysqli_fetch_assoc($query19);
if(mysqli_num_rows($query19) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="plant-protection.php?stype=second&ct2=102&ps=00" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/plant-protection.php?stype=second&ct2=102&ps=00</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Plant Protection Products</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>

<?php
$query20 = mysqli_query($db, "SELECT * from plant_protection_products WHERE DeletedStatus='0' AND (GAPStandardWise LIKE '%$q%' OR DocumentSource LIKE '%$q%' OR DocumentLink LIKE '%$q%' OR DocumentName1 LIKE '%$q%' OR UploadDocument1 LIKE '%$q%' OR DocumentSource1 LIKE '%$q%' OR DocumentLink1 LIKE '%$q%')");
$row20 = mysqli_fetch_assoc($query20);
if(mysqli_num_rows($query20) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="plant-protection.php?stype=first&gsw=<?php echo str_replace('.','',str_replace(' ','',$row20['GAPStandardWise']));?>&ct=102&crp=00&cid=00&pmt=<?php echo $row20['Permitted'];?>" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/plant-protection.php?stype=first&gsw=<?php echo str_replace('.','',str_replace(' ','',$row20['GAPStandardWise']));?>&ct=102&crp=00&cid=00&pmt=<?php echo $row20['Permitted'];?></h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Plant Protection Products</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>


<?php
$query21 = mysqli_query($db, "SELECT * from schedule WHERE Course LIKE '%$q%' OR TopicCovered LIKE '%$q%' OR Mode LIKE '%$q%' OR FacultyOrganization LIKE '%$q%' OR FacultyName LIKE '%$q%' OR FacultyProfile LIKE '%$q%'");
$row21 = mysqli_fetch_assoc($query21);
if(mysqli_num_rows($query21) > 0){
?>
                 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 20px;">
                   <a href="schedule-page.php" target="_blank">
                   <h6 style="font-size: 14px;font-weight: 400;">https://www.krishigap.com/schedule-page.php</h6>
                   <h4 style="font-size: 20px;font-weight: 400;color: #1a0dab;">Schedule: Most Popular Course</h4>
                   <h6 style="font-size: 14px;font-weight: 400;">On Farm Production</h6>
                 </a>
                </div>
<?php } ?>

<?php
if(mysqli_num_rows($query1)+mysqli_num_rows($query2)+mysqli_num_rows($query3)+mysqli_num_rows($query4)+mysqli_num_rows($query5)+mysqli_num_rows($query6)+mysqli_num_rows($query7)+mysqli_num_rows($query8)+mysqli_num_rows($query9)+mysqli_num_rows($query10)+mysqli_num_rows($query11)+mysqli_num_rows($query12)+mysqli_num_rows($query13)+mysqli_num_rows($query14)+mysqli_num_rows($query15)+mysqli_num_rows($query16)+mysqli_num_rows($query17)+mysqli_num_rows($query18)+mysqli_num_rows($query19)+mysqli_num_rows($query20)+mysqli_num_rows($query21) == 0){
echo "<center><h3 style='color:red;'>Record not found.</h3></center>";
}

?>

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