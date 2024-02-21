<?php
session_start();
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
error_reporting(0); 
if ($_SESSION['UID'] != '') {
    header("Location: price-page-renewal.php");
   }
if(isset($_SESSION["Amountt"]) AND $_SESSION["Amountt"] > 0) {
//header("Location:subscription-person-information.php");
}
include "connection.php";
include "most_visited_page.php";


if (isset($_POST['option1']) || isset($_POST['option2']) || isset($_POST['option3']) || isset($_POST['option4'])) {
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    
    
    if (isset($_POST['option1']) && !empty($_POST['option1'])) {
        $Amountt1 = $_POST['option1'];
        $plan1 = 'On Farm Production';
    }
    if (isset($_POST['option2']) && !empty($_POST['option2'])) {
        $Amountt2 = $_POST['option2'];
        $plan2 = 'Post Harvest Processing';
    }
    if (isset($_POST['option3']) && !empty($_POST['option3'])) {
        $Amountt3 = $_POST['option3'];
        $plan3 = 'Sustainable Initiatives';
    }
    
    
    
    if (isset($_POST['option4']) && !empty($_POST['option4'])) {
        $Amountt = $_POST['option4'];
        $_SESSION['PlanDetails'] = 'On Farm Production,Post Harvest Processing,Sustainable Initiatives'; 
        $_SESSION['FormType'] = 'paid';
    }else{
        $Amountt = $Amountt1+$Amountt2+$Amountt3;
        $_SESSION['FormType'] = 'paid';
        $_SESSION['PlanDetails'] = $plan1.','.$plan2.','.$plan3; 
    }
    
    
    $_SESSION['Amountt'] = $Amountt;
    $_SESSION['PlanType'] = 'Yearly';
    header("Location:subscription-person-information.php");
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
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">
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
      font-family: "Heebo", sans-serif;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
    <center>
      <h5 id="response"></h5>
    </center>
    <form id="form" action="" method="POST">
      <div class="container">
        <div class="col-md-12 text-center">
          <div class="subscription-name">
              <!--Lorem Ipsum is Simply Dummy Text of the Printing and Typesetting Industry.-->
          </div>
          <div class="subscription-price mb-4 pb-3">Total: Rs.<font id="total">0</p></font>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="subscription-box text-center mb-4">
              <div class="subscription-box-img mb-4"><img src="img/subscribe-1.png" alt="" class="img-fluid"></div>
              <div class="subscription-name">
                <div>
                  <input value="2500" onclick='Uncheck1(this)' class="form-check-input" type="checkbox" id="option1" name="option1" value="something">
                  <label for="OnFarmProduction" class="form-check-label">On Farm Production</label>
                </div>
              </div>
              <div class="subscription-price mb-3">Rs.2,500</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="subscription-box text-center mb-4">
              <div class="subscription-box-img mb-4"><img src="img/subscribe-2.png" alt="" class="img-fluid"></div>
              <div class="subscription-name">
                <div>
                  <input value="2500" onclick='Uncheck2(this)' class="form-check-input" type="checkbox" id="option2" name="option2" value="something">
                  <label for="PostHarvestProcessing" class="form-check-label">Post Harvest Processing</label>
                </div>
              </div>
              <div class="subscription-price mb-3">Rs.2,500</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="subscription-box text-center mb-4">
              <div class="subscription-box-img mb-4"><img src="img/subscribe-3.png" alt="" class="img-fluid"></div>
              <div class="subscription-name">
                <div>
                  <input value="2500" onclick='Uncheck3(this)' class="form-check-input" type="checkbox" id="option3" name="option3" value="something">
                  <label for="check1" class="form-check-label">Sustainable Initiatives</label>
                </div>
              </div>
              <div class="subscription-price mb-3">Rs.2,500</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="subscription-box text-center mb-4 position-relative mins-mt-15 subscription-box-border">
              <div class="special-offer">
                <img src="img/special-offer.png" alt="" class="img-fluid">
              </div>
              <div class="subscription-box-img mb-4"><img src="img/subscription-img.jpg" alt="" class="img-fluid"></div>
              <div class="subscription-price">Combo Pack</div>
              <div class="subscription-name">
                <div>
                  <input value="5000" onclick='Uncheck4(this)' class="form-check-input" type="checkbox" id="option4" name="option4" value="something">
                  <label class="form-check-label">(On Farm Production, Post Harvest Processing, Sustainable Initiatives)</label>
                </div>
              </div>
              <div class="subscription-price mb-3">Rs.5,000</div>
            </div>
          </div>

          <div class="col-md-12 text-center">
            <button class="btn btn-warning rounded-pill">5 Day Trial</button>
            <button type="submit" class="btn btn-primary rounded-pill">Subscribe</button>
          </div>

        </div>
      </div>
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
    (function () {
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
    $(document).ready(function () {
      $('#form').click(function () {
        $.ajax({
          url: "yearly.php",
          type: "post",
          data: $(this).serialize()
        }).done(function (data) {
          $('#response').html(data);
        });
      });
    });

    
function Uncheck1(checkBox) {
let inputs11 = document.getElementById('option4');
        inputs11.checked = false;
var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option3 = document.getElementById("option3");
if (option1.checked == true && option2.checked == true && option3.checked == true){
    alert('Save your 1000 ruppee ( if you select combo pack )');
  }
if (option1.checked == true && option2.checked == true && option3.checked == true){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == true && option3.checked == false){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2);
  }

if (option1.checked == true && option2.checked == false && option3.checked == true){
    val1 = $('#option1').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == false && option3.checked == false){
    val1 = $('#option1').val();
    document.getElementById("total").innerHTML = parseInt(val1);
  }

if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }

if (option1.checked == false && option2.checked == true && option3.checked == false){
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val2);
  }

if (option1.checked == false && option2.checked == false && option3.checked == true){
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val3);
  }

  
