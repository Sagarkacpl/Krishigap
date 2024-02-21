<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0);
if ($_SESSION['UID'] == '') {
    header("Location: price-page.php");
   }
date_default_timezone_set('Asia/Calcutta');
$cr_date = date('Y-m-d');
if($_SESSION["PlanStartDate"] <= '$cr_date' AND $_SESSION["PlanEndDate"] >= '$cr_date'){
 header("Location:index.php");   
}

   
if(isset($_SESSION["Amountt"]) AND $_SESSION["Amountt"] > 0) {
//header("Location:subscription-person-information.php");
}
include "connection.php";
include "most_visited_page.php";
if (isset($_POST['PLAN'])) {
    $qn = $_POST['PLAN'];
    $Amountt = 0;
    $PlanDetails = '';
    foreach ($qn as $Qname) {
        $query = mysqli_query($db, "SELECT Amount from gap_standard_wise_price where DeletedStatus='0' AND GAPStandardWise ='$Qname' AND Plan ='Yearly'");
        $row = mysqli_fetch_assoc($query);
        $Amount = $row['Amount'];
        $Amountt = $Amountt + $Amount;
        $PlanDetails .= $Qname . ','; 
        
    }
    $_SESSION['Amountt'] = $Amountt;
    $_SESSION['PlanType'] = 'Yearly';
    $_SESSION['PlanDetails1'] = trim($PlanDetails, ','); 
    if($_POST['form'] == 'form'){
        $_SESSION['FormType'] = 'paid';    
    }
    if ($_SESSION['UID'] != '') {
        header("Location:pay.php"); 
    }else{
          header("Location:subscription-person-information.php");  
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
    <style>
    	.p-5 {
    padding: 5px !important;
}
.rounded-pill {
    border-radius: 5px !important;
}
body {
    margin: 0;
    font-family: "Heebo",sans-serif;
    font-size: 13px;
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
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Subscription Price</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Price</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5" style="padding-top: 0rem !important;padding-bottom: 1rem !important;">
        <center><h5 id="response"></h5></center>
        <form id="form" action="" method="POST">
        <section>
            <div class="container py-5 price-section" style="padding-top: 0rem !important;padding-bottom: 1rem !important;">
              <div class="row text-center align-items-end">
                <div class="col-lg-4 mb-5 mb-lg-0">
                  <div class="bg-white p-5 rounded-lg shadow">
                    <h1 class="h6 text-uppercase font-weight-bold mb-4">On Farm Production</h1>
                  
                    <div class="custom-separator my-4 mx-auto bg-primary"></div>
                    <div class="subscripton-checked">


                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="IndG.A.P" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">IndG.A.P</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="GLOBALG.A.P" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">GLOBALG.A.P</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="Organic NPOP" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Organic NPOP</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="Organic NOP" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Organic NOP</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="Organic PGS- India" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Organic PGS- India</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="Medicinal Plants" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Medicinal Plants</label>
                    </div>
                    
                  </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                  <div class="bg-white p-5 rounded-lg shadow" style="height:240px;">
                    <h1 class="h6 text-uppercase font-weight-bold mb-4">Post Harvest Processing</h1>
                    <div class="custom-separator my-4 mx-auto bg-primary"></div>
                    <div class="subscripton-checked">
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="ISO 22000" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">ISO 22000</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="FSSC 22000" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">FSSC 22000</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="BRC Global Standard Packaging 6" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">BRC Global Standard Packaging, Issue 6</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="BRC Global Standard Food Safety 9" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">BRC Global Standard Food Safety, Issue 9</label>
                    </div>
                    
                  </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="bg-white p-5 rounded-lg shadow" style="height:240px;">
                    <h1 class="h6 text-uppercase font-weight-bold mb-4">Sustainable Initiatives</h1>
                    
                    <div class="custom-separator my-4 mx-auto bg-primary"></div>
                    <div class="subscripton-checked">
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="ISO 14001 Environment" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">ISO 14001 Environment</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="ISO 50001 Energy Management" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">ISO 50001 Energy Management</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="ISO 45001 OH and S Mgt" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">ISO 45001 OH & S Mgt</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="SA 8000 Social Accounting" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">SA 8000 Social Accounting</label>
                    </div>
                    <div class="form-check text-left">
                      <input class="form-check-input" type="checkbox" name="PLAN[]" value="Rainforest Alliance" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Rainforest Alliance</label>
                    </div>
                    
                  </div>
                  </div>
                </div>
              </div>
              
            </div>
             <center>
              <br><button name="form" value="form" style="width: 140px;" type="submit" class="btn btn-primary btn-block p-2 shadow rounded-pill">Subscribe</button>   
             </center>
          </section>
          </form>
    </div>
    <?php include "footer.php"; ?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    (function() {
    const form = document.querySelector('#form');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;
    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }
            checkValidity();
        }
    }
    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }
        return false;
    }
    function checkValidity() {
        const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }
    init();
    })();
    
    


function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
    
    </script>
    <script>
 $(document).ready(function() {
     $('#form').click(function() {
       $.ajax({
        url: "yearly.php",
        type: "post",
        data: $(this).serialize()
    }).done(function(data) {
        $('#response').html(data);
    });
    });
 });
</script>


</body>
</html>