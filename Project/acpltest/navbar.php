<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="width: 245px;">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    

    <li class="nav-item">
      <a class="nav-link" href="training_modules_feedback.php">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="training_modules_enquiries.php">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Enquiries</span>
      </a>
    </li>
    
     <li class="nav-item">
      <a class="nav-link" href="contact_us.php">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Contact</span>
      </a>
    </li>
    
     <li class="nav-item">
      <a class="nav-link" href="user_accounts.php">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Contact Information</span>
      </a>
    </li>

   
  </ul>
</nav>