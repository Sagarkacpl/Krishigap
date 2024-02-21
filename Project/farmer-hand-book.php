<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    //   header("Location: login.php?page=OFP_FHB");
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_FHB'</script>";
   }
   // include "most_visited_page.php";
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_FHB");
   }
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN farmer_hand_book ON crop.CropId = farmer_hand_book.Crop AND farmer_hand_book.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['sw'] != '' AND $_GET['gsw'] != '' AND $_GET['crp'] != '') {
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
        //   if ($_GET['gsw'] == 'Medicinal Plants') {
        //   $GETgsw = 'Medicinal Plants';
        //   }
        
           if ($_GET['crp'] == '00') {
           $query2 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2t = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2t1 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2d1 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
       } else {
           $query2 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2t = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2t1 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2d1 = mysqli_query($db, "SELECT * from farmer_hand_book WHERE GAPStandardWise = '$GETgsw' AND Crop = '$_GET[crp]' AND DeletedStatus='0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
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
   <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
   <!--   <div class="container">-->
   <!--      <div class="row justify-content-center">-->
   <!--         <div class="col-lg-10 text-center">-->
   <!--            <h1 class="display-3 text-white animated slideInDown">Farmer Hand Book</h1>-->
   <!--            <nav aria-label="breadcrumb">-->
   <!--               <ol class="breadcrumb justify-content-center">-->
   <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
   <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Farmer Hand Book</li>-->
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
   <div class="container-xxl py-5" style="padding-top: 2rem !important;padding-bottom: 4rem !important;">
      <div class="container">
         <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
               <form action="" method="GET">
                  <div class="row g-3">
                     <div class="col-md-3">
                        <h5>Standard</h5>
                        <div class="form-floating">
                           <select id="gswselector" name="gsw" class="form-control" required="">
                              <option></option>
                                 <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNPOP'){echo "selected";} ?> value="OrganicNPOP">Organic NPOP</option>
                                 <option <?php if($_GET['gsw'] == 'OrganicNOP'){echo "selected";} ?> value="OrganicNOP">Organic NOP</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <h5>Season wise</h5>
                        <div class="form-floating">
                           <select name="sw" class="form-control" required="">
                              <option></option>
                              <?php 
                                    $query111 = mysqli_query($db,"SELECT * from seasonwise ORDER BY SeasonWiseName");
                                           if($query111){
                                           while($row111 = mysqli_fetch_array($query111)){?>
                              <option <?php if($_GET['sw']==$row111['SeasonWiseID']){echo "selected" ;} ?> value="<?php echo $row111['SeasonWiseID']; ?>"><?php echo $row111['SeasonWiseName']; ?>
                              </option>
                              <?php }} ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <h5>Crop</h5>
                        <div class="form-floating">
                           <select name="crp" class="form-control" required="">
                              <option></option>
                              <option <?php if($_GET['crp']=='00' ){echo "selected" ;} ?> value="00">ALL</option>
                              <!-- <?php 
                                    if($query1){
                                    while($row1 = mysqli_fetch_array($query1)){?>
                              <option <?php if($_GET['crp']==$row1['CropId']){echo "selected" ;} ?> value="<?php echo $row1['CropId']; ?>"><?php echo $row1['CropName']; ?>
                              </option>
                              <?php }} ?> -->
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <h5>Language</h5>
                        <div class="form-floating">
                           <select name="lg" class="form-control" required="" id="lang">
                              <option <?php if($_GET['lg']=='English' ){echo "selected" ;} ?> value="English">English
                              </option>
                              <option <?php if($_GET['lg']=='Hindi' ){echo "selected" ;} ?> value="Hindi">Hindi</option>
                              <option <?php if($_GET['lg']=='Kannada' ){echo "selected" ;} ?> value="Kannada">Kannada
                              </option>
                              <option <?php if($_GET['lg']=='Marathi' ){echo "selected" ;} ?> value="Marathi">Marathi
                              </option>
                              <option <?php if($_GET['lg']=='Telugu' ){echo "selected" ;} ?> value="Telugu">Telugu
                              </option>
                              <option <?php if($_GET['lg']=='Tamil' ){echo "selected" ;} ?> value="Tamil">Tamil</option>
                              <option <?php if($_GET['lg']=='Malayalam' ){echo "selected" ;} ?>
                                 value="Malayalam">Malayalam</option>
                              <option <?php if($_GET['lg']=='Bengali' ){echo "selected" ;} ?> value="Bengali">Bengali
                              </option>
                              <option <?php if($_GET['lg']=='Odia' ){echo "selected" ;} ?> value="Odia">Odia</option>
                              <option <?php if($_GET['lg']=='Punjabi' ){echo "selected" ;} ?> value="Punjabi">Punjabi</option>
                              <option <?php if($_GET['lg']=='Gujarati' ){echo "selected" ;} ?> value="Gujarati">Gujarati</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <h5>&nbsp;</h5>
                        <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                     </div>
                     <div class="col-md-2">
                        <h5>&nbsp;</h5>
                        <a href="farmer-hand-book-about.php" target="_blank" style="color: #fff;"
                           class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                     </div>
                     <!--<div class="col-md-2">-->
                     <!--   <h5>&nbsp;</h5>-->
                     <!--   <a href="farmer-hand-book-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                     <!--</div>-->
                     <div style="margin-top: 25px;">
                        <p style="text-align: justify;"><b>IMPORTANT POINTS TO BE NOTED</b><br></p>
                        <?php if($_GET['lg'] == 'English') { ?>
                        <p style="text-align: justify;" id="ImportantNotice"><b>1.</b> <b>Objective:</b> To increase the
                           income of the farming community and safe food to the consumers through implementation of Good
                           Agricultural Practices through <b>Digital Learning</b>.<br><b>2.</b> Farmer Hand Book is the
                           most important folder/book to be maintained by the farmer for recording the farm activities
                           during the crop cycle.<br><b>3.</b> Record templates are generic and apply for all types of
                           crops and vary depending upon the standard requirements being implemented. You need to record
                           the crop details as grown by you in the respective templates as applicable to your
                           organization, crop cultivated and geographical conditions. We have provided some examples
                           only for your reference. Refer to our Disclaimer Policy.<br><b>4.</b> Farmer Hand Book is an
                           objective evidence for demonstration of implementation to be shown during internal
                           inspections, internal audits and external CB audits.<br><b>5.</b> Since the records are to be
                           maintained by the farmers, they need to be translated into language understood by the
                           farmers.<br><b>6.</b> Krishi GAP is working towards achieving Sustainable Development Goals
                           of United Nations.</p>
                        <?php } elseif($_GET['lg'] == 'Hindi') { ?>
                        <p style='text-align: justify;' id="ImportantNotice"><b>1.</b> <b>उद्देश्य:</b> डिजिटल शिक्षा के माध्यम से अच्छी कृषि प्रथाओं के कार्यान्वयन के माध्यम से किसानों की आय और उपभोक्ताओं को सुरक्षित भोजन में वृद्धि करना।.<br><b>2.</b> किसान पुस्तिका फसल चक्र के दौरान कृषि गतिविधियों को रिकॉर्ड करने के लिए किसान द्वारा रखी जाने वाली सबसे महत्वपूर्ण फ़ोल्डर/पुस्तिका है।<br><b>3.</b> रिकॉर्ड टेम्पलेट्स सामान्य हैं और सभी प्रकार की फसलों के लिए लागू होते हैं और लागू की जा रही मानक आवश्यकताओं के आधार पर भिन्न होते हैं। आपको अपने संगठन, फसल की खेती और भौगोलिक परिस्थितियों के अनुसार संबंधित टेम्प्लेट में आपके द्वारा उगाई गई फसल का विवरण दर्ज करने की आवश्यकता है। हमारी डिस्क्लेमर पॉलिसी देखें।<br><b>4.</b> किसान पुस्तिका आंतरिक निरीक्षण, आंतरिक लेखापरीक्षाओं और बाहरी CB लेखापरीक्षाओं के दौरान दिखाए जाने वाले कार्यान्वयन के प्रदर्शन के लिए एक महत्वपूर्ण साक्ष्य है।<br><b>5.</b> चूंकि रिकॉर्ड किसानों द्वारा बनाए रखा जाना है, उन्हें किसानों द्वारा समझी जाने वाली भाषा में अनुवाद करने की आवश्यकता है<br><b>6.</b> कृषि जीएपी संयुक्त राष्ट्र के सतत विकास लक्ष्यों को प्राप्त करने की दिशा में काम कर रहा है.</p>
                        <?php } elseif($_GET['lg'] == 'Kannada') { ?>
                        <p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>ಉದ್ದೇಶ:</b> ಕೃಷಿ ಸಮುದಾಯದ
                           ಆದಾಯವನ್ನು ಹೆಚ್ಚಿಸುವುದು ಮತ್ತು ಗ್ರಾಹಕರಿಗೆ ಸುರಕ್ಷಿತ ಆಹಾರವನ್ನು ಉತ್ತಮ ಕೃಷಿ ಪದ್ಧತಿಗಳ ಅನುಷ್ಠಾನದ ಮೂಲಕ
                           ಡಿಜಿಟಲ್ ಲಿಯರಾಂಗ್ </b>.<br><b>2.</b> ರೈತ ಕೈ ಪುಸ್ತಕವು ಬೆಳೆ ಚಕ್ರದಲ್ಲಿ ಕೃಷಿ ಚಟುವಟಿಕೆಗಳನ್ನು
                           ಟೆಕಾರ್ಡಿಂಗ್ ಮಾಡಲು ಟರ್ಮರ್‌ನಿಂದ ನಿರ್ವಹಿಸಬೇಕಾದ ಪ್ರಮುಖ ಫೋಲ್ಡರ್/ಪುಸ್ತಕವಾಗಿದೆ.<br><b>3.</b>
                           ರೆಕಾರ್ಡ್ ಟೆಂಪ್ಲೆಟ್ಗಳು ಸಾಮಾನ್ಯವಾಗಿದ್ದು, ಎಲ್ಲಾ ರೀತಿಯ ಬೆಳೆಗಳಿಗೆ ಅನ್ವಯಿಸುತ್ತವೆ ಮತ್ತು
                           ಕಾರ್ಯಗತಗೊಳ್ಳುತ್ತಿರುವ ಪ್ರಮಾಣಿತ ಅವಶ್ಯಕತೆಗಳನ್ನು ಅವಲಂಬಿಸಿ ಬದಲಾಗುತ್ತವೆ. ನಿಮ್ಮ ಸಂಸ್ಥೆ, ಬೆಳೆ ಬೆಳೆಸಿದ
                           ಮತ್ತು ಭೌಗೋಳಿಕ ಪರಿಸ್ಥಿತಿಗಳಿಗೆ ಅನ್ವಯವಾಗುವಂತೆ ನೀವು ಬೆಳೆದ ಬೆಳೆ ವಿವರಗಳನ್ನು ಆಯಾ ಟೆಂಪ್ಲೆಟ್ಗಳಲ್ಲಿ
                           ನೀವು ದಾಖಲಿಸಬೇಕಾಗಿದೆ. ನಮ್ಮ ಹಕ್ಕು ನಿರಾಕರಣೆ ನೀತಿಯನ್ನು ನೋಡಿ.<br><b>4.</b> ಫಾರ್ಮರ್ ಹ್ಯಾಂಡ್ ಬುಕ್
                           ಇಮೆಮಲ್ ನಿಷ್ಕ್ರಿಯತೆಗಳು, ಇಂಟೆಮಲ್ ಆಡಿಟ್‌ಗಳು ಮತ್ತು ಬಾಹ್ಯCB ಆಡಿಟ್‌ಗಳ ಸಮಯದಲ್ಲಿ ತೋರಿಸಬೇಕಾದ
                           ಎಂಎಂಪ್ಲಿಮೆಂಟೇಶನ್‌ನ ಪ್ರಾತ್ಯಕ್ಷಿಕೆಗೆ ವಸ್ತುನಿಷ್ಠ ಸಾಕ್ಷ್ಯವಾಗಿದೆ.<br><b>5.</b> ದಾಖಲೆಗಳನ್ನು ರೈತರೇ
                           ನಿರ್ವಹಿಸಬೇಕಾಗಿರುವುದರಿಂದ, ಅವುಗಳನ್ನು ರೈತರಿಗೆ ಅರ್ಥವಾಗುವ ಭಾಷೆಗೆ ಪರಿವರ್ತಿಸಬೇಕು.<br><b>6.</b> ಕೃಷಿ
                           ಜಿಎಪಿ ಯುರೆಟೆಡ್ ನೆಟಾನ್‌ಗಳ ಸುಸ್ಥಿರ ಅಭಿವೃದ್ಧಿ ಗೊಸಿಸ್ ಅನ್ನು ಸುಧಾರಿಸಲು ಕೆಲಸ ಮಾಡುತ್ತಿದೆ.</p>
                        <?php } elseif($_GET['lg'] == 'Marathi') {?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.</b> <b>उद्देशः:</b> डिजिटल लर्निंगद्वारे चांगल्या कृषी
                           पद्धतींच्या अंमलबजावणीद्वारे शेतकरी समुदायाचे उत्पन्न आणि ग्राहकांना सुरक्षित अन्न पूरवणे
                           <br><b>2.</b> शेतकरी हँड बुक हे सर्वात महत्वाचे फोल्डर/पुस्तक आहे ज्याची शेतकऱ्याने पीक
                           चक्रादरम्यान शेतीच्या क्रियाकलापांची नोंद ठेवली पाहिजे. <br><b>3.</b> रेकॉर्ड टेम्पलेट्स
                           जेनेरिक आहेत आणि सर्व प्रकारच्या पिकांसाठी लागू होतात आणि लागू केल्या जात असलेल्या मानक
                           आवश्यकतांवर अवलंबून बदलतात. तुमच्या संस्थेला, पिकांची लागवड आणि भौगोलिक परिस्थितीला लागू
                           असलेल्या साच्यांमध्ये तुम्ही पिकवलेले पीक तपशील तुम्हाला रेकॉर्ड करणे आवश्यक आहे. आमच्या
                           अस्वीकरण धोरणाचा संदर्भ घ्या <br><b>4.</b> फार्मर हँड बुक हे अंतर्गत तपासणी, अंतर्गत ऑडिट आणि
                           बाह्य सीबी ऑडिट दरम्यान दाखवल्या जाणार्‍या अंमलबजावणीच्या प्रात्यक्षिकासाठी एक वस्तुनिष्ठ
                           पुरावा आहे. <br><b>5.</b> कृषी GAP संयुक्त राष्ट्रांची शाश्वत विकास उद्दिष्टे साध्य
                           करण्यासाठी काम करत आहे
                        </p>
                        <?php } elseif($_GET['lg'] == 'Telugu') {?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.</b> <b>లక్ష్యం:</b> డిజిటల్ అభ్యాసాల ద్వారా మంచి వ్యవసాయ
                           పద్ధతులను అమలుతో వ్యవసాయదారుల ఆదాయాన్ని పెంచడం మరియు వినియోగదారులకు సురక్షితమైన ఆహారాన్ని
                           అందించడం <br><b>2.</b> రైతు హ్యాండ్ బుక్ అనేది పంట చక్రంలో వ్యవసాయ కార్యకలాపాలను రికార్డ్
                           చేయడానికి రైతు నిర్వహించాల్సిన అతి ముఖ్యమైన సంచయ/పుస్తకం. <br><b>3.</b> రికార్డు టెంప్లేట్లు
                           సాధారణమైనవి మరియు అన్ని రకాల పంటలకు వర్తించబడతాయి మరియు అమలు చేయబడిన ప్రామాణిక అవసరాల ఆధారంగా
                           మారుతూ ఉంటాయి. మీ సంస్థ, పంట సాగు, భౌగోళిక పరిస్థితులకు వర్తించే విధంగా మీరు పండించే పంటల
                           వివరాలను నమోదు చేసుకోవాలి. మన ప్రకటన విధానాన్ని పరిశీలించండి <br><b>4.</b> డీమో ఫార్మ్ అనేది
                           అంతర్గత తనిఖీ, అంతర్గత ఆడిట్లు మరియు బాహ్య సిబి ఆడిట్ల సమయంలో చూపాల్సిన ముఖ్యమైన సాక్ష్యాలు.
                           <br><b>5.</b> ఐక్యరాజ్యసమితి సుస్థిర అభివృద్ధి లక్ష్యాలను సాధించేందుకు దిశగా GAP కృషి
                           చేస్తోంది
                        </p>
                        <?php } elseif($_GET['lg'] == 'Tamil') {?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.</b>டிஜிட்டல் கற்றல் வழியாக நல்ல விவசாய நடைமுறைகளை
                           செயல்படுத்துவதன் மூலம் விவசாய சமூகத்தின் வருவாயை அதிகரிப்பது மற்றும் நுகர்வோருக்கு
                           பாதுகாப்பான உணவு கிடைப்பதை உறுதிபடுத்துவது.<br><b>2.</b>நடவடிக்கைகளைப் பதிவு செய்வதற்கு
                           விவசாயிகளால் பராமரிக்கப்பட வேண்டிய மிக முக்கியமான கோப்புறை/புத்தகம் ஆகும். <br><b>3.</b>
                           பதிவு டெம்ப்ளேட்களில் பொதுவானவை மற்றும் அனைத்து வகையான பயிர்களுக்கும் பொருந்தும், மேலும்
                           செயல்படுத்தப்படும் அடிபடையான தேவைகளைப் பொறுத்தும் மாறுபடும். உங்கள் நிறுவனம், பயிர் சாகுபடி
                           மற்றும் புவியியல் நிலைமைகளுக்குப் பொருந்தக்கூடிய வகையில், அந்தந்த டெம்ப்ளேட்களில் நீங்கள்
                           பயிரிட்ட பயிர் விவரங்களைப் பதிவு செய்ய வேண்டும். எங்கள் பொறுப்பு துறப்பு கொள்கையைப்
                           பார்க்கவும். <br><b>4.</b>உழவர் கையேடு என்பது உள் ஆய்வுகள், உள் தணிக்கைகள் மற்றும் வெளிப்புற
                           CB தணிக்கைகளின் போது காட்டப்படும் செயல்படுத்தலின் முன்வைப்பிற்கான ஒரு புறநிலை
                           சான்றாகும்.<br><b>5.</b>பதிவேடுகள் விவசாயிகளால் பராமரிக்கப்பட வேண்டும் என்பதால், அவை
                           விவசாயிகளுக்குப் புரியும் மொழியில் மொழிபெயர்க்கப்பட வேண்டும்.<br><b>6.</b>Krishi GAP அமைப்பு
                           ஐக்கிய நாடுகள் சபையின் நிலையான வளர்ச்சி இலக்குகளை அடைவதற்காக செயல்படுகிறது.</p>
                        <?php  } elseif($_GET['lg']=="Malayalam"){  ?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.ലക്ഷ്യം:</b>ഡിജിറ്റൽവിജ്ഞാനത്തിലൂടെമേന്മയുള്ളകാർഷികരീതികൾനടപ്പിലാക്കുകയുംകർഷകസമൂഹത്തിന്റെവരുമാനവുംഉപഭോക്താക്കൾക്ക്സുരക്ഷിതമായഭക്ഷണത്തിന്റെലഭ്യതയുംവർദ്ധിപ്പിക്കുക.<br><b>2.</b>കർഷകർക്കായുള്ള കൈപുസ്തകം.:വിളആവര്‍ത്തനസമയത്തുള്ളകാർഷികപ്രവർത്തനങ്ങൾരേഖപ്പെടുത്തുന്നതിനായികർഷകൻസൂക്ഷിക്കെണ്ടഏറ്റവും
                           പ്രധാനപ്പെട്ട രേഖ/പുസ്തകമാണ്.<br><b>3.</b>രൂപരേഖകൾപൊതുവായതുംഎല്ലാത്തരംളകൾക്ക്ബാധകമാണെങ്കിലുംനടപ്പിലാക്കപെടുന്നഅനിവാര്യമായമാനദണ്ഡങ്ങളെ
                           ആശ്രയിച്ച്വ്യത്യസ്‌തമായിരിക്കും. നിങ്ങളുടെസംഘടന, കൃഷി ചെയ്ത കൃഷി, ഭൂമിശാസ്ത്രപരമായ
                           സാഹചര്യങ്ങൾഎന്നിവയ്ക്ക്ബാധകമാകുന്നതരത്തിൽവിളയുടെവിശദാംശങ്ങൾബന്ധപ്പെട്ടരൂപരേഖപ്രകാരംരേഖപ്പെടുത്തേണ്ടതുണ്ട്.ഞങ്ങളുടെ
                           നിരാകരണ നയം കാണുക. <br><b>4.</b>പ്രവർത്തികമാക്കിയമാനദണ്ഢണ്ടങ്ങളെപ്പറ്റിആഭ്യന്തരപരിശോധനകൾ,
                           ആന്തരികഡിറ്റുകൾ,CBഓഡിറ്റുകൾഎന്നിവയിൽഹാജരാക്കണ്ടേവസ്തുനിഷ്ഠമായതെളിവാണ്കർഷകർക്കായുള്ള
                           കൈപുസ്തകം. <br><b>5.</b>രേഖകൾകർഷകർസൂക്ഷിക്കേണ്ടതിനാൽ,വകർഷകർക്ക്മനസ്സിലാകുന്നഭാഷയിലേക്ക്വിവർത്തനംചെയ്യേണ്ടതാണ്.
                           <br><b>6.</b>കൃഷിGAPഐക്യരാഷ്ട്രസഭയുടെസുസ്ഥിരവികസനലക്ഷ്യങ്ങൾകൈവരിക്കുന്നതിനായിപ്രവർത്തിക്കുന്നു.
                        </p>
                        <?php  }elseif($_GET['lg']=="Bengali") {  ?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.</b> <b>উদ্দেশ্য:</b> : ডিজিটাল শিক্ষার মাধ্যমে ভালো কৃষি
                           অনুশীলন বাস্তবায়নের মাধ্যমে কৃষক সম্প্রদায়ের আয় এবং ভোক্তাদের কাছে নিরাপদ খাদ্য বৃদ্ধি
                           করা।<br><b>2.</b> কৃষক হ্যান্ড বুক হল সবচেয়ে গুরুত্বপূর্ণ ফোল্ডার/বই যা কৃষকের দ্বারা
                           শস্যচক্রের সময় খামারের কার্যকলাপ রেকর্ড করার জন্য রক্ষণাবেক্ষণ করা হয়।<br><b>3.</b>রেকর্ড
                           টেমপ্লেটগুলি জেনেরিক এবং সমস্ত ধরণের ফসলের জন্য প্রযোজ্য এবং বাস্তবায়িত হওয়া মানক
                           প্রয়োজনীয়তার উপর নির্ভর করে পরিবর্তিত হয়। আপনার প্রতিষ্ঠান, ফসল চাষ এবং ভৌগোলিক অবস্থার
                           জন্য প্রযোজ্য সংশ্লিষ্ট টেমপ্লেটে আপনার জন্মানো ফসলের বিবরণ আপনাকে রেকর্ড করতে হবে। আমাদের
                           দাবিত্যাগ নীতি পড়ুন.<br><b>4.</b>অভ্যন্তরীণ পরিদর্শন, অভ্যন্তরীণ অডিট এবং বাহ্যিক সিবি
                           অডিটের সময় দেখানো বাস্তবায়নের প্রদর্শনের জন্য কৃষক হ্যান্ড বুক একটি বস্তুনিষ্ঠ
                           প্রমাণ।<br><b>5.</b>যেহেতু নথিগুলি কৃষকদের দ্বারা রক্ষণাবেক্ষণ করতে হয়, তাই সেগুলি কৃষকদের
                           বোঝার ভাষায় অনুবাদ করা প্রয়োজন৷<br><b>6.</b>কৃষি GAP জাতিসংঘের টেকসই উন্নয়ন লক্ষ্যমাত্রা
                           অর্জনের লক্ষ্যে কাজ করছে উল্লেখ্য গুরুত্বপূর্ণ পয়েন্ট: ডেমো ফার্ম উদ্দেশ্য: ডিজিটাল শিক্ষার
                           মাধ্যমে ভালো কৃষি অনুশীলন বাস্তবায়নের মাধ্যমে</p>
                        <?php  } elseif($_GET['lg']=="Odia") { ?>
                        <p style='text-align: justify;'  id='ImportantNotice'><b>1.</b> <b>ଉଦ୍ଦେଶ୍ୟ:</b> : ଡିଜିଟାଲ୍ ଲର୍ନିଂ ମାଧ୍ୟମରେ ଉତ୍ତମ କୃଷି
                           ଅଭ୍ୟାସ କାର୍ଯ୍ୟକାରୀ କରି ଗ୍ରାହକଙ୍କୁ କୃଷି ସମ୍ପ୍ରଦାୟର ଆୟ ଏବଂ ସୁରକ୍ଷିତ ଖାଦ୍ୟର ଆୟ ବୃଦ୍ଧି କରିବା<br><b>2.</b> କୃଷକ ହ୍ୟାଣ୍ଡ ବୁକ୍ ହେଉଛି ସବୁଠାରୁ ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ ଫୋଲ୍ଡର / ପୁସ୍ତକ ଯାହା ଫସଲ
                           ଚକ୍ର ସମୟରେ ଚାଷ କାର୍ଯ୍ୟକଳାପକୁ ରେକର୍ଡ କରିବା ପାଇଁ ଚାଷୀଙ୍କ ଦ୍ଵାରା ରକ୍ଷଣାବେକ୍ଷଣ କରାଯାଏ |<br><b>3.</b>ରେକର୍ଡ ଟେମ୍ପଲେଟଗୁଡିକ ଜେନେରିକ୍ ଏବଂ ସମସ୍ତ ପ୍ରକାରର ଫସଲ ପାଇଁ ପ୍ରୟୋଗ କରାଯାଏ ଏବଂ
                           କାର୍ଯ୍ୟକାରୀ ହେଉଥିବା ମାନକ ଆବଶ୍ୟକତା ଉପରେ ନିର୍ଭର କରେ | ତୁମର ସଂଗଠନ, ଫସଲ ଚାଷ ଏବଂ ଭୌଗୋଳିକ ଅବସ୍ଥା
                           ପାଇଁ ପ୍ରଯୁଜ୍ୟ ଟେମ୍ପଲେଟଗୁଡିକରେ ତୁମ ଦ୍ଵାରା ବଢିଥିବା ଫସଲ ବିବରଣୀକୁ ରେକର୍ଡ କରିବା ଆବଶ୍ୟକ | ଆମର
                           ପ୍ରତ୍ୟାଖ୍ୟାନ ନୀତି ଅନୁସରଣ କରନ୍ତୁ |<br><b>4.</b>ଆଭ୍ୟନ୍ତରୀଣ ଯାଞ୍ଚ, ଆଭ୍ୟନ୍ତରୀଣ ଅଡିଟ୍ ଏବଂ ବାହ୍ୟ
                           ସିବି ଅଡିଟ୍ ସମୟରେ ଦେଖାଯିବାକୁ ଥିବା କାର୍ଯ୍ୟକାରିତା ପ୍ରଦର୍ଶନ ପାଇଁ କୃଷକ ହ୍ୟାଣ୍ଡ ବୁକ୍ ହେଉଛି ଏକ
                           ଅବଜେକ୍ଟିଭ୍ ପ୍ରମାଣ |<br><b>5.</b>ଯେହେତୁ ରେକର୍ଡଗୁଡିକ କୃଷକମାନଙ୍କ ଦ୍ଵାରା ପରିଚାଳିତ ହେବ, ତେଣୁ
                           ସେମାନେ ବୁଝିପାରୁଥିବା ଭାଷାରେ ଅନୁବାଦ କରିବା ଆବଶ୍ୟକ |<br><b>6.</b>ମିଳିତ ଜାତିସଂଘର ସ୍ଥାୟୀ ବିକାଶ
                           ଲକ୍ଷ୍ୟ ହାସଲ ଦିଗରେ କୃଷି GAP କାର୍ଯ୍ୟ କରୁଛି |</p>
                        <?php  } elseif($_GET['lg']=="Punjabi") { ?>
                        <p style="text-align: justify;" id="ImportantNotice"><b>1.</b> <b>ਉਦੇਸ਼:</b>ਡਿਜੀਟਲ ਲਰਨਿੰਗ ਦੁਆਰਾ ਚੰਗੇ ਖੇਤੀਬਾੜੀ ਅਭਿਆਸਾਂ ਨੂੰ ਲਾਗੂ ਕਰਕੇ ਕਿਸਾਨ ਭਾਈਚਾਰੇ ਦੀ ਆਮਦਨ ਵਧਾਉਣਾ ਅਤੇ ਖਪਤਕਾਰਾਂ ਨੂੰ ਸੁਰੱਖਿਅਤ ਭੋਜਨ ਦੇਣਾ।<br><b>2.</b> ਫਾਰਮਰ ਹੈਂਡ ਬੁੱਕ ਫਸਲੀ ਚੱਕਰ ਦੌਰਾਨ ਖੇਤੀ ਗਤੀਵਿਧੀਆਂ ਨੂੰ ਰਿਕਾਰਡ ਕਰਨ ਲਈ ਕਿਸਾਨ ਦੁਆਰਾ ਸੰਭਾਲਿਆ ਜਾਣ ਵਾਲਾ ਸਭ ਤੋਂ ਮਹੱਤਵਪੂਰਨ ਫੋਲਡਰ/ਕਿਤਾਬ ਹੈ।<br><b>3.</b>ਰਿਕਾਰਡ ਟੈਂਪਲੇਟ ਆਮ ਹੁੰਦੇ ਹਨ ਅਤੇ ਸਾਰੀਆਂ ਕਿਸਮਾਂ ਦੀਆਂ ਫਸਲਾਂ 'ਤੇ ਲਾਗੂ ਹੁੰਦੇ ਹਨ ਅਤੇ ਲਾਗੂ ਕੀਤੀਆਂ ਜਾ ਰਹੀਆਂ ਮਿਆਰੀ ਲੋੜਾਂ ਦੇ ਆਧਾਰ 'ਤੇ ਵੱਖ-ਵੱਖ ਹੁੰਦੇ ਹਨ। ਤੁਹਾਨੂੰ ਤੁਹਾਡੇ ਦੁਆਰਾ ਉਗਾਈ ਗਈ ਫਸਲ ਦੇ ਵੇਰਵਿਆਂ ਨੂੰ ਸੰਬੰਧਿਤ ਟੈਂਪਲੇਟਾਂ ਵਿੱਚ ਰਿਕਾਰਡ ਕਰਨ ਦੀ ਲੋੜ ਹੈ ਜਿਵੇਂ ਕਿ ਤੁਹਾਡੀ ਸੰਸਥਾ, ਫਸਲਾਂ ਦੀ ਕਾਸ਼ਤ, ਅਤੇ ਭੂਗੋਲਿਕ ਸਥਿਤੀਆਂ 'ਤੇ ਲਾਗੂ ਹੁੰਦਾ ਹੈ। ਅਸੀਂ ਤੁਹਾਡੇ ਹਵਾਲੇ ਲਈ ਕੁਝ ਉਦਾਹਰਣਾਂ ਪ੍ਰਦਾਨ ਕੀਤੀਆਂ ਹਨ। ਸਾਡੀ ਬੇਦਾਅਵਾ ਨੀਤੀ ਨੂੰ ਵੇਖੋ।<br><b>4.</b>ਫਾਰਮਰ ਹੈਂਡ ਬੁੱਕ ਅੰਦਰੂਨੀ ਨਿਰੀਖਣਾਂ, ਅੰਦਰੂਨੀ ਆਡਿਟਾਂ, ਅਤੇ ਬਾਹਰੀ ਸੀਬੀ ਆਡਿਟ ਦੌਰਾਨ ਦਿਖਾਏ ਜਾਣ ਵਾਲੇ ਅਮਲ ਦੇ ਪ੍ਰਦਰਸ਼ਨ ਲਈ ਬਾਹਰਮੁਖੀ ਸਬੂਤ ਹੈ।<br><b>5.</b> ਕਿਉਂਕਿ ਰਿਕਾਰਡ ਕਿਸਾਨਾਂ ਦੁਆਰਾ ਸੰਭਾਲੇ ਜਾਣੇ ਹਨ, ਇਸ ਲਈ ਉਹਨਾਂ ਨੂੰ ਕਿਸਾਨਾਂ ਦੁਆਰਾ ਸਮਝੀ ਭਾਸ਼ਾ ਵਿੱਚ ਅਨੁਵਾਦ ਕਰਨ ਦੀ ਜ਼ਰੂਰਤ ਹੈ।<br><b>6.</b> ਕ੍ਰਿਸ਼ੀ ਜੀਏਪੀ ਸੰਯੁਕਤ ਰਾਸ਼ਟਰ ਦੇ ਟਿਕਾਊ ਵਿਕਾਸ ਟੀਚਿਆਂ ਨੂੰ ਪ੍ਰਾਪਤ ਕਰਨ ਲਈ ਕੰਮ ਕਰ ਰਹੀ ਹੈ।</p>
                        <?php  } elseif($_GET['lg']=="Gujarati") { ?>
                        <p style="text-align: justify;" id="ImportantNotice"><b>1.</b> <b>ઉદ્દેશ્ય: </b>ડિજિટલ લર્નિંગ દ્વારા સારી કૃષિ પદ્ધતિઓના અમલીકરણ દ્વારા ખેડૂત સમુદાયની આવક અને ગ્રાહકોને સલામત ખોરાકમાં વધારો કરવો.<br><b>2.</b>પાક ચક્ર દરમિયાન ખેત પ્રવૃતિઓ રેકોર્ડ કરવા માટે ખેડૂત દ્વારા જાળવવામાં આવતું સૌથી મહત્વપૂર્ણ ફોલ્ડર/પુસ્તક એ ખેડૂત હેન્ડ બુક છે.<br><b>3.</b>રેકોર્ડ ટેમ્પ્લેટ્સ સામાન્ય છે અને તમામ પ્રકારના પાકને લાગુ પડે છે અને અમલમાં આવી રહેલી માનક જરૂરિયાતોને આધારે બદલાય છે. તમારે તમારા દ્વારા ઉગાડવામાં આવેલ પાકની વિગતો તમારી સંસ્થાને લાગુ પડે તે પ્રમાણે સંબંધિત નમૂનાઓમાં, ખેતી કરેલ પાક અને ભૌગોલિક પરિસ્થિતિઓને રેકોર્ડ કરવાની જરૂર છે. અમે ફક્ત તમારા સંદર્ભ માટે કેટલાક ઉદાહરણો પ્રદાન કર્યા છે. અમારી અસ્વીકરણ નીતિનો સંદર્ભ લો.<br><b>4.</b>ફાર્મર હેન્ડ બુક એ આંતરિક નિરીક્ષણો, આંતરિક ઓડિટ અને બાહ્ય CB ઓડિટ દરમિયાન બતાવવામાં આવતા અમલીકરણના નિદર્શન માટેનો ઉદ્દેશ્ય પુરાવો છે.<br><b>5.</b>રેકર્ડ ખેડૂતો દ્વારા જાળવવાના હોવાથી, તેનો ખેડૂતો દ્વારા સમજાય તેવી ભાષામાં અનુવાદ કરવાની જરૂર છે.<br><b>6.</b>કૃષિ GAP સંયુક્ત રાષ્ટ્રના સસ્ટેનેબલ ડેવલપમેન્ટ ગોલ્સ હાંસલ કરવા માટે કામ કરી રહી છે.</p>
                        <?php }  else { ?>
                        <p style="text-align: justify;" id="ImportantNotice"><b>1.</b> <b>Objective:</b> To increase the
                           income of the farming community and safe food to the consumers through implementation of Good
                           Agricultural Practices through <b>Digital Learning</b>.<br><b>2.</b> Farmer Hand Book is the
                           most important folder/book to be maintained by the farmer for recording the farm activities
                           during the crop cycle.<br><b>3.</b> Record templates are generic and apply for all types of
                           crops and vary depending upon the standard requirements being implemented. You need to record
                           the crop details as grown by you in the respective templates as applicable to your
                           organization, crop cultivated and geographical conditions. We have provided some examples
                           only for your reference. Refer to our Disclaimer Policy.<br><b>4.</b> Farmer Hand Book is an
                           objective evidence for demonstration of implementation to be shown during internal
                           inspections, internal audits and external CB audits.<br><b>5.</b> Since the records are to be
                           maintained by the farmers, they need to be translated into language understood by the
                           farmers.<br><b>6.</b> Krishi GAP is working towards achieving Sustainable Development Goals
                           of United Nations.</p>
                        <?php } ?>
                     </div>
                     <div class="col-md-2"></div>
                     <div class="col-md-2"><img src="img/gpfd1.png"></div>
                     <div class="col-md-2"><img src="img/gpfd2.png"></div>
                     <div class="col-md-2"><img src="img/gpfd3.png"></div>
                     <div class="col-md-2"><img src="img/gpfd4.png"></div>
                     <div class="col-md-2"></div>
                     <div class="gswww">
                     </div>
                     <div id="IndGAP" class="gsww" style="display:none">
                        <?php include ("farmer-hand-book-IndG.A.P.php"); ?>
                     </div>
                     <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                     <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                     <div id="RainforestAlliance" class="gsww" style="display:none"></div>
                     <?php if ($_GET['sw'] != '' AND $_GET['gsw'] != '' AND $_GET['crp'] != '') {?>
                        <?php if ($_GET['gsw'] == 'IndGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Quality Council of India: <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'GLOBALGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>GlobalG.A.P: <a href="https://www.globalgap.org/uk_en" target="_blank">www.globalgap.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'OrganicNPOP') { ?> 
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>APEDA: <a href="https://apeda.gov.in/apedawebsite" target="_blank">www.apeda.gov.in</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'OrganicNOP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>USDA Agricultural Marketing Service: <a href="https://www.ams.usda.gov" target="_blank">www.ams.usda.gov</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'Medicinal Plants') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Quality Council of India: <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></b></p> 
                        <?php } ?>
                           <?php $farmer_hand_book_ids = array();
                             while ($row2 = mysqli_fetch_array($query2)) {
                           $farmer_hand_book_ids[] = $row2['farmer_hand_book_id'];
                           }
                           $farmer_hand_book_idss = "'" . implode ( "', '", $farmer_hand_book_ids ) . "'";
                           if($farmer_hand_book_idss != ''){

                           $query22num = mysqli_query($db, "SELECT distinct documents_name as documents_name1 FROM `farmer_hand_book_documents`  WHERE farmer_hand_book_id IN ($farmer_hand_book_idss) AND DeletedStatus='0' GROUP BY documents_name1");
                             $numdt+= mysqli_num_rows($query22num);
                           if ($numdt > 0) {
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
                     <?php
                           }}
                           $docnum1 = 1;
                           if($farmer_hand_book_idss != ''){
                           $query3 = mysqli_query($db, "SELECT distinct documents_name as documents_name1 FROM `farmer_hand_book_documents`  WHERE farmer_hand_book_id IN ($farmer_hand_book_idss) AND DeletedStatus='0' GROUP BY documents_name1;");
                           while ($row3 = mysqli_fetch_array($query3)) {
                               $documents_name1 = $row3['documents_name1'];
                               $query311 = mysqli_query($db, "SELECT * FROM `farmer_hand_book_documents` WHERE documents_name  LIKE '%$documents_name1%' AND DeletedStatus='0' AND farmer_hand_book_id IN ($farmer_hand_book_idss)");
                               $row311 = mysqli_fetch_assoc($query311);
                               $farmer_hand_book_documents_id1 = $row311['farmer_hand_book_documents_id'];
                               $farmer_hand_book_id1 = $row311['farmer_hand_book_id'];
                               $query31 = mysqli_query($db, "SELECT * FROM `farmer_hand_book_documents` WHERE farmer_hand_book_documents_id = '$farmer_hand_book_documents_id1' AND DeletedStatus='0'");
                               $row31 = mysqli_fetch_assoc($query31);
                               $iddoc = $row31['farmer_hand_book_id'];
                               $query32d = mysqli_query($db, "SELECT * FROM `farmer_hand_book` WHERE farmer_hand_book_id = '$iddoc' AND DeletedStatus='0'");
                               $row32d = mysqli_fetch_assoc($query32d);
                               $query32 = mysqli_query($db, "SELECT * FROM `farmer_hand_book` WHERE farmer_hand_book_id = '$farmer_hand_book_id1' AND DeletedStatus='0'");
                               $row32 = mysqli_fetch_assoc($query32);
                               if($row32d['farmer_hand_book_id'] > 0 ){
                                if($row31['documents_name'] != ''){
                                    
                                    $doc_name1 = ucfirst(preg_replace('/\\.[^.\\s]{3,4}$/', '', pathinfo(str_replace("DOC-","",substr($row31['documents_name'], strpos($row31['documents_name'], '-DOC-'))), PATHINFO_FILENAME))); 
                           $doc_name2 = str_replace("_"," ","$doc_name1");
                           $doc_name3 = str_replace("-"," ","$doc_name2");
                           if(!empty($doc_name3)){
                           ?>
                     <div class="col-md-4">
                        <p class="mb-2" style="overflow-y: auto;">
                           <i class="fa text-primary me-2">
                              <?php echo $docnum1; ?>.
                           </i>
                           <?php echo $doc_name3; ?>
                        </p>
                     </div>
                     <div class="col-md-2">
                        <?php
                              $allowed =  array('pdf');
                              $ext = substr(strrchr($row31['documents_name_folder'], "."), 1);
                              if(in_array($ext,$allowed) ) {?>
                        <a href="farmer-hand-book-pdf.php?doc=<?php echo $row31['farmer_hand_book_documents_id']; ?>"
                           target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php }else{?>
                        <a href="Farmer-Hand-Book/<?php echo $row31['documents_name_folder']; ?>" target="_blank"><i
                              style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                        <?php } ?>
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row32d['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row32d['DocumentsSource']; ?>" target="_blank">
                              <?php echo $row32d['DocumentsSource']; ?>
                           </a>
                           <?php }else{?>
                           <?php echo $row32d['DocumentsSource']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <div class="col-md-3">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row32d['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row32d['SourceLink']; ?>" target="_blank">
                              <?php echo $row32d['SourceLink']; ?>
                           </a>
                           <?php }else{?>
                           <?php echo $row32d['SourceLink']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <?php $docnum1 = $docnum1 + 1;}}}}}
                           while ($row22num = mysqli_fetch_array($query2t1)) {
                              $query33num = mysqli_query($db, "SELECT * from farmer_hand_book_youtube_links WHERE farmer_hand_book_id = '$row22num[farmer_hand_book_id]' AND DeletedStatus = '0' AND YoutubeVideoLink !='' AND YoutubeVideoLink != 'NA'");
                              $numyt += mysqli_num_rows($query33num);      
                           }if ($numyt > 0) {?>
                     <div class="col-md-6">
                        <h5>Youtube Links</h5>
                     </div>
                     <div class="col-md-6">
                        <h5>Documents Source</h5>
                     </div>
                     <?php
                           }
                           $docnum2 = 1;
                           while ($row22 = mysqli_fetch_array($query2t)) {
                               $query33 = mysqli_query($db, "SELECT * from farmer_hand_book_youtube_links WHERE farmer_hand_book_id = '$row22[farmer_hand_book_id]' AND DeletedStatus = '0' AND YoutubeVideoLink !='' AND YoutubeVideoLink != 'NA' ORDER BY farmer_hand_book_youtube_link_id");
                               while ($row33 = mysqli_fetch_array($query33)) {
                           ?>
                     <div class="col-md-6">
                        <i class="fa text-primary me-2">
                           <?php echo $docnum2; ?>.
                        </i>
                        <a href="<?php echo $row33['YoutubeVideoLink']; ?>" target="_blank"><i style="font-size: 30px;"
                              class="ti-files btn-icon-prepend"></i></a>
                     </div>
                     <div class="col-md-6">
                        <p style="overflow-y: auto;">
                           <?php if (!filter_var($row22['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                           <a href="<?php echo $row22['DocumentsSource']; ?>" target="_blank">
                              <?php echo $row22['DocumentsSource']; ?>
                           </a>
                           <?php }else{?>
                           <?php echo $row22['DocumentsSource']; ?>
                           <?php } ?>
                        </p>
                     </div>
                     <?php $docnum2 = $docnum2 + 1; }} ?>
                     <?php if( mysqli_num_rows($query2) == 0 AND ($_GET['gsw'] == 'OrganicNOP' OR $_GET['gsw'] == 'RainforestAlliance')){?>
                     <center>
                        <p style="font-size: 35px;color: red;">Coming Soon...</p>
                     </center>
                     <?php }} ?>
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
   <script>

      $(function () {

         $("#lang").on('change', function () {
            var langauge = this.value;

            if (langauge == "Hindi") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>उद्देश्य:</b> डिजिटल शिक्षा के माध्यम से अच्छी कृषि प्रथाओं के कार्यान्वयन के माध्यम से किसानों की आय और उपभोक्ताओं को सुरक्षित भोजन में वृद्धि करना।.<br><b>2.</b> किसान पुस्तिका फसल चक्र के दौरान कृषि गतिविधियों को रिकॉर्ड करने के लिए किसान द्वारा रखी जाने वाली सबसे महत्वपूर्ण फ़ोल्डर/पुस्तिका है।<br><b>3.</b> रिकॉर्ड टेम्पलेट्स सामान्य हैं और सभी प्रकार की फसलों के लिए लागू होते हैं और लागू की जा रही मानक आवश्यकताओं के आधार पर भिन्न होते हैं। आपको अपने संगठन, फसल की खेती और भौगोलिक परिस्थितियों के अनुसार संबंधित टेम्प्लेट में आपके द्वारा उगाई गई फसल का विवरण दर्ज करने की आवश्यकता है। हमारी डिस्क्लेमर पॉलिसी देखें।<br><b>4.</b> किसान पुस्तिका आंतरिक निरीक्षण, आंतरिक लेखापरीक्षाओं और बाहरी CB लेखापरीक्षाओं के दौरान दिखाए जाने वाले कार्यान्वयन के प्रदर्शन के लिए एक महत्वपूर्ण साक्ष्य है।<br><b>5.</b> चूंकि रिकॉर्ड किसानों द्वारा बनाए रखा जाना है, उन्हें किसानों द्वारा समझी जाने वाली भाषा में अनुवाद करने की आवश्यकता है<br><b>6.</b> कृषि जीएपी संयुक्त राष्ट्र के सतत विकास लक्ष्यों को प्राप्त करने की दिशा में काम कर रहा है.</p>");
            }


            else if (langauge == "English") {
               $("#ImportantNotice").html("<p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>Objective:</b> To increase the income of the farming community and safe food to the consumers  through implementation of Good Agricultural Practices through <b>Digital Learning</b>.<br><b>2.</b> Farmer Hand Book is the most important folder/book  to be maintained by the farmer for recording the farm activities during the crop cycle.<br><b>3.</b> Record templates are generic and apply for all types of crops and vary depending upon the standard requirements being implemented. You need to record the crop details as grown by you in the respective templates as applicable to your organization, crop cultivated and geographical conditions. We have provided some examples only for your reference. Refer to our Disclaimer Policy.<br><b>4.</b> Farmer Hand Book is an objective evidence for demonstration of implementation to be shown during internal inspections, internal audits and external CB audits.<br><b>5.</b> Since the records are to be maintained by the farmers, they need to be translated into language understood by the farmers.<br><b>6.</b> Krishi GAP is working towards achieving Sustainable Development Goals of United Nations.</p>");
            }
            else if (langauge == "Kannada") {
               $("#ImportantNotice").html("<p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>ಉದ್ದೇಶ:</b> ಕೃಷಿ ಸಮುದಾಯದ ಆದಾಯವನ್ನು ಹೆಚ್ಚಿಸುವುದು ಮತ್ತು ಗ್ರಾಹಕರಿಗೆ ಸುರಕ್ಷಿತ ಆಹಾರವನ್ನು ಉತ್ತಮ ಕೃಷಿ ಪದ್ಧತಿಗಳ ಅನುಷ್ಠಾನದ ಮೂಲಕ ಡಿಜಿಟಲ್ ಲಿಯರಾಂಗ್ </b>.<br><b>2.</b> ರೈತ ಕೈ ಪುಸ್ತಕವು ಬೆಳೆ ಚಕ್ರದಲ್ಲಿ ಕೃಷಿ ಚಟುವಟಿಕೆಗಳನ್ನು ಟೆಕಾರ್ಡಿಂಗ್ ಮಾಡಲು ಟರ್ಮರ್‌ನಿಂದ ನಿರ್ವಹಿಸಬೇಕಾದ ಪ್ರಮುಖ ಫೋಲ್ಡರ್/ಪುಸ್ತಕವಾಗಿದೆ.<br><b>3.</b> ರೆಕಾರ್ಡ್ ಟೆಂಪ್ಲೆಟ್ಗಳು ಸಾಮಾನ್ಯವಾಗಿದ್ದು, ಎಲ್ಲಾ ರೀತಿಯ ಬೆಳೆಗಳಿಗೆ ಅನ್ವಯಿಸುತ್ತವೆ ಮತ್ತು ಕಾರ್ಯಗತಗೊಳ್ಳುತ್ತಿರುವ ಪ್ರಮಾಣಿತ ಅವಶ್ಯಕತೆಗಳನ್ನು ಅವಲಂಬಿಸಿ ಬದಲಾಗುತ್ತವೆ. ನಿಮ್ಮ ಸಂಸ್ಥೆ, ಬೆಳೆ ಬೆಳೆಸಿದ ಮತ್ತು ಭೌಗೋಳಿಕ ಪರಿಸ್ಥಿತಿಗಳಿಗೆ ಅನ್ವಯವಾಗುವಂತೆ ನೀವು ಬೆಳೆದ ಬೆಳೆ ವಿವರಗಳನ್ನು ಆಯಾ ಟೆಂಪ್ಲೆಟ್ಗಳಲ್ಲಿ ನೀವು ದಾಖಲಿಸಬೇಕಾಗಿದೆ. ನಮ್ಮ ಹಕ್ಕು ನಿರಾಕರಣೆ ನೀತಿಯನ್ನು ನೋಡಿ.<br><b>4.</b> ಫಾರ್ಮರ್ ಹ್ಯಾಂಡ್ ಬುಕ್ ಇಮೆಮಲ್ ನಿಷ್ಕ್ರಿಯತೆಗಳು, ಇಂಟೆಮಲ್ ಆಡಿಟ್‌ಗಳು ಮತ್ತು ಬಾಹ್ಯCB ಆಡಿಟ್‌ಗಳ ಸಮಯದಲ್ಲಿ ತೋರಿಸಬೇಕಾದ ಎಂಎಂಪ್ಲಿಮೆಂಟೇಶನ್‌ನ ಪ್ರಾತ್ಯಕ್ಷಿಕೆಗೆ ವಸ್ತುನಿಷ್ಠ ಸಾಕ್ಷ್ಯವಾಗಿದೆ.<br><b>5.</b> ದಾಖಲೆಗಳನ್ನು ರೈತರೇ ನಿರ್ವಹಿಸಬೇಕಾಗಿರುವುದರಿಂದ, ಅವುಗಳನ್ನು ರೈತರಿಗೆ ಅರ್ಥವಾಗುವ ಭಾಷೆಗೆ ಪರಿವರ್ತಿಸಬೇಕು.<br><b>6.</b> ಕೃಷಿ ಜಿಎಪಿ ಯುರೆಟೆಡ್ ನೆಟಾನ್‌ಗಳ ಸುಸ್ಥಿರ ಅಭಿವೃದ್ಧಿ ಗೊಸಿಸ್ ಅನ್ನು ಸುಧಾರಿಸಲು ಕೆಲಸ ಮಾಡುತ್ತಿದೆ.</p>");
            }
            else if (langauge == "Marathi") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>उद्देशः:</b> डिजिटल लर्निंगद्वारे चांगल्या कृषी पद्धतींच्या अंमलबजावणीद्वारे शेतकरी समुदायाचे उत्पन्न आणि ग्राहकांना सुरक्षित अन्न पूरवणे <br><b>2.</b> शेतकरी हँड बुक हे सर्वात महत्वाचे फोल्डर/पुस्तक आहे ज्याची शेतकऱ्याने पीक चक्रादरम्यान शेतीच्या क्रियाकलापांची नोंद ठेवली पाहिजे. <br><b>3.</b> रेकॉर्ड टेम्पलेट्स जेनेरिक आहेत आणि सर्व प्रकारच्या पिकांसाठी लागू होतात आणि लागू केल्या जात असलेल्या मानक आवश्यकतांवर अवलंबून बदलतात. तुमच्या संस्थेला, पिकांची लागवड आणि भौगोलिक परिस्थितीला लागू असलेल्या साच्यांमध्ये तुम्ही पिकवलेले पीक तपशील तुम्हाला रेकॉर्ड करणे आवश्यक आहे. आमच्या अस्वीकरण धोरणाचा संदर्भ घ्या <br><b>4.</b> फार्मर हँड बुक हे अंतर्गत तपासणी, अंतर्गत ऑडिट आणि बाह्य सीबी ऑडिट दरम्यान दाखवल्या जाणार्‍या अंमलबजावणीच्या प्रात्यक्षिकासाठी एक वस्तुनिष्ठ पुरावा आहे. <br><b>5.</b> कृषी GAP संयुक्त राष्ट्रांची शाश्वत विकास उद्दिष्टे साध्य करण्यासाठी काम करत आहे </p>");
            }
            else if (langauge == "Telugu") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>లక్ష్యం:</b> డిజిటల్ అభ్యాసాల ద్వారా మంచి వ్యవసాయ పద్ధతులను అమలుతో వ్యవసాయదారుల ఆదాయాన్ని పెంచడం మరియు వినియోగదారులకు సురక్షితమైన ఆహారాన్ని అందించడం  <br><b>2.</b> రైతు హ్యాండ్ బుక్ అనేది పంట చక్రంలో వ్యవసాయ కార్యకలాపాలను రికార్డ్ చేయడానికి రైతు నిర్వహించాల్సిన అతి ముఖ్యమైన సంచయ/పుస్తకం. <br><b>3.</b> రికార్డు టెంప్లేట్లు సాధారణమైనవి మరియు అన్ని రకాల పంటలకు వర్తించబడతాయి మరియు అమలు చేయబడిన ప్రామాణిక అవసరాల ఆధారంగా మారుతూ ఉంటాయి. మీ సంస్థ, పంట సాగు, భౌగోళిక పరిస్థితులకు వర్తించే విధంగా మీరు పండించే పంటల వివరాలను నమోదు చేసుకోవాలి. మన ప్రకటన విధానాన్ని పరిశీలించండి  <br><b>4.</b> డీమో ఫార్మ్ అనేది అంతర్గత తనిఖీ, అంతర్గత ఆడిట్లు మరియు బాహ్య సిబి ఆడిట్ల సమయంలో చూపాల్సిన ముఖ్యమైన సాక్ష్యాలు. <br><b>5.</b> ఐక్యరాజ్యసమితి సుస్థిర అభివృద్ధి లక్ష్యాలను సాధించేందుకు దిశగా GAP కృషి చేస్తోంది </p>");
            }
            else if (langauge == "Tamil") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b>டிஜிட்டல் கற்றல் வழியாக நல்ல விவசாய நடைமுறைகளை செயல்படுத்துவதன் மூலம் விவசாய சமூகத்தின் வருவாயை அதிகரிப்பது மற்றும் நுகர்வோருக்கு பாதுகாப்பான உணவு கிடைப்பதை உறுதிபடுத்துவது.<br><b>2.</b>நடவடிக்கைகளைப் பதிவு செய்வதற்கு விவசாயிகளால் பராமரிக்கப்பட வேண்டிய மிக முக்கியமான கோப்புறை/புத்தகம் ஆகும். <br><b>3.</b> பதிவு டெம்ப்ளேட்களில் பொதுவானவை மற்றும் அனைத்து வகையான பயிர்களுக்கும் பொருந்தும், மேலும் செயல்படுத்தப்படும் அடிபடையான தேவைகளைப் பொறுத்தும் மாறுபடும். உங்கள் நிறுவனம், பயிர் சாகுபடி மற்றும் புவியியல் நிலைமைகளுக்குப் பொருந்தக்கூடிய வகையில், அந்தந்த டெம்ப்ளேட்களில் நீங்கள் பயிரிட்ட பயிர் விவரங்களைப் பதிவு செய்ய வேண்டும். எங்கள் பொறுப்பு துறப்பு கொள்கையைப் பார்க்கவும். <br><b>4.</b>உழவர் கையேடு என்பது உள் ஆய்வுகள், உள் தணிக்கைகள் மற்றும் வெளிப்புற CB தணிக்கைகளின் போது காட்டப்படும் செயல்படுத்தலின் முன்வைப்பிற்கான ஒரு புறநிலை சான்றாகும்.<br><b>5.</b>பதிவேடுகள் விவசாயிகளால் பராமரிக்கப்பட வேண்டும் என்பதால், அவை விவசாயிகளுக்குப் புரியும் மொழியில் மொழிபெயர்க்கப்பட வேண்டும்.<br><b>6.</b>Krishi GAP அமைப்பு ஐக்கிய நாடுகள் சபையின் நிலையான வளர்ச்சி இலக்குகளை அடைவதற்காக செயல்படுகிறது.</p>");
            }
            else if (langauge == "Malayalam") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.ലക്ഷ്യം:</b>ഡിജിറ്റൽവിജ്ഞാനത്തിലൂടെമേന്മയുള്ളകാർഷികരീതികൾനടപ്പിലാക്കുകയുംകർഷകസമൂഹത്തിന്റെവരുമാനവുംഉപഭോക്താക്കൾക്ക്സുരക്ഷിതമായഭക്ഷണത്തിന്റെലഭ്യതയുംവർദ്ധിപ്പിക്കുക.<br><b>2.</b>കർഷകർക്കായുള്ള കൈപുസ്തകം.:വിളആവര്‍ത്തനസമയത്തുള്ളകാർഷികപ്രവർത്തനങ്ങൾരേഖപ്പെടുത്തുന്നതിനായികർഷകൻസൂക്ഷിക്കെണ്ടഏറ്റവും പ്രധാനപ്പെട്ട രേഖ/പുസ്തകമാണ്. <br><b>3.</b>രൂപരേഖകൾപൊതുവായതുംഎല്ലാത്തരംളകൾക്ക്ബാധകമാണെങ്കിലുംനടപ്പിലാക്കപെടുന്നഅനിവാര്യമായമാനദണ്ഡങ്ങളെ ആശ്രയിച്ച്വ്യത്യസ്‌തമായിരിക്കും. നിങ്ങളുടെസംഘടന, കൃഷി ചെയ്ത കൃഷി, ഭൂമിശാസ്ത്രപരമായ സാഹചര്യങ്ങൾഎന്നിവയ്ക്ക്ബാധകമാകുന്നതരത്തിൽവിളയുടെവിശദാംശങ്ങൾബന്ധപ്പെട്ടരൂപരേഖപ്രകാരംരേഖപ്പെടുത്തേണ്ടതുണ്ട്.ഞങ്ങളുടെ നിരാകരണ നയം കാണുക.  <br><b>4.</b>പ്രവർത്തികമാക്കിയമാനദണ്ഢണ്ടങ്ങളെപ്പറ്റിആഭ്യന്തരപരിശോധനകൾ, ആന്തരികഡിറ്റുകൾ,CBഓഡിറ്റുകൾഎന്നിവയിൽഹാജരാക്കണ്ടേവസ്തുനിഷ്ഠമായതെളിവാണ്കർഷകർക്കായുള്ള  കൈപുസ്തകം. <br><b>5.</b> രേഖകൾകർഷകർസൂക്ഷിക്കേണ്ടതിനാൽ,വകർഷകർക്ക്മനസ്സിലാകുന്നഭാഷയിലേക്ക്വിവർത്തനംചെയ്യേണ്ടതാണ്. <br><b>6.</b>കൃഷിGAPഐക്യരാഷ്ട്രസഭയുടെസുസ്ഥിരവികസനലക്ഷ്യങ്ങൾകൈവരിക്കുന്നതിനായിപ്രവർത്തിക്കുന്നു.</p>");
            }

            else if (langauge == "Bengali") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>উদ্দেশ্য:</b> : ডিজিটাল শিক্ষার মাধ্যমে ভালো কৃষি অনুশীলন বাস্তবায়নের মাধ্যমে কৃষক সম্প্রদায়ের আয় এবং ভোক্তাদের কাছে নিরাপদ খাদ্য বৃদ্ধি করা।<br><b>2.</b> কৃষক হ্যান্ড বুক হল সবচেয়ে গুরুত্বপূর্ণ ফোল্ডার/বই যা কৃষকের দ্বারা শস্যচক্রের সময় খামারের কার্যকলাপ রেকর্ড করার জন্য রক্ষণাবেক্ষণ করা হয়।<br><b>3.</b>রেকর্ড টেমপ্লেটগুলি জেনেরিক এবং সমস্ত ধরণের ফসলের জন্য প্রযোজ্য এবং বাস্তবায়িত হওয়া মানক প্রয়োজনীয়তার উপর নির্ভর করে পরিবর্তিত হয়। আপনার প্রতিষ্ঠান, ফসল চাষ এবং ভৌগোলিক অবস্থার জন্য প্রযোজ্য সংশ্লিষ্ট টেমপ্লেটে আপনার জন্মানো ফসলের বিবরণ আপনাকে রেকর্ড করতে হবে। আমাদের দাবিত্যাগ নীতি পড়ুন.<br><b>4.</b>অভ্যন্তরীণ পরিদর্শন, অভ্যন্তরীণ অডিট এবং বাহ্যিক সিবি অডিটের সময় দেখানো বাস্তবায়নের প্রদর্শনের জন্য কৃষক হ্যান্ড বুক একটি বস্তুনিষ্ঠ প্রমাণ।<br><b>5.</b>যেহেতু নথিগুলি কৃষকদের দ্বারা রক্ষণাবেক্ষণ করতে হয়, তাই সেগুলি কৃষকদের বোঝার ভাষায় অনুবাদ করা প্রয়োজন৷<br><b>6.</b>কৃষি GAP জাতিসংঘের টেকসই উন্নয়ন লক্ষ্যমাত্রা অর্জনের লক্ষ্যে কাজ করছে উল্লেখ্য গুরুত্বপূর্ণ পয়েন্ট: ডেমো ফার্ম উদ্দেশ্য: ডিজিটাল শিক্ষার মাধ্যমে ভালো কৃষি অনুশীলন বাস্তবায়নের মাধ্যমে</p>");
            }
            else if (langauge == "Odia") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>ଉଦ୍ଦେଶ୍ୟ:</b> : ଡିଜିଟାଲ୍ ଲର୍ନିଂ ମାଧ୍ୟମରେ ଉତ୍ତମ କୃଷି ଅଭ୍ୟାସ କାର୍ଯ୍ୟକାରୀ କରି ଗ୍ରାହକଙ୍କୁ କୃଷି ସମ୍ପ୍ରଦାୟର ଆୟ ଏବଂ ସୁରକ୍ଷିତ ଖାଦ୍ୟର ଆୟ ବୃଦ୍ଧି କରିବା<br><b>2.</b> କୃଷକ ହ୍ୟାଣ୍ଡ ବୁକ୍ ହେଉଛି ସବୁଠାରୁ ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ ଫୋଲ୍ଡର / ପୁସ୍ତକ ଯାହା ଫସଲ ଚକ୍ର ସମୟରେ ଚାଷ କାର୍ଯ୍ୟକଳାପକୁ ରେକର୍ଡ କରିବା ପାଇଁ ଚାଷୀଙ୍କ ଦ୍ଵାରା ରକ୍ଷଣାବେକ୍ଷଣ କରାଯାଏ |<br><b>3.</b>ରେକର୍ଡ ଟେମ୍ପଲେଟଗୁଡିକ ଜେନେରିକ୍ ଏବଂ ସମସ୍ତ ପ୍ରକାରର ଫସଲ ପାଇଁ ପ୍ରୟୋଗ କରାଯାଏ ଏବଂ କାର୍ଯ୍ୟକାରୀ ହେଉଥିବା ମାନକ ଆବଶ୍ୟକତା ଉପରେ ନିର୍ଭର କରେ | ତୁମର ସଂଗଠନ, ଫସଲ ଚାଷ ଏବଂ ଭୌଗୋଳିକ ଅବସ୍ଥା ପାଇଁ ପ୍ରଯୁଜ୍ୟ ଟେମ୍ପଲେଟଗୁଡିକରେ ତୁମ ଦ୍ଵାରା ବଢିଥିବା ଫସଲ ବିବରଣୀକୁ ରେକର୍ଡ କରିବା ଆବଶ୍ୟକ | ଆମର ପ୍ରତ୍ୟାଖ୍ୟାନ ନୀତି ଅନୁସରଣ କରନ୍ତୁ |<br><b>4.</b>ଆଭ୍ୟନ୍ତରୀଣ ଯାଞ୍ଚ, ଆଭ୍ୟନ୍ତରୀଣ ଅଡିଟ୍ ଏବଂ ବାହ୍ୟ ସିବି ଅଡିଟ୍ ସମୟରେ ଦେଖାଯିବାକୁ ଥିବା କାର୍ଯ୍ୟକାରିତା ପ୍ରଦର୍ଶନ ପାଇଁ କୃଷକ ହ୍ୟାଣ୍ଡ ବୁକ୍ ହେଉଛି ଏକ ଅବଜେକ୍ଟିଭ୍ ପ୍ରମାଣ |<br><b>5.</b>ଯେହେତୁ ରେକର୍ଡଗୁଡିକ କୃଷକମାନଙ୍କ ଦ୍ଵାରା ପରିଚାଳିତ ହେବ, ତେଣୁ ସେମାନେ ବୁଝିପାରୁଥିବା ଭାଷାରେ ଅନୁବାଦ କରିବା ଆବଶ୍ୟକ |<br><b>6.</b>ମିଳିତ ଜାତିସଂଘର ସ୍ଥାୟୀ ବିକାଶ ଲକ୍ଷ୍ୟ ହାସଲ ଦିଗରେ କୃଷି GAP କାର୍ଯ୍ୟ କରୁଛି |</p>");
            }
             else if (langauge == "Punjabi") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>ਉਦੇਸ਼:</b>ਡਿਜੀਟਲ ਲਰਨਿੰਗ ਦੁਆਰਾ ਚੰਗੇ ਖੇਤੀਬਾੜੀ ਅਭਿਆਸਾਂ ਨੂੰ ਲਾਗੂ ਕਰਕੇ ਕਿਸਾਨ ਭਾਈਚਾਰੇ ਦੀ ਆਮਦਨ ਵਧਾਉਣਾ ਅਤੇ ਖਪਤਕਾਰਾਂ ਨੂੰ ਸੁਰੱਖਿਅਤ ਭੋਜਨ ਦੇਣਾ।<br><b>2.</b> ਫਾਰਮਰ ਹੈਂਡ ਬੁੱਕ ਫਸਲੀ ਚੱਕਰ ਦੌਰਾਨ ਖੇਤੀ ਗਤੀਵਿਧੀਆਂ ਨੂੰ ਰਿਕਾਰਡ ਕਰਨ ਲਈ ਕਿਸਾਨ ਦੁਆਰਾ ਸੰਭਾਲਿਆ ਜਾਣ ਵਾਲਾ ਸਭ ਤੋਂ ਮਹੱਤਵਪੂਰਨ ਫੋਲਡਰ/ਕਿਤਾਬ ਹੈ।<br><b>3.</b>ਰਿਕਾਰਡ ਟੈਂਪਲੇਟ ਆਮ ਹੁੰਦੇ ਹਨ ਅਤੇ ਸਾਰੀਆਂ ਕਿਸਮਾਂ ਦੀਆਂ ਫਸਲਾਂ 'ਤੇ ਲਾਗੂ ਹੁੰਦੇ ਹਨ ਅਤੇ ਲਾਗੂ ਕੀਤੀਆਂ ਜਾ ਰਹੀਆਂ ਮਿਆਰੀ ਲੋੜਾਂ ਦੇ ਆਧਾਰ 'ਤੇ ਵੱਖ-ਵੱਖ ਹੁੰਦੇ ਹਨ। ਤੁਹਾਨੂੰ ਤੁਹਾਡੇ ਦੁਆਰਾ ਉਗਾਈ ਗਈ ਫਸਲ ਦੇ ਵੇਰਵਿਆਂ ਨੂੰ ਸੰਬੰਧਿਤ ਟੈਂਪਲੇਟਾਂ ਵਿੱਚ ਰਿਕਾਰਡ ਕਰਨ ਦੀ ਲੋੜ ਹੈ ਜਿਵੇਂ ਕਿ ਤੁਹਾਡੀ ਸੰਸਥਾ, ਫਸਲਾਂ ਦੀ ਕਾਸ਼ਤ, ਅਤੇ ਭੂਗੋਲਿਕ ਸਥਿਤੀਆਂ 'ਤੇ ਲਾਗੂ ਹੁੰਦਾ ਹੈ। ਅਸੀਂ ਤੁਹਾਡੇ ਹਵਾਲੇ ਲਈ ਕੁਝ ਉਦਾਹਰਣਾਂ ਪ੍ਰਦਾਨ ਕੀਤੀਆਂ ਹਨ। ਸਾਡੀ ਬੇਦਾਅਵਾ ਨੀਤੀ ਨੂੰ ਵੇਖੋ।<br><b>4.</b>ਫਾਰਮਰ ਹੈਂਡ ਬੁੱਕ ਅੰਦਰੂਨੀ ਨਿਰੀਖਣਾਂ, ਅੰਦਰੂਨੀ ਆਡਿਟਾਂ, ਅਤੇ ਬਾਹਰੀ ਸੀਬੀ ਆਡਿਟ ਦੌਰਾਨ ਦਿਖਾਏ ਜਾਣ ਵਾਲੇ ਅਮਲ ਦੇ ਪ੍ਰਦਰਸ਼ਨ ਲਈ ਬਾਹਰਮੁਖੀ ਸਬੂਤ ਹੈ।<br><b>5.</b> ਕਿਉਂਕਿ ਰਿਕਾਰਡ ਕਿਸਾਨਾਂ ਦੁਆਰਾ ਸੰਭਾਲੇ ਜਾਣੇ ਹਨ, ਇਸ ਲਈ ਉਹਨਾਂ ਨੂੰ ਕਿਸਾਨਾਂ ਦੁਆਰਾ ਸਮਝੀ ਭਾਸ਼ਾ ਵਿੱਚ ਅਨੁਵਾਦ ਕਰਨ ਦੀ ਜ਼ਰੂਰਤ ਹੈ।<br><b>6.</b> ਕ੍ਰਿਸ਼ੀ ਜੀਏਪੀ ਸੰਯੁਕਤ ਰਾਸ਼ਟਰ ਦੇ ਟਿਕਾਊ ਵਿਕਾਸ ਟੀਚਿਆਂ ਨੂੰ ਪ੍ਰਾਪਤ ਕਰਨ ਲਈ ਕੰਮ ਕਰ ਰਹੀ ਹੈ।</p>");
            }
            else if (langauge == "Gujarati") {
               $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>ઉદ્દેશ્ય:</b>ડિજિટલ લર્નિંગ દ્વારા સારી કૃષિ પદ્ધતિઓના અમલીકરણ દ્વારા ખેડૂત સમુદાયની આવક અને ગ્રાહકોને સલામત ખોરાકમાં વધારો કરવો.<br><b>2.</b> પાક ચક્ર દરમિયાન ખેત પ્રવૃતિઓ રેકોર્ડ કરવા માટે ખેડૂત દ્વારા જાળવવામાં આવતું સૌથી મહત્વપૂર્ણ ફોલ્ડર/પુસ્તક એ ખેડૂત હેન્ડ બુક છે.d/પુસ્તકએખેડૂતહેન્ડબુકછે.<br><b>3.</b>રેકોર્ડ ટેમ્પ્લેટ્સ સામાન્ય છે અને તમામ પ્રકારના પાકને લાગુ પડે છે અને અમલમાં આવી રહેલી માનક જરૂરિયાતોને આધારે બદલાય છે. તમારે તમારા દ્વારા ઉગાડવામાં આવેલ પાકની વિગતો તમારી સંસ્થાને લાગુ પડે તે પ્રમાણે સંબંધિત નમૂનાઓમાં, ખેતી કરેલ પાક અને ભૌગોલિક પરિસ્થિતિઓને રેકોર્ડ કરવાની જરૂર છે. અમે ફક્ત તમારા સંદર્ભ માટે કેટલાક ઉદાહરણો પ્રદાન કર્યા છે. અમારી અસ્વીકરણ નીતિનો સંદર્ભ લો..તમારેતમારાદ્વારાઉગાડવામાંઆવેલપાકનીવિગતોતમારીસંસ્થાનેલાગુપડેતેપ્રમાણેસંબંધિતનમૂનાઓમાં, ખેતીકરેલપાકઅનેભૌગોલિકપરિસ્થિતિઓનેરેકોર્ડકરવાનીજરૂરછે. અમેફક્તતમારાસંદર્ભમાટેકેટલાકઉદાહરણોપ્રદાનકર્યાછે. અમારીઅસ્વીકરણનીતિનોસંદર્ભલો.<br><b>4.</b>ફાર્મર હેન્ડ બુક એ આંતરિક નિરીક્ષણો, આંતરિક ઓડિટ અને બાહ્ય CB ઓડિટ દરમિયાન બતાવવામાં આવતા અમલીકરણના નિદર્શન માટેનો ઉદ્દેશ્ય પુરાવો છે., આંતરિકઓડિટઅનેબાહ્યCB ઓડિટદરમિયાનબતાવવામાંઆવતાઅમલીકરણનાનિદર્શનમાટેનોઉદ્દેશ્યપુરાવોછે.<br><b>5.</b>રેકર્ડખેડૂતોદ્વારાજાળવવાનાહોવાથી, તેનોખેડૂતોદ્વારાસમજાયતેવીભાષામાંઅનુવાદકરવાનીજરૂરછે.<br><b>6.</b>કૃષિGAP સંયુક્તરાષ્ટ્રનાસસ્ટેનેબલડેવલપમેન્ટગોલ્સહાંસલકરવામાટેકામકરીરહીછે.</p</p>");
            }
            else {
               $("#ImportantNotice").html();
            }
         });

      });

   </script>
</body>
<?php

if(isset($_SERVER['HTTPS']))
{
    $actual_link = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
    

}
else
{
    $actual_link = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
    
}
$page_url = trim($actual_link);
$page_id = trim($page_url);

$query = "SELECT * FROM `most_visited_page` WHERE page_id='$page_id'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result) == 0)
{
   $insert_query = "INSERT INTO `most_visited_page` (page,page_id,number,DeletedStatus) VALUES('$page_url','$page_url',1,0)";
    if(mysqli_query($db,$insert_query))
    {
        return true;
    }
    else
    {
        return false;
    }
}
else
{
    $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $number = intval(trim($data['number']))+1;
    $update_query = "UPDATE `most_visited_page` SET number='$number' WHERE page_id='$page_id'";
    if(mysqli_query($db,$update_query))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>

</html>