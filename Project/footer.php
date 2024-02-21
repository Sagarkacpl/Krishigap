<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 1rem !important;">
   <div class="container py-5">
      <div class="row g-5">
         <div class="col-lg-4 col-md-6">
            <h4 class="text-white mb-3">Quick Link</h4>
            <a class="btn btn-link" href="about.php">About Us</a>
            <a class="btn btn-link" href="contact.php">Contact Us</a>
            <a class="btn btn-link" href="privacy-policy.php">Privacy Policy</a>
            <a class="btn btn-link" href="terms_and_condtion.php">Terms & Conditions</a>
            <a class="btn btn-link" href="faqs.php">FAQs & Help</a>
            <a class="btn btn-link" href="cancellation_and_refund.php">Cancellation & Refund Policy</a>
            <a class="btn btn-link" href="https://krishigap.com/shipping_delivery_policy.php">Shipping & Delivery Policy</a>
            <a class="btn btn-link" href="disclaimer.php">Disclaimer</a>
         </div>
         <div class="col-lg-12 text-center col-md-6">
            <div class="d-flex pt-2">
               <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
               <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
               <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
               <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="copyright">
      <div class="container">
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
               <center> 
                  <a href="https://www.hitwebcounter.com" target="_blank">
                  <img src="https://hitwebcounter.com/counter/counter.php?page=8324962&style=0005&nbdigits=5&type=page&initCount=198" title="Free Counter" Alt="web counter"   border="0" /></a>     
               </center>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12 text-center mb-3 mb-md-0">
               &copy; Good Agricultural Practices All Right Reserved.<br><br>
            </div>
         </div>
      </div>
   </div>
</div>