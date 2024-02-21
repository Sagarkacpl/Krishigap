<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>
<style>
   input.razorpay-payment-button {
   margin-left: 45%;
   margin-top: 4%;
   padding: 10px;
   background: #C62828;
   border: 1px solid #C62828;
   color: white;
   font-weight: 700;
   }
   #header {
   background: #fbcb2b !important;
   }
</style>
<form action="verify.php" method="POST">
   <script
      src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="<?php echo $data['key']; ?>"
      data-amount="<?php echo $data['amount']; ?>"
      data-currency="INR"
      data-name="<?php echo $data['name']; ?>"
      data-image="<?php echo $data['image']; ?>"
      data-description="<?php echo $data['description']; ?>"
      data-prefill.name="<?php echo $data['prefill']['name']; ?>"
      data-prefill.email="<?php echo $data['prefill']['email']; ?>"
      data-prefill.contact="<?php echo $data['prefill']['contact']; ?>"
      data-notes.shopping_order_id="<?php echo $_SESSION[UserID]; ?>"
      data-order_id="<?php echo $data['order_id']; ?>"
      <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']; ?>" <?php
         } ?>
      <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']; ?>" <?php
         } ?>
      ></script>
   <input type="hidden" name="shopping_order_id" value="<?php echo $_SESSION[UserID]; ?>">
</form>