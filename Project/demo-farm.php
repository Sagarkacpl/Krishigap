<?php
   session_start();
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   error_reporting(0);
   if ($_SESSION['UID'] == '') {
    header("Location: login.php?page=OFP_DF"); 
   }
   include "connection.php";
   if (!in_array('On Farm Production', explode(',',$_SESSION["PlanDetails"]))) {
    // header("Location: login.php?page=OFP_DF"); 
       echo "<script>alert('You do not have permission to access this section')</script>";
        echo "<script>window.location.href='login.php?page=OFP_DF'</script>";
   }
   $query1 = mysqli_query($db, "SELECT DISTINCT crop.CropId, crop.CropName from crop INNER JOIN demo_farm ON crop.CropId = demo_farm.Crop AND demo_farm.DeletedStatus='0' ORDER BY crop.CropName");
   if ($_GET['gsw'] != '' AND $_GET['crp'] != '') {
        if ($_GET['gsw'] == 'IndGAP') {
              $GETgsw = 'IndG.A.P';
          }
          if ($_GET['gsw'] == 'GLOBALGAP') {
              $GETgsw = 'GLOBALG.A.P';
          }
     
           $query2 = mysqli_query($db,"SELECT DISTINCT * from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           
           $query2_num = mysqli_num_rows($query2);
           $query2dt = mysqli_query($db,"SELECT DISTINCT * from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND Language = '$_GET[lg]' ORDER BY sort ASC");
           $query2dt_num = mysqli_num_rows($query2dt);
           $query2yt = mysqli_query($db,"SELECT DISTINCT VideoTitle from demo_farm WHERE GAPStandardWise = '$GETgsw' AND DeletedStatus = '0' AND (YoutubeVideoLink != '' OR YoutubeVideoLink != '') AND Language = '$_GET[lg]' ORDER BY VideoTitle");
           $query2yt_num = mysqli_num_rows($query2yt);
        
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
      <!--<div class="container-fluid bg-primary py-5 mb-5 page-header">-->
      <!--   <div class="container">-->
      <!--      <div class="row justify-content-center">-->
      <!--         <div class="col-lg-10 text-center">-->
      <!--            <h1 class="display-3 text-white animated slideInDown">Demo Farm</h1>-->
      <!--            <nav aria-label="breadcrumb">-->
      <!--               <ol class="breadcrumb justify-content-center">-->
      <!--                  <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>-->
      <!--                  <li class="breadcrumb-item text-white active" aria-current="page">Demo farm</li>-->
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
      <div class="container-xxl py-5" style="padding-top: 3rem !important;padding-bottom: 6rem !important;">
         <div class="container">
            <div class="row g-4">
               <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                  <form action="" method="GET">
                     <div class="row g-3">
                        <div class="col-md-4">
                           <h5>Standard</h5>
                           <div class="form-floating">
                              <select id="gswselector" name="gsw" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['gsw'] == 'IndGAP'){echo "selected";} ?> value="IndGAP">IndG.A.P</option>
                                 <option <?php if($_GET['gsw'] == 'GLOBALGAP'){echo "selected";} ?> value="GLOBALGAP">GLOBALG.A.P</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <h5>Crop</h5>
                           <div class="form-floating">
                              <select name="crp" class="form-control" required="">
                                 <option></option>
                                 <option <?php if($_GET['crp'] == '00'){echo "selected";} ?> value="00">ALL</option>
                                 <?php 
                                    if($query1){
                                    while($row1 = mysqli_fetch_array($query1)){?>
                                 <option <?php if($_GET['crp'] == $row1['CropId']){echo "selected";} ?> value="<?php echo $row1['CropId']; ?>"><?php echo $row1['CropName']; ?></option>
                                 <?php }} ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <h5>Language</h5>
                           <div class="form-floating">
                              <select name="lg" class="form-control" required="" id="lang">
                                 <option <?php if($_GET['lg'] == 'English'){echo "selected";} ?> value="English">English</option>
                                 <option <?php if($_GET['lg'] == 'Hindi'){echo "selected";} ?> value="Hindi">Hindi</option>
                                 <option <?php if($_GET['lg'] == 'Kannada'){echo "selected";} ?> value="Kannada">Kannada</option>
                                 <option <?php if($_GET['lg'] == 'Marathi'){echo "selected";} ?> value="Marathi">Marathi</option>
                                 <option <?php if($_GET['lg'] == 'Telugu'){echo "selected";} ?> value="Telugu">Telugu</option>
                                 <option  <?php if($_GET['lg'] == 'Tamil'){echo "selected";} ?> value="Tamil">Tamil</option>
                                <option <?php if($_GET['lg'] == 'Malayalam'){echo "selected";} ?> value="Malayalam">Malayalam</option>
                                <option <?php if($_GET['lg'] == 'Bengali'){echo "selected";} ?> value="Bengali">Bengali</option>
                                <option <?php if($_GET['lg'] == 'Odia'){echo "selected";} ?> value="Odia">Odia</option>
                                <option <?php if($_GET['lg'] == 'Gujarati'){echo "selected";} ?> value="Gujarati">Gujarati</option>
                                <option <?php if($_GET['lg'] == 'Punjabi'){echo "selected";} ?> value="Punjabi">Punjabi</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <button class="btn btn-primary w-100 py-3" type="submit">Show Result</button>
                        </div>
                        <div class="col-md-2">
                           <h5>&nbsp;</h5>
                           <a href="demo-farm-about.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">About This Section</a>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--   <h5>&nbsp;</h5>-->
                        <!--   <a href="demo-farm-related-documents.php" target="_blank" style="color: #fff;" class="btn btn-info w-100 py-3" type="submit">Related Documents</a>-->
                        <!--</div>-->
                        <div style="margin-top: 25px;">
                           <p style="text-align: justify;"><b>IMPORTANT POINTS TO BE NOTED</b><br></p>
                           <?php if($_GET['lg'] == 'Hindi') {?>
                              <p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>उद्देश्य:</b> डिजिटल शिक्षा के माध्यम से अच्छी कृषि प्रथाओं के कार्यान्वयन के माध्यम से किसानों की आय और उपभोक्ताओं को सुरक्षित भोजन में वृद्धि करना।.<br><b>2.</b> डेमो फार्म में दिखाई गई गतिविधियां सभी प्रकार की फसलों पर लागू होती हैं। <br><b>3.</b> <b>&quot;देखने और विश्वास करने की अवधारणा: </b> डेमो फार्म कृषि समुदाय के भीतर सबसे प्रभावी विस्तार शिक्षा उपकरण है, कौशल वृद्धि और सहकर्मी से सहकर्मी सीखने में से एक के रूप में सेवा करने और कार्यान्वयन के पैमाने को सुविधाजनक बनाने के लिए।  <br><b>4.</b> खेतों में बुनियादी ढांचे और खतरों की पहचान मानक आवश्यकताओं, अपनी गुणवत्ता प्रबंधन प्रणाली और भौगोलिक स्थिति पर आधारित होगी। हमने आपके संदर्भ के लिए कुछ उदाहरण दिए हैं। हमारी डिस्क्लेमर पॉलिसी देखें। <br><b>5.</b> किसान पुस्तिका आंतरिक निरीक्षण, आंतरिक लेखापरीक्षाओं और बाहरी CB लेखापरीक्षाओं के दौरान दिखाए जाने वाले कार्यान्वयन के प्रदर्शन के लिए एक महत्वपूर्ण साक्ष्य है। चूंकि ये किसानों द्वारा कार्यान्वित किए जाते हैं, उन्हें किसानों और आगंतुकों द्वारा समझी जाने वाली भाषा में अनुवाद करने की आवश्यकता है। <br><b>6.</b> कृषि जीएपी संयुक्त राष्ट्र के सतत विकास लक्ष्यों को प्राप्त करने की दिशा में काम कर रहा है</p>
                           <?php } elseif($_GET['lg'] == 'Kannada') {?>
                              <p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>ಉದ್ದೇಶ:</b> ಕೃಷಿ ಸಮುದಾಯದ ಆದಾಯವನ್ನು ಹೆಚ್ಚಿಸುವುದು ಮತ್ತು ಗ್ರಾಹಕರಿಗೆ ಸುರಕ್ಷಿತ ಆಹಾರವನ್ನು ಉತ್ತಮ ಕೃಷಿ ಪದ್ಧತಿಗಳ ಅನುಷ್ಠಾನದ ಮೂಲಕ ಡಿಜಿಟಲ್ ಲಿಯರಾಂಗ್ </b>.<br><b>2.</b> ಡೆಮೊ ಫಾರ್ಮ್‌ನಲ್ಲಿ ತೋರಿಸಿರುವ ಚಟುವಟಿಕೆಗಳು ಎಲ್ಲಾ ರೀತಿಯ ಬೆಳೆಗಳಿಗೆ ಅನ್ವಯಿಸುತ್ತವೆ.<br><b>3.</b> “ಸೀಯಿಂಗ್ ಎಂಡ್ ಬೆಲೀವಿಂಗ್ ಕಾನ್ಸೆಪ್ಟ್: ಡೆಮೊ ಫಾರ್ಮ್ ಅತ್ಯಂತ ಪರಿಣಾಮಕಾರಿ ವಿಸ್ತರಣಾ ಶಿಕ್ಷಣ ಸಾಧನಗಳಲ್ಲಿ ಒಂದನ್ನು ಪೂರೈಸಲು, ಕೌಶಲ್ಯ ವರ್ಧನೆ ಮತ್ತು ಕೃಷಿ ಸಮುದಾಯದೊಳಗೆ ಪೀರ್ ಟು ಪೀರ್ ಕಲಿಕೆಯು ಅನುಷ್ಠಾನದ ಹಂತವನ್ನು ಸುಗಮಗೊಳಿಸುತ್ತದೆ. <br><b>4.</b> ಫಾರ್ಮ್‌ಗಳಲ್ಲಿ ಮೂಲಸೌಕರ್ಯ ಅಂತಿಮ ಅಪಾಯಗಳ ಗುರುತಿಸುವಿಕೆ w6l ಸ್ಟೆಂಡರ್ಡ್ ಫೀಕ್ವಿರ್‌ಮೆಂಟ್‌ಗಳು, ನಿಮ್ಮ ಸ್ವಂತ ಗುಣಮಟ್ಟದ ನಿರ್ವಹಣಾ ವ್ಯವಸ್ಥೆಗಳು ಮತ್ತು ಭೌಗೋಳಿಕ ಪರಿಸ್ಥಿತಿಗಳನ್ನು ಆಧರಿಸಿದೆ. ನಿಮ್ಮ ಉಲ್ಲೇಖಕ್ಕಾಗಿ ಮಾತ್ರ ನಾವು ಕೆಲವು ಉದಾಹರಣೆಗಳನ್ನು ಒದಗಿಸಿದ್ದೇವೆ. ನಮ್ಮಹಕ್ಕು ನಿರಾಕರಣೆ ನೀತಿ ಅನ್ನು ನೋಡಿ .<br><b>5.</b> ಡೆಮೊ ಫೆರ್ಮ್ ಸಗಣಿ ಆಂತರಿಕ ತಪಾಸಣೆ, ಇಮರ್ನಲ್ ಆಡಾಸ್ ಮತ್ತು ಬಾಹ್ಯ ಸಿಎಸ್ ಆಡಿಟ್‌ಗಳನ್ನು ತೋರಿಸಲು ಎಂಗಲ್ಮೆಂಟಟನ್‌ನ ಪ್ರದರ್ಶನಕ್ಕಾಗಿ ವಸ್ತುನಿಷ್ಠ ಅಂತ್ಯವಾಗಿದೆ. ನಿನ್ನನ್ನು ಮೊದಲಿನವರು ಅರ್ಥಮಾಡಿಕೊಂಡಿರುವುದರಿಂದ, ಅವುಗಳನ್ನು ಟಾರ್ಮರ್‌ಗಳು ಮತ್ತು ವಿಸಾರ್‌ಗಳು ಅರ್ಥಮಾಡಿಕೊಳ್ಳುವ ಭಾಷೆಗೆ ಅನುವಾದಿಸಬೇಕಾಗಿದೆ.  <br><b>6.</b> ಕೃಷಿ ಜಿಎಪಿ ಯುರೆಟೆಡ್ ನೆಟಾನ್‌ಗಳ ಸುಸ್ಥಿರ ಅಭಿವೃದ್ಧಿ ಗೊಸಿಸ್ ಅನ್ನು ಸುಧಾರಿಸಲು ಕೆಲಸ ಮಾಡುತ್ತಿದೆ.</p>
                           <?php } elseif($_GET['lg'] == 'Marathi') {?>
                              <p style='text-align: justify;' id="ImportantNotice"><b>1.</b> <b>उद्देशः:</b> डिजिटल लर्निंगद्वारे चांगल्या कृषी पद्धतींच्या अंमलबजावणीद्वारे शेतकरी समुदायाचे उत्पन्न आणि ग्राहकांना सुरक्षित अन्न वाढवणे    <br><b>2.</b> डेमो फार्ममध्ये दर्शविलेले उपक्रम सर्व प्रकारच्या पिकांना लागू होतात. <br><b>3.</b> “पाहणे आणि विश्वास ठेवणे संकल्पना: डेमो फार्म हे सर्वात प्रभावी विस्तार शिक्षण साधनांपैकी एक म्हणून काम करते, कौशल्य वाढवणे आणि शेतकरी समुदायामध्ये पीअर टू पीअर लर्निंग आणि अंमलबजावणीचे प्रमाण वाढवणे. <br><b>4.</b> शेतातील पायाभूत सुविधा आणि धोक्यांची ओळख मानक आवश्यकता, तुमची स्वतःची गुणवत्ता व्यवस्थापन प्रणाली आणि भौगोलिक परिस्थिती यावर आधारित असेल. आम्ही फक्त तुमच्या संदर्भासाठी काही उदाहरणे दिली आहेत. आमच्या अस्वीकरण धोरणाचा संदर्भ घ्या   <br><b>5.</b> अंतर्गत तपासणी, अंतर्गत ऑडिट आणि बाह्य CB ऑडिट दरम्यान दाखविल्या जाणार्‍या अंमलबजावणीचे प्रात्यक्षिक दाखवण्यासाठी डेमो फार्म हा वस्तुनिष्ठ पुरावा आहे. हे शेतकऱ्यांनी अंमलात आणले असल्याने, ते शेतकरी आणि अभ्यागतांना समजलेल्या भाषेत भाषांतरित करणे आवश्यक आहे. <br><b>6.</b> कृषी GAP संयुक्त राष्ट्रांची शाश्वत विकास उद्दिष्टे साध्य करण्यासाठी कार्यरत आहे.</p>
                              <?php } elseif($_GET['lg'] == 'Telugu') {?>
                                 <p style='text-align: justify;' id="ImportantNotice"><b>1.</b> <b>లక్ష్యం:</b> డిజిటల్ అభ్యాసాల ద్వారా మంచి వ్యవసాయ పద్ధతులను అమలుతో వ్యవసాయదారుల ఆదాయాన్ని పెంచడం మరియు వినియోగదారులకు సురక్షితమైన ఆహారాన్ని అందించడం <br><b>2.</b> డెమో ఫారమ్‌లో చూపిన కార్యకలాపాలు అన్ని రకాల పంటలకు వర్తిస్తాయి. <br><b>3.</b> సీయింగ్ అండ్ బిలీవింగ్ కాన్సెప్ట్ డెమో ఫార్మ్ అనేది నైపుణ్యాలను పెంపొందించడానికి మరియు వ్యవసాయ సమాజంలో ప ర స్ప ర అభ్య స న కు ఉప యోగ ప డ డం మ రియు అమ లు కు వీలు క ల్పించ డం. <br><b>4.</b> పొలాలలో మౌలిక సదుపాయాలు మరియు ప్రమాదాల గుర్తింపు ప్రామాణిక అవసరాలు, మీ స్వంత నాణ్యత నిర్వహణ వ్యవస్థలు మరియు భౌగోళిక పరిస్థితులపై ఆధారపడి ఉంటుంది. మేము మీ సూచన కోసం మాత్రమే కొన్ని ఉదాహరణలను అందించాము. మన ప్రకటన విధానాన్ని పరిశీలించండి  <br><b>5.</b> డీమో ఫార్మ్ అనేది అంతర్గత తనిఖీ, అంతర్గత ఆడిట్లు మరియు బాహ్య సిబి ఆడిట్ల సమయంలో చూపాల్సిన ముఖ్యమైన సాక్ష్యాలు. వీటిని రైతులే అమలు చేస్తారు కాబట్టి రైతులకు, సందర్శకులకు అర్థమయ్యే భాషలోకి అనువాదం చేయాలి. <br><b>6.</b> ఐక్యరాజ్యసమితి సుస్థిర అభివృద్ధి లక్ష్యాలను సాధించేందుకు దిశగా GAP కృషి చేస్తోంది </p>
                           <?php } elseif($_GET['lg'] == 'Tamil') {?>
                              <p style='text-align: justify;' id="ImportantNotice"><b>1.ലക്ഷ്യം:</b>ജിറ്റൽവിജ്ഞാനത്തിലൂടെമേന്മയുള്ളകാർഷികരീതികൾനടപ്പിലാക്കുകയുംകർഷകസമൂഹത്തിന്റെവരുമാനവുംഉപഭോക്താക്കൾക്ക്സുരക്ഷിതമായഭക്ഷണത്തിന്റെലഭ്യതയുംവർദ്ധിപ്പിക്കുക.<br><b>2.</b>മാതൃകകൃഷിയിടത്തിൽപ്രദർശിപ്പിച്ചിട്ടുള്ളപ്രവർത്തനങ്ങൾഎല്ലാത്തരംവിളകൾക്കുംബാധകമാണ്.<br><b>3.</b>കാണുക-വിശ്വസിക്കുക എന്ന ആശയം: മാതൃക കൃഷിയിടം ഏറ്റവും ഫലപ്രദവും വിപുലവുമായ വിദ്യാഭ്യാസ ഉപകാരണങ്ങളിലൊന്നായി വർത്തിക്കുന്നു, നൈപുണ്യവർദ്ധനയുംകർഷകസമൂഹത്തിനുള്ളിൽകർഷകർഅറിവ്പങ്കുവെക്കുന്നതിൽകൂടിപ്രാവർത്തികമാക്കുന്നതിന്റെതോത്വർധിപ്പിക്കുക.<br><b>4.</b>കൃഷിയിടങ്ങളിളെ അടിസ്ഥാന സൗകര്യങ്ങളുടെയും അപകടസാധ്യതകളുടെയും തിരിച്ചറിയൽമാനദണ്ഡപ്രകാരമുള്ള  ആവശ്യകതകൾ, നിങ്ങളുടെ സ്വന്തം ഗുണനിലവാരമാനേജ്മെന്റ്സംവിധാനങ്ങൾ,ഭൂമിശാസ്ത്രപരമായസാഹചര്യങ്ങൾഎന്നിവഅടിസ്ഥാനമാക്കിയായിരിക്കും.നിങ്ങളുടെസൂചനക്കായിമാത്രംഞങ്ങൾചിലഉദാഹരണങ്ങൾനൽകിയിട്ടുണ്ട്. ഞങ്ങളുടെനിരാകരണ നയം കാണുക.<br><b>5.</b>പ്രവർത്തികമാക്കിയമാനദണ്ഢണ്ടങ്ങളെപ്പറ്റിആഭ്യന്തരപരിശോധനകൾ, ആന്തരികഓഡിറ്റുകൾ,ബാഹ്യCBഓഡിറ്റുകൾഎന്നിവയിൽപ്രകടമാക്കേണ്ടവസ്തുനിഷ്ഠമായതെളിവാണ്മാതൃകകൃഷിയിടം.. ഇവനടപ്പാക്കുന്നത്കർഷകർആയതിനാൽകർഷകർക്കുംസന്ദർശകർക്കുംമനസ്സിലാകുന്നഭാഷയിലേക്ക്വിവർത്തനംചെയ്യേണ്ടതുണ്ട്.<br><b>6</b>കൃഷിGAPഐക്യരാഷ്ട്രസഭയുടെസുസ്ഥിരവികസനലക്ഷ്യങ്ങൾകൈവരിക്കുന്നതിനായിപ്രവർത്തിക്കുന്നു.</p>
                              <?php } elseif($_GET['lg'] == 'Malayalam') {?>
                                 <p style='text-align: justify;' id="ImportantNotice"><b>1.ലക്ഷ്യം:</b>ജിറ്റൽവിജ്ഞാനത്തിലൂടെമേന്മയുള്ളകാർഷികരീതികൾനടപ്പിലാക്കുകയുംകർഷകസമൂഹത്തിന്റെവരുമാനവുംഉപഭോക്താക്കൾക്ക്സുരക്ഷിതമായഭക്ഷണത്തിന്റെലഭ്യതയുംവർദ്ധിപ്പിക്കുക.<br><b>2.</b>മാതൃകകൃഷിയിടത്തിൽപ്രദർശിപ്പിച്ചിട്ടുള്ളപ്രവർത്തനങ്ങൾഎല്ലാത്തരംവിളകൾക്കുംബാധകമാണ്.<br><b>3.</b>കാണുക-വിശ്വസിക്കുക എന്ന ആശയം: മാതൃക കൃഷിയിടം ഏറ്റവും ഫലപ്രദവും വിപുലവുമായ വിദ്യാഭ്യാസ ഉപകാരണങ്ങളിലൊന്നായി വർത്തിക്കുന്നു, നൈപുണ്യവർദ്ധനയുംകർഷകസമൂഹത്തിനുള്ളിൽകർഷകർഅറിവ്പങ്കുവെക്കുന്നതിൽകൂടിപ്രാവർത്തികമാക്കുന്നതിന്റെതോത്വർധിപ്പിക്കുക.<br><b>4.</b>കൃഷിയിടങ്ങളിളെ അടിസ്ഥാന സൗകര്യങ്ങളുടെയും അപകടസാധ്യതകളുടെയും തിരിച്ചറിയൽമാനദണ്ഡപ്രകാരമുള്ള  ആവശ്യകതകൾ, നിങ്ങളുടെ സ്വന്തം ഗുണനിലവാരമാനേജ്മെന്റ്സംവിധാനങ്ങൾ,ഭൂമിശാസ്ത്രപരമായസാഹചര്യങ്ങൾഎന്നിവഅടിസ്ഥാനമാക്കിയായിരിക്കും.നിങ്ങളുടെസൂചനക്കായിമാത്രംഞങ്ങൾചിലഉദാഹരണങ്ങൾനൽകിയിട്ടുണ്ട്. ഞങ്ങളുടെനിരാകരണ നയം കാണുക.<br><b>5.</b>പ്രവർത്തികമാക്കിയമാനദണ്ഢണ്ടങ്ങളെപ്പറ്റിആഭ്യന്തരപരിശോധനകൾ, ആന്തരികഓഡിറ്റുകൾ,ബാഹ്യCBഓഡിറ്റുകൾഎന്നിവയിൽപ്രകടമാക്കേണ്ടവസ്തുനിഷ്ഠമായതെളിവാണ്മാതൃകകൃഷിയിടം.. ഇവനടപ്പാക്കുന്നത്കർഷകർആയതിനാൽകർഷകർക്കുംസന്ദർശകർക്കുംമനസ്സിലാകുന്നഭാഷയിലേക്ക്വിവർത്തനംചെയ്യേണ്ടതുണ്ട്.<br><b>6</b>കൃഷിGAPഐക്യരാഷ്ട്രസഭയുടെസുസ്ഥിരവികസനലക്ഷ്യങ്ങൾകൈവരിക്കുന്നതിനായിപ്രവർത്തിക്കുന്നു.</p>
                                 <?php } elseif($_GET['lg'] == 'Bengali') {?>
                                    <p style='text-align: justify;' id="ImportantNotice"><b>1.</b> <b>উদ্দেশ্য:</b> : ডিজিটাল শিক্ষার মাধ্যমে ভালো কৃষি অনুশীলন বাস্তবায়নের মাধ্যমে কৃষক সম্প্রদায়ের আয় এবং ভোক্তাদের কাছে নিরাপদ খাদ্য বৃদ্ধি করা।<br><b>2.</b> ডেমো ফার্মে দেখানো কার্যক্রম সব ধরনের ফসলের জন্য প্রযোজ্য।<br><b>3.</b>“দেখা এবং বিশ্বাস করা ধারণা: ডেমো খামার সবচেয়ে কার্যকর সম্প্রসারণ শিক্ষার সরঞ্জাম, দক্ষতা বৃদ্ধি এবং কৃষক সম্প্রদায়ের মধ্যে পিয়ার টু পিয়ার লার্নিং হিসাবে কাজ করে এবং বাস্তবায়নের স্কেল আপ সহজতর করে।<br><b>4.</b>খামারগুলিতে অবকাঠামো এবং বিপদগুলির সনাক্তকরণ মানক প্রয়োজনীয়তা, আপনার নিজস্ব মান ব্যবস্থাপনা ব্যবস্থা এবং ভৌগলিক অবস্থার উপর ভিত্তি করে করা হবে। আমরা শুধুমাত্র আপনার রেফারেন্সের জন্য কিছু উদাহরণ প্রদান করেছি। আমাদের দাবিত্যাগ নীতি পড়ুন <br><b>5.</b>ডেমো ফার্ম হল অভ্যন্তরীণ পরিদর্শন, অভ্যন্তরীণ নিরীক্ষা এবং বাহ্যিক সিবি অডিটের সময় দেখানো বাস্তবায়নের প্রদর্শনের জন্য একটি বস্তুনিষ্ঠ প্রমাণ। যেহেতু এগুলি কৃষকদের দ্বারা বাস্তবায়িত হয়, সেহেতু কৃষক এবং দর্শকদের বোঝার ভাষায় তাদের অনুবাদ করা প্রয়োজন।<br><b>6.</b>কৃষি GAP জাতিসংঘের টেকসই উন্নয়ন লক্ষ্যমাত্রা অর্জনে কাজ করছে</p>
                           <?php } elseif($_GET['lg'] == 'Odia') {?>
                              <p style='text-align: justify;' id="ImportantNotice"><b>1.</b> <b>ଉଦ୍ଦେଶ୍ୟ:</b> : ଡିଜିଟାଲ୍ ଲର୍ନିଂ ମାଧ୍ୟମରେ ଉତ୍ତମ କୃଷି ଅଭ୍ୟାସ କାର୍ଯ୍ୟକାରୀ କରି ଗ୍ରାହକଙ୍କୁ କୃଷି ସମ୍ପ୍ରଦାୟର ଆୟ ଏବଂ ସୁରକ୍ଷିତ ଖାଦ୍ୟର ଆୟ ବୃଦ୍ଧି କରିବା<br><b>2.</b> ଡେମୋ ଫାର୍ମରେ ପ୍ରଦର୍ଶିତ କାର୍ଯ୍ୟକଳାପ ସବୁ ପ୍ରକାର ଫସଲ ପାଇଁ ପ୍ରଯୁଜ୍ୟ |<br><b>3.</b>“ଧାରଣା ଦେଖିବା ଏବଂ ବିଶ୍ଵାସ କରିବା: ଡେମୋ ଫାର୍ମ ହେଉଛି ଏକ ପ୍ରଭାବଶାଳୀ ବିସ୍ତାର ଶିକ୍ଷା ଉପକରଣ, ଦକ୍ଷତା ବୃଦ୍ଧି ଏବଂ କୃଷକ ସମ୍ପ୍ରଦାୟ ମଧ୍ୟରେ ସାଥି ଶିକ୍ଷା ପାଇଁ ସାଥୀ ଭାବରେ କାର୍ଯ୍ୟ କରିବା ଏବଂ କାର୍ଯ୍ୟାନ୍ୱୟନର ମାପଚୁପକୁ ସହଜ କରିବା |<br><b>4.</b>ଫାର୍ମଗୁଡିକରେ ଭିତ୍ତିଭୂମି ଏବଂ ବିପଦର ଚିହ୍ନଟ ମାନକ ଆବଶ୍ୟକତା, ଆପଣଙ୍କର ନିଜସ୍ୱ ଗୁଣବତ୍ତା ପରିଚାଳନା ପ୍ରଣାଳୀ ଏବଂ ଭୌଗୋଳିକ ଅବସ୍ଥା ଉପରେ ଆଧାରିତ ହେବ | ଆମେ କେବଳ ଆପଣଙ୍କ ପ୍ରସଙ୍ଗ ପାଇଁ କିଛି ଉଦାହରଣ ପ୍ରଦାନ କରିଛୁ | ଆମର ପ୍ରତ୍ୟାଖ୍ୟାନ ନୀତି ଅନୁସରଣ କରନ୍ତୁ |<br><b>5.</b>ଆଭ୍ୟନ୍ତରୀଣ ଯାଞ୍ଚ, ଆଭ୍ୟନ୍ତରୀଣ ହିସାବ ତନଖି ରଖିବା ଏବଂ ବାହ୍ୟ ସିବି ହିସାବ ତନଖି ରଖିବା ସମୟରେ ପ୍ରଦର୍ଶିତ କାର୍ଯ୍ୟକାରିତା ପ୍ରଦର୍ଶନ ପାଇଁ ଡେମୋ ଫାର୍ମ ହେଉଛି ଏକ ପ୍ରମାଣ । ଯେହେତୁ ଏହା କୃଷକମାନଙ୍କ ଦ୍ଵାରା କାର୍ଯ୍ୟକାରୀ ହୋଇଛି, ସେଗୁଡିକୁ କୃଷକ ଏବଂ ପରିଦର୍ଶକମାନେ ବୁଝିପାରୁଥିବା ଭାଷାରେ ଅନୁବାଦ କରିବା ଆବଶ୍ୟକ |<br><b>6.</b>ମିଳିତ ଜାତିସଂଘର ସ୍ଥାୟୀ ବିକାଶ ଲକ୍ଷ୍ୟ ହାସଲ ଦିଗରେ କୃଷି GAP କାର୍ଯ୍ୟ କରୁଛି |</p>
                           <?php } else { ?>
                              <p style="text-align: justify;" id="ImportantNotice"><b>1.</b> <b>Objective:</b> To increase the income of the farming community and safe food to the consumers  through implementation of Good Agricultural Practices through <b>Digital Learning</b>.<br><b>2.</b> The activities shown in the Demo Farm apply to all types of crops.<br><b>3.</b> “Seeing and Believing Concept: Demo farm to serve as one of the most effective extension education tools, skills enhancement  and peer to peer learning within the farming community and facilitate scale up of  implementation.<br><b>4.</b> Identification of infrastructure and hazards on the farms will be based on the standard requirements, your own quality management systems and geographical conditions. We have provided some examples only for your reference. Refer to our Disclaimer Policy .<br><b>5.</b> Demo Farm is an objective evidence for demonstration of implementation to be shown during internal inspections, internal audits and external CB audits. Since these are implemented by the farmers, they need to be translated into language understood by the farmers and visitors.<br><b>6.</b> Krishi GAP is working towards achieving Sustainable Development Goals of United Nations.</p>
                           <?php } ?>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"><img src="img/gpfd1.png"></div>
                            <div class="col-md-2"><img src="img/gpfd2.png"></div>
                            <div class="col-md-2"><img src="img/gpfd3.png"></div>
                            <div class="col-md-2"><img src="img/gpfd4.png"></div>
                            <div class="col-md-2"></div>
                        <div id="IndGAP" class="gsww" style="display:none"><?php include ("demo-farm-IndG.A.P.php"); ?></div>
                        <div id="GLOBALGAP" class="gsww" style="display:none"></div>
                        <div id="FairtradeInternational" class="gsww" style="display:none"></div>
                        <div id="RainforestAlliance" class="gsww" style="display:none"></div>
                        <?php if ($_GET['gsw'] != '' AND $_GET['crp'] != '') { ?>
                        <?php if ($_GET['gsw'] == 'IndGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>Quality Council of India: <a href="https://www.qcin.org" target="_blank">www.qcin.org</a></b></p> 
                        <?php } if ($_GET['gsw'] == 'GLOBALGAP') {?>
                        <p style="text-align:justify;"><b>The visitor to the Krishi GAP platform is advised to visit the standard owner website for the purchase or download of the standard copy and for accurate information/updates on the standard requirements. A copy of the standard is not available on the Krishi GAP site due to copyright regulations.</b></p>  
                        <p style="text-align:center;margin-top: 0px !important;"><b>GlobalG.A.P: <a href="https://www.globalgap.org/uk_en" target="_blank">www.globalgap.org</a></b></p> 
                        <?php } ?> 
                        <div class="col-md-12">
                           <?php 
                              if($query2_num > 0){
                              ?>
                           <div class="row">
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
                           </div>
                           <?php }
                              $docnum = 1;
                              while ($row2 = mysqli_fetch_array($query2)) {
                              $query31 = mysqli_query($db, "SELECT * FROM `demo_farm` WHERE DocumentsTitle = '$row2[DocumentsTitle]' AND DeletedStatus = '0'");
                              $row31 = mysqli_fetch_assoc($query31);
                              ?>
                           <div class="row">
                              <div class="col-md-4">
                                 <p class="mb-2">
                                    <i class="fa text-primary me-2"><?php echo $docnum;?>.</i>
                                    <?php echo $row31['DocumentsTitle']; ?>
                                 </p>
                              </div>
                              <div class="col-md-2">
                                  <?php
                                    $allowed =  array('pdf');
                                    $ext = substr(strrchr($row31['Document'], "."), 1);
                                    if(in_array($ext,$allowed) ) {?>
                                    <a href="demo-farm-pdf.php?doc=<?php echo $row31['DemoFarmId']; ?>" target="_blank"><i style="font-size: 30px;" class="ti-files btn-icon-prepend"></i></a>
                                    <?php } ?>
                              </div>
                              <div class="col-md-3">
                                 <p style="overflow-y: auto;">
                                    <?php if (!filter_var($row31['DocumentsSource'], FILTER_VALIDATE_URL) === false) {?>
                                    <a href="<?php echo $row31['DocumentsSource']; ?>" target="_blank" ><?php echo $row31['DocumentsSource']; ?></a>
                                    <?php }else{?>
                                    <?php echo $row31['DocumentsSource']; ?>
                                    <?php } ?>
                                 </p>
                              </div>
                              <div class="col-md-3">
                                 <p style="overflow-y: auto;">
                                    <?php if (!filter_var($row31['SourceLink'], FILTER_VALIDATE_URL) === false) {?>
                                    <a href="<?php echo $row31['SourceLink']; ?>" target="_blank" ><?php echo $row31['SourceLink']; ?></a>
                                    <?php }else{?>
                                    <?php echo $row31['SourceLink']; ?>
                                    <?php } ?>
                                 </p>
                              </div>
                           </div>
                           <?php $docnum = $docnum + 1;}
                              ?>
                        </div>
                        <div class="col-md-6">
                           <?php 
                              if($query2yt_num > 0){
                              ?>
                           <h5>Youtube Links</h5>
                           <?php } 
                              $docnum1 = 1;
                               while ($row3 = mysqli_fetch_array($query2yt)) {
                              $query31 = mysqli_query($db, "SELECT * FROM `demo_farm` WHERE VideoTitle = '$row3[VideoTitle]' AND (YoutubeVideoLink != '' OR YoutubeVideoLink != '')");
                              $row31 = mysqli_fetch_assoc($query31);
                              ?>
                           <p class="mb-2">
                              <a href="<?php echo $row31['YoutubeVideoLink']; ?>" target="_blank">
                              <i class="fa text-primary me-2"><?php echo $docnum1;?>.</i>
                              <?php echo $row31['VideoTitle']; ?>
                              </a>
                           </p>
                           <?php $docnum1 = $docnum1 + 1;} ?>
                        </div>
                        <?php } ?>
                        <?php if($_GET['gsw'] == 'OrganicNPOP' OR $_GET['gsw'] == 'FairtradeInternational' OR $_GET['gsw'] == 'RainforestAlliance'){?>
                        <center>
                           <p style="font-size: 35px;color: red;">Coming Soon...</p>
                        </center>
                        <?php } ?>
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

$(function(){

$("#lang").on('change', function(){
var langauge = this.value;

if(langauge=="Hindi"){
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>उद्देश्य:</b> डिजिटल शिक्षा के माध्यम से अच्छी कृषि प्रथाओं के कार्यान्वयन के माध्यम से किसानों की आय और उपभोक्ताओं को सुरक्षित भोजन में वृद्धि करना।.<br><b>2.</b> डेमो फार्म में दिखाई गई गतिविधियां सभी प्रकार की फसलों पर लागू होती हैं। <br><b>3.</b> <b>&quot;देखने और विश्वास करने की अवधारणा: </b> डेमो फार्म कृषि समुदाय के भीतर सबसे प्रभावी विस्तार शिक्षा उपकरण है, कौशल वृद्धि और सहकर्मी से सहकर्मी सीखने में से एक के रूप में सेवा करने और कार्यान्वयन के पैमाने को सुविधाजनक बनाने के लिए।  <br><b>4.</b> खेतों में बुनियादी ढांचे और खतरों की पहचान मानक आवश्यकताओं, अपनी गुणवत्ता प्रबंधन प्रणाली और भौगोलिक स्थिति पर आधारित होगी। हमने आपके संदर्भ के लिए कुछ उदाहरण दिए हैं। हमारी डिस्क्लेमर पॉलिसी देखें। <br><b>5.</b> किसान पुस्तिका आंतरिक निरीक्षण, आंतरिक लेखापरीक्षाओं और बाहरी CB लेखापरीक्षाओं के दौरान दिखाए जाने वाले कार्यान्वयन के प्रदर्शन के लिए एक महत्वपूर्ण साक्ष्य है। चूंकि ये किसानों द्वारा कार्यान्वित किए जाते हैं, उन्हें किसानों और आगंतुकों द्वारा समझी जाने वाली भाषा में अनुवाद करने की आवश्यकता है। <br><b>6.</b> कृषि जीएपी संयुक्त राष्ट्र के सतत विकास लक्ष्यों को प्राप्त करने की दिशा में काम कर रहा है</p>");
   }


else if(langauge=="English"){
   $("#ImportantNotice").html("<p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>Objective:</b> To increase the income of the farming community and safe food to the consumers  through implementation of Good Agricultural Practices through <b>Digital Learning</b>.<br><b>2.</b> The activities shown in the Demo Farm apply to all types of crops.<br><b>3.</b> “Seeing and Believing Concept: Demo farm to serve as one of the most effective extension education tools, skills enhancement  and peer to peer learning within the farming community and facilitate scale up of  implementation.<br><b>4.</b> Identification of infrastructure and hazards on the farms will be based on the standard requirements, your own quality management systems and geographical conditions. We have provided some examples only for your reference. Refer to our Disclaimer Policy .<br><b>5.</b> Demo Farm is an objective evidence for demonstration of implementation to be shown during internal inspections, internal audits and external CB audits. Since these are implemented by the farmers, they need to be translated into language understood by the farmers and visitors.<br><b>6.</b> Krishi GAP is working towards achieving Sustainable Development Goals of United Nations.</p>");
   }
else if(langauge=="Kannada"){
   $("#ImportantNotice").html("<p style='text-align: justify;' id='ImportantNotice'><b>1.</b> <b>ಉದ್ದೇಶ:</b> ಕೃಷಿ ಸಮುದಾಯದ ಆದಾಯವನ್ನು ಹೆಚ್ಚಿಸುವುದು ಮತ್ತು ಗ್ರಾಹಕರಿಗೆ ಸುರಕ್ಷಿತ ಆಹಾರವನ್ನು ಉತ್ತಮ ಕೃಷಿ ಪದ್ಧತಿಗಳ ಅನುಷ್ಠಾನದ ಮೂಲಕ ಡಿಜಿಟಲ್ ಲಿಯರಾಂಗ್ </b>.<br><b>2.</b> ಡೆಮೊ ಫಾರ್ಮ್‌ನಲ್ಲಿ ತೋರಿಸಿರುವ ಚಟುವಟಿಕೆಗಳು ಎಲ್ಲಾ ರೀತಿಯ ಬೆಳೆಗಳಿಗೆ ಅನ್ವಯಿಸುತ್ತವೆ.<br><b>3.</b> “ಸೀಯಿಂಗ್ ಎಂಡ್ ಬೆಲೀವಿಂಗ್ ಕಾನ್ಸೆಪ್ಟ್: ಡೆಮೊ ಫಾರ್ಮ್ ಅತ್ಯಂತ ಪರಿಣಾಮಕಾರಿ ವಿಸ್ತರಣಾ ಶಿಕ್ಷಣ ಸಾಧನಗಳಲ್ಲಿ ಒಂದನ್ನು ಪೂರೈಸಲು, ಕೌಶಲ್ಯ ವರ್ಧನೆ ಮತ್ತು ಕೃಷಿ ಸಮುದಾಯದೊಳಗೆ ಪೀರ್ ಟು ಪೀರ್ ಕಲಿಕೆಯು ಅನುಷ್ಠಾನದ ಹಂತವನ್ನು ಸುಗಮಗೊಳಿಸುತ್ತದೆ. <br><b>4.</b> ಫಾರ್ಮ್‌ಗಳಲ್ಲಿ ಮೂಲಸೌಕರ್ಯ ಅಂತಿಮ ಅಪಾಯಗಳ ಗುರುತಿಸುವಿಕೆ w6l ಸ್ಟೆಂಡರ್ಡ್ ಫೀಕ್ವಿರ್‌ಮೆಂಟ್‌ಗಳು, ನಿಮ್ಮ ಸ್ವಂತ ಗುಣಮಟ್ಟದ ನಿರ್ವಹಣಾ ವ್ಯವಸ್ಥೆಗಳು ಮತ್ತು ಭೌಗೋಳಿಕ ಪರಿಸ್ಥಿತಿಗಳನ್ನು ಆಧರಿಸಿದೆ. ನಿಮ್ಮ ಉಲ್ಲೇಖಕ್ಕಾಗಿ ಮಾತ್ರ ನಾವು ಕೆಲವು ಉದಾಹರಣೆಗಳನ್ನು ಒದಗಿಸಿದ್ದೇವೆ. ನಮ್ಮಹಕ್ಕು ನಿರಾಕರಣೆ ನೀತಿ ಅನ್ನು ನೋಡಿ .<br><b>5.</b> ಡೆಮೊ ಫೆರ್ಮ್ ಸಗಣಿ ಆಂತರಿಕ ತಪಾಸಣೆ, ಇಮರ್ನಲ್ ಆಡಾಸ್ ಮತ್ತು ಬಾಹ್ಯ ಸಿಎಸ್ ಆಡಿಟ್‌ಗಳನ್ನು ತೋರಿಸಲು ಎಂಗಲ್ಮೆಂಟಟನ್‌ನ ಪ್ರದರ್ಶನಕ್ಕಾಗಿ ವಸ್ತುನಿಷ್ಠ ಅಂತ್ಯವಾಗಿದೆ. ನಿನ್ನನ್ನು ಮೊದಲಿನವರು ಅರ್ಥಮಾಡಿಕೊಂಡಿರುವುದರಿಂದ, ಅವುಗಳನ್ನು ಟಾರ್ಮರ್‌ಗಳು ಮತ್ತು ವಿಸಾರ್‌ಗಳು ಅರ್ಥಮಾಡಿಕೊಳ್ಳುವ ಭಾಷೆಗೆ ಅನುವಾದಿಸಬೇಕಾಗಿದೆ.  <br><b>6.</b> ಕೃಷಿ ಜಿಎಪಿ ಯುರೆಟೆಡ್ ನೆಟಾನ್‌ಗಳ ಸುಸ್ಥಿರ ಅಭಿವೃದ್ಧಿ ಗೊಸಿಸ್ ಅನ್ನು ಸುಧಾರಿಸಲು ಕೆಲಸ ಮಾಡುತ್ತಿದೆ.</p>");
   }
else if(langauge=="Marathi"){
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>उद्देशः:</b> डिजिटल लर्निंगद्वारे चांगल्या कृषी पद्धतींच्या अंमलबजावणीद्वारे शेतकरी समुदायाचे उत्पन्न आणि ग्राहकांना सुरक्षित अन्न वाढवणे    <br><b>2.</b> डेमो फार्ममध्ये दर्शविलेले उपक्रम सर्व प्रकारच्या पिकांना लागू होतात. <br><b>3.</b> “पाहणे आणि विश्वास ठेवणे संकल्पना: डेमो फार्म हे सर्वात प्रभावी विस्तार शिक्षण साधनांपैकी एक म्हणून काम करते, कौशल्य वाढवणे आणि शेतकरी समुदायामध्ये पीअर टू पीअर लर्निंग आणि अंमलबजावणीचे प्रमाण वाढवणे. <br><b>4.</b> शेतातील पायाभूत सुविधा आणि धोक्यांची ओळख मानक आवश्यकता, तुमची स्वतःची गुणवत्ता व्यवस्थापन प्रणाली आणि भौगोलिक परिस्थिती यावर आधारित असेल. आम्ही फक्त तुमच्या संदर्भासाठी काही उदाहरणे दिली आहेत. आमच्या अस्वीकरण धोरणाचा संदर्भ घ्या   <br><b>5.</b> अंतर्गत तपासणी, अंतर्गत ऑडिट आणि बाह्य CB ऑडिट दरम्यान दाखविल्या जाणार्‍या अंमलबजावणीचे प्रात्यक्षिक दाखवण्यासाठी डेमो फार्म हा वस्तुनिष्ठ पुरावा आहे. हे शेतकऱ्यांनी अंमलात आणले असल्याने, ते शेतकरी आणि अभ्यागतांना समजलेल्या भाषेत भाषांतरित करणे आवश्यक आहे. <br><b>6.</b> कृषी GAP संयुक्त राष्ट्रांची शाश्वत विकास उद्दिष्टे साध्य करण्यासाठी कार्यरत आहे.</p>");
   }
else if(langauge=="Telugu"){
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>లక్ష్యం:</b> డిజిటల్ అభ్యాసాల ద్వారా మంచి వ్యవసాయ పద్ధతులను అమలుతో వ్యవసాయదారుల ఆదాయాన్ని పెంచడం మరియు వినియోగదారులకు సురక్షితమైన ఆహారాన్ని అందించడం <br><b>2.</b> డెమో ఫారమ్‌లో చూపిన కార్యకలాపాలు అన్ని రకాల పంటలకు వర్తిస్తాయి. <br><b>3.</b> సీయింగ్ అండ్ బిలీవింగ్ కాన్సెప్ట్ డెమో ఫార్మ్ అనేది నైపుణ్యాలను పెంపొందించడానికి మరియు వ్యవసాయ సమాజంలో ప ర స్ప ర అభ్య స న కు ఉప యోగ ప డ డం మ రియు అమ లు కు వీలు క ల్పించ డం. <br><b>4.</b> పొలాలలో మౌలిక సదుపాయాలు మరియు ప్రమాదాల గుర్తింపు ప్రామాణిక అవసరాలు, మీ స్వంత నాణ్యత నిర్వహణ వ్యవస్థలు మరియు భౌగోళిక పరిస్థితులపై ఆధారపడి ఉంటుంది. మేము మీ సూచన కోసం మాత్రమే కొన్ని ఉదాహరణలను అందించాము. మన ప్రకటన విధానాన్ని పరిశీలించండి  <br><b>5.</b> డీమో ఫార్మ్ అనేది అంతర్గత తనిఖీ, అంతర్గత ఆడిట్లు మరియు బాహ్య సిబి ఆడిట్ల సమయంలో చూపాల్సిన ముఖ్యమైన సాక్ష్యాలు. వీటిని రైతులే అమలు చేస్తారు కాబట్టి రైతులకు, సందర్శకులకు అర్థమయ్యే భాషలోకి అనువాదం చేయాలి. <br><b>6.</b> ఐక్యరాజ్యసమితి సుస్థిర అభివృద్ధి లక్ష్యాలను సాధించేందుకు దిశగా GAP కృషి చేస్తోంది </p>");
   }
else if(langauge=="Malayalam")
{

   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.ലക്ഷ്യം:</b>ജിറ്റൽവിജ്ഞാനത്തിലൂടെമേന്മയുള്ളകാർഷികരീതികൾനടപ്പിലാക്കുകയുംകർഷകസമൂഹത്തിന്റെവരുമാനവുംഉപഭോക്താക്കൾക്ക്സുരക്ഷിതമായഭക്ഷണത്തിന്റെലഭ്യതയുംവർദ്ധിപ്പിക്കുക.<br><b>2.</b>മാതൃകകൃഷിയിടത്തിൽപ്രദർശിപ്പിച്ചിട്ടുള്ളപ്രവർത്തനങ്ങൾഎല്ലാത്തരംവിളകൾക്കുംബാധകമാണ്.<br><b>3.</b>കാണുക-വിശ്വസിക്കുക എന്ന ആശയം: മാതൃക കൃഷിയിടം ഏറ്റവും ഫലപ്രദവും വിപുലവുമായ വിദ്യാഭ്യാസ ഉപകാരണങ്ങളിലൊന്നായി വർത്തിക്കുന്നു, നൈപുണ്യവർദ്ധനയുംകർഷകസമൂഹത്തിനുള്ളിൽകർഷകർഅറിവ്പങ്കുവെക്കുന്നതിൽകൂടിപ്രാവർത്തികമാക്കുന്നതിന്റെതോത്വർധിപ്പിക്കുക.<br><b>4.</b>കൃഷിയിടങ്ങളിളെ അടിസ്ഥാന സൗകര്യങ്ങളുടെയും അപകടസാധ്യതകളുടെയും തിരിച്ചറിയൽമാനദണ്ഡപ്രകാരമുള്ള  ആവശ്യകതകൾ, നിങ്ങളുടെ സ്വന്തം ഗുണനിലവാരമാനേജ്മെന്റ്സംവിധാനങ്ങൾ,ഭൂമിശാസ്ത്രപരമായസാഹചര്യങ്ങൾഎന്നിവഅടിസ്ഥാനമാക്കിയായിരിക്കും.നിങ്ങളുടെസൂചനക്കായിമാത്രംഞങ്ങൾചിലഉദാഹരണങ്ങൾനൽകിയിട്ടുണ്ട്. ഞങ്ങളുടെനിരാകരണ നയം കാണുക.<br><b>5.</b>പ്രവർത്തികമാക്കിയമാനദണ്ഢണ്ടങ്ങളെപ്പറ്റിആഭ്യന്തരപരിശോധനകൾ, ആന്തരികഓഡിറ്റുകൾ,ബാഹ്യCBഓഡിറ്റുകൾഎന്നിവയിൽപ്രകടമാക്കേണ്ടവസ്തുനിഷ്ഠമായതെളിവാണ്മാതൃകകൃഷിയിടം.. ഇവനടപ്പാക്കുന്നത്കർഷകർആയതിനാൽകർഷകർക്കുംസന്ദർശകർക്കുംമനസ്സിലാകുന്നഭാഷയിലേക്ക്വിവർത്തനംചെയ്യേണ്ടതുണ്ട്.<br><b>6</b>കൃഷിGAPഐക്യരാഷ്ട്രസഭയുടെസുസ്ഥിരവികസനലക്ഷ്യങ്ങൾകൈവരിക്കുന്നതിനായിപ്രവർത്തിക്കുന്നു.</p>");
}
else if(langauge=="Tamil")
{
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>குறிக்கோள்:</b>டிஜிட்டல் கற்றல் வழியாக நல்ல விவசாய நடைமுறைகளை செயல்படுத்துவதன் மூலம் விவசாய சமூகத்தின் வருவாயை அதிகரிப்பது மற்றும் நுகர்வோருக்கு பாதுகாப்பான உணவு கிடைப்பதை உறுதிபடுத்துவது.<br><b>2.</b> மாதிரி பண்ணையில் காட்டப்படும் நடவடிக்கைகள் அனைத்து வகையான பயிர்களுக்கும் பொருந்தும்.<br><b>3.</b>“பார்த்தல் மற்றும் நம்புதல் கருத்து: மாதிரி பண்ணை மிகவும் பயனுள்ள விரிவாக்கக் கல்விக் கருவிகளில் ஒன்றாக செயல்படுகிறது. திறன்களை மேம்படுத்தவும், விவசாயச் சமூகத்தில் கற்றல் மற்றும் அமுலாக்கத்தின் அளவை எளிதாக்கவும் உதவுகிறது.<br><b>4.</b>அடிப்படை தேவைகள், உங்கள் சொந்த தர மேலாண்மை அமைப்புகள் மற்றும் புவியியல் நிலைமைகளின் அடிப்படையில், பண்ணைகளில் உள்ள உள்கட்டமைப்பு மற்றும் ஆபத்துகளை கண்டறிவது இருக்கும். உங்கள் குறிப்புக்காக மட்டுமே சில உதாரணங்களை வழங்கியுள்ளோம். எங்கள் பொறுப்பு துறப்புக் கொள்கையைப் பார்க்கவும்.<br><b>5.</b>மாதிரி பண்ணை என்பது உள் ஆய்வுகள், உள் தணிக்கைகள் மற்றும் வெளிப்புற CB தணிக்கைகளின் போது காட்டப்படும் செயல்படுத்தலின் முன்வைப்பிற்கான ஒரு புறநிலை சான்றாகும். இவை விவசாயிகளால் செயல்படுத்தப்படுவதால், விவசாயிகள் மற்றும் பார்வையாளர்கள் புரிந்துகொள்ளும் மொழியில் மொழிபெயர்க்கப்பட வேண்டும்.<br><b>6.</b>Krishi GAP அமைப்பு ஐக்கிய நாடுகள் சபையின் நிலையான வளர்ச்சி இலக்குகளை அடைவதற்காக செயல்படுகிறது.</p>");
}
else if(langauge=="Bengali")
{
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>উদ্দেশ্য:</b> : ডিজিটাল শিক্ষার মাধ্যমে ভালো কৃষি অনুশীলন বাস্তবায়নের মাধ্যমে কৃষক সম্প্রদায়ের আয় এবং ভোক্তাদের কাছে নিরাপদ খাদ্য বৃদ্ধি করা।<br><b>2.</b> ডেমো ফার্মে দেখানো কার্যক্রম সব ধরনের ফসলের জন্য প্রযোজ্য।<br><b>3.</b>“দেখা এবং বিশ্বাস করা ধারণা: ডেমো খামার সবচেয়ে কার্যকর সম্প্রসারণ শিক্ষার সরঞ্জাম, দক্ষতা বৃদ্ধি এবং কৃষক সম্প্রদায়ের মধ্যে পিয়ার টু পিয়ার লার্নিং হিসাবে কাজ করে এবং বাস্তবায়নের স্কেল আপ সহজতর করে।<br><b>4.</b>খামারগুলিতে অবকাঠামো এবং বিপদগুলির সনাক্তকরণ মানক প্রয়োজনীয়তা, আপনার নিজস্ব মান ব্যবস্থাপনা ব্যবস্থা এবং ভৌগলিক অবস্থার উপর ভিত্তি করে করা হবে। আমরা শুধুমাত্র আপনার রেফারেন্সের জন্য কিছু উদাহরণ প্রদান করেছি। আমাদের দাবিত্যাগ নীতি পড়ুন <br><b>5.</b>ডেমো ফার্ম হল অভ্যন্তরীণ পরিদর্শন, অভ্যন্তরীণ নিরীক্ষা এবং বাহ্যিক সিবি অডিটের সময় দেখানো বাস্তবায়নের প্রদর্শনের জন্য একটি বস্তুনিষ্ঠ প্রমাণ। যেহেতু এগুলি কৃষকদের দ্বারা বাস্তবায়িত হয়, সেহেতু কৃষক এবং দর্শকদের বোঝার ভাষায় তাদের অনুবাদ করা প্রয়োজন।<br><b>6.</b>কৃষি GAP জাতিসংঘের টেকসই উন্নয়ন লক্ষ্যমাত্রা অর্জনে কাজ করছে</p>");
}
else if(langauge=="Odia")
{
   $("#ImportantNotice").html("<p style='text-align: justify;'><b>1.</b> <b>ଉଦ୍ଦେଶ୍ୟ:</b> : ଡିଜିଟାଲ୍ ଲର୍ନିଂ ମାଧ୍ୟମରେ ଉତ୍ତମ କୃଷି ଅଭ୍ୟାସ କାର୍ଯ୍ୟକାରୀ କରି ଗ୍ରାହକଙ୍କୁ କୃଷି ସମ୍ପ୍ରଦାୟର ଆୟ ଏବଂ ସୁରକ୍ଷିତ ଖାଦ୍ୟର ଆୟ ବୃଦ୍ଧି କରିବା<br><b>2.</b> ଡେମୋ ଫାର୍ମରେ ପ୍ରଦର୍ଶିତ କାର୍ଯ୍ୟକଳାପ ସବୁ ପ୍ରକାର ଫସଲ ପାଇଁ ପ୍ରଯୁଜ୍ୟ |<br><b>3.</b>“ଧାରଣା ଦେଖିବା ଏବଂ ବିଶ୍ଵାସ କରିବା: ଡେମୋ ଫାର୍ମ ହେଉଛି ଏକ ପ୍ରଭାବଶାଳୀ ବିସ୍ତାର ଶିକ୍ଷା ଉପକରଣ, ଦକ୍ଷତା ବୃଦ୍ଧି ଏବଂ କୃଷକ ସମ୍ପ୍ରଦାୟ ମଧ୍ୟରେ ସାଥି ଶିକ୍ଷା ପାଇଁ ସାଥୀ ଭାବରେ କାର୍ଯ୍ୟ କରିବା ଏବଂ କାର୍ଯ୍ୟାନ୍ୱୟନର ମାପଚୁପକୁ ସହଜ କରିବା |<br><b>4.</b>ଫାର୍ମଗୁଡିକରେ ଭିତ୍ତିଭୂମି ଏବଂ ବିପଦର ଚିହ୍ନଟ ମାନକ ଆବଶ୍ୟକତା, ଆପଣଙ୍କର ନିଜସ୍ୱ ଗୁଣବତ୍ତା ପରିଚାଳନା ପ୍ରଣାଳୀ ଏବଂ ଭୌଗୋଳିକ ଅବସ୍ଥା ଉପରେ ଆଧାରିତ ହେବ | ଆମେ କେବଳ ଆପଣଙ୍କ ପ୍ରସଙ୍ଗ ପାଇଁ କିଛି ଉଦାହରଣ ପ୍ରଦାନ କରିଛୁ | ଆମର ପ୍ରତ୍ୟାଖ୍ୟାନ ନୀତି ଅନୁସରଣ କରନ୍ତୁ |<br><b>5.</b>ଆଭ୍ୟନ୍ତରୀଣ ଯାଞ୍ଚ, ଆଭ୍ୟନ୍ତରୀଣ ହିସାବ ତନଖି ରଖିବା ଏବଂ ବାହ୍ୟ ସିବି ହିସାବ ତନଖି ରଖିବା ସମୟରେ ପ୍ରଦର୍ଶିତ କାର୍ଯ୍ୟକାରିତା ପ୍ରଦର୍ଶନ ପାଇଁ ଡେମୋ ଫାର୍ମ ହେଉଛି ଏକ ପ୍ରମାଣ । ଯେହେତୁ ଏହା କୃଷକମାନଙ୍କ ଦ୍ଵାରା କାର୍ଯ୍ୟକାରୀ ହୋଇଛି, ସେଗୁଡିକୁ କୃଷକ ଏବଂ ପରିଦର୍ଶକମାନେ ବୁଝିପାରୁଥିବା ଭାଷାରେ ଅନୁବାଦ କରିବା ଆବଶ୍ୟକ |<br><b>6.</b>ମିଳିତ ଜାତିସଂଘର ସ୍ଥାୟୀ ବିକାଶ ଲକ୍ଷ୍ୟ ହାସଲ ଦିଗରେ କୃଷି GAP କାର୍ଯ୍ୟ କରୁଛି |</p>");
}
else{
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