if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }
if (option1.checked == false && option2.checked == false && option3.checked == false){
    document.getElementById("total").innerHTML = '0';
  }
}
    
function Uncheck2(checkBox) {
let inputs22 = document.getElementById('option4');
        inputs22.checked = false;
var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option3 = document.getElementById("option3");
if (option1.checked == true && option2.checked == true && option3.checked == true){
    alert('Save your 1000 ruppee ( if you select combo pack )');
  }
if (option1.checked == true && option2.checked == true && option3.checked == true){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == true && option3.checked == false){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2);
  }

if (option1.checked == true && option2.checked == false && option3.checked == true){
    val1 = $('#option1').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == false && option3.checked == false){
    val100 = $('#option1').val();
    document.getElementById("total").innerHTML = parseInt(val100);
  }

if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }

if (option1.checked == false && option2.checked == true && option3.checked == false){
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val2);
  }

if (option1.checked == false && option2.checked == false && option3.checked == true){
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val3);
  }

  
if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }
if (option1.checked == false && option2.checked == false && option3.checked == false){
    document.getElementById("total").innerHTML = '0';
  }
}   
    
function Uncheck3(checkBox) {
let inputs33 = document.getElementById('option4');
        inputs33.checked = false;
var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option3 = document.getElementById("option3");
if (option1.checked == true && option2.checked == true && option3.checked == true){
    alert('Save your 1000 ruppee ( if you select combo pack )');
  }
if (option1.checked == true && option2.checked == true && option3.checked == true){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == true && option3.checked == false){
    val1 = $('#option1').val();
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val2);
  }

if (option1.checked == true && option2.checked == false && option3.checked == true){
    val1 = $('#option1').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val1)+parseInt(val3);
  }

if (option1.checked == true && option2.checked == false && option3.checked == false){
    val1 = $('#option1').val();
    document.getElementById("total").innerHTML = parseInt(val1);
  }

if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }

if (option1.checked == false && option2.checked == true && option3.checked == false){
    val2 = $('#option2').val();
    document.getElementById("total").innerHTML = parseInt(val2);
  }

if (option1.checked == false && option2.checked == false && option3.checked == true){
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val3);
  }

  
if (option1.checked == false && option2.checked == true && option3.checked == true){
    val2 = $('#option2').val();
    val3 = $('#option3').val();
    document.getElementById("total").innerHTML = parseInt(val2)+parseInt(val3);
  }
if (option1.checked == false && option2.checked == false && option3.checked == false){
    document.getElementById("total").innerHTML = '0';
  }
}
    
function Uncheck4(checkBox) {
let inputs1 = document.getElementById('option1');
        inputs1.checked = false;
let inputs2 = document.getElementById('option2');
        inputs2.checked = false;
let inputs3 = document.getElementById('option3');
        inputs3.checked = false;
var option4 = document.getElementById("option4");
if (option4.checked == true){
    val4 = $('#option4').val();
    document.getElementById("total").innerHTML = val4;
  }
if (option4.checked == false){
    val4 = $('#option4').val();
    document.getElementById("total").innerHTML = '0';
  }
}
</script>
</body>
</html>